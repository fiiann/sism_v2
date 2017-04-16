<?php
	require_once('connect.php');;
	$db=new mysqli($db_host, $db_username, $db_password, $db_database);

	if($db->connect_errno){
		die("Could not connect to the database : <br/>". $db->connect_error);
	}
	$id5 = $_POST["id5"]; //job
	$id6 = $_POST["id6"]; //section
	$id7 = $_POST["id7"]; //unit
	$queryskat = "select * from job_detail j where j.id_job='".$id5."' AND j.id_section='".$id6."' AND j.id_sub='".$id7."'";
	$resultskat = $db->query($queryskat);
	if(!$resultskat){
		die("Could not connect to the database : <br/>". $db->connect_error);
	}
		while ($row = $resultskat->fetch_object()){ 
			$skid = $row->id_jobdetail; 
			$skname = $row->nama_detail; 
			echo '<option value='.$skid.' '; 
			echo '>'.$skname.'<br/></option>';
		}

?>