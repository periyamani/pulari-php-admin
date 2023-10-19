<!--Eco footer starts-->
    <!--Eco footer content-->
    <div class="kode_eco_footer_wraper" style="background-image: url(images/pulari0.png)!important;">
    <!--container start-->
    <div class="container">
        <!--row start-->
        <div class="row">
            <!--<div class="col-md-3 responsive-column">
                <div class="kode_eco_footer_logo kode_footer_cols" >
                    <h5>Our Instagram</h5>  
                    <div style="padding:0 0 15px 0;">
                    	<img src="<?php echo $GLOBALS['webroot']?>images/pulari-instagram.jpeg"> 
                    </div>                 
                    <ul class="social-accounts-footer">
                        <li><a href="https://www.facebook.com/pulariecofoundation" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="https://www.youtube.com/@PulariEcoFoundation/featured" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>  
                        <li><a href="https://instagram.com/pulariecofoundation?igshid=OGQ5ZDc2ODk2ZA==" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>                                                        
                    </ul>
                </div>
            </div>-->
            <div class="col-md-3 col-sm-6 responsive-devider-50">
                <div class="kode_footer_cols">
                    <h5>events</h5>
                    <!--Eco recent blog post column posts-->
                    <ul class="eco_widget_post">
                        <!--Eco recent blog posts-->
                        <?php $select_event = mysqli_query($GLOBALS['conn'], "SELECT id, event_title, image, event_date FROM events WHERE is_published=1 ORDER BY event_date ASC LIMIT 0, 3");
							while($result_event = mysqli_fetch_array($select_event)) {
					
								$event_date = date("F d Y", strtotime($result_event['event_date'])); ?> 
                                    <li>
                                        <div class="eco_recent_posts">
                                            <figure>
                                                <div class="eco_thumb eco_hover_effect">
                                                    <img src="<?php echo $GLOBALS['webroot'];?>uploads/event_images/<?php echo $result_event['image']; ?>" alt="">
                                                </div>
                                                <div class="eco_post-content">
                                                    <small><?php echo $event_date; ?></small>
                                                    <p><a href="javascript:void(0);"><?php echo $result_event['event_title']; ?></a></p>
                                                </div>	
                                            </figure>
                                        </div>
                                    </li>
						<?php } ?>                         
                    </ul>
                    <!--Eco recent blog posts ends-->
                </div>
            </div>
            <div class="col-md-3 responsive-column">
                <div class="kode_footer_cols">
                    <h5>Location Map</h5>
                    <div>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3914.63482465902!2d76.93695857422739!3d11.140551152373465!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba8f7d89c42f3f3%3A0x11eaf3d0176fec24!2sSri%20Balaji%20Avenue!5e0!3m2!1sen!2sin!4v1688661197081!5m2!1sen!2sin" width="250" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>                        
                </div>
            </div>
            <div class="col-md-3 responsive-column">
                <div class="kode_footer_cols">
                    <h5>QR Code for donation</h5>
                   <div>
                        <a href="#"><img src="<?php echo $GLOBALS['webroot']?>images/pulari-upi-qrcode-home-new.jpg"></a>
                   </div>
                </div>
            </div>
            <div class="col-md-3 responsive-column">
                <div class="kode_footer_cols">
                    <h5>Contact Us</h5>
                    <div class="kode_footer_social_icon">
                        <p>Address: No.3, Balaji Avenue, Ranganayagi Nagar,<br>Thekkupalayam (P.O), Periyanaickenpalayam,<br>Coimbatore - 641020.</p>
                        <ul>
                            <li><a href="tel:+919591618844" target="_blank"><i class="fa fa-mobile" aria-hidden="true"></i>+91 95916 18844</a></li>
                            <li><a href="javascript:void(0);"><i class="fa fa-phone" aria-hidden="true"></i>0422 - 7140749</a></li>
                            <li><a href="mailto:pulariecofoundation@gmail.com"><i class="fa fa-envelope" aria-hidden="true"></i>pulariecofoundation@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <!--row end-->
    </div>
    <!--container end-->
    <!--kode_footer_copy_right start-->
    <div class="kode_footer_copy_right">
        <!--container start-->
        <div class="container">
            <!--kode_footer_copy_cap start-->
            <div class="kode_footer_copy_cap">
                <p>Copyright <?php echo date("Y"); ?> <a href="https://www.baagroups.com/" target="_blank">BAA Groups</a>, All Right Reserved</p>
                <ul>
                    <li><a href="<?php echo $GLOBALS['webroot']; ?>">Home</a></li>
                    <li><a href="<?php echo $GLOBALS['webroot']; ?>about_us.php">About Us</a></li>                       
                    <li><a href="<?php echo $GLOBALS['webroot']; ?>projects.php">Projects</a></li>                        
                    <li><a href="<?php echo $GLOBALS['webroot']; ?>gallery.php">Gallery</a></li>
                    <li><a href="<?php echo $GLOBALS['webroot']; ?>contact_us.php">Contact Us</a></li>
                </ul>
                <a class="kode_copy_span" id="back-to-top" href="#" role="button" data-toggle="tooltip" data-placement="left"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
            </div>
        <!--kode_footer_copy_cap end-->
        </div>
    <!--container end-->
    </div>
    
<!--kode_footer_copy_right end-->
</div>
		
	<!--Eco footer ends-->