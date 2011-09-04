<?php  
##########################################################################################################################################
#edit these 3 parameters:

#activate twitter feed:
$active = false; // true or false
#Your twitter username:
$username = "Kriesi";
#if feed is set inactive, twitter is down, or message can not be retrieved for any reason:
$fallback = 'This is a twitter message retrieved from a twitter account of your choice =)';
##########################################################################################################################################
 

$feed = "http://search.twitter.com/search.atom?q=from:" . $username . "&rpp=1";  

function parse_feed($feed) {  
$stepOne = explode("<content type=\"html\">", $feed);
	if(isset($stepOne[1])){
		$stepTwo = explode("</content>", $stepOne[1]);  
		$tweet = $stepTwo[0];  
		$tweet = str_replace("&lt;", "<", $tweet);  
		$tweet = str_replace("&gt;", ">", $tweet);  
	return $tweet; 
	}
}  

if($active){
$twitterFeed = @file_get_contents($feed); 
$my_tweet = parse_feed($twitterFeed); 
}else{
$twitterFeed = '';
$my_tweet ='';
}

$followme = '<a href="http://twitter.com/'.$username.'" title="" id="tweet_follow"></a>';
if ($my_tweet =='') $my_tweet = $fallback;
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
				<li class="current_page_item"><a href="blog.php">Company Blog</a></li>
				<li><a href="contact.php">Contact</a></li>
			</ul>
			
			<form action="" id="searchform" method="get">
				<div><input type="text" id="s" name="s" value=""/>
				<input type="submit" value="S" id="searchsubmit" class="button ie6fix"/>
				</div>
			</form>
	                
		</div><!-- end head-->
		
	            
	            <div class="additional_info ie6fix" id='twitterbox'>
	            	<?php echo $followme; ?>
				<h2><?php echo $my_tweet; ?></h2>
	            </div>
	        
	       <div id="main">  
	            <div class="wrapper">
	            	<div class='box box_medium box1'>
	            		<div class='entry'>
	            		<h2><a href='single.html' title=''>A News Entry</a></h2>
	            		<div class="entry-head">
							<span class="categories"><a href="#">News</a>,<a href="#">Startup</a></span>&bull;
							<span class="date">on June 26th 2009</span>&bull;
							<span class="comments"><a href="single.html">3 Comments</a></span>
						</div>
	            	<p><img src="files/featured_blog1.jpg" alt="" /></p>
								
								<p>You need audio to video and more, get the skills you want from our family of tutorial and resource sites. </p><p>

Need more? We also offer a Plus program where you can access source files and bonus tutorials .From graphics to web development, audio to video and more.
 get the skills you want from our family of tutorial and resource sites. Need more? We also offer a Plus program where you can access source files and bonus tutorials.</p>
<h3>Audio and Video</h3>
<p>Audio to video and more, get the skills you want from our family of tutorial and resource sites. Need more? We also offer a Plus program where you can access source files and bonus tutorials .</p>
<p>Audio to video and more, get the skills you want from our family of tutorial and resource sites. Need more? We also offer a Plus program where you can access source files and bonus tutorials .
							<a class="more-link" href="single.html">read more</a>
					</p>
					
				</div><!--end entry-->
						<div class='entry'>
						<h2><a href='single.html' title=''>Another Entry for the Blog</a></h2>
	            		<div class="entry-head">
							<span class="categories"><a href="#">News</a>,<a href="#">Startup</a></span>&bull;
							<span class="date">on June 26th 2009</span>&bull;
							<span class="comments"><a href="single.html">3 Comments</a></span>
						</div>
	            	<p><img src="files/featured_blog2.jpg" alt="" /></p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut <strong>senim ad minim veniam</strong>, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.  </p><p>

Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris<a class="more-link" href="single.html">read more</a>
					</p>
				</div><!--end entry-->

						<div class='entry'>
						<h2><a href='single.html' title=''>Yet another Blog entry</a></h2>
	            		<div class="entry-head">
							<span class="categories"><a href="#">News</a>,<a href="#">Startup</a></span>&bull;
							<span class="date">on June 26th 2009</span>&bull;
							<span class="comments"><a href="single.html">3 Comments</a></span>
						</div>
	            	<p><img src="files/featured_blog3.jpg" alt="" /></p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim <strong>veniam, quis nostrud exercitation</strong> ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.  </p><p>

Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris<a class="more-link" href="single.html">read more</a>
					</p>
				</div><!--end entry-->
				
					<div class="entry">
						<div class='box box_small box1 '>
	            		<h2><a href='single.html' title=''>A small entry</a></h2>
	            		<div class="entry-head">
							<span class="categories"><a href="#">News</a>,<a href="#">Startup</a></span>&bull;
							<span class="date">on June 26th 2009</span>&bull;
							<span class="comments"><a href="single.html">3 Comments</a></span>
						</div>
	            		<p>Incididunt ut labore et dolore magna aliqua, consectetur adipisicing eiusmod tempor.</p><p> Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.
