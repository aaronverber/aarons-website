<?php 
$name_of_your_site = "Levitation.net"; 
$email_adress_reciever = "office@levitation.net";

if(isset($_POST['Send']))
{
	include('send.php');	
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<title>Levitation</title>
	
	<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/style1.css" type="text/css" media="screen" />
	<!--
	<link rel="stylesheet" href="css/style2.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/style3.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/style4.css" type="text/css" media="screen" />
	-->
	
	
	<link rel="stylesheet" href="prettyPhoto/css/prettyPhoto.css" type="text/css" media="screen" charset="utf-8" />
	
	
	<script type='text/javascript' src='js/jquery.js'></script>
	<script src="prettyPhoto/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
	<script type='text/javascript' src='js/cufon.js'></script>
	<script type='text/javascript' src='js/quicksand.font.js'></script>
	
	
	<script type='text/javascript' src='js/custom.js'></script>
	
	<!--[if IE 6]>
	<script type='text/javascript' src='js/dd_belated_png.js'></script>
	<script>DD_belatedPNG.fix('.ie6fix');</script>
	<![endif]-->
	
</head>

<body id='frontpage'>
	<div id="top">
		<div id="head"> 
	      	<h1 class="logo"><a href="#" title="#">Toolani</a></h1>

	        <ul id="nav">
				<li><a id='active' href="index.html">Home</a></li>
				<li><a href="portfolio.html">Portfolio</a></li>
				<li><a href="page.html">Template Files</a>
					<ul>
					<li><a href='index.html'>Index Page</a></li>
					<li><a href='index2.html'>Alternate Index Page</a></li>
					<li><a href='blog.php'>Blog</a></li>
					<li><a href='single.html'>Single Entry</a></li>
					<li><a href='page.html'>Static Page (About)</a></li>
					<li><a href='contact.php'>Contact</a></li>
					<li><a href='portfolio.html'>Portfolio</a></li>
					<li><a href='#'>Second Level &raquo;</a>
						<ul>
						<li><a href='#'>Just for</a></li>
						<li><a href='#'>Demonstration</a></li>
						<li><a href='#'>Purpose</a></li>
						</ul>
					</li>
					</ul>
				</li>
				<li><a href="blog.php">Company Blog</a></li>
				<li class="current_page_item"><a href="contact.php">Contact</a></li>
			</ul>
			
			<form action="" id="searchform" method="get">
				<div><input type="text" id="s" name="s" value=""/>
				<input type="submit" value="S" id="searchsubmit" class="button ie6fix"/>
				</div>
			</form>
	                
		</div><!-- end head-->
		
	            
	            <div class="additional_info">
	            	<h2>BUILDING A WEBSITE WITH US IS GREAT FUN, SO DO YOURSELF A FAVOUR &amp; CONTACT US =)</h2>
	            </div>
	        
	       <div id="main">  
	            <div class="wrapper">
	            	<div class='box box_medium box1'>
	            	<h2>Contcat us</h2>
	            	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Incididunt ut labore et dolore magna aliqua, consectetur adipisicing eiusmod tempor.</p><p> Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
<form action="" method="post" class="ajax_form">
			<fieldset><?php if (!isset($error) || $error == true){ ?><h3><span>Send us a mail</span></h3>
			
			<p class="<?php if (isset($the_nameclass)) echo $the_nameclass; ?>" ><input name="yourname" class="text_input empty" type="text" id="name" size="20" value='<?php if (isset($the_name)) echo $the_name?>'/><label for="name">Your Name*</label>
			</p>
			<p class="<?php if (isset($the_emailclass)) echo $the_emailclass; ?>" ><input name="email" class="text_input email" type="text" id="email" size="20" value='<?php if (isset($the_email)) echo $the_email ?>' /><label for="email">E-Mail*</label></p>
			<p><input name="website" class="text_input" type="text" id="website" size="20" value="<?php if (isset($the_website))  echo $the_website?>"/><label for="website">Website</label></p>
			<label for="message" class="blocklabel">Your Message*</label>
			<p class="<?php if (isset($the_messageclass)) echo $the_messageclass; ?>"><textarea name="message" class="text_area empty" cols="40" rows="7" id="message" ><?php  if (isset($the_message)) echo $the_message ?></textarea></p>
			
			
			<p>
			<input type="hidden" id="myemail" name="myemail" value="<?php echo $email_adress_reciever; ?>" />
			<input type="hidden" id="myblogname" name="myblogname" value="<?php echo $name_of_your_site; ?>" />
			
			<input name="Send" type="submit" value="Send" class="button" id="send" size="16"/></p>
			<?php } else { ?> 
			<p><h3>Your message has been sent!</h3> Thank you!</p>
			
			<?php } ?>
			</fieldset>
			
			</form> 

						<div class='box box_small box1'>
	            		<h3 >What do we offer?</h3>
	            		<p>Incididunt ut labore et dolore magna aliqua, consectetur adipisicing eiusmod tempor.</p><p> Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.
</p>
	            		<img src="files/block1.png" alt="" />
	            	</div> <!--end box_small-->
	            	
	            	<div class='box box_small box2'>
	            		<h3>Qualitiy matters!</h3>
	            		<p>
Lorem ipsum dolor sit amet consectetur tempor aliqua adipisicing elit.</p><p> Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad veniam.
</p>
	            		<img src="files/block2.png" alt="" />
	            	</div> <!--end box_small-->



	            	</div> <!--end box_medium-->
	            	
	            	<div class='box box_small box3' id='sidebar' >
	            		<div class='widget'>
			            	<h3 class="heading">Sub Navigation</h3>
							<ul>
							<li><a href="page.html">About Us</a></li>
							<li><a href="page2.html">Jobs</a></li>
							<li><a href="page2.html">Philosophy</a></li>
							<li><a href="contact.php">Contact</a></li>
						</ul>
			            	</div> <!--end widget-->
			            	
			            		
			            	
			            <div class='widget'>
	            		<h3 class="heading">Details</h3>
	            		<p>
	            		<strong>Adress:</strong> Everlane Street 2200<br/>
	            		<strong>State:</strong> Austria, Vienna</p>
	            		
	            		<p>
	            		<strong>Phone:</strong> 555 - 398 34 488 <br/>
	            		<strong>Mail:</strong> levit@tion.com
	            		</p>
	            	</div> <!--end widget-->
	            	
	            	
			           </div> <!--end box_small-->
	            </div><!--end wrapper-->
		</div><!--end main-->
	</div><!--end top-->   
	
	   
	<div id="footer">
	<span class='alignleft'> Copyright &copy; Kriesi.at - New Media Design - remove this once purchased ;)</span>
			
    <span class="alignright">
           <a  href='#'>AGB</a> | 
           <a  href='#'>Legal Notice</a> 
    </span>
    
    </div><!--end footer-->
</body>
</html>