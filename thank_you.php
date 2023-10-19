<?php include("config/config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Title of this page -->
    <title>Thank You | <?php echo $GLOBALS['sitename']; ?></title>
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
				<h3><b>Thank</b> You</h3>
			</div>
			<ul class="eco_page_link">
				<li class="active"><a href="#" class="eco_breadcrumb_heading">Thank You</a></li>
			</ul>
		</div>
		<!--Eco Template Banner ends-->
			
		<!--Eco Template content-->
		<div class="content">
			<div class="container">
				<div class="row">
                	<div class="col-md-3"></div>
					<div class="col-md-6">
						<div class="kode_login_social-account white-login-form">
			  				<div class="eco-login-registration">
                            	<div class="alert alert-info" role="alert">Thank you for your generosity and we sincerely appreciate your gesture in joining hands with Pulari Eco Foundation to a new dawn of hope.</div> 
                                <p><b>Note:</b> All donations to Pulari Eco Foundation are exempted from tax under section 80G of the income tax act, 1961.</p>  								<p><a href="<?php echo $GLOBALS['webroot']; ?>80 G - AAFTP2703GF20231_signed.pdf" target="_blank"><u>Click here</u></a> to download Provisional Approval of 80G Certificate.</p>
                                <p><b>Donation Cause</b> - All donations to Pulari Eco Foundation will go towards Project Green Coimbatore, Project Green Campus, Animal Welfare and in creating Green Corridors.</p> 	
				  			</div>
			  			</div>
			  		</div>
			  	</div>		
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