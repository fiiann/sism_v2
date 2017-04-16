<?php
	require_once('connect.php');
	$db=new mysqli($db_host, $db_username, $db_password, $db_database);

	if($db->connect_errno){
		die("Could not connect to the database : <br/>". $db->connect_error);
	}
	$id = $_POST["id"];
	$queryskat = "select * from sub_section s where s.id_sec='".$id."'";
	$resultskat = $db->query($queryskat);
	if(!$resultskat){
		die("Could not connect to the database : <br/>". $db->connect_error);
	}
		while ($row = $resultskat->fetch_object()){ 
			$skid = $row->id_sub; 
			$skname = $row->nama_sub; 
			echo '<option value='.$skid.' '; 
			echo '>'.$skname.'<br/></option>';
		} 
?>