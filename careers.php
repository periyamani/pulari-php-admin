<?php include("config/config.php");

if(isset($_REQUEST["submit"]) && !empty($_REQUEST["submit"])) {
	$from = $_REQUEST['email'];	
	// $to = "dhayalan1127@gmail.com";	
	$to = "pulariecofoundation@gmail.com";		
	// $reply_to = $_REQUEST['email'];
	$bcc = "dhayalan1127@gmail.com";
	$subject = "Career Form - ".$GLOBALS['sitename'];
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
	header("location:careers.php?act=success");
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
    <title>Careers | <?php echo $GLOBALS['sitename']; ?></title>
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
				<h3><b>Careers</b></h3>
			</div>
			<ul class="eco_page_link">
				<li class="active"><a href="#" class="eco_breadcrumb_heading">Careers</a></li>
			</ul>
		</div>
		<!--Eco Template Banner ends-->
			
		<!--Eco Template content-->
        <div class="content">
			<section>
				<!--Eco detail starts-->
				<div class="eco_blog_detail">
				<!--Eco container-->
					<div class="container">
						<!--Eco row-->
						<div class="row">
							<!--Eco column-->
							<div class="col-md-9 col-sm-12 responsive-991-width">
								<!--Eco Template section-->	
                                <?php $select_careers = mysqli_query($GLOBALS['conn'], "SELECT id, job_reference_number, job_title, description, created_date FROM careers WHERE is_published=1 ORDER BY created_date DESC");
									while($result_careers = mysqli_fetch_array($select_careers)) {
										$created_date = date("dS F, Y", strtotime($result_careers['created_date'])); ?>								
                                        <div class="event_listing_style">
                                            <span class="icon-style icon icon-nature-4"></span>
                                            <div class="eco_event_content"> 
                                                <!--Eco event date-->
                                                <!--<h3 class="event_date_02">22<b>dec</b></h3>--> 
                                                <div class="eco-list-event">
                                                    <!--Eco event detail-->
                                                    <ul class="event_meta">
                                                        <li>
                                                            <small>Pulari Eco Foundation</small>
                                                            <!--<p><a href="#" class="meta-author">John Doe -</a><a href="#">Eco Energy</a></p>
                                                            <a class="eco_share" href="#"><i class="fa fa-share-alt"></i>54</a>-->
                                                        </li>
                                                    </ul>
                                                    <div class="eco-event-title">
                                                        <h5><?php echo $result_careers['job_title']; ?></h5>
                                                        <p class="eco_address_marker">
                                                        	<i class="fa fa-suitcase" aria-hidden="true"></i><?php echo $result_careers['job_reference_number']; ?>&nbsp;&nbsp;&nbsp;<i class="fa fa-clock-o"></i><?php echo $created_date; ?>
                                                        </p>
                                                        <?php echo $result_careers['description']; ?>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <!--Eco event ends-->	
                                        </div>	
								<?php } ?>                                      																						
							</div>
							<!--Eco col md ends-->

							<div class="col-md-3 col-sm-12 responsive-991-width">								

								<!--Eco Right Side Recent posts-->
								<div class="margin-buttom_50 responsive-column responsive-devider-50">	
									<div class="eco_recent_blog_post widget_post_content">
										<h5 class="eco_sm_titles">events</h5>
										<!--Eco recent blog post column posts-->
										<ul class="eco_widget_post">
                                        	<?php $select_event = mysqli_query($GLOBALS['conn'], "SELECT id, event_title, image, event_date FROM events WHERE is_published=1 ORDER BY event_date ASC LIMIT 0, 3");
											while($result_event = mysqli_fetch_array($select_event)) {
												$event_date = date("F d Y", strtotime($result_event['event_date'])); ?>
                                                   
                                                <li>
                                                    <div class="eco_recent_posts">
                                                        <div class="eco_thumb eco_hover_effect">
                                                            <img src="<?php echo $GLOBALS['webroot'];?>uploads/event_images/<?php echo $result_event['image']; ?>" alt="">
                                                        </div>
                                                        <div class="eco_post-content">
                                                            <p><a href="javascript:void(0);"><?php echo $result_event['event_title']; ?></a></p>
                                                            <ul class="eco_viewers_meta">
                                                                <li><a href="javascript:void(0);"><?php echo $event_date; ?></a></li>                                                            </ul>
                                                        </div>	
                                                    </div>
                                                </li>	
                                            <?php } ?>										
										</ul>
										<!--Eco recent blog posts ends-->
									</div>
								</div>								
							</div>

						</div>
						<!--Eco row ends-->
					</div>
					<!--Eco container ends-->
				</div>
				<!--Eco detail ends-->

				
			</section>
		</div>
		<?php /*?><div class="content">			 
			<section>
				<div class="container">
					<div class="eco_contact_form">
						<div class="row">
							<div class="col-md-8 no-padding col-sm-12 responsive-991-width">                            	
								<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
									<div class="your-submit-message">
									<?php if($_REQUEST['act'] == 'success') { ?>
                                        <div class="alert alert-info" id="success_message" role="alert">Thank you for submitting the details. Our consultant will review and contact you shortly.</div>
                                    <?php } ?>
										<h5 class="eco_sm_titles">Career Form <i class="fa fa-envelope" aria-hidden="true"></i></h5>
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
									<p>Please fill the required fields in the form and we will contact you back within 3 business days.</p>
                                    <p>The information on this form will be kept confidential and will help us find the most satisfying and appropriate volunteer opportunity for you.</p>
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
		</div><?php */?>
		<!--Eco content ends-->       		                               
		
		<?php include("assets_templates/footer.php"); ?>
		
	</div>
	<!--eco content wrapper ends-->
	
	<div id="preloader">
		<div id="status"></div>
	</div>
   <?php include("includes/footer_scripts.php"); ?>  
	<script>
		$('#success_message').delay(5000).fadeOut('slow');
	</script>
  </body>
</html>