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
  <title>Newsletter | <?php echo $GLOBALS['sitename']; ?></title>
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
                  <h4 class="card-title">Add Newsletter</h4>  
                  <p class="card-description">* denotes mandatory fields</p>                
                  <form class="forms-sample" id="newsletterAddForm" method="post" action="<?php echo $GLOBALS['admin_webroot']?>actions.php?type=add_newsletter" enctype="multipart/form-data">
                  	<div class="form-group">
                      <label for="Name">Select Members <span style="color:red">*</span></label>
                      <select class="js-example-basic-multiple w-100" multiple="multiple">
                          <option value="AL">Alabama</option>
                          <option value="WY">Wyoming</option>
                          <option value="AM">America</option>
                          <option value="CA">Canada</option>
                          <option value="RU">Russia</option>
                          <option value="AL">Alabama</option>
                          <option value="WY">Wyoming</option>
                          <option value="AM">America</option>
                          <option value="CA">Canada</option>
                          <option value="RU">Russia</option>
                    	</select>
                    </div>
                    <div class="form-group">
                      <label for="Name">Subject <span style="color:red">*</span></label>
                      <input type="text" name="subject" class="form-control" id="subject" placeholder="Subject">
                    </div>
                    <div class="form-group">
                      <label for="Description">Mail Content </label>
                      <textarea name="mail_content" id="simpleMde"></textarea>
                    </div>                                       
                    <button type="submit" class="btn btn-primary me-2 btn-icon-text"><i class="ti-file btn-icon-prepend"></i>Submit</button>
                    <a href="<?php echo $GLOBALS['admin_webroot']?>newsletter.php" class="btn btn-outline-primary btn-icon-text"><i class="ti-close btn-icon-prepend"></i>Cancel</a>
                  </form>
                </div>
              </div>
            </div>
           		</div>
			<?php } else if($_REQUEST['act']=='edit') { ?>
            	<div class="row">
            		<div class="col-12 grid-margin stretch-card">
                    	<?php $select_newsletter = mysqli_query($GLOBALS['conn'], "SELECT id, name, email_address, phone_number, other_details FROM newsletters WHERE id='".$_REQUEST['id']."'");
					  		$rs_newsletter = mysqli_fetch_object($select_newsletter); ?>
                            <div class="card">
                                <div class="card-body">
                                  <h4 class="card-title">Edit Newsletter</h4>  
                                  <p class="card-description">* denotes mandatory fields</p>                  
                                  <form class="forms-sample" id="newsletterEditForm" method="post" action="<?php echo $GLOBALS['admin_webroot']?>actions.php?type=edit_newsletter&id=<?php echo $_REQUEST['id'];?>" enctype="multipart/form-data">
                                  <div class="form-group">
                                      <label for="Name">Name <span style="color:red">*</span></label>
                                      <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="<?php echo $rs_newsletter->name; ?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="Email Address">Email Address <span style="color:red">*</span></label>
                                      <input type="text" name="email_address" class="form-control" id="email_address" placeholder="Email Address" value="<?php echo $rs_newsletter->email_address; ?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="Phone Mobile">Phone Mobile <span style="color:red">*</span></label>
                                      <input type="text" name="phone_number" class="form-control" id="phone_number" placeholder="Phone Mobile" value="<?php echo $rs_newsletter->phone_number; ?>">
                                    </div>                   
                                    <div class="form-group">
                                      <label for="Other Details">Other Details</label>
                                      <textarea name="other_details" class="form-control" id="other_details"><?php echo $rs_newsletter->other_details; ?></textarea>
                                    </div>                                                         
                                    <button type="submit" class="btn btn-primary me-2 btn-icon-text"><i class="ti-file btn-icon-prepend"></i>Submit</button>
                                    <a href="<?php echo $GLOBALS['admin_webroot']?>newsletter.php" class="btn btn-outline-primary btn-icon-text"><i class="ti-close btn-icon-prepend"></i>Cancel</a>
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
                    <?php } ?>
                      <h4 class="card-title">Newsletters <span><a class="btn btn-outline-primary btn-pad add-new-btn" href="<?php echo $GLOBALS['admin_webroot']?>newsletter.php?act=add">Add new</a></span></h4>              
                      <div class="row">
                        <div class="col-12">
                          <div class="table-responsive">
                          	<form action="" method="post" id="page_view_form" name="page_view_form">
                            <table id="order-listing" class="table table-striped">
                              <thead>
                                <tr>
                                    <th>ID #</th>
                                    <th>Name</th> 
                                    <th>Email Address</th>                                  
                                    <th>Phone Number</th>                                                       
                                    <th>Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                              	<?php
								$i = 1;
								$select_newsletter = mysqli_query($GLOBALS['conn'], "SELECT id, name, email_address, phone_number FROM newsletters ORDER BY id DESC");
								while($result_newsletter = mysqli_fetch_array($select_newsletter)) { ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $result_newsletter['name']; ?></td> 
                                        <td><?php echo $result_newsletter['email_address']; ?></td>
                                        <td><?php echo $result_newsletter['phone_number']; ?></td>                                                                                                                        
                                        <td>
                                          <a href="<?php echo $GLOBALS['admin_webroot']?>newsletter.php?act=edit&id=<?php echo $result_newsletter['id']; ?>" class="btn btn-outline-primary btn-pad">Edit</a>&nbsp;
                                          <a href="javascript:void(<?php echo $result_newsletter['id'];?>);" onClick="Delete('<?php echo $result_newsletter['id']; ?>');" class="btn btn-outline-primary btn-pad">Delete</a>
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
$("#newsletterAddForm").validate({
  rules: {
	name: "required",
	email_address: "required",
	phone_number: "required",
  },
  messages: {
	name: "Please enter name", 
	email_address: "Please enter email address",
	phone_number: "Please enter phone number",	
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

$("#newsletterEditForm").validate({
  rules: {
	name: "required",
	email_address: "required",
	phone_number: "required",
  },
  messages: {
	name: "Please enter name", 
	email_address: "Please enter email address",
	phone_number: "Please enter phone number",	
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
		document.forms['page_view_form'].action="actions.php?type=delete_newsletter&delid="+id;
		document.forms['page_view_form'].submit();
	}
}
</script>  
</body>
</html>