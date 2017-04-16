<!DOCTYPE html>
<html>
<head>
	<title>Experience Detail</title>
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
	$id_mekanik = $_GET['id_mekanik'];

	include_once('sidebar.php');
	$id=$_SESSION['sip_masuk_aja'];
	// require_once('db_login.php');
	$db=new mysqli($db_host, $db_username, $db_password, $db_database);
// Assign the query
// $query = " SELECT * FROM mekanik m INNER JOIN work_order w ON m.id_mekanik=w.mekanik1  WHERE id_mekanik='".$id_mekanik."'";
	$query = "SELECT * FROM mekanik m INNER JOIN work_order w ON m.id_mekanik=w.mekanik1 INNER JOIN sub_section s ON w.id_sub=s.id_sub INNER JOIN main_job mj on mj.id_job=w.id_job INNER JOIN job_detail jd ON jd.id_jobdetail=w.id_detailjob WHERE w.mekanik1='".$id_mekanik."'";
	// $queryDua = "SELECT count(mekanik1) as jumlah FROM work_order w WHERE id_mekanik='".$id_mekanik."'";
	$result = $db->query($query);
	// $resultDua = $db->query($queryDua);

// Execute the query

?>
<body>
	<table id="tabelku" class="table trooable-striped table-bordered table-hover">
		<thead>
			<th>No</th>
			<!-- <th>Id Mekanik</th> -->
			<!-- <th>Nama Mekanik</th> -->
			<th>No Work Order</th>
			<th>Unit</th>
			<th>job</th>
			<th>Detail Job</th>
			<th>Deskripsi</th>
			<th>Tanggal</th>
			<!-- <th>Exp</th> -->
		</thead>
		<tbody>
				<?php
					$i=1;
					while($row = $result->fetch_object()){
								echo "<tr>";
								echo "<td align='center'>".$i."</td>";$i++;
								// echo "<td>".$row->id_mekanik."</td>";
								// echo "<td>".$row->nama_mekanik."</td>";
								// echo "<td>Wheel</td>";
								echo "<td>".$row->nowo."</td>";
								echo "<td>".$row->nama_sub."</td>";
								echo "<td>".$row->nama_job."</td>";
								echo "<td>".$row->nama_detail."</td>";
								echo "<td>".$row->deskripsi."</td>";
								echo "<td align='center'>".$row->tanggal."</td>";
								// echo "<td>".$rowDua->jumlah."</td>";
								echo "</tr>"; 
								$nama=$row->nama_mekanik;
								$id=$row->id_mekanik;
								// $idmekanik = $row->id_mekanik;

							}
							echo "<h4>Nama Mekanik : ".$nama."</h4>";
							// echo "</br>";
							echo "<h5>Kode Mekanik : ".$id."</h5>";			
				?>
			</tr>
		</tbody>
	</table>
	<?php 
	mysqli_close($con);
	
?>
</body>
</html>