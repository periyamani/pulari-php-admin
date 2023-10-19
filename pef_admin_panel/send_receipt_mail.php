<?php
// Include the main TCPDF library (search for installation path).
global $User;
global $Pass;
global $Host;
global $Database;
$Host = "localhost"; 
$User="primeparkco_pulari_user"; 
$Database="primeparkco_pulari"; 
$Pass="yjWaSU)]WZe(";
global $conn;
$conn = mysqli_connect($Host, $User, $Pass) or die(mysqli_error());
mysqli_select_db($conn, $Database) or die("can't connect to database (line 11 db_connect.php)");

global $sitename;
global $admin_webroot;
global $site_logo;

$sitename = "Pulari Eco Foundation";
$webroot = "https://primepark.co.in/pulari_eco_foundation/";
$admin_webroot = "https://primepark.co.in/pulari_eco_foundation/pef_admin_panel/";
$site_logo = "pulari-site-logo.png";

$select_donors = mysqli_query($GLOBALS['conn'], "SELECT * FROM donations WHERE id='".$_REQUEST['id']."'");
$rs_donors = mysqli_fetch_object($select_donors);
$filename = str_replace(" ", "_", $rs_donors->name)."_receipt_".time().".pdf";
$uploaded_file_path = $_SERVER['DOCUMENT_ROOT']."/pulari_eco_foundation/uploads/receipts/".$filename;

include("includes/functions.php");
include("includes/htmlMimeMail.php");
require_once('topdf/tcpdf_include.php');
require_once('topdf/tcpdf.php');
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

$donation_date = date("F d, Y", strtotime($rs_donors->donation_date));
$receipt_date = date("F d, Y");
$amount = ucwords(numberTowords($rs_donors->amount)).' Only';
// $amount = number_format($rs_donors->amount_paid, 2);				
// Set some content to print
$html = <<<EOD
<div>
<table width="100%">
	<tr>
    	<td colspan="4" align="center"><img src="../images/pulari-site-logo.png"></td>     	
    </tr>   
	<tr>
    	<td colspan="4"></td>
    </tr>
    <tr>
    	<td colspan="4" style="font-size:11px;">No.3, Balaji Avenue, Ranganayagi Nagar, Periyanaickenpalayam, Coimbatore - 641020. Phone: +91 95916 18844, Telephone: 0422 - 7140749<br></td>
    </tr>    
     <tr>
		<td colspan="4" style="font-size:11px;">$rs_donors->name<br>$rs_donors->address<br></td>
     </tr>     
     <tr>
     	<td colspan="4" style="font-size:11px;"><b>Dear $rs_donors->name,</b><br></td>
     </tr>     
     <tr>
   	   <td colspan="4" style="font-size:11px;">Thank you for your generosity and we sincerely appreciate your gesture in joining hands with Pulari Eco Foundation to a new dawn of hope. <br></td>
	</tr>            
    <tr>
   	  <td height="20" colspan="4" style="font-size:11px;">For more information please write to: pulariecofoundation@gmail.com.<br></td>
    </tr>    
    <tr>
    	<td colspan="4" style="font-size:11px;">Warm Regards,</td>
    </tr>
    <tr>
   	  <td colspan="4" style="font-size:11px;">Shravan Srikumar<br>Founder and Managing Trustee<br></td>
    </tr>
    <tr>
    	<td style="border-top:2px solid #000000;" colspan="4"></td>
    </tr>	
    <tr>
    	<td colspan="4" align="center" style="font-size:15px; font-weight:800;">RECEIPT<br></td>
    </tr>
    <tr>
    	<td width="25%" height="20" style="font-size:10px;"><b>Donor ID:</b></td>
        <td width="25%" style="font-size:10px;">$rs_donors->donor_id</td>
        <td width="25%" style="font-size:10px;"><b>Donor PAN Number:</b></td>
        <td width="25%" style="font-size:10px;">$rs_donors->pan_number</td>
    </tr>				
	<tr>
		<td width="25%" style="font-size:10px;"><b>Donor Aadhaar Number:</b></td>
        <td width="25%" style="font-size:10px;">$rs_donors->aadhaar_number</td>
		<td width="25%" height="20" style="font-size:10px;"><b>Receipt No:</b></td>
        <td width="25%" style="font-size:10px;">$rs_donors->receipt_no</td>        															
	</tr>						
	<tr>
		<td width="25%" height="20" style="font-size:10px;"><b>Receipt Date:</b></td>
        <td width="25%" style="font-size:10px;">$receipt_date</td>
		<td width="25%" style="font-size:10px;"><b>Received With Thanks<br>From</b></td>
        <td width="25%" style="font-size:10px;">$rs_donors->name</td>															
	</tr>
    <tr>    	
        <td width="25%" height="20" style="font-size:10px;"><b>Amount in words:</b></td>
        <td width="25%" style="font-size:10px;">$amount</td>
		<td width="25%" style="font-size:10px;"><b>Mode of transfer:</b></td>
        <td width="25%" style="font-size:10px;">$rs_donors->mode_of_payment</td>
    </tr>
    <tr>
    	<td width="25%" height="20" style="font-size:10px;"><b>Transaction Number:</b></td>
        <td width="25%" style="font-size:10px;">$rs_donors->transaction_number</td>
        <td width="25%" style="font-size:10px;"><b>Dated:</b></td>
        <td width="25%" style="font-size:10px;">$donation_date</td>
    </tr>
	<tr><td colspan="4"></td></tr>
	<tr><td colspan="4"></td></tr>
