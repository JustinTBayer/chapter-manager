<?php
require_once ('layout.php');
require_once ('mysql_access.php');
//page_head();
//echo"<body style=\"background-color:#EBEBEB\" OnLoad=\"document.loginform.username.focus();\">";
page_header();
echo "<div class='content'>";
function print_login($error){
	$error_message = "";
	if ($error) {
		$error_message = "<font color='red'>Your submitted the wrong username or password. Please try again or contact the webmaster.  If you forgot your password, go here: <a href='login_forgotpw.php'> Forgot Password</a></font><br/>";
	}
	if(isset($_GET['continue'])){
		// leave commented if PHP version >= 5.4 session_register('continue');
		$_SESSION['continue'] = $_GET['continue'];}
		$continue = $_SESSION['continue'];
echo <<<END
	<table>
	<h1>Member Login</h1>
	<p>$error_message Please log in if you belong to Epsilon and have an account.  If you do not have an account, please contact the webmaster for the registration password and <a color="#FFFF00" href='register.php'>sign up</a>.  If you forgot your password, go here: <a href='login_forgotpw.php'> Forgot Password</a>	
	</p>
			<form name="loginform" method="post" action="$_SERVER[PHP_SELF]">
			<tr>
			<td width="40%">Username:</td><td width="60%"><input type="text" name="username"/></td>
			</tr>
			<tr>
			<td width="40%">Password:</td><td width="60%"><input type="password" name="password"/></td>
			</tr>
			<tr>
			<td float="right"><input type="submit" value="Login"/></td>
			</tr>
			<input type="hidden" name="logstate" value="login"/>
	</form>
	</table>
END;
	echo($_SESSION['continue']);
}
function process_login(){
	$username = addslashes($_POST["username"]);
	$password = addslashes($_POST["password"]);

	$select = "SELECT *
	FROM contact_information
	WHERE username='$username' AND password= '$password'";
	$query = mysql_query($select) or die("If you encounter problems, please contact the webmaster: apo.epsilon.webmaster@gmail.com");
	$r = mysql_fetch_array($query);
	if (!$r) {
		print_login(1);
		exit();
	} 
	if (!$r) {
		print_login(1);
	} else {
	extract($r);
	
	// leave commented if PHP version >= 5.4 session_register('sessionUsername');
	// leave commented if PHP version >= 5.4 session_register('sessionFirstname');
	// leave commented if PHP version >= 5.4 session_register('sessionLastname');
	// leave commented if PHP version >= 5.4 session_register('sessionexec');
	// leave commented if PHP version >= 5.4 session_register('sessionposition');
	// leave commented if PHP version >= 5.4 session_register('sessionID');	
	// leave commented if PHP version >= 5.4 session_register('active_sem');
	// leave commented if PHP version >= 5.4 session_register('sessionStatus');
	$_SESSION['sessionUsername'] = $username;
	$_SESSION['sessionFirstname'] = $firstname;
	$_SESSION['sessionLastname'] = $lastname;
	$_SESSION['sessionposition'] = $position;
	$_SESSION['sessionexec'] = $exec;
	$_SESSION['sessionID'] = $id;	
	$_SESSION['active_sem'] = $active_sem;
	$_SESSION['sessionStatus'] = $status;
	
	//Psuedo webmaster User_id 378
	if($id==378){
		$_SESSION['sessionposition'] = "Webmaster";
		$_SESSION['sessionexec'] = 1;
	}
	

	$sql = "SELECT * FROM `contact_information` 
			WHERE `lastname` = '".$lastname."' 
			AND `firstname` = '".$firstname."' 
			AND `username` = '".$username."'";
	$result = mysql_query($sql);
		while($row = mysql_fetch_array($result)){ 
			$visited = $row['visited'];}
			
		echo('<meta HTTP-EQUIV="REFRESH" content="0; url=http://localhost/">');//}
		
	}
}

function logout(){
      	unset($_SESSION['sessionUsername']);
      	unset($_SESSION['sessionFirstname']);
		unset($_SESSION['sessionLastname']);
		unset($_SESSION['sessionposition']);
		unset($_SESSION['sessionexec']);
		unset($_SESSION['sessionID']);
}
	if (!isset($_SESSION['sessionID']) && isset($_POST['logstate']) && ($_POST['logstate'] == 'login')) { 
    	process_login(); 
	}else if (!isset($_SESSION['sessionID'])){
		print_login(); 
	}else {		
	}
echo "</div>";
page_footer();
?>

