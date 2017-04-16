<?php
  ob_start();
  error_reporting(0);
  
	require_once('connect.php');
	
	$con = mysqli_connect($db_host, $db_username, $db_password, $db_database);
	if(mysqli_connect_errno()){
		die('Could not connect to database : <br/>'.$mysqli_connect_error());
	}

	$site_name="SIP";

	date_default_timezone_set("Asia/Jakarta");
					
	session_start();
	
	if(isset($_SESSION['sip_masuk_aja'])){
		if($_SESSION['sip_status']=='petugas'){
			$query = "SELECT * FROM petugas WHERE idpetugas=".$_SESSION['sip_masuk_aja']."";
			$petugas=mysqli_query($con,$query); 
			$petugas=$petugas->fetch_object();
			$status=$_SESSION['sip_status'];
		}else {
			echo "Harap ulangi login";
		}
	}

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	
	
?>