</table>
<table width="100%" style="border: 1px solid #cccccc;">
	<tr>
    	<td colspan="4" style="font-size:13px; font-weight:800; border: 1px solid #cccccc;">&nbsp;Towards</td>
    </tr>
    <tr>
    	<td colspan="3" style="font-size:12px; border: 1px solid #cccccc;">&nbsp;Green Coimbatore/Green Corridors/Animal Welfare</td>
        <td style="font-size:12px; border: 1px solid #cccccc;">&nbsp;INR&nbsp;&nbsp;$rs_donors->amount.00</td>
    </tr>
</table>
<table width="100%">
	<tr>
    	<td colspan="2"></td>
	</tr>
	<tr>
    	<td colspan="2"></td>
	</tr>		
    <tr>
    	<td height="20" colspan="2" align="center" style="font-size:10px;">Donations made to Pulari Eco Foundation are exempted u/s 80G, vide provisional approval no. AAFTP2703GF20231. Approval valid from 25-05-2023 to AY 2026-2027<br></td>
    </tr>
    <tr>
    	<td height="20" colspan="2" align="center" style="font-size:10px;">PAN - AAFTP2703G</td>
    </tr>    
    <tr>
    	<td height="20" colspan="2" align="center" style="font-size:9px;">This is a computer generated receipt - does not require signature.</td>
    </tr>
</table>
</div>
EOD;
// echo $html; exit;
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

// Mail for donors
$subject = "Bill Receipt from Pulari Eco Foundation";
$from = "receipts.pulariecofoundation@gmail.com";
$replyto = $rs_donors->email_address;
$to = $rs_donors->email_address;

$logo = "<img src='".$GLOBALS['admin_webroot']."images/".$GLOBALS['site_logo']."'>";

$content = "<p>".$logo."</p>";	
$content.= "<p>Dear ".$rs_donors->name.",</p>";
$content.= "<p>Thankyou for your generosity and we sincerely appreciate your gesture in joining hands with Pulari Eco Foundation to a new dawn of hope.</p>";
$content.= "<p>And we have attached the bill receipt.</p>";
$content.= "<p>Thanks & Regards,<br>";
$content.= "<b>Pulari Eco Foundation</b></p>";

$mail = new htmlMimeMail();
$mail->setHTML($content);
$mail->setFrom($from, $GLOBALS['sitename']);
$mail->setBcc("dhayalan1127@gmail.com");
$mime_type = "application/msword";
	
if ($filename != '') {
	$attachment = $mail->getFile("../uploads/receipts/".$filename);
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

// Mail for admin
$subject1 = "Bill Receipt for ".$rs_donors->name;
$from1 = $rs_donors->email_address;
$replyto1 = $rs_donors->email_address;
$to1 = "receipts.pulariecofoundation@gmail.com";

$logo = "<img src='".$GLOBALS['admin_webroot']."images/".$GLOBALS['site_logo']."'>";

$content1 = "<p>".$logo."</p>";	
$content1.= "<p>Dear Admin,</p>";
$content1.= "<p>The receipt has been generated and sent mail to <b>".$rs_donors->name."</b> donors.</p>";
$content1.= "<p><b>Donor ID:</b> ".$rs_donors->donor_id."</p>";
$content1.= "<p><b>Receipt No:</b> ".$rs_donors->receipt_no."</p>";
$content1.= "<p><b>Email Address:</b> ".$rs_donors->email_address."</p>";
$content1.= "<p><b>Phone Number:</b> ".$rs_donors->phone_number."</p>";
$content1.= "<p>Thanks,<br>";
$content1.= "<b>Pulari Eco Foundation</b></p>";

$mail1 = new htmlMimeMail();
$mail1->setHTML($content1);
$mail1->setFrom($from1, $GLOBALS['sitename']);
$mail1->setBcc("dhayalan1127@gmail.com");
$mime_type = "application/msword";
	
if ($filename != '') {
	$attachment = $mail1->getFile("../uploads/receipts/".$filename);
	$mail1->addAttachment($attachment, $filename, $mime_type);
}

$mail1->setSubject($subject1);
if($replyto1==""){
	$replyto1 = $from1;
}
$mail1->setHeader("Reply-To", $replyto1);

if($to1!='') {
	$ok =$mail1->send(array($to1));
}
header("location:donations.php?act=mail_sent");