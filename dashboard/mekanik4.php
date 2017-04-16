<?php
	require_once('connect.php');
	$db=new mysqli($db_host, $db_username, $db_password, $db_database);

	if($db->connect_errno){
		die("Could not connect to the database : <br/>". $db->connect_error);
	}
	$id4 = $_POST["id4"];
	$queryskat = "select * from mekanik s where s.id_section='".$id4."'";
	$resultskat = $db->query($queryskat);
	if(!$resultskat){
		die("Could not connect to the database : <br/>". $db->connect_error);
	}
		echo '<option value="none">Pilih mekanik4<br></option>';
		while ($row = $resultskat->fetch_object()){ 
			$skid = $row->id_mekanik; 
			$skname = $row->nama_mekanik; 
			echo '<option value='.$skid.' '; 
			echo '>'.$skname.'<br/></option>';
		} 
?>