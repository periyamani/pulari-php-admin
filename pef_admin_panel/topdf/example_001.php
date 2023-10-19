<?php
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
global $User;
global $Pass;
global $Host;
global $Database;
$Host = "localhost"; 
$User="tkvmahal_donuser"; 
$Database="tkvmahal_donors"; 
$Pass="5BHXyNt4LP";
global $conn;
$conn = mysqli_connect($Host, $User, $Pass) or die(mysqli_error());
mysqli_select_db($conn, $Database) or die("can't connect to database (line 11 db_connect.php)");

global $sitename;
global $admin_webroot;
global $site_logo;

$sitename = "Donors Management System";
$admin_webroot = "http://donor.tkvmahal.com/";
$site_logo = "site-logo.jpg";

$select_donors = mysqli_query($GLOBALS['conn'], "SELECT * FROM dms_donors WHERE id='".$_REQUEST['id']."'");
$rs_donors = mysqli_fetch_object($select_donors);
$filename = str_replace(" ", "_", $rs_donors->name)."_receipt_".time().".pdf";
$uploaded_file_path = $_SERVER['DOCUMENT_ROOT']."/uploads/".$filename;

include("../includes/htmlMimeMail.php");
require_once('tcpdf_include.php');
require_once('tcpdf.php');
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle($filename);
// $pdf->SetSubject('TCPDF Tutorial');
// $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, '', '', array(0,64,255), array(255, 255, 255));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
// $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

$donotion_date = date("d/m/Y", strtotime($rs_donors->donotion_date));
if($rs_donors->address!='' && $rs_donors->pancard_number!='') {
	$symbol .=" & ";
}
$amount = number_format($rs_donors->amount_paid, 2);				
// Set some content to print
$html = <<<EOD
<div>
<table width="100%"><tr><td><img src="../assets/img/site-logo.jpg" width="180" height="110"></td> <td style="text-align:right; color:#003772; padding-top:70px;"><br><br>RECEIPT</td></tr><tr><td>&nbsp;</td></tr><tr><td height="27" colspan="2" style="font-size:12px;">THE CITADEL - 45, LANDONS ROAD, CHENNAI - 600 010. &nbsp;PHONE: +91 7395931688</td></tr><tr><td style="border-top:1px solid #000000;" colspan="2"></td></tr>		<tr><td>&nbsp;</td></tr><tr><td height="45" style="font-size:14px;" width="70%"><strong>Receipt No.</strong> $rs_donors->id</td><td style="font-size:14px;" width="30%">Date: $donotion_date</td></tr>				
			<tr>
				<td colspan="2" height="45" style="font-size:14px;">RECEIVED with thanks from <strong>$rs_donors->name</strong></td>															
			</tr>						
			<tr>
				<td colspan="2" height="65" style="font-size:14px;">Address & Pan No: $rs_donors->address $symbol $rs_donors->pancard_number</td>															
			</tr>
			<tr>
				<td height="45" width="70%" style="font-size:12px;"><span style="font-size:16px;"><strong>Rs $amount</strong></span><br/ ><br/ >
				Donoations made to this Trust are excempted<br/ >
				Under Section 80G Income Tax Act 1961<br/ >
				Vide ORder NO. DIE(E) No. 2(504)03-04
				</td>
				<td style="font-size:14px;" width="30%"><strong>For SURABI</strong> <br/ ><br/ ><br/ >
				<strong>DIRECTOR / TREASURE</strong>										
				</td>															
			</tr>
			<tr><td></td></tr>	
			<tr>
				<td style="font-size:12px;" colspan="2">This receipt generated electronically and hence signature not required.<br/ > Reach us : www.abc.org  or email : donate@abc.org</td>
			</tr>
			</table>
</div>
EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdfdoc = $pdf->Output($uploaded_file_path, 'F');
// send message
// mail($to, $subject, "", $headers);

// move_uploaded_file($pdfdoc, "images/".$filename);
// file_put_contents($file_name, $pdfdoc);
// $attachment = chunk_split(base64_encode($pdfdoc));

$select_receipt_email_template = mysqli_query($GLOBALS['conn'], "SELECT from_address, subject, email_content FROM dms_email_templates WHERE template_name='Receipt' AND status=1");
$rs_receipt_email_template = mysqli_fetch_object($select_receipt_email_template);

$subject = $rs_receipt_email_template->subject;
$from = "info@tkvmahal.com";
$replyto = $rs_donors->email;
$to = $rs_donors->email;

$logo = "<img src='".$GLOBALS['admin_webroot']."assets/img/".$GLOBALS['site_logo']."'>";

$content = $rs_receipt_email_template->email_content;
$content = str_replace("**logo", $logo, $content);
$content = str_replace("**donor_name", $rs_donors->name, $content);
$content = str_replace("**sitename", $GLOBALS['sitename'], $content);				

$mail = new htmlMimeMail();
$mail->setHTML($content);
$mail->setFrom($from);
$mime_type = "application/msword";
					
$mail->setBcc("talktodhaya@gmail.com");
	
if ($filename != '') {
	$attachment = $mail->getFile("../uploads/".$filename);
	$mail->addAttachment($attachment, $filename, $mime_type);
}

$mail->setSubject($subject);
if($replyto==""){
	$replyto = $from;
}
$mail->setHeader("Reply-To", $replyto);

if($to!='') {
	$ok =$mail->send(array($to));
}

// header("Content-type: application-download");
//header("Content-Length: $size");
// header("Content-Disposition: attachment; filename=candidate_details_".$_REQUEST['id'].".pdf");
// header("Content-Transfer-Encoding: binary");
//============================================================+
// END OF FILE
//============================================================+