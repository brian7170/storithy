<?php
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$conn_error = 'could not connect';
$mysql_db = 'encounter';
$con = mysqli_connect($mysql_host, $mysql_user, $mysql_pass);

mysqli_select_db($con, $mysql_db);

//echo 'Connected';

?>