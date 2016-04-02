<?php
	require_once('includes/init.php');
	confirm_logged_in();
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome to your CMS</title>
</head>
<body>
<h2>Welcome <?php //echo $_SESSION['user_name']; ?> to your CMS...</h2>
<a href="admin_createUser.php">Create User</a>
<a href="admin_editUser.php">Edit My Account</a>
<a href="admin_deleteUser.php">Delete User</a>
<a href="admin_addMovie.php">Add Movie</a>
<a href="includes/caller.php?caller_id=logout">Sign Out</a>
</body>
</html>