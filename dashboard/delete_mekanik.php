<script type="text/javascript">

            function myFunction() {
                confirm("Apakah anda yakin?");
            }
</script>
<?php
$id = $_GET['id'];
include_once('sidebar.php');
if($status=="anggota"){
		header('Location:./index.php');
	}
// Assign the query
$query = " SELECT * FROM mekanik WHERE id_mekanik='".$id."'";
// Execute the query
$result = $con->query($query);
$row = $result->fetch_object();

		echo '<table border="0">';
			echo '<tr>';
				echo '<td>Nama</td>';
				echo '<td> : '.$row->nama_mekanik.'</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td>ID</td>';
				echo '<td> : '.$row->id_mekanik.'</td>';
			echo '</tr>';
		echo '</table>';
		echo '<br />';

    // echo '<a href="delete_mekanik.php"><button onclick="myFunction()" class="btn btn-info">Hapus Data</button></a>';
		echo 'Apakah anda yakin ingin menghapus mekanik ini? <a href="del.php?data=mekanik&id='.$id.'">YA</a> / <a href="daftar_petugas.php">TIDAK</a>';
		$con->close();
?>
<?php
	include_once('footer.php');
?>
