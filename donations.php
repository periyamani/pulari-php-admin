<?php include("config/config.php");

if(isset($_REQUEST["submit"]) && !empty($_REQUEST["submit"])) {
	$from = $_REQUEST['email_address'];		
	$to = "pulariecofoundation@gmail.com";		
	$reply_to = $_REQUEST['email_address'];
	$bcc = "dhayalan1127@gmail.com";
	$subject = "Donation Form Details - ".$GLOBALS['sitename'];
	$headers = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .="From:".$from." \r\n";	
	// $headers .="Reply-To:".$reply_to." \r\n";
	$headers .= "Bcc:".$bcc."\r\n";	
	$message .='<p><img src="'.$GLOBALS['webroot'].'images/'.$GLOBALS['site_logo'].'"></p>
				 <p>Dear Admin,</p>
				 <p>The donation form details are below,</p>
				 <p>Amount : '.$_REQUEST['amount'].'</p>				 		
				 <p>Name : '.$_REQUEST['name'].'</p>
				 <p>Email Address : '.$_REQUEST['email_address'].'</p>
				 <p>Phone Number : '.$_REQUEST['phone_number'].'</p>
				 <p>PAN Number : '.$_REQUEST['pan_number'].'</p>
				 <p>Aadhaar Number : '.$_REQUEST['aadhaar_number'].'</p>
				 <p>Address : '.$_REQUEST['address'].'</p>';					 
	$message .="<p>Thanks,<br/>";
	$message .="<b>Pulari Eco Foundation</b></p>";		
	
	mail($to,$subject,$message,$headers);
	header("location:thank_you.php");
	die();
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Title of this page -->
    <title>Donation Form | <?php echo $GLOBALS['sitename']; ?></title>
    <?php include("includes/head_templates.php"); ?> 
    <link  "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <style>/*Don't forget to add Font Awesome CSS : "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"*/
input[type="text"] {
  width: 100%;
  border: 2px solid #aaa;
  border-radius: 4px;
  margin: 8px 0;
  outline: none;
  padding: 8px;
  box-sizing: border-box;
  transition: 0.3s;
}

input[type="text"]:focus {
  border-color: dodgerBlue;
  box-shadow: 0 0 8px 0 dodgerBlue;
}

.inputWithIcon input[type="text"] {
  padding-left: 40px;
}

.inputWithIcon {
  position: relative;
}

.inputWithIcon i {
  position: absolute;
  left: 0;
  /*top: 8px;*/
  padding: 25px 8px;
  color: #aaa;
  transition: 0.3s;
}

.inputWithIcon input[type="text"]:focus + i {
  color: dodgerBlue;
}

.inputWithIcon.inputIconBg i {
  background-color: #aaa;
  color: #fff;
  padding: 9px 4px;
  border-radius: 4px 0 0 4px;
}

.inputWithIcon.inputIconBg input[type="text"]:focus + i {
  color: #fff;
  background-color: dodgerBlue;
}
.lab{
    color:white;
    font-size:16px;
}
</style>
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
				<h3><b>Donation</b> Form</h3>
			</div>
			<ul class="eco_page_link">
				<li class="active"><a href="#" class="eco_breadcrumb_heading">Donation Form</a></li>
			</ul>
		</div>
		<!--Eco Template Banner ends-->
			
		<!--Eco Template content-->
		<div class="content">
			<div class="container">
				<div class="row">
                	<div class="col-md-6 col-sm-12">
						<div class="kode_login_social-account white-login-form">
			  				
			  					<div class="eco-login-registration">
				  					<div class="eco_title_form">					  					
					  					<p style="font-weight:600;">Make the payment by scanning the QR code or by transferring the donation amount to the given bank account.</p>
                                        <p style="font-weight:600;">Fill the donation form and the donation receipt will be sent through email within 24 hours of receiving the payment.</p>                                        
				  					</div>
				  					<div class="kode-email-account">
					  					<img src="<?php echo $GLOBALS['webroot']; ?>images/pulari-upi-qrcode-home-new.jpg">
				  					</div>
				  					<div class="clear"></div>
			  					</div>
			  				
			  			</div>
			  		</div>
			  		<div class="col-md-6 col-sm-12">
			  			<section>
				  			<div class="kode_login_social-account margin-buttom_30">
				  				<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                	<?php if($_REQUEST['act'] == 'success') { ?>
                                        <div class="alert alert-info" id="success_message" role="alert">Thank you for subscribing to our newsletter. Stay tuned to hear about our updated.</div>
                                    <?php } ?>
				  					<div class="eco-login-registration">
					  					<div class="eco_title_form">
						  					<h3><b>donation</b> form</h3>
						  					<p>Please enter the detail below.</p>
						  					
					  					</div>
					  					<div class="kode-email-account">
						  				<div class="inputWithIcon">
						  				    <label for="date" class="lab">Donation Amount</label>
						  						<input type="text" name="amount"  required="required">
						  						<i style="font-size: 24px;" class="fa fa-inr" aria-hidden="true"></i>
						  				</div>
						  					<div class="inputWithIcon">
						  					      <label for="date" class="lab">Donor Name</label>
						  						<input type="text" name="name"  required="required">
						  					<i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i></div>
						  					
						  					<div class="inputWithIcon">
                                                <label for="date"  class="lab">Email</label>
						  						<input type="text" name="email_address"   required="required">
						  					 <i class="fa fa-envelope fa-lg fa-fw" aria-hidden="true"></i></div>
              <!--                            <div class="inputWithIcon">-->
              <!--                                  <label for="date" style="padding-right:10px" class="lab">Email</label>-->
						  						<!--<input type="email" name="email_address"  required="required">-->
						  			
						  				  <!--<i class="fa fa-envelope fa-lg fa-fw" aria-hidden="true"></i></div>-->
						  				  
						  				  
                                           <div class="inputWithIcon">
                                                 <label for="date" class="lab">Phone Number</label>
						  						<input type="text" name="phone_number"  required="required">
						  					 <i class="fa fa-phone fa-lg fa-fw" aria-hidden="true"></i></div>
                                            <!--<label>
						  						<select name="proof_id_name" id="proof_id_name" required="required" class="donation-form-select">
                                                    <option>Select PAN or Aadhaar Number</option>
                                                    <option value="PAN">PAN</option>
                                                    <option value="Aadhaar Number">Aadhaar Number</option>
                                                  </select>
						  					</label>-->
                                              <label for="date" class="lab">Pan Number</label>
                                                
						  						<input type="text" name="pan_number" placeholder="Enter Pan Number *" required="required">
						  					</label>
                                             <label for="date" class="lab">Aadhaar Number</label>
						  						<input type="text" name="aadhaar_number" placeholder="Enter Aadhaar Number *" required="required">
						  					</label>
                                            <label for="date" class="lab">Address</label>
						  						<textarea name="address" placeholder="Address *" style ="padding:10px;height: 86px;" required="required" class="donation-form-textarea"></textarea>
						  					<label>                                           
					  					</div>					  					
					  					<div class="clear"></div>					  					
                                        <input type="submit" name="submit" class="btn-mediem login_style" type="submit" value="donate now">					  					
				  					</div>
				  				</form>
				  			</div>
			  			</section>
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