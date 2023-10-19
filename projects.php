<?php include("config/config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Title of this page -->
    <title>Projects | <?php echo $GLOBALS['sitename']; ?></title>
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
				<h3><b>projects</b></h3>
			</div>
			<ul class="eco_page_link">				
				<li class="active"><a href="#" class="eco_breadcrumb_heading">projects</a></li>
			</ul>
		</div>
		<!--Eco Template Banner ends-->

		<!--Eco Template content-->
		<div class="content">
			<section>
				<!--Eco blog-->
				<div class="eco_project_listing">
					<div class="container">
						<div class="row">
							<?php
							$select_project = mysqli_query($GLOBALS['conn'], "SELECT id, title, sub_title, description, image FROM projects WHERE is_published=1 ORDER BY id ASC");
							while($result_project = mysqli_fetch_array($select_project)) {
								$description = $result_project['description'];
								$getlength = strlen($description);
								$maxLength = 225;					
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
											<?php echo $short_description; ?>
											<a href="<?php echo $GLOBALS['webroot']."project_details.php?id=".$result_project['id']; ?>" style="color:#00702d; font-weight:600;">View Project</a>
										</div>
									</div>
								</div>                
							<?php } ?>							
						</div>
					</div>
				</div>
				<!--Eco blog ends-->
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