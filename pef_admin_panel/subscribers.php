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
  <title>Subscribers | <?php echo $GLOBALS['sitename']; ?></title>
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
                  <h4 class="card-title">Add Subscriber</h4>  
                  <p class="card-description">* denotes mandatory fields</p>                
                  <form class="forms-sample" id="subscriberAddForm" method="post" action="<?php echo $GLOBALS['admin_webroot']?>actions.php?type=add_subscriber" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="Name">Name <span style="color:red">*</span></label>
                      <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="Email Address">Email Address <span style="color:red">*</span></label>
                      <input type="text" name="email_address" class="form-control" id="email_address" placeholder="Email Address">
                    </div>                                       
                    <button type="submit" class="btn btn-primary me-2 btn-icon-text"><i class="ti-file btn-icon-prepend"></i>Submit</button>
                    <a href="<?php echo $GLOBALS['admin_webroot']?>subscribers.php" class="btn btn-outline-primary btn-icon-text"><i class="ti-close btn-icon-prepend"></i>Cancel</a>
                  </form>
                </div>
              </div>
            </div>
           		</div>
			<?php } else if($_REQUEST['act']=='edit') { ?>
            	<div class="row">
            		<div class="col-12 grid-margin stretch-card">
                    	<?php $select_subscriber = mysqli_query($GLOBALS['conn'], "SELECT id, name, email_address FROM newsletter_subscription WHERE id='".$_REQUEST['id']."'");
					  		$rs_subscriber = mysqli_fetch_object($select_subscriber); ?>
                            <div class="card">
                                <div class="card-body">
                                  <h4 class="card-title">Edit Subscriber</h4>  
                                  <p class="card-description">* denotes mandatory fields</p>                  
                                  <form class="forms-sample" id="subscriberEditForm" method="post" action="<?php echo $GLOBALS['admin_webroot']?>actions.php?type=edit_subscriber&id=<?php echo $_REQUEST['id'];?>" enctype="multipart/form-data">
                                  <div class="form-group">
                                      <label for="Name">Name <span style="color:red">*</span></label>
                                      <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="<?php echo $rs_subscriber->name; ?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="Email Address">Email Address <span style="color:red">*</span></label>
                                      <input type="text" name="email_address" class="form-control" id="email_address" placeholder="Email Address" value="<?php echo $rs_subscriber->email_address; ?>">
                                    </div>                                                                                            
                                    <button type="submit" class="btn btn-primary me-2 btn-icon-text"><i class="ti-file btn-icon-prepend"></i>Submit</button>
                                    <a href="<?php echo $GLOBALS['admin_webroot']?>subscribers.php" class="btn btn-outline-primary btn-icon-text"><i class="ti-close btn-icon-prepend"></i>Cancel</a>
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
                      <h4 class="card-title">Subscribers <span><a class="btn btn-outline-primary btn-pad add-new-btn" href="<?php echo $GLOBALS['admin_webroot']?>subscribers.php?act=add">Add new</a></span></h4>              
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
                                    <th>Status</th>                                                       
                                    <th>Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                              	<?php
								$i = 1;
								$select_subscriber = mysqli_query($GLOBALS['conn'], "SELECT id, name, email_address, is_approved FROM newsletter_subscription ORDER BY id DESC");
								while($result_subscriber = mysqli_fetch_array($select_subscriber)) { ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $result_subscriber['name']; ?></td> 
                                        <td><?php echo $result_subscriber['email_address']; ?></td>
                                        <td>                                        	
                                            <?php if($result_subscriber['is_approved']==0) { ?>										
                                                <a href="approve.php?approved=1&ID=<?php echo $result_subscriber['id']; ?>&key=subscriber" title="Click to publish"><label class="badge badge-danger">Unapproved</label></a>
                                            <?php } else { ?>
                                                <a href="approve.php?approved=0&ID=<?php echo $result_subscriber['id']; ?>&key=subscriber" title="Click to unpublish"><label class="badge badge-success">Approved</label></a>
                                            <?php } ?>
                                        </td>                                                                                                                        
                                        <td>
                                          <a href="<?php echo $GLOBALS['admin_webroot']?>subscribers.php?act=edit&id=<?php echo $result_subscriber['id']; ?>" class="btn btn-outline-primary btn-pad">Edit</a>&nbsp;
                                          <a href="javascript:void(<?php echo $result_subscriber['id'];?>);" onClick="Delete('<?php echo $result_subscriber['id']; ?>');" class="btn btn-outline-primary btn-pad">Delete</a>
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
$("#subscriberAddForm").validate({
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

$("#subscriberEditForm").validate({
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
		document.forms['page_view_form'].action="actions.php?type=delete_subscriber&delid="+id;
		document.forms['page_view_form'].submit();
	}
}
</script>  
</body>
</html>