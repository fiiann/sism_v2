<?php
	require_once('connect.php');
	$db=new mysqli($db_host, $db_username, $db_password, $db_database);

	if($db->connect_errno){
		die("Could not connect to the database : <br/>". $db->connect_error);
	}
	$id2 = $_POST["id2"];
	$queryskat = "select * from mekanik s where s.id_section='".$id2."'";
	$resultskat = $db->query($queryskat);
	if(!$resultskat){
		die("Could not connect to the database : <br/>". $db->connect_error);
	}
		while ($row = $resultskat->fetch_object()){ 
			$skid = $row->id_mekanik; 
			$skname = $row->nama_mekanik; 
			echo '<option value='.$skid.' '; 
			echo '>'.$skname.'<br/></option>';
		} 
?>