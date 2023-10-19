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
  <title>Gallery | <?php echo $GLOBALS['sitename']; ?></title>
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
                  <h4 class="card-title">Add Gallery</h4>                  
                  <form class="forms-sample" id="galleryAddForm" method="post" action="<?php echo $GLOBALS['admin_webroot']?>actions.php?type=add_gallery" enctype="multipart/form-data">                    
                   <div class="form-group">
                      <label>Gallery Image</label>
                      <input type="file" name="image" id="image" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Gallery Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Choose Image</button>
                        </span>
                      </div>
                    </div>                                                                                
                    <button type="submit" class="btn btn-primary me-2 btn-icon-text"><i class="ti-file btn-icon-prepend"></i>Submit</button>
                    <a href="<?php echo $GLOBALS['admin_webroot']?>gallery.php" class="btn btn-outline-primary btn-icon-text"><i class="ti-close btn-icon-prepend"></i>Cancel</a>
                  </form>
                </div>
              </div>
            </div>
           		</div>
			<?php } else if($_REQUEST['act']=='edit') { ?>
            	<div class="row">
            		<div class="col-12 grid-margin stretch-card">
                    	<?php $select_gallery = mysqli_query($GLOBALS['conn'], "SELECT * FROM gallery WHERE id='".$_REQUEST['id']."'");
					  		$rs_gallery = mysqli_fetch_object($select_gallery); ?>
                            <div class="card">
                                <div class="card-body">
                                  <h4 class="card-title">Edit Gallery</h4>                  
                                  <form class="forms-sample" id="galleryEditForm" method="post" action="<?php echo $GLOBALS['admin_webroot']?>actions.php?type=edit_gallery&id=<?php echo $_REQUEST['id'];?>" enctype="multipart/form-data">                                    
                                   <div class="form-group">
                                      <label>Gallery Image</label>
                                      <div style="margin-bottom:10px;"><img src="<?php echo $GLOBALS['webroot']?>uploads/gallery_images/<?php echo $rs_gallery->image; ?>" width="120" height="110"/></div>	
                                      <input type="file" name="image" class="file-upload-default">
                                      <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled placeholder="Gallery Image">
                                        <span class="input-group-append">
                                          <button class="file-upload-browse btn btn-primary" type="button">Choose Image</button>
                                        </span>
                                      </div>
                                      <input type="hidden" name="hidimage" value="<?php echo $rs_gallery->image; ?>">		
                                    </div>                                                                                                
                                    <button type="submit" class="btn btn-primary me-2 btn-icon-text"><i class="ti-file btn-icon-prepend"></i>Submit</button>
                                    <a href="<?php echo $GLOBALS['admin_webroot']?>gallery.php" class="btn btn-outline-primary btn-icon-text"><i class="ti-close btn-icon-prepend"></i>Cancel</a>
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
                      <h4 class="card-title">Gallery <span><a class="btn btn-outline-primary btn-pad add-new-btn" href="<?php echo $GLOBALS['admin_webroot']?>gallery.php?act=add">Add new</a></span></h4>              
                      <div class="row">
                        <div class="col-12">
                          <div class="table-responsive">
                          	<form action="" method="post" id="page_view_form" name="page_view_form">
                            <table id="order-listing" class="table table-striped">
                              <thead>
                                <tr>
                                    <th>ID #</th>                                                                 
                                    <th>Image</th> 
                                    <th>Status</th>                                                                                           
                                    <th>Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                              	<?php
								$i = 1;
								$select_gallery = mysqli_query($GLOBALS['conn'], "SELECT id, image, is_published, created_date FROM gallery ORDER BY id DESC");
								while($result_gallery = mysqli_fetch_array($select_gallery)) { ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>                                                                           
                                        <td><img src="<?php echo $GLOBALS['webroot']."uploads/gallery_images/".$result_gallery['image']; ?>" width="120" height="110"></td>                                    	
                                        <td>                                        	
                                            <?php if($result_gallery['is_published']==0) { ?>										
                                                <a href="approve.php?approved=1&ID=<?php echo $result_gallery['id']; ?>&key=gallery" title="Click to publish"><label class="badge badge-danger">Unpublished</label></a>
                                            <?php } else { ?>
                                                <a href="approve.php?approved=0&ID=<?php echo $result_gallery['id']; ?>&key=gallery" title="Click to unpublish"><label class="badge badge-success">Published</label></a>
                                            <?php } ?>
                                        </td>                                        
                                        <td width="20%">
                                          <a href="<?php echo $GLOBALS['admin_webroot']?>gallery.php?act=edit&id=<?php echo $result_gallery['id']; ?>" class="btn btn-outline-primary btn-pad">Edit</a>&nbsp;
                                          <a href="javascript:void(<?php echo $result_gallery['id'];?>);" onClick="Delete('<?php echo $result_gallery['id']; ?>');" class="btn btn-outline-primary btn-pad">Delete</a>
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
$("#galleryAddForm").validate({
  rules: {	
	image: "required",
  },
  messages: {	
	image: "Please upload gallery image",
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
		document.forms['page_view_form'].action="actions.php?type=delete_gallery&delid="+id;
		document.forms['page_view_form'].submit();
	}
}
</script>  
</body>
</html>