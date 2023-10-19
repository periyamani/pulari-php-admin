<?php
ob_start();
session_start();
error_reporting(0);

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
$GLOBALS['conn']->set_charset('utf8');

global $sitename;
global $webroot;
global $admin_webroot;
global $site_logo;

$sitename = "Pulari Eco Foundation";
$webroot = "https://primepark.co.in/pulari_eco_foundation/";
$admin_webroot = "https://primepark.co.in/pulari_eco_foundation/pef_admin_panel/";
$site_logo = "pulari-site-logo.png"; ?>

