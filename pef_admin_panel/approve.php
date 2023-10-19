<?php 
include("../config/config.php");
		
if($_REQUEST['key']=="banner"){
	$UQry="UPDATE banner SET is_published='".$_REQUEST['approved']."' WHERE id='".$_REQUEST['ID']."'";
	mysqli_query($GLOBALS['conn'], $UQry);
	header("location:banner.php");
}
if($_REQUEST['key']=="project"){
	$UQry="UPDATE projects SET is_published='".$_REQUEST['approved']."' WHERE id='".$_REQUEST['ID']."'";
	mysqli_query($GLOBALS['conn'], $UQry);
	header("location:projects.php");
}
if($_REQUEST['key']=="gallery"){
	$UQry="UPDATE gallery SET is_published='".$_REQUEST['approved']."' WHERE id='".$_REQUEST['ID']."'";
	mysqli_query($GLOBALS['conn'], $UQry);
	header("location:gallery.php");
}
if($_REQUEST['key']=="event"){
	$UQry="UPDATE events SET is_published='".$_REQUEST['approved']."' WHERE id='".$_REQUEST['ID']."'";
	mysqli_query($GLOBALS['conn'], $UQry);
	header("location:events.php");
}
if($_REQUEST['key']=="sponsor"){
	$UQry="UPDATE sponsors SET is_published='".$_REQUEST['approved']."' WHERE id='".$_REQUEST['ID']."'";
	mysqli_query($GLOBALS['conn'], $UQry);
	header("location:sponsors.php");
}
if($_REQUEST['key']=="subscriber"){
	$UQry="UPDATE newsletter_subscription SET is_approved='".$_REQUEST['approved']."' WHERE id='".$_REQUEST['ID']."'";
	mysqli_query($GLOBALS['conn'], $UQry);
	header("location:subscribers.php");
}
if($_REQUEST['key']=="career"){
	$UQry="UPDATE careers SET is_published='".$_REQUEST['approved']."' WHERE id='".$_REQUEST['ID']."'";
	mysqli_query($GLOBALS['conn'], $UQry);
	header("location:careers.php");
}
?>