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
  <title>Process Counter | <?php echo $GLOBALS['sitename']; ?></title>
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
        	<?php if($_REQUEST['act']=='edit') { ?>
            	<div class="row">
            		<div class="col-12 grid-margin stretch-card">
                    	<?php $select_process_counter = mysqli_query($GLOBALS['conn'], "SELECT id, total_campaign, funds_collection, volunteers, saplings FROM process_counter WHERE id='".$_REQUEST['id']."'");
					  		$rs_process_counter = mysqli_fetch_object($select_process_counter); ?>
                            <div class="card">
                                <div class="card-body">
                                  <h4 class="card-title">Edit Process Counter</h4>  
                                  <p class="card-description">* denotes mandatory fields</p>                  
                                  <form class="forms-sample" id="process_counterEditForm" method="post" action="<?php echo $GLOBALS['admin_webroot']?>actions.php?type=edit_process_counter&id=<?php echo $_REQUEST['id'];?>" enctype="multipart/form-data">                                                                     
                                    <div class="form-group">
                                      <label for="Button Text">Total Campaigns</label>
                                      <input type="text" name="total_campaign" class="form-control" id="total_campaign" placeholder="Total Campaigns" value="<?php echo $rs_process_counter->total_campaign; ?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="Button Text">Waste Processed</label>
                                      <input type="text" name="funds_collection" class="form-control" id="funds_collection" placeholder="Waste Processed" value="<?php echo $rs_process_counter->funds_collection; ?>">
                                    </div> 
                                    <div class="form-group">
                                      <label for="Button Text">Volunteers</label>
                                      <input type="text" name="volunteers" class="form-control" id="volunteers" placeholder="Volunteers" value="<?php echo $rs_process_counter->volunteers; ?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="Button Text">Sapling's</label>
                                      <input type="text" name="saplings" class="form-control" id="saplings" placeholder="Sapling's" value="<?php echo $rs_process_counter->saplings; ?>">
                                    </div>                     
                                    <button type="submit" class="btn btn-primary me-2 btn-icon-text"><i class="ti-file btn-icon-prepend"></i>Submit</button>
                                    <a href="<?php echo $GLOBALS['admin_webroot']?>process_counter.php" class="btn btn-outline-primary btn-icon-text"><i class="ti-close btn-icon-prepend"></i>Cancel</a>
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
                      <h4 class="card-title">Process Counter <span><a class="btn btn-outline-primary btn-pad add-new-btn" href="<?php echo $GLOBALS['admin_webroot']?>process_counter.php?act=add">Add new</a></span></h4>              
                      <div class="row">
                        <div class="col-12">
                          <div class="table-responsive">
                          	<form action="" method="post" id="page_view_form" name="page_view_form">
                            <table id="order-listing" class="table table-striped">
                              <thead>
                                <tr>
                                    <th>ID #</th>
                                    <th>Total Campaigns</th> 
                                    <th>Waste Processed</th>                                  
                                    <th>Volunteers</th>                                                       
                                    <th>Sapling's</th>
                                    <th>Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                              	<?php
								$i = 1;
								$select_process_counter = mysqli_query($GLOBALS['conn'], "SELECT id, total_campaign, funds_collection, volunteers, saplings,  created_date FROM process_counter ORDER BY id DESC");
								while($result_process_counter = mysqli_fetch_array($select_process_counter)) { ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $result_process_counter['total_campaign']; ?></td> 
                                        <td><?php echo $result_process_counter['funds_collection']; ?></td>
                                        <td><?php echo $result_process_counter['volunteers']; ?></td>
                                        <td><?php echo $result_process_counter['saplings']; ?></td>
                                        <td>
                                          <a href="<?php echo $GLOBALS['admin_webroot']?>process_counter.php?act=edit&id=<?php echo $result_process_counter['id']; ?>" class="btn btn-outline-primary btn-pad">Edit</a>&nbsp;                                          
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
$("#process_counterAddForm").validate({
  rules: {
	heading: "required",
	green_text_heading: "required",
	sub_heading: "required",
	image: "required",
  },
  messages: {
	heading: "Please enter heading", 
	green_text_heading: "Please enter green text heading",
	sub_heading: "Please enter sub heading",
	image: "Please upload process_counter image",
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

$("#process_counterEditForm").validate({
  rules: {
	heading: "required",
	green_text_heading: "required",
	sub_heading: "required",	
  },
  messages: {
	heading: "Please enter heading", 
	green_text_heading: "Please enter green text heading",
	sub_heading: "Please enter sub heading",
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
		document.forms['page_view_form'].action="actions.php?type=delete_process_counter&delid="+id;
		document.forms['page_view_form'].submit();
	}
}
</script>  
</body>
</html>