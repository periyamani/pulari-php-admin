<?php include("config/config.php");

if(isset($_REQUEST["submit"]) && !empty($_REQUEST["submit"])) {
	$from = $_REQUEST['email'];	
	// $to = "dhayalan1127@gmail.com";	
	$to = "receipts.pulariecofoundation@gmail.com";		
	// $reply_to = $_REQUEST['email'];
	$bcc = "dhayalan1127@gmail.com";
	$subject = "Contact Us Form - ".$GLOBALS['sitename'];
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
	header("location:contact_us.php?act=success");
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
    <title>Contact Us | <?php echo $GLOBALS['sitename']; ?></title>
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
				<h3><b>contact</b> us</h3>
			</div>
			<ul class="eco_page_link">
				<li class="active"><a href="#" class="eco_breadcrumb_heading">contact us</a></li>
			</ul>
		</div>
		<!--Eco Template Banner ends-->
			
		<!--Eco Template content-->
		<div class="content">
			 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3914.63482465902!2d76.93695857422739!3d11.140551152373465!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba8f7d89c42f3f3%3A0x11eaf3d0176fec24!2sSri%20Balaji%20Avenue!5e0!3m2!1sen!2sin!4v1688661197081!5m2!1sen!2sin" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			<section>
				<div class="container">
					<div class="eco_contact_form">
						<div class="row">
							<div class="col-md-8 no-padding col-sm-12 responsive-991-width">                            	
								<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
									<div class="your-submit-message">
									<?php if($_REQUEST['act'] == 'success') { ?>
                                        <div class="alert alert-info" id="success_message" role="alert">Thank you for contacting us. Our consultant will contact you shortly.</div>
                                    <?php } ?>
										<h5 class="eco_sm_titles">Send Us Message <i class="fa fa-envelope" aria-hidden="true"></i></h5>
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
									<h5 class="eco_sm_titles">Contact Us</h5>
									<p>We would be happy to answer your questions and set up a meeting with you.</p>
									<ul class="eco_admin_info">
										<li><i class="fa fa-paper-plane" aria-hidden="true"></i><p>Address: No.3, Balaji Avenue, Ranganayagi Nagar, Thekkupalayam (P.O), Periyanaickenpalayam, Coimbatore - 641020.</p></li>
										<li><i class="fa fa-mobile" aria-hidden="true"></i><p>+91 95916 18844</p></li>
                                        <li><i class="fa fa-phone" aria-hidden="true"></i><p>0422 - 7140749</p></li>
										<li><i class="fa fa-envelope" aria-hidden="true"></i><p>pulariecofoundation@gmail.com</p></li>
									</ul>
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
					<div class="eco_our_sponsors">
						<div class="eco_headings">
							<h3><b>our</b> sponsors</h3>
							<h6>"No act of kindness, no matter how small is ever wasted".</h6>
							<span><i class="icon-nature-2"></i></span>
						</div>
						<div class="eco-sponsors_logo promoted-slider">
							<?php
							$select_sponsor = mysqli_query($GLOBALS['conn'], "SELECT company_name, image FROM sponsors WHERE is_published=1 ORDER BY id DESC LIMIT 0, 6");
							while($result_sponsor = mysqli_fetch_array($select_sponsor)) { ?>  
								<div class="item"><a href="javascript:void(0)" title="<?php echo $result_sponsor['company_name']; ?>"><img src="<?php echo $GLOBALS['webroot'];?>uploads/sponsor_images/<?php echo $result_sponsor['image']; ?>" alt="<?php echo $result_sponsor['company_name']; ?>"></a></div>
							<?php } ?>
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