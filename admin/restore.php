<?php 

function restoreDatabaseTables($dbHost, $dbUsername, $dbPassword, $dbName, $filePath){
    // Connect & select the database
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); 




        $db->query("SET FOREIGN_KEY_CHECKS=0");


    // Temporary variable, used to store current query
    $templine = '';
    
    // Read in entire file
    $lines = file($filePath);
    
    $error = '';
    
    // Loop through each line
    foreach ($lines as $line){
        // Skip it if it's a comment
        if(substr($line, 0, 2) == '--' || $line == ''){
            continue;
        }
        
        // Add this line to the current segment
        $templine .= $line;
        
        // If it has a semicolon at the end, it's the end of the query
        if (substr(trim($line), -1, 1) == ';'){
            // Perform the query
            if(!$db->query($templine)){
                $error .= 'Error performing query "<b>' . $templine . '</b>": ' . $db->error . '<br /><br />';
            }

            
            // Reset temp variable to empty
            $templine = '';
           
        }
    }
    header("location:db_backup_and_restore.php?success");
    return !empty($error)?$error:true;

}



    
    $path = trim("D:\ ");
        $restore = $_GET["name"];
        $directory = explode(".", $restore);

    $dbHost     = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName     = 'onlinecatalog_db';
    $fs = trim("\ ");
    // $slash = trim('"\"', "'");
    exec("xcopy /E ".$path.$directory[0]." "."C:".$fs."xampp\htdocs\online_catalog2\catalog\images".$fs);
    
    $filePath = $path.$directory[0].$fs.$restore;
    restoreDatabaseTables($dbHost,$dbUsername,$dbPassword,$dbName,$filePath);


 ?>