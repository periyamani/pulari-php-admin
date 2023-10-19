<?php 
function post_img($fileName,$tempFile,$targetFolder)
{	
 	if ($fileName!="")
	{
		if(!(is_dir($targetFolder)))
			mkdir($targetFolder);
		$counter=0;
		$NewFileName=$fileName;
		if(file_exists($targetFolder."/".$NewFileName))
		{
			do
			{ 
				$counter=$counter+1;
				$NewFileName=$counter."".$fileName;
			}
			while(file_exists($targetFolder."/".$NewFileName));
		}
		//$NewFileName=str_replace(",","-",$NewFileName);
		//$NewFileName=str_replace(" ","_",$NewFileName);	
		copy($tempFile, $targetFolder."/".$NewFileName);	
		return $NewFileName;
	}
}

function ImgCrop($sorce_url,$target_url, $dst_width, $dst_height) {//support
	$type = getimagesize($sorce_url);
	if ($type[2] == "2") {
		$image = imagecreatefromjpeg($sorce_url);
	} else if ($type[2]=="1"){
		$image=imagecreatefromgif($sorce_url);
	} else if ($type[2]=="3") {
		$image=imagecreatefrompng($sorce_url);
		imagealphablending($image, true);
	}
	$filename = $target_url;
	$width = imagesx($image);
	$height = imagesy($image);
	$image_type = imagetypes($image); //IMG_GIF | IMG_JPG | IMG_PNG | IMG_WBMP | IMG_XPM
	$thumb_width = $dst_width;
	$thumb_height = $dst_height;
	$original_aspect = $width / $height;
	$thumb_aspect = $thumb_width / $thumb_height;
	if ( $original_aspect >= $thumb_aspect ) {
		// If image is wider than thumbnail (in aspect ratio sense)
		$new_height = $thumb_height;
		$new_width = $width / ($height / $thumb_height);
	} else {
		// If the thumbnail is wider than the image
		$new_width = $thumb_width;
		$new_height = $height / ($width / $thumb_width);
	}
	$thumb = imagecreatetruecolor( $thumb_width, $thumb_height ); 
	if ($type[2]=="3") {
		imagealphablending($thumb, true);
	}
	// Resize and crop
	imagecopyresampled($thumb,
	$image,
	0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
	0 - ($new_height - $thumb_height) / 2, // Center the image vertically
	0, 0,
	$new_width, $new_height,
	$width, $height);
	if ($type[2] == "2") {
		imagejpeg($thumb, $filename, 100);
	} else if ($type[2]=="1"){
		imagegif($thumb, $filename, 100);
	} else if ($type[2]=="3") {
		imagesavealpha($thumb, true);
		imagepng($thumb,$filename);
	}
	imagedestroy($sorce_url); 
	imagedestroy($target_url);
}
function drawSingleDropdown($tablename, $fieldname, $itemname, $selected, $displayname, $classname, $mandatory) {
	if($mandatory==1) {
		print "<select class=\"".$classname."\" name=\"".$itemname."\" id=\"".$itemname."\" required=\"".$required."\">\n";
	} else if($mandatory==0) {
		print "<select class=\"".$classname."\" name=\"".$itemname."\" id=\"".$itemname."\">\n";
	}
	if($displayname!='') {
		print "<option value=\"\">".$displayname."</option>\n"; 
	}
	$sql = "SELECT * FROM ".$tablename." WHERE status = 1 ORDER BY display_order, ".$fieldname;
	$result = mysqli_query($GLOBALS['conn'],$sql);	
	while($query_data = mysqli_fetch_array($result)) {
		if ($selected == $query_data["id"]) {
			print "<option value=\"".$query_data["id"]."\" SELECTED>".str_replace('&','&amp;',ucfirst($query_data[$fieldname]))."</option>\n";
		} else {
			print "<option value=\"".$query_data["id"]."\">".str_replace('&','&amp;',ucfirst($query_data[$fieldname]))."</option>\n";
		}
	}
	print "<select>";
}
define('SALT_LENGTH', 9);
function generateHash($plainText, $salt = null) {
	if ($salt === null) {
		$salt = substr(md5(uniqid(rand(), true)), 0, SALT_LENGTH);
	} else {
		$salt = substr($salt, 0, SALT_LENGTH);
	}
	return $salt . sha1($salt . $plainText);
}
function getUserDetails($up_id) {
	$select_user_details = mysqli_query($GLOBALS['conn'], "SELECT * FROM user_profiles WHERE id='".$up_id."' AND status=1 AND deleted=0");
	$rs_user_details = mysqli_fetch_object($select_user_details);
	return $rs_user_details;
}
function numberTowords($num) {
	$ones = array(
	0 =>"ZERO",
	1 => "ONE",
	2 => "TWO",
	3 => "THREE",
	4 => "FOUR",
	5 => "FIVE",
	6 => "SIX",
	7 => "SEVEN",
	8 => "EIGHT",
	9 => "NINE",
	10 => "TEN",
	11 => "ELEVEN",
	12 => "TWELVE",
	13 => "THIRTEEN",
	14 => "FOURTEEN",
	15 => "FIFTEEN",
	16 => "SIXTEEN",
	17 => "SEVENTEEN",
	18 => "EIGHTEEN",
	19 => "NINETEEN",
	"014" => "FOURTEEN"
	);
	$tens = array( 
	0 => "ZERO",
	1 => "TEN",
	2 => "TWENTY",
	3 => "THIRTY", 
	4 => "FORTY", 
	5 => "FIFTY", 
	6 => "SIXTY", 
	7 => "SEVENTY", 
	8 => "EIGHTY", 
	9 => "NINETY" 
	); 
	$hundreds = array( 
	"HUNDRED", 
	"THOUSAND", 
	"MILLION", 
	"BILLION", 
	"TRILLION", 
	"QUARDRILLION" 
	); /*limit t quadrillion */
	$num = number_format($num,2,".",","); 
	$num_arr = explode(".",$num); 
	$wholenum = $num_arr[0]; 
	$decnum = $num_arr[1]; 
	$whole_arr = array_reverse(explode(",",$wholenum)); 
	krsort($whole_arr,1); 
	$rettxt = ""; 
	foreach($whole_arr as $key => $i) {	
		while(substr($i,0,1)=="0")
			$i=substr($i,1,5);
		if($i < 20) { 
			/* echo "getting:".$i; */
			$rettxt .= $ones[$i]; 
		} elseif($i < 100) { 
			if(substr($i,0,1)!="0") $rettxt .= $tens[substr($i,0,1)]; 
			if(substr($i,1,1)!="0") $rettxt .= " ".$ones[substr($i,1,1)]; 
		} else { 
			if(substr($i,0,1)!="0") $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
			if(substr($i,1,1)!="0")$rettxt .= " ".$tens[substr($i,1,1)]; 
			if(substr($i,2,1)!="0")$rettxt .= " ".$ones[substr($i,2,1)]; 
		} 
		if($key > 0) { 
			$rettxt .= " ".$hundreds[$key]." "; 
		}
	} 
	if($decnum > 0) {
		$rettxt .= " and ";
		if($decnum < 20) {
			$rettxt .= $ones[$decnum];
		} elseif($decnum < 100) {
			$rettxt .= $tens[substr($decnum,0,1)];
			$rettxt .= " ".$ones[substr($decnum,1,1)];
		}
	}
	return $rettxt;
} ?>