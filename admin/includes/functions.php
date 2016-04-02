<?php
	function redirect_to($location) {
		if($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}
	
	function submitMessage($direct, $name, $email, $message) {
			$to = "address";
			$subj = "Message From Customer submitted via site.com";
			$extra = $email."\r\nReply-To: ".$email."\r\n";			
			$msg = "Name: ".$name."\n\nEmail address: ".$email."\n\nComments: ".$message;
			$go = mail($to,$subj,$msg,$extra);
			$direct = $direct."?name={$name}";
			redirect_to($direct);
	}
	
	function addMovie($fimg, $thumb, $title, $year, $storyline, $runtime, $trailer, $price, $cat){
	include('connect.php');
	//$fimg = mysqli_real_escape_string($link, $fimg);
	
	//echo $_FILES['movie_fimg']['name']."<br><br>";
	//echo $_FILES['movie_fimg']['type']."<br><br>";
	//echo $_FILES['movie_fimg']['tmp_name']."<br><br>";
	
	if($_FILES['movie_fimg']['type'] == "image/jpeg" || $_FILES['movie_fimg']['type'] == "image/jpg") {
		//echo "you win";
		$targetpath = "../images/{$fimg}";
		
		if(move_uploaded_file($_FILES['movie_fimg']['tmp_name'],$targetpath)) {
			
			$orig = "../images/{$fimg}";
			$th_copy = "../images/{$thumb}";
			
			if(!copy($orig, $th_copy)) {
				echo "Failed to copy.";
			}
			
			//$size = getimagesize($orig);
			//echo $size[0]." x ".$size[1];
			
$qstring = "INSERT INTO tbl_movies VALUES(NULL,'{$thumb}','{$fimg}','noBG.jpg','{$title}','{$year}','{$storyline}','{$runtime}','{$trailer}','{$price}')";
echo $qstring;
			//$result = mysqli_query($link, $qstring);
			
		}
	}
	
	mysqli_close($link);
	}
	
?>