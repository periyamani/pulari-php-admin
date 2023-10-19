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
  <title>Projects | <?php echo $GLOBALS['sitename']; ?></title>
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
                  <h4 class="card-title">Add Projects</h4>  
                  <p class="card-description">* denotes mandatory fields</p>                
                  <form class="forms-sample" id="projectAddForm" method="post" action="<?php echo $GLOBALS['admin_webroot']?>actions.php?type=add_project" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="Heading">Title <span style="color:red">*</span></label>
                      <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                    </div>                    
                    <!--<div class="form-group">
                      <label for="exampleInputEmail3">Sub Title <span style="color:red">*</span></label>
                      <input type="text" name="sub_title" class="form-control" id="sub_title" placeholder="Sub Title">
                    </div>-->
                   <div class="form-group">
                      <label>Image For Listing <span style="color:red">*</span></label>
                      <input type="file" name="image" id="image" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Image For Listing">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Choose Image</button>
                        </span>
                      </div>
                      <div class="card-description" style="font-size:12px; padding-top:5px; font-weight:500;">Note: Image width and height should be 240*200</div>
                    </div> 
                    <div class="form-group">
                      <label>Image For Detail <span style="color:red">*</span></label>
                      <input type="file" name="image_detail" id="image_detail" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Image For Detail">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Choose Image</button>
                        </span>
                      </div>
                      <div class="card-description" style="font-size:12px; padding-top:5px; font-weight:500;">Note: Image width and height should be 850*450</div>
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
                    <a href="<?php echo $GLOBALS['admin_webroot']?>projects.php" class="btn btn-outline-primary btn-icon-text"><i class="ti-close btn-icon-prepend"></i>Cancel</a>
                  </form>
                </div>
              </div>
            </div>
           		</div>
			<?php } else if($_REQUEST['act']=='edit') { ?>
            	<div class="row">
            		<div class="col-12 grid-margin stretch-card">
                    	<?php $select_project = mysqli_query($GLOBALS['conn'], "SELECT id, title, sub_title, image, image_detail, description FROM projects WHERE id='".$_REQUEST['id']."'");
					  		$rs_project = mysqli_fetch_object($select_project); ?>
                            <div class="card">
                                <div class="card-body">
                                  <h4 class="card-title">Edit Projects</h4>  
                                  <p class="card-description">* denotes mandatory fields</p>                  
                                  <form class="forms-sample" id="projectEditForm" method="post" action="<?php echo $GLOBALS['admin_webroot']?>actions.php?type=edit_project&id=<?php echo $_REQUEST['id'];?>" enctype="multipart/form-data">
                                    <div class="form-group">
                                      <label for="Heading">Title <span style="color:red">*</span></label>
                                      <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="<?php echo $rs_project->title; ?>">
                                    </div>                    
                                    <?php /*?><div class="form-group">
                                      <label for="exampleInputEmail3">Sub Title <span style="color:red">*</span></label>
                                      <input type="text" name="sub_title" class="form-control" id="sub_title" placeholder="Sub Title" value="<?php echo $rs_project->sub_title; ?>">
                                    </div><?php */?>
                                   <div class="form-group">
                                      <label> Image For Listing <span style="color:red">*</span></label>
                                      <div style="margin-bottom:10px;"><img src="<?php echo $GLOBALS['webroot']?>uploads/project_images/<?php echo $rs_project->image; ?>" width="180" height="142"/></div>
                                      <input type="file" name="image" id="image" class="file-upload-default">
                                      <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled placeholder="Image For Listing">
                                        <span class="input-group-append">
                                          <button class="file-upload-browse btn btn-primary" type="button">Choose Image</button>
                                        </span>
                                      </div>
                                      <div class="card-description" style="font-size:12px; padding-top:5px; font-weight:500;">Note: Image width and height should be 240*200</div>
                                      <input type="hidden" name="hidimage" value="<?php echo $rs_project->image; ?>">
                                    </div>   
                                   <div class="form-group">
                                      <label> Image For Detail <span style="color:red">*</span></label>
                                      <div style="margin-bottom:10px;"><img src="<?php echo $GLOBALS['webroot']?>uploads/project_images/<?php echo $rs_project->image_detail; ?>" width="250" height="120"/></div>
                                      <input type="file" name="image_detail" id="image_detail" class="file-upload-default">
                                      <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled placeholder="Image For Listing">
                                        <span class="input-group-append">
                                          <button class="file-upload-browse btn btn-primary" type="button">Choose Image</button>
                                        </span>
                                      </div>
                                      <div class="card-description" style="font-size:12px; padding-top:5px; font-weight:500;">Note: Image width and height should be 850*450</div>
                                      <input type="hidden" name="hidimagedetail" value="<?php echo $rs_project->image_detail; ?>">
                                    </div>                                     
                                    <div class="form-group">
                                      <label for="Description">Description </label>
                                      <textarea name="description" id="content"><?php echo $rs_project->description; ?></textarea>
                                      <script language="javascript" type="text/javascript">
										ed = CKEDITOR.replace('content',
										{
											extraPlugins : 'pastetext',							
										});
										</script>
                                    </div>                      
                                    <button type="submit" class="btn btn-primary me-2 btn-icon-text"><i class="ti-file btn-icon-prepend"></i>Submit</button>
                                    <a href="<?php echo $GLOBALS['admin_webroot']?>projects.php" class="btn btn-outline-primary btn-icon-text"><i class="ti-close btn-icon-prepend"></i>Cancel</a>
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
                      <h4 class="card-title">Projects <span><a class="btn btn-outline-primary btn-pad add-new-btn" href="<?php echo $GLOBALS['admin_webroot']?>projects.php?act=add">Add new</a></span></h4>              
                      <div class="row">
                        <div class="col-12">
                          <div class="table-responsive">
                          	<form action="" method="post" id="page_view_form" name="page_view_form">
                            <table id="order-listing" class="table table-striped">
                              <thead>
                                <tr>
                                    <th>ID #</th>
                                    <th>Heading</th> 
                                    <th>Green Text Heading</th>                                  
                                    <th>Image</th>                                                       
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                              	<?php
								$i = 1;
								$select_project = mysqli_query($GLOBALS['conn'], "SELECT id, title, sub_title, image, is_published, created_date FROM projects ORDER BY id DESC");
								while($result_project = mysqli_fetch_array($select_project)) { ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $result_project['title']; ?></td> 
                                        <td><?php echo $result_project['sub_title']; ?></td>                                       
                                        <td><img src="<?php echo $GLOBALS['webroot']."uploads/project_images/".$result_project['image']; ?>" width="180" height="142"></td>                                    	
                                        <td>                                        	
                                            <?php if($result_project['is_published']==0) { ?>										
                                                <a href="approve.php?approved=1&ID=<?php echo $result_project['id']; ?>&key=project" title="Click to publish"><label class="badge badge-danger">Unpublished</label></a>
                                            <?php } else { ?>
                                                <a href="approve.php?approved=0&ID=<?php echo $result_project['id']; ?>&key=project" title="Click to unpublish"><label class="badge badge-success">Published</label></a>
                                            <?php } ?>
                                        </td>                                        
                                        <td>
                                          <a href="<?php echo $GLOBALS['admin_webroot']?>projects.php?act=edit&id=<?php echo $result_project['id']; ?>" class="btn btn-outline-primary btn-pad">Edit</a>&nbsp;
                                          <a href="javascript:void(<?php echo $result_project['id'];?>);" onClick="Delete('<?php echo $result_project['id']; ?>');" class="btn btn-outline-primary btn-pad">Delete</a>
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
$("#projectAddForm").validate({
  rules: {
	title: "required",		
	image: "required",
	image_detail: "required",
  },
  messages: {
	heading: "Please enter title", 	
	image: "Please upload image for listing page",
	image_detail: "Please upload image for detail page",
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

$("#projectEditForm").validate({
  rules: {
	title: "required",		
  },
  messages: {
	heading: "Please enter title", 	
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
		document.forms['page_view_form'].action="actions.php?type=delete_project&delid="+id;
		document.forms['page_view_form'].submit();
	}
}
</script>  
</body>
</html>