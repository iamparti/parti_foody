<?php 

session_start();
$currency="₹";
$host="localhost";
$domain="http://localhost/foody/";
$site_name="Foody By Partibha";
$db_user="root";
$db_name="foodydb";
$db_pass="";



//Email config
$smtp_username="foody@partibha.ml";
$smtp_port="587";
$smtp_server="smtp.hostinger.in";
$smtp_type="tls";
$smtp_password="^6yOJbKH@ouZ";


date_default_timezone_set("Asia/Kolkata");

$conn=mysqli_connect($host,$db_user,$db_pass,$db_name) or die("Connection Failed: ".mysqli_error());




?>