</p>
	            		<img src="files/block1.png" alt="" />
	            	</div> <!--end box_small-->
	            	
	            	<div class='box box_small box2'>
	            		<h2><a href='single.html' title=''>Another Small entry</a></h2>
	            		<div class="entry-head">
							<span class="categories"><a href="#">News</a>,<a href="#">Startup</a></span>&bull;
							<span class="date">on June 26th 2009</span>&bull;
							<span class="comments"><a href="single.html">3 Comments</a></span>
						</div>
	            		<p>
Lorem ipsum dolor sit amet consectetur tempor aliqua adipisicing elit.</p><p> Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad veniam.
</p>
	            		<img src="files/block2.png" alt="" />
	            	</div> <!--end box_small-->
				</div><!--end entry-->
				
				<div class="entry">
						<div class='box box_small box1 '>
	            		<h2><a href='single.html' title=''>Third small entry</a></h2>
	            		<div class="entry-head">
							<span class="categories"><a href="#">News</a>,<a href="#">Startup</a></span>&bull;
							<span class="date">on June 26th 2009</span>&bull;
							<span class="comments"><a href="single.html">3 Comments</a></span>
						</div>
	            		<p>
Lorem ipsum dolor sit amet consectetur tempor aliqua adipisicing elit.</p><p> Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad veniam.
</p>
	            	</div> <!--end box_small-->
	            	
	            	<div class='box box_small box2'>
	            		<h2><a href='single.html' title=''>Fourth Small entry</a></h2>
	            		<div class="entry-head">
							<span class="categories"><a href="#">News</a>,<a href="#">Startup</a></span>&bull;
							<span class="date">on June 26th 2009</span>&bull;
							<span class="comments"><a href="single.html">3 Comments</a></span>
						</div>
	            		<p>Incididunt ut labore et dolore magna aliqua, consectetur adipisicing eiusmod tempor.</p><p> Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.
</p>
	            	</div> <!--end box_small-->
				</div><!--end entry-->


	            	</div> <!--end box_medium-->
	            	
	            	<div class='box box_small box3' id='sidebar'>
	            	<div class='widget'>
		            	<h3 class="heading">Latest News</h3>
						<ul id='latest_news'>
						<li>
								<a class="odd" href="#">
									<span class="post_name">New Themeforest Theme released</span>
									<span class="meta">
										<span class="meta_sub">12.07.2009</span>
										<span class="meta_sub">Photography</span>
										<span>3 Comments</span>
									</span>
								</a>
							</li>
							
							<li>
								<a class="even" href="#">
									<span class="post_name">Why Internet Explorer is plain evil</span>
									<span class="meta">
										<span class="meta_sub">11.07.2009</span>
										<span class="meta_sub">News</span>
										<span>0 Comments</span>
									</span>
								</a>
							</li>
							
							<li>
								<a class="odd" href="#">
									<span class="post_name">Welcome to our new Homepage</span>
									<span class="meta">
										<span class="meta_sub">03.07.2008</span>
										<span class="meta_sub">Web Design</span>
										<span>345 Comments</span>
									</span>
								</a>
							</li>
						</ul>
					</div><!-- end widget -->
					
					<div class='widget'>
						<h3 class="heading">Categories</h3>
						<ul>
							<li><a href="#">Web Design</a></li>
							<li><a href="#">Photography</a></li>
							<li><a href="#">Print Work</a></li>
							<li><a href="#">Wordpress Themes</a></li>
							<li><a href="#">Joomla Templates</a></li>
							<li><a href="#">News</a></li>
						</ul>
					</div><!-- end widget -->
					
					<div class='widget'>
						<h3 class="heading">Archives by Date</h3>
						<ul>
							<li><a href="#">November 2008</a></li>
							<li><a href="#">Jannuary 2009</a></li>
							<li><a href="#">February 2009</a></li>
							<li><a href="#">March 2009</a></li>
							<li><a href="#">April 2009</a></li>
						</ul>
					</div><!-- end widget -->
					
	            	</div> <!--end sidebar-->
	            	
	            	
	            	
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