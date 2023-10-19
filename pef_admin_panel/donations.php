<?php include("../config/config.php");
if($_SESSION['admin_id']=="") {
	header("location:index.php");
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Donations | <?php echo $GLOBALS['sitename']; ?></title>
  <?php include("includes/head_templates.php"); ?>  
</head>
<body class="sidebar-dark">
  <div class="container-scroller">    
    <!-- partial:partials/_navbar.html -->
    <?php include("header.php"); ?>  
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
    <?php include("left_menu.php"); ?> 
        <div class="main-panel">
        <div class="content-wrapper">
        	<?php if($_REQUEST['act']=='add') { ?>
            	<div class="row">
            		<div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Donation</h4>  
                  <p class="card-description">* denotes mandatory fields</p>                
                  <form class="forms-sample" id="donationAddForm" method="post" action="<?php echo $GLOBALS['admin_webroot']?>actions.php?type=add_donation" enctype="multipart/form-data">                    
                    <div class="form-group">
                      <label for="Heading">Amount <span style="color:red">*</span></label>
                      <div class="input-group">
                   		<div class="input-group-prepend">
                    		<span class="input-group-text bg-primary text-white">₹</span>
                    	</div>
                    	<input type="text" name="amount" class="form-control" id="amount" aria-label="Amount (to the nearest rupees)">
                    	<div class="input-group-append">
                    		<span class="input-group-text">.00</span>
                    	</div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="Heading">Name <span style="color:red">*</span></label>
                      <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="Heading">Email Address <span style="color:red">*</span></label>
                      <input type="email" name="email_address" class="form-control" id="email_address" placeholder="Email Address">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Phone Number <span style="color:red">*</span></label>
                      <input type="text" name="phone_number" class="form-control" id="phone_number" placeholder="Phone Number">
                    </div>                                                         
                    <!--<div class="form-group">
                      <label for="Button Text">Choose of ID <span style="color:red">*</span></label>
                      <select name="proof_id_name" class="form-control" id="proof_id_name">
                      	<option>Select PAN or Aadhaar Number</option>
                        <option value="PAN">PAN</option>
                        <option value="Aadhaar Number">Aadhaar Number</option>
                      </select>
                    </div>-->
                    <div class="form-group">
                      <label for="Button Text">PAN Number <span style="color:red">*</span></label>                                            
                      <input type="text" name="pan_number" class="form-control" id="pan_number" placeholder="PAN Number">
                    </div>
                    <div class="form-group">
                      <label for="Button Text">Aadhaar Number <span style="color:red">*</span></label>                                            
                      <input type="text" name="aadhaar_number" class="form-control" id="aadhaar_number" placeholder="Aadhaar Number">
                    </div> 
                    <div class="form-group">
                      <label for="Button Text">Address <span style="color:red">*</span></label>
                      <input type="text" name="address" class="form-control" id="address" placeholder="Address">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Donation Date <span style="color:red">*</span></label>
                      <div id="datepicker-popup" class="input-group date datepicker">
                        <input type="text" name="donation_date" id="donation_date" class="form-control">
                        <span class="input-group-addon input-group-append border-left">
                          <span class="ti-calendar input-group-text"></span>
                        </span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="Button Text">Mode of Payment </label>
                      <input type="text" name="mode_of_payment" class="form-control" id="mode_of_payment" placeholder="Mode of Payment">
                    </div>
                    <div class="form-group">
                      <label for="Button Text">Transaction Number </label>
                      <input type="text" name="transaction_number" class="form-control" id="transaction_number" placeholder="Transaction Number">
                    </div>
                    <div class="form-group">
                      <label for="Button Text">Message for DOC Team </label>
                      <textarea name="message" class="form-control" id="message"></textarea>
                    </div>                  
                    <button type="submit" class="btn btn-primary me-2 btn-icon-text"><i class="ti-file btn-icon-prepend"></i>Submit</button>                    
                    <a href="<?php echo $GLOBALS['admin_webroot']?>donations.php" class="btn btn-outline-primary btn-icon-text"><i class="ti-close btn-icon-prepend"></i>Cancel</a>
                  </form>
                </div>
              </div>
            </div>
           		</div>
			<?php } else if($_REQUEST['act']=='edit') { ?>
            	<div class="row">
            		<div class="col-12 grid-margin stretch-card">
                    	<?php $select_donation = mysqli_query($GLOBALS['conn'], "SELECT id, amount, name, email_address, phone_number, pan_number, aadhaar_number, address, mode_of_payment, transaction_number, donation_date, message FROM donations WHERE id='".$_REQUEST['id']."'");
					  		$rs_donation = mysqli_fetch_object($select_donation);
							$donation_date = date("m/d/Y", strtotime($rs_donation->donation_date)); ?>
                            <div class="card">
                                <div class="card-body">
                                  <h4 class="card-title">Edit Donation</h4>  
                                  <p class="card-description">* denotes mandatory fields</p>                  
                                  <form class="forms-sample" id="donationEditForm" method="post" action="<?php echo $GLOBALS['admin_webroot']?>actions.php?type=edit_donation&id=<?php echo $_REQUEST['id'];?>" enctype="multipart/form-data">
                                    <div class="form-group">
                                      <label for="Heading">Amount <span style="color:red">*</span></label>
                                      <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary text-white">₹</span>
                                        </div>
                                        <input type="text" name="amount" class="form-control" id="amount" aria-label="Amount (to the nearest rupees)" value="<?php echo $rs_donation->amount; ?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="Heading">Name <span style="color:red">*</span></label>
                                      <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="<?php echo $rs_donation->name; ?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="Heading">Email Address <span style="color:red">*</span></label>
                                      <input type="email" name="email_address" class="form-control" id="email_address" placeholder="Email Address" value="<?php echo $rs_donation->email_address; ?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputEmail3">Phone Number <span style="color:red">*</span></label>
                                      <input type="text" name="phone_number" class="form-control" id="phone_number" placeholder="Phone Number" value="<?php echo $rs_donation->amount; ?>">
                                    </div>                                                         
                                    <?php /*?><div class="form-group">
                                      <label for="Button Text">Choose of ID <span style="color:red">*</span></label>
                                      <select name="proof_id_name" class="form-control" id="proof_id_name">
                                        <option>Select PAN or Aadhaar Number</option>
                                        <option value="PAN" <?php if($rs_donation->proof_id_name == "PAN") { ?> selected <?php } ?>>PAN</option>
                                        <option value="Aadhaar Number" <?php if($rs_donation->proof_id_name == "Aadhaar Number") { ?> selected <?php } ?>>Aadhaar Number</option>
                                      </select>
                                    </div><?php */?>
                                    <div class="form-group">
                                      <label for="Button Text">PAN Number <span style="color:red">*</span></label>                                            
                                      <input type="text" name="pan_number" class="form-control" id="pan_number" placeholder="PAN Number" value="<?php echo $rs_donation->pan_number; ?>">
                                    </div> 
                                    <div class="form-group">
                                      <label for="Button Text">Aadhaar Number <span style="color:red">*</span></label>                                            
                                      <input type="text" name="aadhaar_number" class="form-control" id="aadhaar_number" placeholder="Aadhaar Number" value="<?php echo $rs_donation->aadhaar_number; ?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="Button Text">Address <span style="color:red">*</span></label>
                                      <input type="text" name="address" class="form-control" id="address" placeholder="Address"  value="<?php echo $rs_donation->address; ?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputEmail3">Donation Date <span style="color:red">*</span></label>
                                      <div id="datepicker-popup" class="input-group date datepicker">
                                        <input type="text" name="donation_date" id="donation_date" class="form-control" value="<?php echo $donation_date; ?>">
                                        <span class="input-group-addon input-group-append border-left">
                                          <span class="ti-calendar input-group-text"></span>
                                        </span>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="Button Text">Mode of Payment </label>
                                      <input type="text" name="mode_of_payment" class="form-control" id="mode_of_payment" placeholder="Mode of Payment" value="<?php echo $rs_donation->mode_of_payment; ?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="Button Text">Transaction Number </label>
                                      <input type="text" name="transaction_number" class="form-control" id="transaction_number" placeholder="Transaction Number" value="<?php echo $rs_donation->transaction_number; ?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="Button Text">Message for DOC Team </label>
                                      <textarea name="message" class="form-control" id="message"><?php echo $rs_donation->message; ?></textarea>
                                    </div>                     
                                    <button type="submit" class="btn btn-primary me-2 btn-icon-text"><i class="ti-file btn-icon-prepend"></i>Submit</button>
                                    <a href="<?php echo $GLOBALS['admin_webroot']?>donations.php" class="btn btn-outline-primary btn-icon-text"><i class="ti-close btn-icon-prepend"></i>Cancel</a>
                                  </form>
                                </div>
                              </div>
           			</div>
           		</div>
			<?php } else { ?>
				<div class="card">
                    <div class="card-body">
                    <?php if($_REQUEST['act'] == 'added') {?>
                        <div class="alert alert-info" id="success_message" role="alert">Record added successfully.</div>
                    <?php } if($_REQUEST['act'] == 'updated') {?>
                        <div class="alert alert-info" id="success_message" role="alert">Record updated successfully.</div>
                    <?php } if($_REQUEST['act'] == 'deleted') {?> 
                        <div class="alert alert-info" id="success_message" role="alert">Record deleted successfully.</div>
                    <?php } if($_REQUEST['act'] == 'mail_sent') {?> 
                        <div class="alert alert-info" id="success_message" role="alert">Receipt has been generated and sent mail successfully.</div>
                    <?php } ?>
                      <h4 class="card-title">Donations <span><a class="btn btn-outline-primary btn-pad add-new-btn" href="<?php echo $GLOBALS['admin_webroot']?>donations.php?act=add">Add new</a></span></h4>              
                      <div class="row">
                        <div class="col-12">
                          <div class="table-responsive">
                          	<form action="" method="post" id="page_view_form" name="page_view_form">
                            <table id="order-listing" class="table table-striped">
                              <thead>
                                <tr>
                                    <th>ID #</th>
                                    <th>Donor ID</th>
                                    <th>Name</th>                                     
                                    <th>Phone Number</th>                                  
                                    <th>Amount</th> 
                                    <th>Donation Date</th> 
                                    <th></th>                                                                                         
                                    <th>Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                              	<?php
								$i = 1;
								$select_donation = mysqli_query($GLOBALS['conn'], "SELECT id, donor_id, amount, name, phone_number, donation_date FROM donations ORDER BY id DESC");
								while($result_donation = mysqli_fetch_array($select_donation)) { ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $result_donation['donor_id']; ?></td>
                                        <td><?php echo $result_donation['name']; ?></td>                                        
                                        <td><?php echo $result_donation['phone_number']; ?></td>
                                        <td>₹ <?php echo $result_donation['amount']; ?></td> 
                                        <td><?php echo date("d/m/Y", strtotime($result_donation['donation_date'])); ?></td>                                        <td><a href="<?php echo $GLOBALS['admin_webroot']; ?>send_receipt_mail.php?id=<?php echo $result_donation['id']; ?>" title="Generate Receipt"><i class="ti-receipt"></i></a></td>
                                        <td><a href="<?php echo $GLOBALS['admin_webroot']?>donations.php?act=edit&id=<?php echo $result_donation['id']; ?>" class="btn btn-outline-primary btn-pad">Edit</a>&nbsp;
                                          <a href="javascript:void(<?php echo $result_donation['id'];?>);" onClick="Delete('<?php echo $result_donation['id']; ?>');" class="btn btn-outline-primary btn-pad">Delete</a>
                                        </td>
                                    </tr>  
                                 <?php 
								 	$i++;
								 } ?>                              
                              </tbody>
                            </table>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
              	</div>
            <?php } ?>  
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <?php include("footer.php"); ?>
        <!-- partial -->
      </div>
    <!-- page-body-wrapper ends -->
  	</div>
  <!-- container-scroller -->
  </div>
<?php include("includes/footer_scripts.php"); ?>  
<script type="application/javascript">
// validate signup form on keyup and submit
$("#donationAddForm").validate({
  rules: {
	amount: "required",
	name: "required",
	email_address: {
	  required: true,
	  email: true
	},
	phone_number: "required",
	pan_number: "required",
	aadhaar_number: "required",
	address: "required",
	donation_date: "required",
  },
  messages: {
	amount: "Please enter amount", 
	name: "Please enter name",
	email_address: "Please enter a valid email address",
	phone_number: "Please enter phone number",
	pan_number: "Please enter pan number",
	aadhaar_number: "Please enter aadhaar number",
	address: "Please enter address",
	donation_date: "Please choose donation date",
  },
  errorPlacement: function(label, element) {
	label.addClass('mt-2 text-danger');
	label.insertAfter(element);
  },
  highlight: function(element, errorClass) {
	$(element).parent().addClass('has-danger')
	$(element).addClass('form-control-danger')
  }
});

$("#donationEditForm").validate({
  rules: {
	amount: "required",
	name: "required",
	email_address: {
	  required: true,
	  email: true
	},
	phone_number: "required",
	pan_number: "required",
	aadhaar_number: "required",
	address: "required",
	donation_date: "required",
  },
  messages: {
	amount: "Please enter amount", 
	name: "Please enter name",
	email_address: "Please enter a valid email address",
	phone_number: "Please enter phone number",
	pan_number: "Please enter pan number",
	aadhaar_number: "Please enter aadhaar number",
	address: "Please enter address",
	donation_date: "Please choose donation date",
  },
  errorPlacement: function(label, element) {
	label.addClass('mt-2 text-danger');
	label.insertAfter(element);
  },
  highlight: function(element, errorClass) {
	$(element).parent().addClass('has-danger')
	$(element).addClass('form-control-danger')
  }
});

$('#success_message').delay(5000).fadeOut('slow');

function Delete(id) {
	if(confirm("Are you sure want to Delete?")) {
		document.forms['page_view_form'].action="actions.php?type=delete_donation&delid="+id;
		document.forms['page_view_form'].submit();
	}
}
</script>  
</body>
</html>