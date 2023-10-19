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
  <title>Careers | <?php echo $GLOBALS['sitename']; ?></title>
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
                  <h4 class="card-title">Add Careers</h4>  
                  <p class="card-description">* denotes mandatory fields</p>
                  <?php if($_REQUEST['error'] == 'already_exist') {?>
                        <div class="alert alert-danger" id="success_message" role="alert">Job Reference Number is already exist. Please try with new one.</div>
                  <?php } ?>                
                  <form class="forms-sample" id="careerAddForm" method="post" action="<?php echo $GLOBALS['admin_webroot']?>actions.php?type=add_career" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="Job Reference Number">Job Reference Number <span style="color:red">*</span></label>
                      <input type="text" name="job_reference_number" class="form-control" id="job_reference_number" placeholder="Job Reference Number">
                      <div class="card-description" style="font-size:12px; padding-top:5px; font-weight:500;">Note: Job Reference Number should be unique.</div>
                    </div>                    
                    <div class="form-group">
                      <label for="Job Title">Job Title <span style="color:red">*</span></label>
                      <input type="text" name="job_title" class="form-control" id="job_title" placeholder="Job Title">
                    </div>                                                         
                    <div class="form-group">
                      <label for="Description">Description </label>
                      <textarea name="description" id="content"></textarea>
                      <script language="javascript" type="text/javascript">
						ed = CKEDITOR.replace('content',
						{
							extraPlugins : 'pastetext',							
						});
						</script>
                    </div>                                       
                    <button type="submit" class="btn btn-primary me-2 btn-icon-text"><i class="ti-file btn-icon-prepend"></i>Submit</button>
                    <a href="<?php echo $GLOBALS['admin_webroot']?>careers.php" class="btn btn-outline-primary btn-icon-text"><i class="ti-close btn-icon-prepend"></i>Cancel</a>
                  </form>
                </div>
              </div>
            </div>
           		</div>
			<?php } else if($_REQUEST['act']=='edit') { ?>
            	<div class="row">
            		<div class="col-12 grid-margin stretch-card">
                    	<?php $select_career = mysqli_query($GLOBALS['conn'], "SELECT id, job_reference_number, job_title, description FROM careers WHERE id='".$_REQUEST['id']."'");
					  		$rs_career = mysqli_fetch_object($select_career); ?>
                            <div class="card">
                                <div class="card-body">
                                  <h4 class="card-title">Edit Careers</h4>  
                                  <p class="card-description">* denotes mandatory fields</p> 
                                  <?php if($_REQUEST['error'] == 'already_exist') {?>
                                        <div class="alert alert-danger" id="success_message" role="alert">This Job Reference Number is already used in another job. Please try with new one.</div>
                                  <?php } ?>                 
                                  <form class="forms-sample" id="careerEditForm" method="post" action="<?php echo $GLOBALS['admin_webroot']?>actions.php?type=edit_career&id=<?php echo $_REQUEST['id'];?>" enctype="multipart/form-data">
                                    <div class="form-group">
                                      <label for="Job Reference Number">Job Reference Number <span style="color:red">*</span></label>
                                      <input type="text" name="job_reference_number" class="form-control" id="job_reference_number" placeholder="Job Reference Number" value="<?php echo $rs_career->job_reference_number; ?>">
                                      <div class="card-description" style="font-size:12px; padding-top:5px; font-weight:500;">Note: Job Reference Number should be unique.</div>
                                    </div>                    
                                    <div class="form-group">
                                      <label for="Job Title">Job Title <span style="color:red">*</span></label>
                                      <input type="text" name="job_title" class="form-control" id="job_title" placeholder="Job Title" value="<?php echo $rs_career->job_title; ?>">
                                    </div>                                                         
                                    <div class="form-group">
                                      <label for="Description">Description </label>
                                      <textarea name="description" id="content"><?php echo $rs_career->description; ?></textarea>
                                      <script language="javascript" type="text/javascript">
										ed = CKEDITOR.replace('content',
										{
											extraPlugins : 'pastetext',							
										});
										</script>
                                    </div>                                                                                             
                                    <button type="submit" class="btn btn-primary me-2 btn-icon-text"><i class="ti-file btn-icon-prepend"></i>Submit</button>
                                    <a href="<?php echo $GLOBALS['admin_webroot']?>careers.php" class="btn btn-outline-primary btn-icon-text"><i class="ti-close btn-icon-prepend"></i>Cancel</a>
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
                      <h4 class="card-title">Careers <span><a class="btn btn-outline-primary btn-pad add-new-btn" href="<?php echo $GLOBALS['admin_webroot']?>careers.php?act=add">Add new</a></span></h4>              
                      <div class="row">
                        <div class="col-12">
                          <div class="table-responsive">
                          	<form action="" method="post" id="page_view_form" name="page_view_form">
                            <table id="order-listing" class="table table-striped">
                              <thead>
                                <tr>
                                    <th>ID #</th>
                                    <th>Job Reference Number</th> 
                                    <th>Job Title</th>                                                                                       
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                              	<?php
								$i = 1;
								$select_career = mysqli_query($GLOBALS['conn'], "SELECT id, job_reference_number, job_title, is_published, created_date FROM careers ORDER BY id DESC");
								while($result_career = mysqli_fetch_array($select_career)) { ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $result_career['job_reference_number']; ?></td> 
                                        <td><?php echo $result_career['job_title']; ?></td>                                                                                                                   	
                                        <td>                                        	
                                            <?php if($result_career['is_published']==0) { ?>										
                                                <a href="approve.php?approved=1&ID=<?php echo $result_career['id']; ?>&key=career" title="Click to publish"><label class="badge badge-danger">Unpublished</label></a>
                                            <?php } else { ?>
                                                <a href="approve.php?approved=0&ID=<?php echo $result_career['id']; ?>&key=career" title="Click to unpublish"><label class="badge badge-success">Published</label></a>
                                            <?php } ?>
                                        </td>                                        
                                        <td>
                                          <a href="<?php echo $GLOBALS['admin_webroot']?>careers.php?act=edit&id=<?php echo $result_career['id']; ?>" class="btn btn-outline-primary btn-pad">Edit</a>&nbsp;
                                          <a href="javascript:void(<?php echo $result_career['id'];?>);" onClick="Delete('<?php echo $result_career['id']; ?>');" class="btn btn-outline-primary btn-pad">Delete</a>
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
$("#careerAddForm").validate({
  rules: {
	job_reference_number: "required",		
	job_title: "required",
  },
  messages: {
	job_reference_number: "Please enter job reference number", 	
	job_title: "Please enter job title",
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

$("#careerEditForm").validate({
  rules: {
	job_reference_number: "required",		
	job_title: "required",
  },
  messages: {
	job_reference_number: "Please enter job reference number", 	
	job_title: "Please enter job title",
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
		document.forms['page_view_form'].action="actions.php?type=delete_career&delid="+id;
		document.forms['page_view_form'].submit();
	}
}
</script>  
</body>
</html>