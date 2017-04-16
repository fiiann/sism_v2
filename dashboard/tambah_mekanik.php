<?php
	require_once('sidebar.php');


	$sukses=TRUE;

	// eksekusi tombol daftar
	if (isset($_POST['daftar'])) {
		// Cek Nim
		$id_mekanik=test_input($_POST['id_mekanik']);
		if ($id_mekanik=='') {
			$errorNim='wajib diisi';
			$validNim=FALSE;
		}else{
			$query = " SELECT * FROM mekanik WHERE id_mekanik='".$id_mekanik."'";
			$result = $con->query( $query );
			if($result->num_rows!=0){
				$errorNim="id sudah pernah digunakan, harap masukkan idate(format) lain";
				$validNim=FALSE;
			}
			else{
				$validNim = TRUE;
			}
		}

		// Cek Nama
		$nama_mekanik=test_input($_POST['nama_mekanik']);
		if ($nama_mekanik=='') {
			$errorNama='wajib diisi';
			$validNama=FALSE;
		}elseif (!preg_match("/^[a-zA-Z ]*$/",$nama)) {
			$errorNama='hanya mengizinkan huruf dan spasi';
			$validNama=FALSE;
		}else{
			$validNama=TRUE;
		}



		// cek section
		$id_section=test_input($_POST['id_section']);
		if ($id_section=='') {
			$errorAlamat='wajib diisi';
			$validAlamat=FALSE;
		}else{
			$validAlamat=TRUE;
		}


		// jika tidak ada kesalahan input
		if ($validNim && $validNama && $validAlamat) {
			$id_mekanik=$con->real_escape_string($id_mekanik);
			$nama_mekanik=$con->real_escape_string($nama_mekanik);
			$id_section=$con->real_escape_string($id_section);


			$query = "INSERT INTO mekanik (id_mekanik, nama_mekanik, id_section) VALUES ('".$id_mekanik."','".$nama_mekanik."','".$id_section."')";

			$hasil=$con->query($query);
			if (!$hasil) {
				die("Tidak dapat menjalankan query database: <br>".$con->error);
			}else{
				$sukses=TRUE;
			}
			$pesan_sukses="Berhasil menambahkan data.";
		}
		else{
			$sukses=FALSE;
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Form Pendaftaran</title>
</head>
<body>
<div class="row">
	<div class="col-md-6">
		<!-- Form Elements -->
		<div class="panel panel-default">
			<div class="panel-heading">
				Tambah Mekanik
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12">
						<form method="POST" role="form" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
							<span class="label label-success"><?php if(isset($pesan_sukses)) echo $pesan_sukses;?></span>
							<div class="form-group">
								<label>ID Mekanik</label>&nbsp;<span class="label label-warning">* <?php if(isset($errorNim)) echo $errorNim;?></span>
								<input class="form-control" type="text" name="id_mekanik" maxlength="14" size="30" placeholder="masukan id mekanik" required autofocus value="<?php if(!$sukses&&$validNim){echo $id_mekanik;} ?>">
							</div>
							<div class="form-group">
								<label>Nama</label>&nbsp;<span class="label label-warning">* <?php if(isset($errorNama)) echo $errorNama;?></span>
								<input class="form-control" type="text" name="nama_mekanik" maxlength="50" size="30" placeholder="masukan nama" required value="<?php if(!$sukses&&$validNama){echo $nama_mekanik;} ?>">
							</div>
							<div class="form-group">
								<label>Section</label>&nbsp;<span class="label label-warning">* <?php if(isset($errorAlamat)) echo $errorAlamat;?></span><br>
								<input type="radio" name="id_section" value="1" checked> Wheel<br>
 								<input type="radio" name="id_section" value="2"> Track<br>
								<input type="radio" name="id_section" value="3"> SSE<br>
								<input type="radio" name="id_section" value="4"> Crusher<br>
							</div>
							<!-- <div class="form-group"> -->


							<!-- </div> -->

							<div class="form-group">
								<input class="form-control" type="submit" name="daftar" value="Daftar">
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
