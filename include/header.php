<?php session_start();
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale.0">
<meta http-equiv="x-UA-compatible" content="ie=edge">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Bright C Web Developer</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script
src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script
>
<link rel="stylesheet" type="text/css"
href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script src="https://kit.fontawesome.com/0560d0caf7.js"></script>

</head>
<body>
<?php include("function/function.php");
include("useripaddress/userip.php"); 
include("actions/refresh_count.php"); ?>