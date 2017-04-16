<!DOCTYPE html>
<html>
<head>
	<title>Experience Mekanik Track</title>
	<script src="assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
	<!-- <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
	<script type="text/javascript" src="http://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script> -->
	<link rel="stylesheet" type="text/css" href="assets/css/datatables.min.css">
	<script src="assets/js/datatables.js" type="text/javascript"></script>
</head>
<script type="text/javascript">
	$(document).ready(function(){
    $('#tabelku').DataTable();
});
</script>
<?php		
	include_once('sidebar.php');
	$id=$_SESSION['sip_masuk_aja'];
	// require_once('db_login.php');
		$db=new mysqli($db_host, $db_username, $db_password, $db_database);
?>
<body>
	<h3>Experience Mekanik Track</h3>
	<table id="tabelku" class="table trooable-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama</th>
            <!-- <th>Section</th> -->
            <th>Lihat Experience</th>
            <th>Jumlah Experience</th>
        </tr>
    </thead>
    <tbody id="hasil">
    <?php
	// Assign a query
	// $query = "SELECT * FROM mekanik m INNER JOIN section s ON m.id_section=s.id_section WHERE m.id_section=2 ORDER BY nama_mekanik ";
	$query = "SELECT *, COUNT(*) as jumlah from work_order w INNER JOIN mekanik m ON w.mekanik1=m.id_mekanik WHERE m.id_section='2' GROUP BY w.mekanik1";
	// Execute the query
	$result = $con->query( $query );
		if(!$result){
			die('Could not connect to database : <br/>'.$con->error);
		}
	$i=1;
	while($row = $result->fetch_object()){
		echo "<tr>";
		echo "<td align='center'>".$i."</td>";$i++;
		echo "<td>".$row->id_mekanik."</td>";
		echo "<td>".$row->nama_mekanik."</td>";
		// echo "<td align='center'>".$row->nama_section."</td>";
		echo "<td align='center'><a href='datatable.php?id_mekanik=".$row->id_mekanik."'><button class='btn btn-info'>Lihat Detail</button></a>&nbsp;<a href='experience.php?id_mekanik=".$row->id_mekanik."'><button class='btn btn-info'>Lihat Exp</button></a></td>";
		echo "<td align='center'>".$row->jumlah."</td>";
		echo "</tr>";
	}			
	?>	
    </tbody>
	</table>

	<?php 
	mysqli_close($con);
	
?>
</body>
</html>