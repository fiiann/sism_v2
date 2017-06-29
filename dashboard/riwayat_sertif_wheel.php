<!DOCTYPE html>
<html>
<head>
	<title>Daftar Mekanik</title>
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
	<h3>Experience Mekanik</h3>
  <h6 align='right'><a href="input_sertifikasi.php"><button class="btn btn-info">Tambah Riwayat </button></a></h6>

	<table id="tabelku" class="table trooable-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Materi</th>
            <th>Tanggal Lulus</th>
            <th>Point</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="hasil">
    <?php
	// Assign a query
	// -- $query = "SELECT * FROM mekanik m INNER JOIN section s ON m.id_section=s.id_section WHERE m.id_section=1 ORDER BY nama_mekanik ";
	// $query1 = "SELECT count(mekanik1) as jumlah FROM work_order WHERE mekanik1='KA08046'";
	$query = "SELECT * from sertifikasi s INNER JOIN mekanik m ON s.id_mekanik=m.id_mekanik WHERE s.id_sec=1";
	// Execute the query
	$result = $con->query( $query );


	$i=1;
	while($row = $result->fetch_object()){

		echo "<tr align='center'>";
		echo "<td align='center'>".$i."</td>";$i++;

		echo "<td>".$row->nama_mekanik."</td>";
    echo "<td>".$row->materi."</td>";
    echo "<td>".$row->tanggal."</td>";
    echo "<td>".$row->poin."</td>";
		echo "<td align='center'><a href='delete_mekanik.php?id=".$row->id_mekanik."'><i class='fa fa-book'></i></a>&nbsp<a href='edit_sertifikasi.php?id=".$row->id_sertifikasi."'><i class='fa fa-edit'></i></a>&nbsp</td>";
	}
	?>
    </tbody>
	</table>

	<?php
	mysqli_close($con);

?>
</body>
</html>
