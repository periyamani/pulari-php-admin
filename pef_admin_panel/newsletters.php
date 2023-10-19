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
                    <?php $select_subscriber = mysqli_query($GLOBALS['conn'], "SELECT id, name, email_address, is_approved FROM newsletter_subscription WHERE is_approved=1 ORDER BY id DESC"); ?>
                      <label for="Name">Select Members <span style="color:red">*</span></label>
                      	<select name="subscriber_id[]" class="js-example-basic-multiple w-100" multiple="multiple">                          
                          	<?php while($result_subscriber = mysqli_fetch_array($select_subscriber)) { ?>
                          		<option value="<?php echo $result_subscriber['id']; ?>"><?php echo $result_subscriber['name']; ?>(<?php echo $result_subscriber['email_address']; ?>)</option>                          
                          	<?php } ?>
                    	</select>
                    </div>
                    <div class="form-group">
                      <label for="Name">Subject <span style="color:red">*</span></label>
                      <input type="text" name="mail_subject" class="form-control" id="subject" placeholder="Subject">
                    </div>
                    <div class="form-group">
                      <label>Attachment </label>
                      <input type="file" name="attachment" id="attachment" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Image or File">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Choose Image or File</button>
                        </span>
                      </div>                      
                    </div>
                    <div class="form-group">
                      <label for="Description">Mail Content </label>
                      <textarea name="mail_content" id="content"></textarea>
                      <script language="javascript" type="text/javascript">
						ed = CKEDITOR.replace('content',
						{
							extraPlugins : 'pastetext',							
						});
						</script>
                    </div>                    
                    <button type="submit" class="btn btn-primary me-2 btn-icon-text"><i class="ti-file btn-icon-prepend"></i>Save</button>                    
                    <a href="<?php echo $GLOBALS['admin_webroot']?>newsletters.php" class="btn btn-outline-primary btn-icon-text"><i class="ti-close btn-icon-prepend"></i>Cancel</a>                    
                  </form>
                </div>
              </div>
            </div>
           		</div>
			<?php } else if($_REQUEST['act']=='edit') { ?>
            	<div class="row">
            		<div class="col-12 grid-margin stretch-card">
                    	<?php $select_newsletter = mysqli_query($GLOBALS['conn'], "SELECT id, subscriber_id, mail_subject, attachment, mail_content FROM newsletters WHERE id='".$_REQUEST['id']."'");
					  		$rs_newsletter = mysqli_fetch_object($select_newsletter);
							$fieldvalues = explode ("~", $rs_newsletter->subscriber_id); ?>
                            <div class="card">
                                <div class="card-body">
                                  <h4 class="card-title">Edit Newsletter</h4>  
                                  <p class="card-description">* denotes mandatory fields</p>                  
                                  <form class="forms-sample" id="newsletterEditForm" method="post" action="<?php echo $GLOBALS['admin_webroot']?>actions.php?type=edit_newsletter&id=<?php echo $_REQUEST['id'];?>" enctype="multipart/form-data">
                                  <div class="form-group">
									<?php $select_subscriber = mysqli_query($GLOBALS['conn'], "SELECT id, name, email_address, is_approved FROM newsletter_subscription WHERE is_approved=1 ORDER BY id DESC"); ?>
                                      <label for="Name">Select Members <span style="color:red">*</span></label>
                                        <select name="subscriber_id[]" class="js-example-basic-multiple w-100" multiple="multiple">                          
                                            <?php while($result_subscriber = mysqli_fetch_array($select_subscriber)) {
												if (in_array($result_subscriber["id"], $fieldvalues)) { ?>
                                                <option value="<?php echo $result_subscriber['id']; ?>" selected><?php echo $result_subscriber['name']; ?>(<?php echo $result_subscriber['email_address']; ?>)</option>                          
                                            <?php } else { ?>
                                            	<option value="<?php echo $result_subscriber['id']; ?>"><?php echo $result_subscriber['name']; ?>(<?php echo $result_subscriber['email_address']; ?>)</option>
                                            <?php }
											} ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                      <label for="Name">Subject <span style="color:red">*</span></label>
                                      <input type="text" name="mail_subject" class="form-control" id="subject" placeholder="Subject" value="<?php echo $rs_newsletter->mail_subject; ?>">
                                    </div>
                                    <div class="form-group">
                                      <label>Attachment </label>
                                      <?php if($rs_newsletter->attachment!="") { ?>
                                      <div style="margin-bottom:10px;"><a href="<?php echo $GLOBALS['webroot']."uploads/newsletter_images/".$rs_newsletter->attachment; ?>" target="_blank">Uploaded Image or File</a></div>
                                      <?php } ?>
                                      <input type="file" name="attachment" id="attachment" class="file-upload-default">
                                      <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled placeholder="Image or File">
                                        <span class="input-group-append">
                                          <button class="file-upload-browse btn btn-primary" type="button">Choose Image or File</button>
                                        </span>
                                      </div> 
                                      <input type="hidden" name="hidimage" value="<?php echo $rs_newsletter->attachment; ?>">                     
                                    </div>
                                    <div class="form-group">
                                      <label for="Description">Mail Content </label>
                                      <textarea name="mail_content" id="content"><?php echo $rs_newsletter->mail_content; ?></textarea>
                                      <script language="javascript" type="text/javascript">
										ed = CKEDITOR.replace('content',
										{
											extraPlugins : 'pastetext',							
										});
										</script>
                                    </div>        
                                    <!--<a href="#" class="btn btn-outline-success btn-fw btn-icon-text"><i class="ti-email btn-icon-prepend"></i> Send Mail</a>&nbsp;-->                                                
                                    <button type="submit" class="btn btn-primary me-2 btn-icon-text"><i class="ti-file btn-icon-prepend"></i>Save</button>
                                    <a href="<?php echo $GLOBALS['admin_webroot']?>newsletters.php" class="btn btn-outline-primary btn-icon-text"><i class="ti-close btn-icon-prepend"></i>Cancel</a>
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
                    <?php } if($_REQUEST['act'] == 'sent_mail') {?> 
                        <div class="alert alert-info" id="success_message" role="alert">Newsletter mail has been sent successfully.</div>
                    <?php } ?>
                      <h4 class="card-title">Newsletters <span><a class="btn btn-outline-primary btn-pad add-new-btn" href="<?php echo $GLOBALS['admin_webroot']?>newsletters.php?act=add">Add new</a></span></h4>              
                      <div class="row">
                        <div class="col-12">
                          <div class="table-responsive">
                          	<form action="" method="post" id="page_view_form" name="page_view_form">
                            <table id="order-listing" class="table table-striped">
                              <thead>
                                <tr>
                                    <th>ID #</th>                                    
                                    <th>Subject</th>                                                                
                                    <th>Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                              	<?php
								$i = 1;
								$select_newsletter = mysqli_query($GLOBALS['conn'], "SELECT id, mail_subject FROM newsletters ORDER BY id DESC");
								while($result_newsletter = mysqli_fetch_array($select_newsletter)) { ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $result_newsletter['mail_subject']; ?></td>                                                                                                                                                              
                                        <td>
											<a href="<?php echo $GLOBALS['admin_webroot']?>actions.php?type=send_newsletter_mail&id=<?php echo $result_newsletter['id']; ?>" class="btn btn-outline-success btn-pad">Send Mail</a>&nbsp;                                        	
                                          <a href="<?php echo $GLOBALS['admin_webroot']?>newsletters.php?act=edit&id=<?php echo $result_newsletter['id']; ?>" class="btn btn-outline-primary btn-pad">Edit</a>&nbsp;
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