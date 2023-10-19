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
  <title>Banner | <?php echo $GLOBALS['sitename']; ?></title>
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
                  <h4 class="card-title">Add Banner</h4>  
                  <p class="card-description">* denotes mandatory fields</p>                
                  <form class="forms-sample" id="bannerAddForm" method="post" action="<?php echo $GLOBALS['admin_webroot']?>actions.php?type=add_banner" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="Heading">Heading <span style="color:red">*</span></label>
                      <input type="text" name="heading" class="form-control" id="heading" placeholder="Heading">
                    </div>
                    <div class="form-group">
                      <label for="Heading">Green Text Heading <span style="color:red">*</span></label>
                      <input type="text" name="green_text_heading" class="form-control" id="green_text_heading" placeholder="Heading">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Sub Heading <span style="color:red">*</span></label>
                      <input type="text" name="sub_heading" class="form-control" id="sub_heading" placeholder="Sub Heading">
                    </div>
                   <div class="form-group">
                      <label>Banner Image <span style="color:red">*</span></label>
                      <input type="file" name="image" id="image" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Banner Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Choose Image</button>
                        </span>
                      </div>
                    </div>                                        
                    <div class="form-group">
                      <label for="Button Text">Button Text 1</label>
                      <input type="text" name="button_text1" class="form-control" id="button_text1" placeholder="Button Text 1">
                    </div>
                    <div class="form-group">
                      <label for="Button Text">Button Link 1</label>
                      <input type="text" name="button_link1" class="form-control" id="button_link1" placeholder="Button Link 1">
                    </div> 
                    <div class="form-group">
                      <label for="Button Text">Button Text 2</label>
                      <input type="text" name="button_text2" class="form-control" id="button_text2" placeholder="Button Text 2">
                    </div>
                    <div class="form-group">
                      <label for="Button Text">Button Link 2</label>
                      <input type="text" name="button_link2" class="form-control" id="button_link2" placeholder="Button Link 2">
                    </div>                   
                    <button type="submit" class="btn btn-primary me-2 btn-icon-text"><i class="ti-file btn-icon-prepend"></i>Submit</button>
                    <a href="<?php echo $GLOBALS['admin_webroot']?>banner.php" class="btn btn-outline-primary btn-icon-text"><i class="ti-close btn-icon-prepend"></i>Cancel</a>
                  </form>
                </div>
              </div>
            </div>
           		</div>
			<?php } else if($_REQUEST['act']=='edit') { ?>
            	<div class="row">
            		<div class="col-12 grid-margin stretch-card">
                    	<?php $select_banner = mysqli_query($GLOBALS['conn'], "SELECT id, heading, sub_heading, green_text_heading, image, button_text1, button_link1, button_text2, button_link2 FROM banner WHERE id='".$_REQUEST['id']."'");
					  		$rs_banner = mysqli_fetch_object($select_banner); ?>
                            <div class="card">
                                <div class="card-body">
                                  <h4 class="card-title">Edit Banner</h4>  
                                  <p class="card-description">* denotes mandatory fields</p>                  
                                  <form class="forms-sample" id="bannerEditForm" method="post" action="<?php echo $GLOBALS['admin_webroot']?>actions.php?type=edit_banner&id=<?php echo $_REQUEST['id'];?>" enctype="multipart/form-data">
                                    <div class="form-group">
                                      <label for="Heading">Heading <span style="color:red">*</span></label>
                                      <input type="text" name="heading" class="form-control" id="heading" placeholder="Heading" value="<?php echo $rs_banner->heading; ?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="Heading">Green Text Heading <span style="color:red">*</span></label>
                                      <input type="text" name="green_text_heading" class="form-control" id="green_text_heading" placeholder="Heading" value="<?php echo $rs_banner->green_text_heading; ?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputEmail3">Sub Heading <span style="color:red">*</span></label>
                                      <input type="text" name="sub_heading" class="form-control" id="sub_heading" placeholder="Sub Heading" value="<?php echo $rs_banner->sub_heading; ?>">
                                    </div>
                                   <div class="form-group">
                                      <label>Banner Image <span style="color:red">*</span></label>
                                      <div style="margin-bottom:10px;"><img src="<?php echo $GLOBALS['webroot']?>uploads/banner_images/<?php echo $rs_banner->image; ?>" width="200" height="90"/></div>	
                                      <input type="file" name="image" class="file-upload-default">
                                      <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled placeholder="Banner Image">
                                        <span class="input-group-append">
                                          <button class="file-upload-browse btn btn-primary" type="button">Choose Image</button>
                                        </span>
                                      </div>
                                      <input type="hidden" name="hidimage" value="<?php echo $rs_banner->image; ?>">		
                                    </div>                                        
                                    <div class="form-group">
                                      <label for="Button Text">Button Text 1</label>
                                      <input type="text" name="button_text1" class="form-control" id="button_text1" placeholder="Button Text 1" value="<?php echo $rs_banner->button_text1; ?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="Button Text">Button Link 1</label>
                                      <input type="text" name="button_link1" class="form-control" id="button_link1" placeholder="Button Link 1" value="<?php echo $rs_banner->button_link1; ?>">
                                    </div> 
                                    <div class="form-group">
                                      <label for="Button Text">Button Text 2</label>
                                      <input type="text" name="button_text2" class="form-control" id="button_text2" placeholder="Button Text 2" value="<?php echo $rs_banner->button_text2; ?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="Button Text">Button Link 2</label>
                                      <input type="text" name="button_link2" class="form-control" id="button_link2" placeholder="Button Link 2" value="<?php echo $rs_banner->button_link2; ?>">
                                    </div>                     
                                    <button type="submit" class="btn btn-primary me-2 btn-icon-text"><i class="ti-file btn-icon-prepend"></i>Submit</button>
                                    <a href="<?php echo $GLOBALS['admin_webroot']?>banner.php" class="btn btn-outline-primary btn-icon-text"><i class="ti-close btn-icon-prepend"></i>Cancel</a>
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
                      <h4 class="card-title">Banner <span><a class="btn btn-outline-primary btn-pad add-new-btn" href="<?php echo $GLOBALS['admin_webroot']?>banner.php?act=add">Add new</a></span></h4>              
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
								$select_banner = mysqli_query($GLOBALS['conn'], "SELECT id, heading, green_text_heading, sub_heading, image, is_published, created_date FROM banner ORDER BY id DESC");
								while($result_banner = mysqli_fetch_array($select_banner)) { ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $result_banner['heading']; ?></td> 
                                        <td><?php echo $result_banner['green_text_heading']; ?></td>                                       
                                        <td><img src="<?php echo $GLOBALS['webroot']."uploads/banner_images/".$result_banner['image']; ?>" width="200" height="80"></td>                                    	
                                        <td>                                        	
                                            <?php if($result_banner['is_published']==0) { ?>										
                                                <a href="approve.php?approved=1&ID=<?php echo $result_banner['id']; ?>&key=banner" title="Click to publish"><label class="badge badge-danger">Unpublished</label></a>
                                            <?php } else { ?>
                                                <a href="approve.php?approved=0&ID=<?php echo $result_banner['id']; ?>&key=banner" title="Click to unpublish"><label class="badge badge-success">Published</label></a>
                                            <?php } ?>
                                        </td>                                        
                                        <td>
                                          <a href="<?php echo $GLOBALS['admin_webroot']?>banner.php?act=edit&id=<?php echo $result_banner['id']; ?>" class="btn btn-outline-primary btn-pad">Edit</a>&nbsp;
                                          <a href="javascript:void(<?php echo $result_banner['id'];?>);" onClick="Delete('<?php echo $result_banner['id']; ?>');" class="btn btn-outline-primary btn-pad">Delete</a>
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
$("#bannerAddForm").validate({
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
	image: "Please upload banner image",
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

$("#bannerEditForm").validate({
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
		document.forms['page_view_form'].action="actions.php?type=delete_banner&delid="+id;
		document.forms['page_view_form'].submit();
	}
}
</script>  
</body>
</html>