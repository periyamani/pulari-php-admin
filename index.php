<?php include("config/config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Title of this page -->
    <title><?php echo $GLOBALS['sitename']; ?></title>
    <?php include("includes/head_templates.php"); ?>  
</head>

<body>
	<!--eco content wrapper starts-->
	<div class="eco_wrapper"> 
		
		<!--eco Header starts-->
		<?php include("assets_templates/header.php"); ?>  
		<!--Header ends-->
		
		<!--Eco Template Banner-->
		<?php include("assets_templates/home_banner.php"); ?>
		<!--Eco Template Banner ends-->
			
		<!--Eco Template content-->
		<div class="content">
			<!--Eco Template section-->            
			<section class="eco_services_environment">
				<!--Eco Template section content-->
                <div class="container">
					<!--Eco Template Heading-->
					<div class="eco_headings">
                    	<h3>WELCOME TO <b>PULARI ECO FOUNDATION</b></h3>
                        <h6>"Every sunset is an opportunity to reset and every sunrise begins with new eyes" - Richie Norton.</h6>
                        <span><i class="icon-nature-2"></i></span>
                        <div class="intro-text-container">
                            <p>Pulari is a tamil word which means dawn or hope. Pulari Eco Foundation was created to spread awareness amongst  the public with regard to proper handling and disposal of waste and to create a clean and green environment through greater inclusiveness and public participation. It is indeed a need of the hour and also a great responsibility on our shoulders to protect the environment and the lives that depend on it. Let's join hands to create a better living environment for all.</p>   
                            <a href="about_us.php" class="mediem_btn_02 tcolor">Read more</a>  
                        </div>                   
					</div>
					<!--Eco services-->
				</div>
				<!--Eco Template section content ends-->
			</section>
			<!--Eco Template section ends-->
            
            <!--Eco Template section-->            
			<?php include("assets_templates/home_services.php"); ?>
			<!--Eco Template section ends-->   
            
            <?php include("assets_templates/home_projects.php"); ?>                                            

			<!--Eco section start-->
			<?php include("assets_templates/home_events.php"); ?>
			<!--Eco section ends-->	
            
            <!--Eco Template content-->
           	<?php include("assets_templates/home_gallery.php"); ?>
            <!--Eco content ends--> 
            
            <!--Eco Template section-->
			<?php include("assets_templates/home_donation_form.php"); ?>
			<!--Eco donation form ends-->
            	
            <!--Eco section start-->
            <?php include("assets_templates/home_sponsors.php"); ?>
			<!--Eco section ends-->							
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