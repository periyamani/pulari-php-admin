<?php include("config/config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Title of this page -->
    <title>Events | <?php echo $GLOBALS['sitename']; ?></title>
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
				<h3><b>events</b></h3>
			</div>
			<ul class="eco_page_link">
				<li class="active"><a href="#" class="eco_breadcrumb_heading">events</a></li>
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
            	<?php
				$i = 1;
				$select_event = mysqli_query($GLOBALS['conn'], "SELECT id, event_title, image, event_date, event_location, description FROM events WHERE is_published=1 ORDER BY id DESC");
				while($result_event = mysqli_fetch_array($select_event)) {
					
					$date = date("d", strtotime($result_event['event_date'])); 
					$month = date("M", strtotime($result_event['event_date'])); 
					
					$description = $result_event['description'];
					$getlength = strlen($description);
					$maxLength = 100;					
					if ($getlength > $maxLength) {
						$short_description = substr($description, 0, strrpos($description, ' ', $maxLength-$getlength));
						$short_description .= "...";
					} else {
						$short_description = $description;
					}
					
					if($i % 2 == 0) { ?>
                    <!--Eco blog column-->
                    <div class="col-md-4 col-sm-6 responsive-col-xs">
                        <!--Eco blog column-->
                        <div class="eco_blog_column">
                            <!--Eco blog column picture-->
                            <figure>
                                <div class="eco_thumb eco_hover_effect">
                                    <img src="<?php echo $GLOBALS['webroot'];?>uploads/event_images/<?php echo $result_event['image']; ?>" alt="">	
                                    <!--<div class="eco_hover_btn">
                                        <a class="mediem_btn_02" href="project-green-coimbatore.html">read more</a>
                                    </div>-->
                                </div>
                            </figure>
                            <!--Eco blog column content-->
                            <div class="eco_blog_content"> 
                                <!--Eco blog date-->
                                <h3 class="event_date_03"><?php echo $date; ?><b><?php echo $month; ?></b></h3>  
                                <div class="eco-event-title">
                                    <h5><?php echo $result_event['event_title']; ?></h5>
                                </div>										
                                <?php echo $result_event['description']; ?>
                            </div>
                        </div>
                    </div>
                    <?php } else { ?>
                        <!--Eco blog column-->
                            <div class="col-md-4 col-sm-6 responsive-col-xs">
                                <div class="eco_blog_column blog-picture-down">
                                    <!--Eco blog column content-->
                                    <div class="eco_blog_content"> 
                                        <!--Eco blog date-->
                                        <h3 class="event_date_03"><?php echo $date; ?><b><?php echo $month; ?></b></h3>  
                                        <div class="eco-event-title">
                                            <h5><?php echo $result_event['event_title']; ?></h5>
                                        </div>										
                                        <?php echo $result_event['description']; ?>
                                    </div>
                                    <!--Eco blog column picture-->
                                    <figure>
                                        <div class="eco_thumb eco_hover_effect">
                                            <img src="<?php echo $GLOBALS['webroot'];?>uploads/event_images/<?php echo $result_event['image']; ?>" alt="">	
                                            <!--<div class="eco_hover_btn">
                                                <a class="mediem_btn_02" href="project-green-campus.html">read more</a>
                                            </div>-->
                                        </div>
                                    </figure>
                                </div>
                            </div>                    
                        <!--Eco blog column ends-->
                	<?php }
					$i++;
				} ?>
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