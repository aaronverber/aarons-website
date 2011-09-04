<?php 

if(isset($_POST['Send'])){
	
		$error = false;
	
		$the_name = $_POST['yourname'];
		$the_email = $_POST['email'];
		$the_website = $_POST['website'];
		$the_message = $_POST['message'];
		
		
		
		if(!checkmymail($the_email))
		{
			$error = true;
			$the_emailclass = "error";
		}else{
			$the_emailclass = "valid";
			}
		
		if($the_name == "")
		{
			$error = true;
			$the_nameclass = "error";
		}else{
			$the_nameclass = "valid";
			}
		
		if($the_message == "")
		{
			$error = true;
			$the_messageclass = "error";
		}else{
			$the_messageclass = "valid";
			}
		
		if($error == false)
		{	
			$to      =  $_POST['myemail'];
			$subject = "New Message from " . $_POST['myblogname'];
			$header  = 'MIME-Version: 1.0' . "\r\n";
			$header .= 'Content-type: text/html; charset=utf-8' . "\r\n";
			$header .= 'From:'. $_POST['email']  . " \r\n";
		
			$the_message = nl2br($the_message);
			
			
			$message = "New message from  $the_name <br/>
			Mail: $the_email<br />
			Website: $the_website <br /><br />
			Message: $the_message <br />";
			
			
			mail($to,
			$subject,
			$message,
			$header); 
			
			if(isset($_POST['ajax'])){
			echo"<h3>Your message has been sent!</h3><p> Thank you!</p>";
			}
		}
		
}
	
	
function checkmymail($mailadresse){
	$email_flag=preg_match("!^\w[\w|\.|\-]+@\w[\w|\.|\-]+\.[a-zA-Z]{2,4}$!",$mailadresse);
	return $email_flag;
}
	




?>