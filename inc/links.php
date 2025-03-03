<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
<link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<?php
session_start();
require('admin/inc/essentials.php');
require('admin/inc/db_config.php');

$contact_q="SELECT * from `contact_details` where `sr_no`=?";
$settings_q="SELECT * from `settings` where `sr_no`=?";
$values=[1];
$contact_r = mysqli_fetch_assoc(select($contact_q,$values,"i"));
$settings_r = mysqli_fetch_assoc(select($settings_q,$values,"i"));
    
?>
