<?php
	//DELETE THIS WHEN YOU GO LIVE
	ini_set('display_errors',1);
	error_reporting(E_ALL);
	//////////////////////////////
	
	require_once('includes/init.php');
	$ip = $_SERVER["REMOTE_ADDR"];
	
	if(isset($_POST['submit'])) {
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		//echo $username."<br>".$password;
		if($username != "" && $password != "") {
			$result = logIn($username, $password, $ip);
			$message = $result;
		}else{
			$message = "Please fill in the required fields";	
		}	
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome Company Name</title>
</head>
<body>
Content Management<br><br>
<?php if(!empty($message)){echo $message;} ?>
<form action="admin_login.php" method="post">
	<label>username:</label> 
	<input type="text" name="username" value="">
	<br>
	<label>password:</label>
	<input type="password" name="password" value="">
	<input type="submit" name="submit" value="go">
</form>
</body>
</html>
