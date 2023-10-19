<div class="eco_banner banner-slider">
    <!--Eco Template Banner img-->
    <?php
	$i = 0;
	$select_banner = mysqli_query($GLOBALS['conn'], "SELECT heading, green_text_heading, sub_heading, image, button_text1, button_link1, button_text2, button_link2 FROM banner WHERE is_published=1 ORDER BY id ASC");
	while($result_banner = mysqli_fetch_array($select_banner)) {
		if($i==0) {
			$position_class = "position-center";
		} else if($i==1) {
			$position_class = "position-right";
		} else {
			$position_class = "";
		} ?>
        <div class="item">
            <figure>
                <img src="<?php echo $GLOBALS['webroot'];?>uploads/banner_images/<?php echo $result_banner['image']; ?>" alt="<?php echo $result_banner['heading']; ?>"/>
                <!--Eco Template Banner caption-->
                <div class="kode_eco_captions container <?php echo $position_class; ?>">
                    <h1><?php echo $result_banner['heading']; ?></h1>
                    <h2><b style="color:#349460;"><?php echo $result_banner['green_text_heading']; ?></b></h2>
                    <p><?php echo $result_banner['sub_heading']; ?></p>
                    <?php if($result_banner['button_text1']) { ?>
                    	<a href="<?php echo $result_banner['button_link1']; ?>" class="btn-mediem"><?php echo $result_banner['button_text1']; ?></a>
                    <?php } ?>
                    <?php if($result_banner['button_text2']) { ?>
                    	<a href="<?php echo $result_banner['button_link2']; ?>" class="btn-mediem"><?php echo $result_banner['button_text2']; ?></a>
                    <?php } ?>
                </div>
            </figure>
        </div>    
    <?php $i++;
	} ?>					
</div>