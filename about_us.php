<?php include("config/config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Title of this page -->
    <title>About Us | <?php echo $GLOBALS['sitename']; ?></title>
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
				<h3><b>about</b> us</h3>
			</div>
			<ul class="eco_page_link">
				<li class="active"><a href="#" class="eco_breadcrumb_heading">about us</a></li>
			</ul>
		</div>
		<!--Eco Template Banner ends-->
			
		<!--Eco Template content-->
		<div class="content">
			<div class="container">
				<section>
					<div class="eco_about-us-section">
						<div class="row">
							<div class="col-md-5 col-sm-12 col-xs-12">
								<!--Eco event img-->
								<div class="eco_event_img">
									<figure>
										<div class="about-us-play"><img src="<?php echo $GLOBALS['webroot']; ?>extra-images/blog_grid_img_03.jpg" alt=""></div>
									</figure>
								</div>
							</div>
							<div class="col-md-7 col-sm-12 col-xs-12">
								<!--Eco event columns-->
								<div class="eco_about-us-data"> 
                                	<h5>Our Story</h5>
                                    <p>Around 100 million creatures die from plastic pollution annually around the globe. Though the majority are sea creatures that are being affected, land mammals and birds that die are also considerably large in number (around 1,00,000 per year). Many of such animal deaths go unaccounted or even unnoticed.</p>

                                    <p>The incident that inspired this initiative was when our pet labrador retriever consumed plastic waste lying on the roadside. Though Immediate medical treatment helped him recover soon, it made us understand how the negligence of us humans in handling waste can put the lives of multiple creatures under threat. It was an eye-opener to think about the number of animals that would feed upon such waste. The issue should not be taken  lightly and the ignition started there. Disposal of waste material systematically after consumption is a simple act, but the lack of awareness and negligence in handling waste not only  degrades the environment but also causes multiple hazards to other living creatures and to man himself.</p> 
                                    
                                    <p>Thus, Pulari Eco Foundation was created to spread awareness amongst  the public with regard to proper handling and disposal of waste and to create a clean and green environment through greater inclusiveness and public participation. It is indeed the need of the hour and is also a great responsibility on our shoulders to protect the environment and the lives that depend on it. Let's join hands to create a better living environment for all.</p>
                                    <h5>Trustees</h5>
									<p>SHRAVAN SRIKUMAR - Founder and Managing Trustee<br>
									B.Tech, M.A.Public Administration.</p>

									<p>M.A.SRIKUMAR - Founding Trustee (Honorary position).</p>

                                    <p>Dr.SAHAANA SRIKUMAR - Founding Trustee<br>
                                    BHMS, MD(Hom).<p>

								</div>
								<!--Eco event columns ends-->
							</div>
						</div>
					</div>
				</section>				
			</div>			
			
			<!--Eco section start-->
			<section>
				<div class="eco_current_blog">
					<div class="container">
						<div class="eco_headings"> 
							<h3><b>PULARI</b> PROJECTS</h3>
							<h6>"Preserve and cherish the pale blue dot, the only home we've ever known" - Carl Sagan.</h6>
							<span><i class="icon-nature-2"></i></span>
						</div>
						<div class="row">
							<?php
							$select_project = mysqli_query($GLOBALS['conn'], "SELECT id, title, sub_title, description, image FROM projects WHERE is_published=1 ORDER BY id ASC");
							while($result_project = mysqli_fetch_array($select_project)) {
								$description = $result_project['description'];
								$getlength = strlen($description);
								$maxLength = 185;					
								if ($getlength > $maxLength) {
									$short_description = substr($description, 0, strrpos($description, ' ', $maxLength-$getlength));
									$short_description .= "...";
								} else {
									$short_description = $description;
								} ?>
								<div class="col-md-6 col-sm-12 responsive-991-width">
									<div class="eco_project_listing_column">
										<figure>
											<img src="<?php echo $GLOBALS['webroot']."uploads/project_images/".$result_project['image']; ?>" alt="<?php echo $result_project['title']; ?>">
										</figure>
										<div class="eco_listing_caption">
											<h5 class="eco_sm_titles"><?php echo $result_project['title']; ?></h5>
											<?php /*?><small><?php echo $result_project['sub_title']; ?></small><?php */?>
											<p><?php echo $short_description; ?></p>
											<a href="<?php echo $GLOBALS['webroot']."project_details.php?id=".$result_project['id']; ?>" style="color:#00702d; font-weight:600;">View Project</a>
										</div>
									</div>
								</div>                
							<?php } ?>
						</div>
					</div>
				</div>
			</section>
			<!--Eco section ends-->	            
            <!--<div class="eco_donate-bar ">
				<div class="container">
					<div class="eco_donate_style-bar">
						<h3>Do you care about the Earth like we do? Get involved!</h3>						
					</div>
				</div>
			</div>--> 

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