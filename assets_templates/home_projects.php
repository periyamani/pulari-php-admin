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
</section>