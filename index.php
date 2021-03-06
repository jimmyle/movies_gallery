<?php
	
	ini_set('display_errors',1);
    error_reporting(E_ALL);
	
	// Setup connections and gain access to all of functions
	require_once('admin/includes/init.php');
	// Define globals and call in info from db
	if(isset($_GET['filter'])) {
		$tbl1 = "tbl_movies";
		$tbl2 = "tbl_cat";
		$tbl3 = "tbl_L_mc";
		$col1 = "movies_id";
		$col2 = "cat_id";
		$col3 = "cat_name";
		$filter = $_GET['filter'];
		$getMovies = filterType($tbl1, $tbl2, $tbl3, $col1, $col2, $col3, $filter);
	}else{
		$tbl = "tbl_movies";
		$getMovies = getAll($tbl);
	}
	
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome to the Finest Selection of Blu-rays on the internets!</title>

<link href="css/main.css" rel="stylesheet" type="text/css">

<link href="css/foundation.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/foundation.min.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/normalize.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/reset.css" rel="stylesheet" type="text/css" media="screen">

<link href='https://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Lora:700' rel='stylesheet' type='text/css'>
</head>
<body>
<?php

	include('includes/nav.html');
	
	if(!is_string($getMovies)){
		while($row = mysqli_fetch_array($getMovies)){
			echo "<img src=\"images/{$row['movies_thumb']}\" alt=\"{$row['movies_title']}\">
				 <h2>{$row['movies_title']}</h2>
				 <p>{$row['movies_year']}</p><br>
				 <a href=\"details.php?id={$row['movies_id']}\">More...</a><br><br>";
		}
	}else{
		echo "<p>{$getMovies}</p>";
	}
	
	include('includes/footer.html');
	
?>
</body>
</html>
