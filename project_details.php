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
	<?php 
	$select_project = mysqli_query($GLOBALS['conn'], "SELECT id, title, sub_title, description, image_detail FROM projects WHERE id='".$_REQUEST["id"]."' AND  is_published=1 ORDER BY id ASC");
	$result_project = mysqli_fetch_object($select_project); ?>
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
            	<li><a href="projects.html">projects</a></li>			
				<li class="active"><a href="#" class="eco_breadcrumb_heading"><?php echo $result_project->title; ?></a></li>
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
								<div class="blog_single_page">
									<!--Eco column img-->
									<figure>
										<div class="slider-blog">
											<div class="slide">
												<img src="<?php echo $GLOBALS['webroot']."uploads/project_images/".$result_project->image_detail; ?>" alt="<?php echo $result_project->title; ?>">
											</div>											
										</div>
									</figure>	
										
									<!--Eco column content-->
									<div class="eco_blog_detail_content">
										<!--Eco column content title-->
										<h4 class="eco_event_title"><?php echo $result_project->title; ?></h4>
										<?php /*?><p><?php echo $result_project->sub_title; ?></p><?php */?>
										<!--Eco column content detail-->
										<?php echo $result_project->description; ?>
										<!--Eco column content blockquote-->
									</div>
								</div>
							</div>
							<!--Eco col md ends-->

							<div class="col-md-3 col-sm-12 responsive-991-width">																								
								<div class="clear"></div>
								<!--Eco Right Side successful projects Slider-->
								<div class="margin-buttom_50 responsive-column responsive-devider-50">	
									<div class="widget_post_content">
										<!--Eco title-->
										<h5 class="eco_sm_titles">our gallery</h5>
										<!--Eco featured widget column posts-->
										<div class="widget_post_slider">	
											<!--Eco item-->
                                            <?php
											$select_gallery = mysqli_query($GLOBALS['conn'], "SELECT image FROM gallery WHERE is_published=1 ORDER BY id DESC LIMIT 0, 6");
											while($result_gallery = mysqli_fetch_array($select_gallery)) { ?> 
                                                <div class="widget_post">
                                                    <figure>
                                                        <img src="<?php echo $GLOBALS['webroot'];?>uploads/gallery_images/<?php echo $result_gallery['image']; ?>" alt="">
                                                    </figure>
                                                </div>
                                            <?php } ?>											
										</div>
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