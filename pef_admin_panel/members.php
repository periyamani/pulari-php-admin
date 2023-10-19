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
  <title>Members | <?php echo $GLOBALS['sitename']; ?></title>
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
                  <h4 class="card-title">Add Member</h4>  
                  <p class="card-description">* denotes mandatory fields</p>                
                  <form class="forms-sample" id="memberAddForm" method="post" action="<?php echo $GLOBALS['admin_webroot']?>actions.php?type=add_member" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="Name">Name <span style="color:red">*</span></label>
                      <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="Email Address">Email Address <span style="color:red">*</span></label>
                      <input type="text" name="email_address" class="form-control" id="email_address" placeholder="Email Address">
                    </div>
                    <div class="form-group">
                      <label for="Phone Mobile">Phone Mobile <span style="color:red">*</span></label>
                      <input type="text" name="phone_number" class="form-control" id="phone_number" placeholder="Phone Mobile">
                    </div>                   
                    <div class="form-group">
                      <label for="Other Details">Other Details</label>
                      <textarea name="other_details" class="form-control" id="other_details"></textarea>
                    </div>                   
                    <button type="submit" class="btn btn-primary me-2 btn-icon-text"><i class="ti-file btn-icon-prepend"></i>Submit</button>
                    <a href="<?php echo $GLOBALS['admin_webroot']?>members.php" class="btn btn-outline-primary btn-icon-text"><i class="ti-close btn-icon-prepend"></i>Cancel</a>
                  </form>
                </div>
              </div>
            </div>
           		</div>
			<?php } else if($_REQUEST['act']=='edit') { ?>
            	<div class="row">
            		<div class="col-12 grid-margin stretch-card">
                    	<?php $select_member = mysqli_query($GLOBALS['conn'], "SELECT id, name, email_address, phone_number, other_details FROM members WHERE id='".$_REQUEST['id']."'");
					  		$rs_member = mysqli_fetch_object($select_member); ?>
                            <div class="card">
                                <div class="card-body">
                                  <h4 class="card-title">Edit Member</h4>  
                                  <p class="card-description">* denotes mandatory fields</p>                  
                                  <form class="forms-sample" id="memberEditForm" method="post" action="<?php echo $GLOBALS['admin_webroot']?>actions.php?type=edit_member&id=<?php echo $_REQUEST['id'];?>" enctype="multipart/form-data">
                                  <div class="form-group">
                                      <label for="Name">Name <span style="color:red">*</span></label>
                                      <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="<?php echo $rs_member->name; ?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="Email Address">Email Address <span style="color:red">*</span></label>
                                      <input type="text" name="email_address" class="form-control" id="email_address" placeholder="Email Address" value="<?php echo $rs_member->email_address; ?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="Phone Mobile">Phone Mobile <span style="color:red">*</span></label>
                                      <input type="text" name="phone_number" class="form-control" id="phone_number" placeholder="Phone Mobile" value="<?php echo $rs_member->phone_number; ?>">
                                    </div>                   
                                    <div class="form-group">
                                      <label for="Other Details">Other Details</label>
                                      <textarea name="other_details" class="form-control" id="other_details"><?php echo $rs_member->other_details; ?></textarea>
                                    </div>                                                         
                                    <button type="submit" class="btn btn-primary me-2 btn-icon-text"><i class="ti-file btn-icon-prepend"></i>Submit</button>
                                    <a href="<?php echo $GLOBALS['admin_webroot']?>members.php" class="btn btn-outline-primary btn-icon-text"><i class="ti-close btn-icon-prepend"></i>Cancel</a>
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
                      <h4 class="card-title">Members <span><a class="btn btn-outline-primary btn-pad add-new-btn" href="<?php echo $GLOBALS['admin_webroot']?>members.php?act=add">Add new</a></span></h4>              
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
								$select_member = mysqli_query($GLOBALS['conn'], "SELECT id, name, email_address, phone_number FROM members ORDER BY id DESC");
								while($result_member = mysqli_fetch_array($select_member)) { ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $result_member['name']; ?></td> 
                                        <td><?php echo $result_member['email_address']; ?></td>
                                        <td><?php echo $result_member['phone_number']; ?></td>                                                                                                                        
                                        <td>
                                          <a href="<?php echo $GLOBALS['admin_webroot']?>members.php?act=edit&id=<?php echo $result_member['id']; ?>" class="btn btn-outline-primary btn-pad">Edit</a>&nbsp;
                                          <a href="javascript:void(<?php echo $result_member['id'];?>);" onClick="Delete('<?php echo $result_member['id']; ?>');" class="btn btn-outline-primary btn-pad">Delete</a>
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
$("#memberAddForm").validate({
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

$("#memberEditForm").validate({
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
		document.forms['page_view_form'].action="actions.php?type=delete_member&delid="+id;
		document.forms['page_view_form'].submit();
	}
}
</script>  
</body>
</html>