<section>
    <!--Eco blog content-->
    <div class="container">
        <!--Eco Template Heading-->
        <div class="eco_headings">
            <h3><b>PULARI</b> Events</h3>
            <h6>"The earth does not belong to us, we belong to the earth" - Marlee Matlin.</h6>
            <span><i class="icon-nature-2"></i></span>
        </div>
        <!--Eco blog-->
        <div class="eco_blog_section">
            <div class="row">
            	<?php
				$i = 1;
				$select_event = mysqli_query($GLOBALS['conn'], "SELECT id, event_title, image, event_date, event_location, description FROM events WHERE is_published=1 ORDER BY event_date ASC LIMIT 0, 3");
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
        </div>
        <!--Eco blog ends-->
    </div>
    <!--Eco blog ends-->
</section>