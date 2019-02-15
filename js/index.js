window.onload = function() {

	// close the login page when you click outside the login popup
	var login = document.getElementById('box-container');
	var validate_container = document.getElementById('validate-container');
	window.onclick = function(event) {
	    if (event.target == login || event.target == validate_container) {	
	        login.style.display = "none";
	        validate_container.style.display = "none";
	    }
	}


	var ul = document.getElementById("user-ul");
	var li = document.getElementById("user-li");
	var user_menu = document.getElementById("user_click");
	user_menu.onclick = function() {	
		if (ul.style.display === "block") {
			ul.style.display = "none";
			li.style.display = "none";
		}
		else {
			ul.style.display = "block";
			li.style.display = "block";
		}

	}


	


	function comment() {
 	 xmlhttp=new XMLHttpRequest();
 	 xmlhttp.open("GET", "comment_msg.php", false);
 	 xmlhttp.send(null);
 	 document.getElementById("comment-msg").innerHTML=xmlhttp.responseText;

 	}
 	comment();

 	setInterval(function() {
 		comment();
 	},1000);

		

	var user_container = document.getElementById('user-container');
	window.onclick = function(event) {
	    if (event.target == user_container) {
	        ul.style.display = "none";
	        li.style.display = "none";
	    }
	}



	var head = document.getElementById("head");
	head.onclick = function() {
		var option_container = document.getElementById("option-container");
		if (option_container.style.height === "200px") {
			option_container.style.height = "0px";
		}
		else {
			option_container.style.display = "200px";
		}
	}

	


	













}


	 function printThis() {
			var restorePage = document.body.innerHTML;
			// var printContent = document.getElementById("crap").innerHTML;
			// document.body.innerHTML = printContent;
			print();
			document.body.innerHTML = restorePage;
	}


	function uhu() {
		var password_holder = document.getElementById("passwords");
		if (password_holder.type === "password") {
			 password_holder.type = "text";
			
		}
		else {
			 password_holder.type = "password";
			
		}
	}



	
	function showBox() {
	var box_container = document.getElementById("box-container");
	box_container.style.display = "block";
	}





 

function find(str) {
	if (str.length == "") {
        document.getElementById("ref-container").innerHTML = "";
        var hides =   document.querySelectorAll("div#crap");
        document.getElementById("pagination").style.display = "block";
        document.getElementById("number_of_items").style.display = "block";
        for (var i = 0; i <= hides.length; i++) {
					hides[i].style.display = "block";					
					// hides[i].style.color = "blue";
				}
		document.getElementById("pagination").style.display = "block";
        return;
    } else {
    	 if (window.XMLHttpRequest) {
		    // code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp=new XMLHttpRequest();
		  } else {  
		  	// code for IE6, IE5
		    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("ref-container").innerHTML = this.responseText;
                var hides =   document.querySelectorAll("div#crap");
                // var e = document.getElementById("slct");
                
                document.getElementById("number_of_items").style.display = "none";
                document.getElementById("pagination").style.display = "none";
				for (var i = 0; i <= hides.length; i++) {
					hides[i].style.display = "none";
				}
            }
        }
        	var search = document.getElementById("slct").value;
	        xmlhttp.open("GET","find.php?find="+str+"&search="+search,true);
	        xmlhttp.send();
    }
}


// ajax for comments



