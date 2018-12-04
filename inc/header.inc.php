
<?php 
include("./inc/connect.inc.php");
session_start();
if (!isset($_SESSION["user_login"])){
}
else
{
	$username = $_SESSION["user_login"];
}
?>
<!DOCTYPE html>
<html>
	<head>
		
		<title>Encounterwireless | 2018</title>
		<link rel="stylesheet" type="text/css" href="./css/style.css" />
	</head>
<body>

	<div class="headerMenu">
		<div id="wrapper">
			<div class="logo">
				<img src="./img/enc.png" />
			</div>
			<div class="search_box">
			<form action="search.php" method="GET" id="search">
				<input type="text" name="q" size="50" placeholder="search..."/>
			</form>
			</div>
			<div id="menu">
				<a href="#" />Home</a>
				<a href="#" />About</a>
				<a href="#" />Log in</a>
				<a href="#" />Sign up!</a>
			
			</div>
		</div>
	</div>
	
