<?php include("config/config.php");

if(isset($_REQUEST["submit"]) && !empty($_REQUEST["submit"])) {
	$from = $_REQUEST['email'];	
	// $to = "dhayalan1127@gmail.com";	
	$to = "receipts.pulariecofoundation@gmail.com";		
	// $reply_to = $_REQUEST['email'];
	$bcc = "dhayalan1127@gmail.com";
	$subject = "Member Application Form - ".$GLOBALS['sitename'];
	$headers = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .="From:".$from." \r\n";	
	// $headers .="Reply-To:".$reply_to." \r\n";
	$headers .= "Bcc:".$bcc."\r\n";	
	$message .='<p><img src="'.$GLOBALS['webroot'].'images/'.$GLOBALS['site_logo'].'"></p>
				 <p>Dear Admin,</p>
				 <p>Name : '.$_REQUEST['name'].'</p>				 		
				 <p>Email : '.$_REQUEST['email'].'</p>				 
				 <p>Phone Number : '.$_REQUEST['phone'].'</p>
				 <p>Message : '.$_REQUEST['message'].'</p>';					
	$message .="<p>Thanks,<br/>";
	$message .="Pulari Eco Foundation</p>";		
	
	mail($to,$subject,$message,$headers);
	header("location:members.php?act=success");
	die();
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Title of this page -->
    <title>Members | <?php echo $GLOBALS['sitename']; ?></title>
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
				<h3><b>Members</b></h3>
			</div>
			<ul class="eco_page_link">
				<li class="active"><a href="#" class="eco_breadcrumb_heading">Members</a></li>
			</ul>
		</div>
		<!--Eco Template Banner ends-->
			
		<!--Eco Template content-->
		<div class="content">			 
			<section>
				<div class="container">
					<div class="eco_contact_form">
						<div class="row">
							<div class="col-md-8 no-padding col-sm-12 responsive-991-width">                            	
								<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
									<div class="your-submit-message">
									<?php if($_REQUEST['act'] == 'success') { ?>
                                        <div class="alert alert-info" id="success_message" role="alert">Thank you for submitting member application form. Our consultant will contact you shortly.</div>
                                    <?php } ?>
										<h5 class="eco_sm_titles">Member Application Form <i class="fa fa-envelope" aria-hidden="true"></i></h5>
										<div class="writeing-felid">
											<div class="row">
												<div class="col-md-6">
													<input type="text" name="name" placeholder="Enter your name *" required="required">
												</div>	
												<div class="col-md-6">
													<input type="email" name="email" placeholder="Enter your email address *" required="required">
												</div>
												<div class="col-md-12">
													<input type="text" name="phone" placeholder="Enter your phone number *" required="required">
												</div>
												<div class="col-md-12">
													<textarea name="message" placeholder="Enter your message"></textarea>
												</div>
											</div>
											<input type="submit" name="submit" class="mediem_btn_02 tcolor" value="send">
										</div>
									</div>
								</form>	
							</div>
							<div class="col-md-4 no-padding col-sm-12 responsive-991-width">
								<div class="eco_detail_address">
									<h5 class="eco_sm_titles">Always Welcome!</h5>
									<p>We tend to understand the impact and need for a change only when we get involved, when we physically observe a social issue and work towards finding a solution for it. It changes a person's perspective and creates a sense of responsibility. It also helps to develop a network, to meet like minded people.</p>
                                    <p>A membership fee is charged to individuals who wish to become members. Members of the organization get involved in the projects and activities based on their area of expertise and interests. Members will be notified of all activities and events of the organization.</p>
                                    <h5 class="eco_sm_titles">Social accounts</h5>
									<ul class="social-icons">
										<li><a href="https://www.facebook.com/pulariecofoundation" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="https://www.youtube.com/@PulariEcoFoundation/featured" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                        <li><a href="https://instagram.com/pulariecofoundation?igshid=OGQ5ZDc2ODk2ZA==" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>									
									</ul>                                    									
								</div>
							</div>
						</div>
					</div>					
				</div>
			</section>	
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