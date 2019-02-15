# De La Salle John Bosco College Lasalliana Inventory with Online Catalog


# Installation Guide

Steps on How to Install XAMPP

XAMPP is needed for the system to run on web thus serves as database to store data.
First, insert the flash drive containing the system’s copy, documentation and other necessary files. After inserting the flash drive, follow the steps below.

1.	Right click XAMPP installer and select open. Find the allotted driver letter that allots the Flash Drive.
2.	Next you will see the Welcome to the XAMPP setup wizard screen. Click Next to continue the installation.
3.	Next, select the necessary components needed to run the system. By default, all components are checked, now uncheck everything except Apache, MySQL, PHP and phpMyAdmin. Please refer to the picture below for the proper configuration and click next to continue.
4.	Next, choose a folder where we want to install the XAMPP server. Let us use the default directory “C:\xampp” and click next.
5.	Now you will see the Bitnami for XAMPP screen, uncheck the Learn more about Bitnami for XAMPP and click next to continue.
6.	The Ready to Install screen will appear next. Click next to continue.
7.	XAMPP will begin extracting files to the location you selected in the previous step and wait for it to finish. And then click Finish to complete the Installation.
8.	The XAMPP Control Panel will now appear and allows you to manually start and stop Apache and MySQL, click Start for Apache Server.
9.	Now click Start for the MySQL server.
10.	If the modules are properly started, its action will be changed into Stop. At the bottom part of the window we can see that the status is running.
Steps on How to Install Composer
Composer is needed for the system to generate QR for every item.
First, insert the flash drive containing the system’s copy, documentation and other necessary files. After inserting the flash drive, follow the steps below. Take note that this installation process will need Internet Connection to proceed.

1.	Right click Composer installer and select open.
2.	The Composer setup will appear next. You will be prompted to Installation Option, do not check the Developer mode and click Next to continue.
3.	Now we will use the default directory for its Php.exe, and click next to continue.
4.	The Ready to Install screen will appear next. Click Install to continue.
5.	Make sure that you are connected to the Internet to proceed with the download. Wait for it to finish.  Then click Finish to complete installation.
6.	Run the command prompt and go enter this command cd xampp\htdocs\”name of the folder” and enter enter this command add $ composer require android/installer, and click enter. Now we’re all set to run the system. 
Steps on How to Create and Import database.
Please follow the configurations shown below.

1.	First, copy the folder “online_catalog” from the flash drive and then navigate to this directory “C:\xampp\htdocs”, open the folder, and then paste it.
2.	Next, open on a preferred web browser and then type localhost/phpMyAdmin in the address bar and hit enter. This will bring you to the phpMyAdmin page.
3.	This is the environment of phpMyAdmin. First, we need to create a database by clicking Databases.
4.	In the database name field type in “onlinecatalog_db” without quotes and click create.
5.	Select onlinecatalog_db that we have recently created and then click Import.
6.	Choose File and browse the folder where the database is located and click Go.
7.	After choosing the file, make sure to uncheck the Partial import and then click Go to proceed.
8.	If the database is imported successfully, proceed to the login page. In the address bar, enter localhost\online_catalog.
How to Operate the System
1.	This is the Login Page of the System.
2.	Click Login and this will automatically appear. You can login using your credentials. By default, the Username and the Password were set to both ‘admin’. 
3. After Logging in, the Home Page will then display, that contains 5 categories of the Lasalliana Archive.
4. Click the category you want and we can see its sub-category inside. Choose among the categories   which you want to explore.
5. This are the sub category, which is the list of the items recorded in it.
6. We could Add new item by filling up its information and then click submit to record it.
7. In here we could Update an item which has been recorded by changing the value by each field below.
8. We could also easily generate QR code by hitting Generate QR which brings you into another page only with its QR code picture. Then you could copy or save it for it to be printed and labeled in its designated item.
9. In this function ‘print’, it can only print the items in one page.
10. While on this function ‘print all’, it could print all items inside the sub-category.
11. Click the Name of the user (for ex. Zalcee Songodanan) to display the drop down buttons. To go to Settings, click Admin Settings. 
12. After clicking Admin Settings, you have 4 functions to choose from. 
13. If you hit Settings, you could set your IP address for your network and Number of Pages.
14. If you wanted to change username and password then hit “Change username/password”. In here, you can change either the username or password of your choice.
15.  If you hit comments, you could leave comments or suggestions which will be read by the users and can only be manage by the admin.
16. If you wanted to Backup your system, click Backup and Restore. This will automatically appear and can back up your system to which directory you wanted.
17. If you wanted to logout, just click Logout drop down button like in the picture below.
Steps on How to Install the Lasalliana Android App
The first thing you need to do is to make sure you are connected to the Local Area Network with the Server. And then follow the steps below:

1.	Go to any browser on you Android Phone.
2. Type in first the IP address of the server (for ex. 192.168.254.100/online_catalog), and hit enter. It will lead to this Downloadable page. There’s an instruction for downloading the app. Click the android logo to download.
3. Click install to install the application. Make sure you have free space of atleast 3.18 mb.
4. And now you can open and use the Android App.



