<!--
	Tanggal		: 25 November 2016
	Program		: pendaftaran_anggota.php
	Deskripsi	: menambah data anggota pada database
-->
<?php
	require_once('sidebar.php');
	if($status=="anggota"){
			header('Location:./index.php');
		}


	$errorId='';
	$errorNama='';
	$errorSection='';
	$validId='';
	$validNama='';
	$sukses=TRUE;

	// eksekusi tombol edit
	if(!isset($_POST['edit'])){
		if($_GET['id']==""){
			header('Location:./daftar_mekanik.php');
		}
		$id=$_GET['id'];
		$query = " SELECT * FROM mekanik m INNER JOIN section s ON m.id_section=s.id_section WHERE m.id_mekanik='".$id."'";
		// Execute the query
		$result = $con->query( $query );
		if (!$result){
			die ("Could not query the database: <br />". $con->error);
		}else{
			while ($row = $result->fetch_object()){
				$nama=$row->nama_mekanik;
				$id = $row->id_mekanik;
				$section = $row->nama_section;
			}
		}
	}else{
		$idlawas = test_input ($_POST['id']);

		$id = test_input($_POST['id_new']);
		if ($id == ''){
			$errorId = "id mekanik wajib diisi";
			$valid_id = FALSE;
		}else{
			$query = " SELECT * FROM mekanik WHERE id_mekanik='".$id."'";
			$result = $con->query( $query );
			if($result->num_rows!=0 && $id!=$_POST['id']){
				$errorId="ID sudah pernah digunakan, harap masukkan ID lain";
				$validId=FALSE;
			}
			else{
				$validId = TRUE;
			}
		}
		// Cek Nama
		$nama=test_input($_POST['nama']);
		if ($nama=='') {
			$errorNama='wajib diisi';
			$validNama=FALSE;
		}elseif (!preg_match("/^[a-zA-Z ]*$/",$nama)) {
			$errorNama='hanya mengizinkan huruf dan spasi';
			$validNama=FALSE;
		}else{
			$validNama=TRUE;
		}

		// cek alamat
		$section=test_input($_POST['section']);
		if ($section=='') {
			$errorSection='wajib diisi';
			$validSection=FALSE;
		}else{
			$validSection=TRUE;
		}



		// jika tidak ada kesalahan input
		if ($validId && $validNama && $validSection) {
			$id=$con->real_escape_string($id);
			$nama=$con->real_escape_string($nama);
			$section=$con->real_escape_string($section);

			$query = "UPDATE mekanik SET id_mekanik='".$id."', nama_mekanik='".$nama."', id_section='".$section."' WHERE id_mekanik='".$idlawas."'";

			$hasil=$con->query($query);
			if (!$hasil) {
				die("Tidak dapat menjalankan query database: <br>".$con->error);
			}else{
				$berhasil = "Berhasil";
        // echo ;
			}
		}
	}
?>
<div class="row">
	<div class="col-md-6">
		<!-- Form Elements -->
		<div class="panel panel-default">
			<div class="panel-heading">
				Update Data Mekanik <span class="label label-success"><?php if(isset($berhasil)) echo $berhasil;?></span>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12">
						<form method="POST" role="form" autocomplete="on" action="">
							<div class="form-group" hidden>
								<label>ID Mekanik</label>
								<input class="form-control" type="text" name="id" maxlength="14" size="30" placeholder="masukan ID mekanik" required autofocus value="<?php if(isset($id)) echo $id; else echo $_POST['id_new']; ?>" />
							</div>
							<div class="form-group">
								<label>ID Mekanik</label>&nbsp;<span class="label label-warning">*<?php if(isset($errorNim)) echo $errorNim;?></span>
								<input class="form-control" type="text" name="id_new" maxlength="14" size="30" placeholder="masukan ID mekanik" required autofocus value="<?php if(isset($id)) echo $id; else echo $_POST['id_new']; ?>">
							</div>
							<div class="form-group">
								<label>Nama</label>&nbsp;<span class="label label-warning">* <?php if(isset($errorNama)) echo $errorNama;?></span>
								<input class="form-control" type="text" name="nama" maxlength="50" size="30" placeholder="masukan nama" required value="<?php if(isset($nama)){echo $nama;} ?>">
							</div>
							<div class="form-group">
								<label>Section</label>&nbsp;<span class="label label-warning">* <?php if(isset($errorSection)) echo $errorSection;?></span><br>
								<input type="radio" name="section" value="1" checked> Wheel<br>
 								<input type="radio" name="section" value="2"> Track<br>
								<input type="radio" name="section" value="3"> SSE<br>
								<input type="radio" name="section" value="4"> Crusher<br>
							</div>

							<div class="form-group">
								<input class="form-control" type="submit" name="edit" value="Update Data">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
include_once('footer.php');
$con->close();
?>
