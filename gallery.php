<?php include("config/config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Title of this page -->
    <title>Gallery | <?php echo $GLOBALS['sitename']; ?></title>
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
				<h3><b>Gallery</b></h3>
			</div>
			<ul class="eco_page_link">
				<li class="active"><a href="#" class="eco_breadcrumb_heading">gallery</a></li>
			</ul>
		</div>
		<!--Eco Template Banner ends-->
			
		<!--Eco Template content-->
		<div class="content">
			<div class="padding-70by40">
				<!--Eco blog-->
				<div class="container main-container">
					<div class="row">
						<div class="masonry masonryFlyIn row">
							<?php
							$select_gallery = mysqli_query($GLOBALS['conn'], "SELECT image FROM gallery WHERE is_published=1 ORDER BY id DESC LIMIT 0, 6");
							while($result_gallery = mysqli_fetch_array($select_gallery)) { ?>                            								  
                                <div class="masonry-item col-md-4">
                                    <a href="<?php echo $GLOBALS['webroot'];?>uploads/gallery_images/<?php echo $result_gallery['image']; ?>" data-rel='prettyPhoto' title="You can add caption to pictures."><img src="<?php echo $GLOBALS['webroot'];?>uploads/gallery_images/<?php echo $result_gallery['image']; ?>" alt=""></a>
                                </div>         
							<?php } ?>							
						</div>
					</div>
				</div>
				<!--Eco blog ends-->
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