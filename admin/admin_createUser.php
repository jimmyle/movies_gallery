<?php
	require_once('includes/init.php');
	//confirm_logged_in();

	if(isset($_POST['submit'])) {
		//echo "this works";
		 $fname = trim($_POST['fname']);
		$lname = trim($_POST['lname']);
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$level = $_POST['lvllist'];
		if(empty($level)) {
			//echo "No user level";
			$message = "Please make sure to set a user level.";
			$autofname = $fname;
			$autolname = $lname;
			$autoname = $username;
			$autopass = $password;
		}else{
			//echo "Form filled out.";	
			$result = createUser($fname, $lname, $username, $password, $level);
			$message = $result;
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Create a User</title>
</head>
<body>
<h2>Create a new user...</h2>
<?php if(!empty($message)){echo $message;} ?>
<form action="admin_createUser.php" method="post">
        <label>User's First Name:</label><br>
       <input type="text" name="fname" value="<?php if(!empty($autofname)){echo $autofname;} ?>"><br><br>
       <label>User's Last Name:</label><br>
       <input type="text" name="lname" value="<?php if(!empty($autolname)){echo $autolname;} ?>"><br><br>
        <label>Create User's Username:</label><br>
       <input type="text" name="username" value="<?php if(!empty($autoname)){echo $autoname;} ?>"><br><br>
       <label>Create User's Password:</label><br>
       <input type="text" name="password" value="<?php if(!empty($autopass)){echo $autopass;} ?>"><br><br>
       <label>Set User's Level:</label><br>
       <select name="lvllist">
            <option value="">Please Select User Level...</option>
             <option value="2">Web Admin</option>
           <option value="1">Web Master</option>
       </select>
       <br><br>
       <input type="submit" name="submit" value="Create User"><br><br>

</form>
<a href="admin_index.php">back</a>


</body>
</html>