<?php
include ("./inc/header.inc.php");
?>
<?php
if (isset($_GET['u'])) {
	$username = mysqli_real_escape_string($_GET['u']);
	if (ctype_alnum($username)) {
		//check user exists
		$check = mysqli_query($con, "SELECT username, first_name FROM users WHERE username='$username'");
		if (mysqli_num_rows($check)===1){
			$get = mysqli_fetch_assoc($check);
			$username = $get['username'];
			$firstname = $get['first_name'];
		}
		else
		{
			echo "<h2>User does not exist.</h2>";
			exit();
		}
	}
}

?>
<h2>Profile page for: <? echo "username"; ?></h2>
<h2>First name: <? echo "$firstname"; ?></h2>