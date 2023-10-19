<section>
    <div class="container main-container">
        <div class="eco_headings gallery-heading"> 
            <h3><b>pulari</b> gallery</h3>
            <h6>"The environment and the economy are two sides of the same coin.<br>If we cannot sustain the environment then we cannot sustain ourselves" - Wangari Maathai.</h6>
            <span><i class="icon-nature-2"></i></span>
        </div>
        <div class="clear"></div>
        <div class="masonry masonryFlyIn row">
        	<?php
			$select_gallery = mysqli_query($GLOBALS['conn'], "SELECT image FROM gallery WHERE is_published=1 ORDER BY id DESC LIMIT 0, 6");
			while($result_gallery = mysqli_fetch_array($select_gallery)) { ?>                            
                <div class="masonry-item col-md-4 col-sm-6 col-xs-12">
                    <a href="<?php echo $GLOBALS['webroot'];?>uploads/gallery_images/<?php echo $result_gallery['image']; ?>" data-rel='prettyPhoto'><img src="<?php echo $GLOBALS['webroot'];?>uploads/gallery_images/<?php echo $result_gallery['image']; ?>" alt=""></a>
                </div>            
            <?php } ?>
        </div>	
    </div>
</section>