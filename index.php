<?php include ("./inc/header.inc.php"); ?>

<?php 
$reg = @$_POST['reg'];
//declare variables
$fn = ""; //first name
$ln = ""; //last name
$un = ""; //username
$em = ""; //email
$pswd = ""; //password
$d = ""; //sign up date
$u_check = ""; //check if username exists
//registration form
$fn = strip_tags(@$_POST['fname']);
$ln = strip_tags(@$_POST['lname']);
$un = strip_tags(@$_POST['username']);
$em = strip_tags(@$_POST['email']);
$pswd = strip_tags(@$_POST['password']);
$d = date("Y-m-d");




if ($reg) {
	//$u_check = mysqli_query($con, "SELECT username FROM users WHERE username='$un'");
	//$check = mysqli_num_rows($u_check); //this function isn't working
	//if ($u_check == 0) {
		if ($fn&&$ln&&$un&&$em&&$pswd){
			if (strlen($un)>25||strlen($fn)>25||strlen($ln)>25){
				echo "The maximum limit for username/first name/last name is 25 characters";
			}
			else
			{
				if (strlen($pswd)>30||strlen($pswd)<5){
					echo "Password must be between 5 and 30 characters long!";
				}
				else{
					$pswd = md5($pswd);
					$query = mysqli_query($con, "INSERT INTO users VALUES ('', '$un', '$fn', '$ln', '$em', '$pswd', '$d', '0')");
					die("<h2>Welcome to encounter file sharing!</h2>Login to your account to get started ...");
				}
			}
		}
	//}
}

// User Login Code

if (isset($_POST["user_login"])&& isset($_POST["password_login"])){
	$user_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["user_login"]);
	$password_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password_login"]);
	$password_login_md5 = md5($password_login);
$sql = mysqli_query($con, "SELECT id FROM users WHERE username='$user_login' AND password='$password_login_md5' LIMIT 1");

	$userCount = mysqli_num_rows($sql);
		if ($userCount == 1){
			while($row = mysqli_fetch_array($sql)){
				$id = $row["id"];
		}
				$_SESSION["user_login"] = $user_login;
				header("location: home.php");
				exit();
		}
		else{
			echo 'Incorrect Username/Password';
			exit();
		}
}
?>
	<div style="width: 600px; margin: 0px auto 0px auto;">
	<table>
		<tr>
			<td width="160%" valign="top">
				<h2>Already a member? Sign in below! </h2>
				<form action="index.php" method="POST">
					<input type="text" name="user_login" size="25" placeholder="Username"/><br /> <br />
					<input type="text" name="password_login" size="25" placeholder="Password"/><br /> 
					<input type="submit" name="login" size="25" placeholder="Login"/><br /><br />
			</td>
			<td width="40%" valign="top">
				<h2>Sign Up Below!</h2>
				<form action="#" method="POST">
				<input type="text" name="fname" size="25" placeholder="First Name" /><br /><br />
				<input type="text" name="lname" size="25" placeholder="Last Name" /><br /><br />
				<input type="text" name="username" size="25" placeholder="Username" /><br /><br />
				<input type="text" name="email" size="25" placeholder="Email" /><br /><br />
				<input type="text" name="password" size="25" placeholder="Password" /><br /><br />
				<input type="submit" name="reg" value="Create Account" />
				</form>
			</td>
		</tr>
	</table>
<?php include ("./inc/footer.inc.php"); ?>