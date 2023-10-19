<?php include("../config/config.php");
include("includes/functions.php");	
include("includes/htmlMimeMail.php");
	
	//Admin Login
	if($_REQUEST['type'] == "login") {		
		$result_login = mysqli_query($GLOBALS['conn'], "SELECT * FROM admin WHERE username = '".trim($_REQUEST['username'])."' AND password = '".md5($_REQUEST['password'])."' AND status=1");
		if(mysqli_num_rows($result_login)>0){
			$data_user = mysqli_fetch_object($result_login);
			$_SESSION['admin_username'] = $data_user->username;
			$_SESSION['admin_id'] = $data_user->id;
  			header("Location:dashboard.php");
		} else {
			header("Location:index.php?login=failure");
		}
	}
	
	//Change Password
	if($_REQUEST['type'] == "change_password"){	
		
		if($_REQUEST['new_password']!=$_REQUEST['confirm_password']) {
			header("location:change_password.php?act=error1");
			die();
		}
		$sel = mysqli_query($GLOBALS['conn'], "SELECT * FROM dms_admin WHERE username='".$_SESSION['admin_username']."' AND password='".md5($_REQUEST['current_password'])."'"); 
		$numrow = mysqli_num_rows($sel);
		$res = mysqli_fetch_object($sel);
		if($numrow!=0) {
			$update = mysqli_query($GLOBALS['conn'], "UPDATE dms_admin SET password='".md5($_REQUEST['new_password'])."' WHERE username='".$_SESSION['admin_username']."'"); 
			header("location:change_password.php?act=updated");
		} else {
			header("location:change_password.php?act=error");
		}
	}
	
	//Add Banner
	if($_REQUEST['type']=='add_banner') {
		$upload_directory = '../uploads/banner_images/'; 			
		if($_FILES['image']['name']!=''){
			$file_name_thumb = uniqid().$_FILES["image"]["name"];	
			$tempFile = $_FILES["image"]["tmp_name"];
			$image = post_img($file_name_thumb, $_FILES['image']['tmp_name'], $upload_directory);			
		} 
		
		$insert_banner = mysqli_query($GLOBALS['conn'], "INSERT INTO banner SET heading = '".$_REQUEST['heading']."', green_text_heading = '".$_REQUEST['green_text_heading']."', sub_heading = '".$_REQUEST['sub_heading']."', image = '".$image."', button_text1 = '".$_REQUEST['button_text1']."', button_link1 = '".$_REQUEST['button_link1']."', button_text2 = '".$_REQUEST['button_text2']."', button_link2 = '".$_REQUEST['button_link2']."', is_published=1, created_date = NOW()");		
		header("location:banner.php?act=added");
	}
	
	//Update Banner
	if($_REQUEST['type']=='edit_banner') {
		$upload_directory = '../uploads/banner_images/'; 			
		if($_FILES['image']['name']!=''){
			$file_name_thumb = uniqid().$_FILES["image"]["name"];	
			$tempFile = $_FILES["image"]["tmp_name"];
			$image = post_img($file_name_thumb, $_FILES['image']['tmp_name'], $upload_directory);			
		} else { 
			$image = $_REQUEST['hidimage'];
		}
		
		$update_banner = mysqli_query($GLOBALS['conn'], "UPDATE banner SET heading = '".$_REQUEST['heading']."', green_text_heading = '".$_REQUEST['green_text_heading']."', sub_heading = '".$_REQUEST['sub_heading']."', image = '".$image."', button_text1 = '".$_REQUEST['button_text1']."', button_link1 = '".$_REQUEST['button_link1']."', button_text2 = '".$_REQUEST['button_text2']."', button_link2 = '".$_REQUEST['button_link2']."' WHERE id='".$_REQUEST['id']."'");		
		header("location:banner.php?act=updated");
	}
	
	//Delete Banner
	if($_REQUEST['type'] == "delete_banner"){
		mysqli_query($GLOBALS['conn'], "DELETE FROM banner WHERE id = '".$_REQUEST['delid']."'");
		header("Location: banner.php?act=deleted");
	}
	
	//Add Project
	if($_REQUEST['type']=='add_project') {
		$upload_directory = '../uploads/project_images/'; 		
		if($_FILES['image']['name']!=''){
			$file_name_thumb = uniqid().$_FILES["image"]["name"];	
			$tempFile = $_FILES["image"]["tmp_name"];
			$image = post_img($file_name_thumb, $_FILES['image']['tmp_name'], $upload_directory);				
		}
		if($_FILES['image_detail']['name']!=''){
			$file_name_thumb_detail = uniqid().$_FILES["image_detail"]["name"];	
			$tempFile = $_FILES["image_detail"]["tmp_name"];
			$image_detail = post_img($file_name_thumb_detail, $_FILES['image_detail']['tmp_name'], $upload_directory);				
		}
		
		$insert_project = mysqli_query($GLOBALS['conn'], "INSERT INTO projects SET title = '".$_REQUEST['title']."', sub_title = '".$_REQUEST['sub_title']."', image = '".$image."', image_detail = '".$image_detail."', description = '".$_REQUEST['description']."', is_published=1, created_date = NOW()");		
		header("location:projects.php?act=added");
	}
	
	//Update Project
	if($_REQUEST['type']=='edit_project') {
		$upload_directory = '../uploads/project_images/'; 			
		if($_FILES['image']['name']!=''){			
			$file_name_thumb = uniqid().$_FILES["image"]["name"];	
			$tempFile = $_FILES["image"]["tmp_name"];
			$image = post_img($file_name_thumb, $_FILES['image']['tmp_name'], $upload_directory);				
		} else { 
			$image = $_REQUEST['hidimage'];
		}
		
		if($_FILES['image_detail']['name']!=''){			
			$file_name_thumb_detail = uniqid().$_FILES["image_detail"]["name"];	
			$tempFile = $_FILES["image_detail"]["tmp_name"];
			$image_detail = post_img($file_name_thumb_detail, $_FILES['image_detail']['tmp_name'], $upload_directory);				
		} else { 
			$image_detail = $_REQUEST['hidimagedetail'];
		}
		
		$update_project = mysqli_query($GLOBALS['conn'], "UPDATE projects SET title = '".$_REQUEST['title']."', sub_title = '".$_REQUEST['sub_title']."', image = '".$image."', image_detail = '".$image_detail."', description = '".$_REQUEST['description']."' WHERE id='".$_REQUEST['id']."'");		
		header("location:projects.php?act=updated");
	}
	
	//Delete Project
	if($_REQUEST['type'] == "delete_project"){
		mysqli_query($GLOBALS['conn'], "DELETE FROM projects WHERE id = '".$_REQUEST['delid']."'");
		header("Location: projects.php?act=deleted");
	}
	
	//Add Gallery
	if($_REQUEST['type']=='add_gallery') {
		$upload_directory = '../uploads/gallery_images/'; 			
		if($_FILES['image']['name']!=''){
			$file_name_thumb = uniqid().$_FILES["image"]["name"];	
			$tempFile = $_FILES["image"]["tmp_name"];
			$image = post_img($file_name_thumb, $_FILES['image']['tmp_name'], $upload_directory);			
		} 
		
		$insert_gallery = mysqli_query($GLOBALS['conn'], "INSERT INTO gallery SET image = '".$image."', is_published=1, created_date = NOW()");		
		header("location:gallery.php?act=added");
	}
	
	//Update Gallery
	if($_REQUEST['type']=='edit_gallery') {
		$upload_directory = '../uploads/gallery_images/'; 			
		if($_FILES['image']['name']!=''){
			$file_name_thumb = uniqid().$_FILES["image"]["name"];	
			$tempFile = $_FILES["image"]["tmp_name"];
			$image = post_img($file_name_thumb, $_FILES['image']['tmp_name'], $upload_directory);			
		} else { 
			$image = $_REQUEST['hidimage'];
		}
		
		$update_gallery = mysqli_query($GLOBALS['conn'], "UPDATE gallery SET image = '".$image."' WHERE id='".$_REQUEST['id']."'");		
		header("location:gallery.php?act=updated");
	}
	
	//Delete Gallery
	if($_REQUEST['type'] == "delete_gallery"){
		mysqli_query($GLOBALS['conn'], "DELETE FROM gallery WHERE id = '".$_REQUEST['delid']."'");
		header("Location: gallery.php?act=deleted");
	}
	
	//Add Events
	if($_REQUEST['type']=='add_event') {
		$upload_directory = '../uploads/event_images/'; 			
		if($_FILES['image']['name']!=''){
			$file_name_thumb = uniqid().$_FILES["image"]["name"];	
			$tempFile = $_FILES["image"]["tmp_name"];
			$image = post_img($file_name_thumb, $_FILES['image']['tmp_name'], $upload_directory);			
		}
		
		$event_date = date("Y-m-d", strtotime($_REQUEST['event_date']));
		$insert_event = mysqli_query($GLOBALS['conn'], "INSERT INTO events SET event_title = '".$_REQUEST['event_title']."', image = '".$image."', event_date = '".$event_date."', event_location = '".$_REQUEST['event_location']."', description = '".$_REQUEST['description']."', is_published=1, created_date = NOW()");		
		header("location:events.php?act=added");
	}
	
	//Update Events
	if($_REQUEST['type']=='edit_event') {
		$upload_directory = '../uploads/event_images/'; 			
		if($_FILES['image']['name']!=''){
			$file_name_thumb = uniqid().$_FILES["image"]["name"];	
			$tempFile = $_FILES["image"]["tmp_name"];
			$image = post_img($file_name_thumb, $_FILES['image']['tmp_name'], $upload_directory);			
		} else { 
			$image = $_REQUEST['hidimage'];
		}
		
		$event_date = date("Y-m-d", strtotime($_REQUEST['event_date']));
		$update_event = mysqli_query($GLOBALS['conn'], "UPDATE events SET event_title = '".$_REQUEST['event_title']."', image = '".$image."', event_date = '".$event_date."', event_location = '".$_REQUEST['event_location']."', description = '".$_REQUEST['description']."' WHERE id='".$_REQUEST['id']."'");		
		header("location:events.php?act=updated");
	}
	
	//Delete Events
	if($_REQUEST['type'] == "delete_event"){
		mysqli_query($GLOBALS['conn'], "DELETE FROM events WHERE id = '".$_REQUEST['delid']."'");
		header("Location: events.php?act=deleted");
	}
	
	//Add Sponsors
	if($_REQUEST['type']=='add_sponsor') {
		$upload_directory = '../uploads/sponsor_images/'; 			
		if($_FILES['image']['name']!=''){
			$file_name_thumb = uniqid().$_FILES["image"]["name"];	
			$tempFile = $_FILES["image"]["tmp_name"];
			$image = post_img($file_name_thumb, $_FILES['image']['tmp_name'], $upload_directory);			
		} 
		
		$insert_sponsor = mysqli_query($GLOBALS['conn'], "INSERT INTO sponsors SET company_name = '".$_REQUEST['company_name']."', image = '".$image."', is_published=1, created_date = NOW()");		
		header("location:sponsors.php?act=added");
	}
	
	//Update Sponsors
	if($_REQUEST['type']=='edit_sponsor') {
		$upload_directory = '../uploads/sponsor_images/'; 			
		if($_FILES['image']['name']!=''){
			$file_name_thumb = uniqid().$_FILES["image"]["name"];	
			$tempFile = $_FILES["image"]["tmp_name"];
			$image = post_img($file_name_thumb, $_FILES['image']['tmp_name'], $upload_directory);			
		} else { 
			$image = $_REQUEST['hidimage'];
		}
		
		$update_sponsor = mysqli_query($GLOBALS['conn'], "UPDATE sponsors SET company_name = '".$_REQUEST['company_name']."', image = '".$image."' WHERE id='".$_REQUEST['id']."'");		
		header("location:sponsors.php?act=updated");
	}
	
	//Delete Sponsors
	if($_REQUEST['type'] == "delete_sponsor"){
		mysqli_query($GLOBALS['conn'], "DELETE FROM sponsors WHERE id = '".$_REQUEST['delid']."'");
		header("Location: sponsors.php?act=deleted");
	}
	
	//Add Donations
	if($_REQUEST['type']=='add_donation') {			
		$donation_date = date("Y-m-d", strtotime($_REQUEST['donation_date']));
		$insert_donation = mysqli_query($GLOBALS['conn'], "INSERT INTO donations SET amount = '".$_REQUEST['amount']."', name = '".$_REQUEST['name']."', email_address = '".$_REQUEST['email_address']."', phone_number = '".$_REQUEST['phone_number']."', pan_number = '".$_REQUEST['pan_number']."', aadhaar_number = '".$_REQUEST['aadhaar_number']."', address = '".$_REQUEST['address']."', message = '".$_REQUEST['message']."', mode_of_payment = '".$_REQUEST['mode_of_payment']."', transaction_number = '".$_REQUEST['transaction_number']."', donation_date = '".$donation_date."', created_date = NOW()");	
		
		$donor_unique_id = mysqli_insert_id($GLOBALS['conn']);	
		
		if($donor_unique_id > 999){
		    $prefi = 'PEF-'.date("Y");
		} elseif($donor_unique_id > 99){
		    $prefi = 'PEF-'.date("Y").'0';
		} elseif($donor_unique_id > 9){
		    $prefi = 'PEF-'.date("Y").'00';
		} else {
		    $prefi = 'PEF-'.date("Y").'000';
		}		
		$donor_id = $prefi.$donor_unique_id;
		
		$prefi = "";
		if($donor_unique_id > 999){
		    $prefi = date("Y");
		} elseif($donor_unique_id > 99){
		    $prefi = date("Y").'0';
		} elseif($donor_unique_id > 9){
		    $prefi = date("Y").'00';
		} else {
		    $prefi = date("Y").'000';
		}		
		$receipt_no = $prefi.'-'.$donor_unique_id;
		
		$update_donor_id = mysqli_query($GLOBALS['conn'], "UPDATE donations SET donor_id = '".$donor_id."', receipt_no = '".$receipt_no."' WHERE id='".$donor_unique_id."'");
		
		header("location:donations.php?act=added");
	}
	
	//Update Donations
	if($_REQUEST['type']=='edit_donation') {
		$donation_date = date("Y-m-d", strtotime($_REQUEST['donation_date']));
		$update_donation = mysqli_query($GLOBALS['conn'], "UPDATE donations SET amount = '".$_REQUEST['amount']."', name = '".$_REQUEST['name']."', email_address = '".$_REQUEST['email_address']."', phone_number = '".$_REQUEST['phone_number']."', pan_number = '".$_REQUEST['pan_number']."', aadhaar_number = '".$_REQUEST['aadhaar_number']."', address = '".$_REQUEST['address']."', mode_of_payment = '".$_REQUEST['mode_of_payment']."', transaction_number = '".$_REQUEST['transaction_number']."', message = '".$_REQUEST['message']."', donation_date = '".$donation_date."' WHERE id='".$_REQUEST['id']."'");		
		header("location:donations.php?act=updated");
	}
	
	//Delete Donations
	if($_REQUEST['type'] == "delete_donation"){
		mysqli_query($GLOBALS['conn'], "DELETE FROM donations WHERE id = '".$_REQUEST['delid']."'");
		header("Location: donations.php?act=deleted");
	}
	
	//Add Members
	if($_REQUEST['type']=='add_member') {
		$insert_sponsor = mysqli_query($GLOBALS['conn'], "INSERT INTO members SET name = '".$_REQUEST['name']."', email_address = '".$_REQUEST['email_address']."', phone_number = '".$_REQUEST['phone_number']."', other_details = '".$_REQUEST['other_details']."', is_published=1, created_date = NOW()");		
		header("location:members.php?act=added");
	}
	
	//Update Members
	if($_REQUEST['type']=='edit_member') {				
		$update_sponsor = mysqli_query($GLOBALS['conn'], "UPDATE members SET name = '".$_REQUEST['name']."', email_address = '".$_REQUEST['email_address']."', phone_number = '".$_REQUEST['phone_number']."', other_details = '".$_REQUEST['other_details']."' WHERE id='".$_REQUEST['id']."'");		
		header("location:members.php?act=updated");
	}
	
	//Delete Members
	if($_REQUEST['type'] == "delete_member"){
		mysqli_query($GLOBALS['conn'], "DELETE FROM members WHERE id = '".$_REQUEST['delid']."'");
		header("Location: members.php?act=deleted");
	}
	
	//Add Subscriber
	if($_REQUEST['type']=='add_subscriber') {
		$insert_sponsor = mysqli_query($GLOBALS['conn'], "INSERT INTO newsletter_subscription SET name = '".$_REQUEST['name']."', email_address = '".$_REQUEST['email_address']."', is_approved=1, created_date = NOW()");		
		header("location:subscribers.php?act=added");
	}
	
	//Update Subscriber
	if($_REQUEST['type']=='edit_subscriber') {				
		$update_sponsor = mysqli_query($GLOBALS['conn'], "UPDATE newsletter_subscription SET name = '".$_REQUEST['name']."', email_address = '".$_REQUEST['email_address']."' WHERE id='".$_REQUEST['id']."'");		
		header("location:subscribers.php?act=updated");
	}
	
	//Delete Subscriber
	if($_REQUEST['type'] == "delete_subscriber"){
		mysqli_query($GLOBALS['conn'], "DELETE FROM newsletter_subscription WHERE id = '".$_REQUEST['delid']."'");
		header("Location: subscribers.php?act=deleted");
	}
	
	//Add Newsletter
	if($_REQUEST['type']=='add_newsletter') {
		$subscriber_id = $_REQUEST['subscriber_id'];
		for($i=0; $i<=count($subscriber_id); $i++) {
			$subscriber_ids.= $subscriber_id[$i]."~";
		}
		
		$upload_directory = '../uploads/newsletter_images/'; 			
		if($_FILES['attachment']['name']!=''){
			$file_name_thumb = uniqid().$_FILES["attachment"]["name"];	
			$tempFile = $_FILES["attachment"]["tmp_name"];
			$attachment = post_img($file_name_thumb, $_FILES['attachment']['tmp_name'], $upload_directory);			
		}
		
		$subscriber_ids = rtrim($subscriber_ids, "~");
		$insert_newsletter = mysqli_query($GLOBALS['conn'], "INSERT INTO newsletters SET subscriber_id = '".$subscriber_ids."', mail_subject = '".$_REQUEST['mail_subject']."', attachment = '".$attachment."', mail_content = '".addslashes($_REQUEST['mail_content'])."', is_published=1, created_date = NOW()");		
		header("location:newsletters.php?act=added");
	}
	
	//Update Newsletter
	if($_REQUEST['type']=='edit_newsletter') {
		$subscriber_id = $_REQUEST['subscriber_id'];
		for($i=0; $i<=count($subscriber_id); $i++) {
			$subscriber_ids.= $subscriber_id[$i]."~";
		}
		
		if($_FILES['attachment']['name']!='') {
			$upload_directory = '../uploads/newsletter_images/'; 			
			if($_FILES['attachment']['name']!=''){
				$file_name_thumb = uniqid().$_FILES["attachment"]["name"];	
				$tempFile = $_FILES["attachment"]["tmp_name"];
				$attachment = post_img($file_name_thumb, $_FILES['attachment']['tmp_name'], $upload_directory);			
			}
		} else {
			$attachment = $_REQUEST['hidimage'];
		}
		
		$subscriber_ids = rtrim($subscriber_ids, "~");		
		$insert_newsletter = mysqli_query($GLOBALS['conn'], "UPDATE newsletters SET subscriber_id = '".$subscriber_ids."', mail_subject = '".$_REQUEST['mail_subject']."', attachment = '".$attachment."', mail_content = '".addslashes($_REQUEST['mail_content'])."' WHERE id = '".$_REQUEST['id']."'");		
		header("location:newsletters.php?act=added");
	}
	
	//Delete Subscriber
	if($_REQUEST['type'] == "delete_newsletter") {
		mysqli_query($GLOBALS['conn'], "DELETE FROM newsletters WHERE id = '".$_REQUEST['delid']."'");
		header("Location: newsletters.php?act=deleted");
	}
	
	//Update Process Counter
	if($_REQUEST['type']=='edit_process_counter') {				
		$insert_newsletter = mysqli_query($GLOBALS['conn'], "UPDATE process_counter SET total_campaign = '".$_REQUEST['total_campaign']."', funds_collection = '".$_REQUEST['funds_collection']."', volunteers = '".$_REQUEST['volunteers']."', saplings = '".$_REQUEST['saplings']."' WHERE id = '".$_REQUEST['id']."'");		
		header("location:process_counter.php?act=added");
	}
	
	//Send mail to Subscriber
	if($_REQUEST['type'] == "send_newsletter_mail"){
		
		$select_newsletter = mysqli_query($GLOBALS['conn'], "SELECT id, subscriber_id, mail_subject, attachment, mail_content FROM newsletters WHERE id='".$_REQUEST['id']."'");
		$result_newsletter = mysqli_fetch_object($select_newsletter);
		
		$exp_subscriber_id = explode("~", $result_newsletter->subscriber_id);
		
		for($i = 0; $i <= count($exp_subscriber_id); $i++) {
			
			$select_subscriber = mysqli_query($GLOBALS['conn'], "SELECT name, email_address FROM newsletter_subscription WHERE id='".$exp_subscriber_id[$i]."'");
			$result_subscriber = mysqli_fetch_object($select_subscriber);
			
			$subject = $result_newsletter->mail_subject;
			$mail_content = $result_newsletter->mail_content;
			$from = "pulariecofoundation@gmail.com";
			$replyto = $result_subscriber->email_address;
			$to = $result_subscriber->email_address;
			
			$logo = "<img src='".$GLOBALS['admin_webroot']."images/".$GLOBALS['site_logo']."'><br />";
			
			$content = $logo.$mail_content;
			
			$mail = new htmlMimeMail();
			$mail->setHTML($content);
			$mail->setFrom($from, $GLOBALS['sitename']);
			$mail->setBcc("dhayalan1127@gmail.com");
			$mime_type = "application/msword";					
			
			$mail->setSubject($subject);
			if($replyto==""){
				$replyto = $from;
			}
			$mail->setHeader("Reply-To", $replyto);
			
			$filename = $result_newsletter->attachment;
			if ($filename != '') {
				$attachment = $mail->getFile("../uploads/newsletter_images/".$filename);
				$mail->addAttachment($attachment, $filename, $mime_type);
			}

			if($to!='') {
				$ok =$mail->send(array($to));
			}
		}
		header("Location: newsletters.php?act=sent_mail");
	}
	
	//Add Careers
	if($_REQUEST['type']=='add_career') {	
	
		$select_ref_exist = mysqli_query($GLOBALS['conn'], "SELECT * FROM careers WHERE job_reference_number='".$_REQUEST['job_reference_number']."'");
		
		if((mysqli_num_rows($select_ref_exist)==0)) {
			$insert_careers = mysqli_query($GLOBALS['conn'], "INSERT INTO careers SET job_reference_number = '".$_REQUEST['job_reference_number']."', job_title = '".$_REQUEST['job_title']."', description = '".addslashes($_REQUEST['description'])."', is_published=1, created_date = NOW()");		
			header("location:careers.php?act=added");
		} else {
			header("location:careers.php?act=add&error=already_exist");	
		}
	}
	
	//Update Careers
	if($_REQUEST['type']=='edit_career') {		
	
		$select_ref_exist = mysqli_query($GLOBALS['conn'], "SELECT * FROM careers WHERE job_reference_number='".$_REQUEST['job_reference_number']."' AND id!='".$_REQUEST['id']."'");
		
		if((mysqli_num_rows($select_ref_exist)==0)) {
			$update_career = mysqli_query($GLOBALS['conn'], "UPDATE careers SET job_reference_number = '".$_REQUEST['job_reference_number']."', job_title = '".$_REQUEST['job_title']."', description = '".addslashes($_REQUEST['description'])."' WHERE id='".$_REQUEST['id']."'");		
			header("location:careers.php?act=updated");
		} else {
			header("location:careers.php?act=edit&id=".$_REQUEST['id']."&error=already_exist");	
		}
	}
	
	//Delete Careers
	if($_REQUEST['type'] == "delete_career"){
		mysqli_query($GLOBALS['conn'], "DELETE FROM careers WHERE id = '".$_REQUEST['delid']."'");
		header("Location: careers.php?act=deleted");
	}
	
	//Logout
	if($_REQUEST['type'] == "logout"){
		session_start();
		unset($_SESSION['admin_username']);
		unset($_SESSION['admin_id']);
		$_SESSION['admin_username']='';
		$_SESSION['admin_id']='';
		header("Location:index.php");			
	}
?>