<?php include("config/config.php");

if(isset($_REQUEST["submit"]) && !empty($_REQUEST["submit"])) {
	
	$select_subscribe_exist = mysqli_query($GLOBALS['conn'], "SELECT * FROM newsletter_subscription WHERE email_address='".$_REQUEST['email_address']."'");

	if((mysqli_num_rows($select_subscribe_exist)==0)) {
	
		$insert_subscription = mysqli_query($GLOBALS['conn'], "INSERT INTO newsletter_subscription SET name = '".$_REQUEST['name']."', email_address = '".$_REQUEST['email_address']."', is_new=1, is_approved=0, created_date = NOW()");
		
		$from = "receipts.pulariecofoundation@gmail.com";	
		$to = $_REQUEST['email_address'];			
		$subject = "Newsletter Subscription - ".$GLOBALS['sitename'];
		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .="From:".$from." \r\n";		
		$message .='<p><img src="'.$GLOBALS['webroot'].'images/'.$GLOBALS['site_logo'].'"></p>
					 <p>Dear '.$_REQUEST["name"].',</p>
					 <p>Thank you for subscribing to our newsletter. Stay tuned to hear about our new updated.</p>';					
		$message .="<p>Thanks,<br/>";
		$message .="<b>Pulari Eco Foundation</b></p>";		
		
		mail($to,$subject,$message,$headers);
		header("location:newsletter.php?act=success");
		die();
	} else {
		header("location:newsletter.php?act=already_exist");
		die();
	}
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Title of this page -->
    <title>Newsletter Subscription | <?php echo $GLOBALS['sitename']; ?></title>
    <?php include("includes/head_templates.php"); ?>  
</head>

<body>
	<!--eco content wrapper starts-->
	<div class="eco_wrapper"> 
		
		<!--eco Header starts-->
		<?php include("assets_templates/header.php"); ?>  
		<!--Header ends-->
		
		<!--Eco Template Banner-->
		<div class="eco_banner eco_inner_page_banner">
			<!--Eco Template Banner img-->
			<div class="eco_headings">
				<h3><b>newsletter</b> subscription</h3>
			</div>
			<ul class="eco_page_link">
				<li class="active"><a href="#" class="eco_breadcrumb_heading">newsletter subscription</a></li>
			</ul>
		</div>
		<!--Eco Template Banner ends-->
			
		<!--Eco Template content-->
		<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-6">
						<div class="kode_login_social-account white-login-form">
			  				<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			  					<div class="eco-login-registration">
                                	<?php if($_REQUEST['act'] == 'success') { ?>
                                        <div class="alert alert-info" id="success_message" role="alert">Thank you for subscribing to our newsletter. Stay tuned to hear about our updated.</div>
                                    <?php } else if($_REQUEST['act'] == 'already_exist') { ?>
                                        <div class="alert alert-danger" id="success_message" role="alert">This email address is already subscribed with us. Please try using another email address or contact our administrator.</div>
                                    <?php } ?>
				  					<div class="eco_title_form">
					  					<h3><b>subscription</b> form</h3>
					  					<p>Enter your name and email in the below box to receive latest updates and information about our organization.</p>
				  					</div>
				  					<div class="kode-email-account">
					  					<label>
					  						<input type="text" name="name" id="name" placeholder="Your Name" required="required" value="<?php echo $_REQUEST['name']; ?>">
					  					</label>
					  					<label>
					  						<input type="email" name="email_address" id="email_address" placeholder="Your Email Address" required="required" value="<?php echo $_REQUEST['email_address']; ?>">
					  					</label>					  					
				  					</div>				  									  					
				  					<div class="clear"></div>
				  					<input type="submit" name="submit" class="btn-mediem login_style" type="submit" value="subscribe">				  								</div>
			  				</form>
			  			</div>
			  		</div>
			  		<div class="col-md-3"></div>
			  	</div>		
			</div>
		</div>
		<!--Eco content ends-->       		                               
		
		<?php include("assets_templates/footer.php"); ?>
		
	</div>
	<!--eco content wrapper ends-->
	
	<div id="preloader">
		<div id="status"></div>
	</div>
   <?php include("includes/footer_scripts.php"); ?>  
	
  </body>
</html>