<section>
    <div class="container">
        <div class="eco_our_sponsors">
            <div class="eco_headings">
                <h3><b>our</b> sponsors</h3>
                <h6>"No act of kindness, no matter how small is ever wasted".</h6>
                <span><i class="icon-nature-2"></i></span>
            </div>
            <div class="eco-sponsors_logo promoted-slider">
            	<?php
				$select_sponsor = mysqli_query($GLOBALS['conn'], "SELECT company_name, image FROM sponsors WHERE is_published=1 ORDER BY id DESC LIMIT 0, 6");
				while($result_sponsor = mysqli_fetch_array($select_sponsor)) { ?>  
                	<div class="item"><a href="javascript:void(0)" title="<?php echo $result_sponsor['company_name']; ?>"><img src="<?php echo $GLOBALS['webroot'];?>uploads/sponsor_images/<?php echo $result_sponsor['image']; ?>" alt="<?php echo $result_sponsor['company_name']; ?>"></a></div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>