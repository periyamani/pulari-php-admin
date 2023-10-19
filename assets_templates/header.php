<header>
    <!--Header-->
    <div class="kode_eco_navigations">
        <!--container-->
        <div class="container">
            <!--Header top row-->
            <div class="kode_eco-top_bar" style="background-image: url(images/pulari0.png) !important;">
                <!--Header top row logo-->
                <div class="kode_eco_logo">
                    <a href="<?php echo $GLOBALS['webroot']; ?>"><img src="<?php echo $GLOBALS['webroot']; ?>images/pulari-site-logo.png" alt=""></a>
                </div>
                <!--Header top row social icons-->
                <div class="kode_eco_social_icons">
                    <ul class="social-accounts">
                        <li><a href="https://www.facebook.com/pulariecofoundation" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="https://www.youtube.com/@PulariEcoFoundation/featured" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                        <li><a href="https://instagram.com/pulariecofoundation?igshid=OGQ5ZDc2ODk2ZA==" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>								
                    </ul>							
                </div>
            </div>
            <!--Header top row ends-->

            <!--Header nav row-->
            <div class="kode_navigaion_bar">
                <!--Responsive Menu Start-->
                <div id="kode-responsive-navigation" class="dl-menuwrapper">
                    <button class="dl-trigger">Menu</button>
                    <ul class="dl-menu">
                        <li class="active"><a class="active" href="<?php echo $GLOBALS['webroot']; ?>">Home</a></li>
                        <li class="menu-item"><a href="<?php echo $GLOBALS['webroot']; ?>about_us.php">About Us</a></li>								
                        <li class="menu-item"><a href="<?php echo $GLOBALS['webroot']; ?>projects.php">Projects</a></li>
                        <li class="menu-item"><a href="<?php echo $GLOBALS['webroot']; ?>gallery.php">Gallery</a></li>
                        <li class="menu-item"><a href="javascript:void(0)">Events</a>
                            <ul class="dl-submenu">
                                <li><a href="<?php echo $GLOBALS['webroot']; ?>events.php">Upcoming Events</a></li>
                                <li><a href="<?php echo $GLOBALS['webroot']; ?>newsletter.php">Newsletter</a></li>										
                            </ul>
                        </li>
                        <li class="menu-item"><a href="javascript:void(0)">Join Us</a>
                            <ul class="dl-submenu">
                                <li><a href="<?php echo $GLOBALS['webroot']; ?>volunteers.php">Volunteers</a></li>
                                <li><a href="<?php echo $GLOBALS['webroot']; ?>members.php">Members</a></li>
                                <li><a href="<?php echo $GLOBALS['webroot']; ?>careers.php">Careers</a></li>										
                            </ul>
                        </li>									
                        <li><a href="<?php echo $GLOBALS['webroot']; ?>contact_us.php">Contact Us</a></li>
                    </ul>
                </div>
                <!--Responsive Menu END-->

                <!-- Kode navigation starts -->
                <nav class="navigation" id="trans-nav">
                    <!--Header nav use simple dropdown "use-dropdown" class in li -->
                    <!--example <li class="use-dropdown"> in <ul> <li> <a href="your link"></a> <li> </ul> <li> you create dropdown-->
                    <ul class="nav-menu">
                        <li><a href="<?php echo $GLOBALS['webroot']; ?>">Home</a></li>
                        <li><a href="<?php echo $GLOBALS['webroot']; ?>about_us.php">About Us</a></li>
                        <li><a href="<?php echo $GLOBALS['webroot']; ?>projects.php">Projects</a></li>
                        <li><a href="<?php echo $GLOBALS['webroot']; ?>gallery.php">Gallery</a></li>
                        <li class="use-dropdown">
                            <a href="javascript:void(0)">Events</a>
                            <ul class="children sub-menu">
                                <li><a href="<?php echo $GLOBALS['webroot']; ?>events.php">Upcoming Events</a></li>
                                <li><a href="<?php echo $GLOBALS['webroot']; ?>newsletter.php">Newsletter</a></li>					                     					                   
                            </ul>
                        </li>
                        <li class="use-dropdown">
                            <a href="javascript:void(0)">Join Us</a>
                            <ul class="children sub-menu">
                                <li><a href="<?php echo $GLOBALS['webroot']; ?>volunteers.php">Volunteers</a></li>
                                <li><a href="<?php echo $GLOBALS['webroot']; ?>members.php">Members</a></li>
                                <li><a href="<?php echo $GLOBALS['webroot']; ?>careers.php">Careers</a></li>					                     					                   
                            </ul>
                        </li>
                        <li><a href="<?php echo $GLOBALS['webroot']; ?>contact_us.php">Contact Us</a></li>
                    </ul>
                </nav>
                <!-- Kode navigation End -->  	
                <div class="kode_button">			    		
                    <a href="<?php echo $GLOBALS['webroot']; ?>donations.php" class="btn-small">Donate Now</a>
                </div>
                <!-- Modal -->                
            </div>
            <!--Header nav row ends-->
        </div>
    </div>
</header>