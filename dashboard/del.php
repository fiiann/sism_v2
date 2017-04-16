<?php
require_once('sidebar.php');
if($status=="anggota"){
		header('Location:./index.php');
	}
if(isset($_GET['data'])){
	if($_GET['data']=='buku'){
		$isbn = $_GET['isbn'];
		$query = "SELECT * FROM buku WHERE isbn='".$isbn."'";
		$result = $con->query( $query );
		if(mysqli_num_rows($result)==0){
			echo 'Penghapusan data gagal. Data tidak ditemukan.<br/>';
		}else{
			$query = "DELETE FROM buku WHERE isbn='".$isbn."'";
			$result = $con->query( $query );
			echo 'Data buku berhasil dihapus. <br />';
		}
		echo '<br/><a href="daftar_buku.php">Daftar Buku</a>';
	}elseif($_GET['data']=='mekanik'){
		$id = $_GET['id'];
		$query = "SELECT * FROM mekanik WHERE id_mekanik='".$id."'";
		$result = $con->query( $query );
		if(mysqli_num_rows($result)==0){
			echo 'Penghapusan data gagal. Data tidak ditemukan.<br/>';
		}else{
			$query = "DELETE FROM mekanik WHERE id_mekanik='".$id."'";
			$result = $con->query( $query );
			echo 'Data mekanik berhasil dihapus. <br />';
		}
		echo '<br/><a href="daftar_mekanik.php">Daftar mekanik</a>';
	}elseif($_GET['data']=='petugas'){
		$id = $_GET['id'];
		$query = "SELECT * FROM petugas WHERE idpetugas='".$id."'";
		$result = $con->query( $query );
		if(mysqli_num_rows($result)==0){
			echo 'Penghapusan data gagal. Data tidak ditemukan.<br/>';
		}else{
			$query = "DELETE FROM petugas WHERE idpetugas='".$id."'";
			$result = $con->query( $query );
			echo 'Data petugas berhasil dihapus. <br />';
		}
		echo '<br/><a href="daftar_petugas.php">Daftar Petugas</a>';
	}else{
		echo 'Tidak ada data dihapus.';
	}

}else{
	echo 'Tidak ada data dihapus. Data tidak dikenali.';
}

$con->close();
include_once('footer.php');
?>
