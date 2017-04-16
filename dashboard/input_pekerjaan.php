	<!DOCTYPE html>
	
	<?php
		//connect database
		require_once('sidebar.php');
		$id=$_SESSION['sip_masuk_aja'];
		// require_once('db_login.php');
		$db=new mysqli($db_host, $db_username, $db_password, $db_database);
		$nama="";
		
		
		if($db->connect_errno){
			die("Could not connect to the database : <br/>". $db->connect_error);
		}
	
		if (isset($_POST["submit"])){
			$nama=$_POST['nama'];
			$tanggal=$_POST['tanggal'];
			$kategori=$_POST['kategori']; //section
			$subkategori=$_POST['subkategori']; //unit
			$job=$_POST['job'];
			$detail=$_POST['detail'];
			$mekanik1=$_POST['mekanik1'];
			$mekanik2=$_POST['mekanik2'];
			$mekanik3=$_POST['mekanik3'];
			$mekanik4=$_POST['mekanik4'];
		
			$nama=test_input($_POST['nama']);
			if($nama == ''){
				$error_nama= "Nama harus diisi";
				$valid_nama= FALSE;
			} else{
				$valid_nama= TRUE;
			}

			$tanggal=test_input($_POST['tanggal']);
			if($tanggal == ''){
				$error_tanggal= "Tanggal harus diisi";
				$valid_tanggal= FALSE;
			}else{
				$valid_tanggal= TRUE;
			}

			$kategori = test_input($_POST['kategori']);
			if($kategori == '' || $kategori == "none"){
				$error_kategori= "Kategori harus diisi";
				$valid_kategori= FALSE;
			} else{
				$valid_kategori= TRUE;
			}

			$subkategori = test_input($_POST['subkategori']);
			if($subkategori == '' || $subkategori == "none"){
				$error_subkategori= "Sub Kategori harus diisi";
				$valid_subkategori= FALSE;
			} else{
				$valid_subkategori= TRUE;
			}

			$job = test_input($_POST['job']);
			if($job == '' || $job == "none"){
				$error_job= "Job harus diisi";
				$valid_job= FALSE;
			} else{
				$valid_job= TRUE;
			}

			$detail = test_input($_POST['detail']);
			if($detail == '' || $detail == "none"){
				$error_detail= "Detail harus diisi";
				$valid_detail= FALSE;
			} else{
				$valid_detail= TRUE;
			}

			$mekanik1 = test_input($_POST['mekanik1']);
			if($mekanik1 == '' || $mekanik1 == "none"){
				$error_1= "Job harus diisi";
				$valid_1= FALSE;
			} else{
				$valid_1= TRUE;
			}

			$mekanik2 = test_input($_POST['mekanik2']);
			if($mekanik2 == '' || $mekanik2 == "none"){
				$error_2= "Job harus diisi";
				$valid_2= FALSE;
			} else{
				$valid_2= TRUE;
			}

			$mekanik3 = test_input($_POST['mekanik3']);
			$valid_3= TRUE;
			// if($mekanik3 == '' || $mekanik3 == "none"){
			// 	$error_3= "Job harus diisi";
			// 	$valid_3= FALSE;
			// } else{
			// 	$valid_3= TRUE;
			// }

			$mekanik4 = test_input($_POST['mekanik4']);
			$valid_4= TRUE;
			// if($mekanik4 == '' || $mekanik4 == "none"){
			// 	$error_4= "Job harus diisi";
			// 	$valid_4= FALSE;
			// } else{
			// 	$valid_4= TRUE;
			// }

			$deskripsi= test_input($_POST['deskripsi']);
			if($deskripsi == ''){
				$error_deskripsi= "Deskripsi harus diisi";
				$valid_deskripsi= FALSE;
			} else{
				$valid_deskripsi= TRUE;
			}
			
		}
		
		//update data barang ke database
		if($valid_nama && $valid_tanggal && $valid_kategori && $valid_subkategori && $valid_job && $valid_detail && $valid_deskripsi && $valid_1 && $valid_2 && $valid_3 && $valid_4){
			//escape inputs data
			$nama=$db->real_escape_string($nama);
			$tanggal=$db->real_escape_string($tanggal);
			$kategori=$db->real_escape_string($kategori);
			$subkategori=$db->real_escape_string($subkategori);
			$job=$db->real_escape_string($job);
			$detail=$db->real_escape_string($detail);
			$mekanik1=$db->real_escape_string($mekanik1);
			$mekanik2=$db->real_escape_string($mekanik2);
			$mekanik3=$db->real_escape_string($mekanik3);
			$mekanik4=$db->real_escape_string($mekanik4);
			$deskripsi=$db->real_escape_string($deskripsi);
			//asign a query
			if ($mekanik3=="none" && $mekanik3=="none") {
				$query1  = " INSERT INTO work_order (nowo, tanggal, id_section, id_sub, id_job, id_detailjob, mekanik1, deskripsi) 
					 VALUES ('$nama','$tanggal','$kategori','$subkategori','$job','$detail','$mekanik1', '$deskripsi'), ('$nama','$tanggal','$kategori','$subkategori','$job','$detail','$mekanik2', '$deskripsi')";
			}elseif ($mekanik4 == "none") {
				$query1  = " INSERT INTO work_order (nowo, tanggal, id_section, id_sub, id_job, id_detailjob, mekanik1, deskripsi) 
					 VALUES ('$nama','$tanggal','$kategori','$subkategori','$job','$detail','$mekanik1', '$deskripsi'), ('$nama','$tanggal','$kategori','$subkategori','$job','$detail','$mekanik2', '$deskripsi') , ('$nama','$tanggal','$kategori','$subkategori','$job','$detail','$mekanik3', '$deskripsi')";
			}else{
				$query1  = " INSERT INTO work_order (nowo, tanggal, id_section, id_sub, id_job, id_detailjob, mekanik1, deskripsi) 
					 VALUES ('$nama','$tanggal','$kategori','$subkategori','$job','$detail','$mekanik1', '$deskripsi'), ('$nama','$tanggal','$kategori','$subkategori','$job','$detail','$mekanik2', '$deskripsi') , ('$nama','$tanggal','$kategori','$subkategori','$job','$detail','$mekanik3', '$deskripsi'), ('$nama','$tanggal','$kategori','$subkategori','$job','$detail','$mekanik4', '$deskripsi')";
			}
			

	
			$result1=$db->query($query1);
			// $result2=$db->query($query2);
			if(!($result1)){
				die("Could not connect to the database : <br/>". $db->connect_error);
			} else {
				echo'Data sudah diperbaharui.<br /><br />';
				// echo'<a href="input_pekerjaan.php">Input lagi</a><br />';
				echo'<a href="input_pekerjaan.php"><button class="btn btn-info">Input Lagi</button></a>';
				$db->close();
				exit;
			}
		}
	?>
	<html>
		<head>
			<script src="js/jquery.js" type="text/javascript"></script>  
		</head>
		<script>
			$(document).ready(function() {
				$("#kategori").change(function(){
					var vname =$(this).val();
					$("#subkategori").load("unit.php",
					{
						id :vname
					},function(){
					});
				});
			});

			$(document).ready(function() {
				$("#kategori").change(function(){
					var vname1 =$(this).val();
					$("#mekanik1").load("mekanik.php",
					{
						id1 :vname1
					},function(){
					});
				});
			});

			$(document).ready(function() {
				$("#kategori").change(function(){
					var vname2 =$(this).val();
					$("#mekanik2").load("mekanik2.php",
					{
						id2 :vname2
					},function(){
					});
				});
			});

			$(document).ready(function() {
				$("#kategori").change(function(){
					var vname3 =$(this).val();
					$("#mekanik3").load("mekanik3.php",
					{
						id3 :vname3
					},function(){
					});
				});
			});

			$(document).ready(function() {
				$("#kategori").change(function(){
					var vname4 =$(this).val();
					$("#mekanik4").load("mekanik4.php",
					{
						id4 :vname4
					},function(){
					});
				});
			});

			$(document).ready(function() {
				$("#job").change(function(){
					var vname5 =$(this).val(); //job
					var vname6 =$("#kategori").val(); //section
					var vname7 =$("#subkategori").val(); //unit
					$("#detail").load("job_detail.php",
					{
						id6 :vname6,
						id7 :vname7,
						id5 :vname5
					},function(){
					});
				});
			});
			// $(document).ready(function() {
			// 	$("#job").change(function(){
			// 		// var satu = $("#kategori").val();
			// 		alert("Value: " + $("#job").val() + "Value section: "  + $("#kategori").val());
			// 		// alert("Value: " + $("#kategori").val());
			// 	});
			// });

			
			</script>
	<style>
			html {
				font-size: 50.5%;
				
			}
			body {
				
				font-size: 2rem;
				background-color:rgba(255,255,255,0.5);
			}
			.error{
				color : #FF0000;
			}
		
	</style>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<title>Input Data Barang</title>
	</head>
	<body>
		<h2>User Input</h2>
		<div class="col-md-12">
		<form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<table>
			
			<tr>
				<td class="form-group" valign="top">No WO</td>
				<td valign="top">:&nbsp;&nbsp;</td>
				<td valign="top"><input type="text" id="nama" name="nama" size="50" maxlength="100" 
				placeholder="Masukkan Nama (maximal 50 karakter)" required autofocus value="<?php echo $nama; ?>"></td>
				<td valign="top"><span class="error">&nbsp;&nbsp;!<?php if(!empty($error_nama)) echo $error_nama; ?></span></td>
			<!-- <tr><br></tr>> --><br>
			<tr><td><br></td></tr>
			</tr>
			<tr>
				<td valign="top" class="form-group">Tanggal Pengerjaan</td>
				<td valign="top">:</td>
				<td valign="top"><input type="date" id="tanggal" name="tanggal" size="50" maxlength="100" 
				placeholder="ex : 2017-03-01" required autofocus</td>
				<td valign="top"><span class="error">&nbsp;&nbsp;!<?php if(!empty($error_tanggal)) echo $error_tanggal; ?></span></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td valign="top">Section</td>
				<td valign="top">:</td>
				<td valign="top"><select id="kategori" name="kategori" required>
					<option value="none">--Pilih Section--</option>
					<?php
						$querykat = "select * from section";
						$resultkat = $db->query($querykat);
						if(!$resultkat){
							die("Could not connect to the database : <br/>". $db->connect_error);
						}
						while ($row = $resultkat->fetch_object()){ 
							$kid = $row->id_section; 
							$kname = $row->nama_section; 
							echo '<option value='.$kid.' '; 
							if(isset($kategori) && $kategori==$kid)
							echo 'selected="true"';
							echo '>'.$kname.'<br/></option>';
						} 
					?></select>
				</td>
				<td valign="top"><span class="error">&nbsp;&nbsp;* <?php if(!empty($error_kategori)) echo $error_kategori; ?></span></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td valign="top">Unit</td>
				<td valign="top">:</td>
				<td valign="top"><select id="subkategori" name="subkategori" required>
					<option value="none">--Pilih Unit--</option></select>
				</td>
				<td valign="top"><span class="error">&nbsp;&nbsp;* <?php if(!empty($error_subkategori)) echo $error_subkategori; ?></span></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td valign="top">Main Job</td>
				<td valign="top">:</td>
				<td valign="top"><select id="job" name="job" required>
					<option value="none">--Pilih Job--</option>
					<?php
						$querykat = "select * from main_job";
						$resultkat = $db->query($querykat);
						if(!$resultkat){
							die("Could not connect to the database : <br/>". $db->connect_error);
						}
						while ($row = $resultkat->fetch_object()){ 
							$kid = $row->id_job; 
							$kname = $row->nama_job; 
							echo '<option value='.$kid.' '; 
							if(isset($job) && $job==$kid)
							echo 'selected="true"';
							echo '>'.$kname.'<br/></option>';
						} 
					?></select>
				</td>
				<td valign="top"><span class="error">&nbsp;&nbsp;* <?php if(!empty($error_kategori)) echo $error_kategori; ?></span></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td valign="top">Detail</td>
				<td valign="top">:</td>
				<td valign="top"><select id="detail" name="detail" required>
					<option value="none">--Pilih Detail--</option></select>
				</td>
				<td valign="top"><span class="error">&nbsp;&nbsp; <?php if(!empty($error_subkategori)) echo $error_subkategori; ?></span></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td valign="top">Mekanik 1</td>
				<td valign="top">:</td>
				<td valign="top"><select id="mekanik1" name="mekanik1" required>
					<option value="none">--Pilih Mekanik 1--</option>
					<?php
						$querymek1 = "select * from mekanik";
						$resultmek1 = $db->query($querymek1);
						if(!$resultmek1){
							die("Could not connect to the database : <br/>". $db->connect_error);
						}
						while ($row = $resultmek1->fetch_object()){ 
							$mid1 = $row->id_mekanik; 
							$mname = $row->nama_mekanik; 
							echo '<option value='.$mid1.' '; 
							if(isset($mekanik1) && $mekanik1==$mid1)
							echo 'selected="true"';
							echo '>'.$mname.'<br/></option>';
						} 
					?></select>
				</td>
				<td valign="top"><span class="error">&nbsp;&nbsp;* <?php if(!empty($error_1)) echo $error_1; ?></span></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td valign="top">Mekanik 2</td>
				<td valign="top">:</td>
				<td valign="top"><select id="mekanik2" name="mekanik2" required>
					<option value="none">--Pilih Mekanik 2--</option>
					<?php
						$querymek2 = "select * from mekanik";
						$resultmek2 = $db->query($querymek2);
						if(!$resultmek2){
							die("Could not connect to the database : <br/>". $db->connect_error);
						}
						while ($row = $resultmek2->fetch_object()){ 
							$mid2 = $row->id_mekanik; 
							$mname2 = $row->nama_mekanik; 
							echo '<option value='.$mid2.' '; 
							if(isset($mekanik2) && $mekanik2==$mid2)
							echo 'selected="true"';
							echo '>'.$mname2.'<br/></option>';
						} 
					?></select>
				</td>
				<td valign="top"><span class="error">&nbsp;&nbsp;* <?php if(!empty($error_2)) echo $error_2; ?></span></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td valign="top">Mekanik 3</td>
				<td valign="top">:</td>
				<td valign="top"><select id="mekanik3" name="mekanik3" required>
					<option value="none">--Pilih Mekanik 3--</option>
					<?php
						$querymek3 = "select * from mekanik";
						$resultmek3 = $db->query($querymek3);
						if(!$resultmek3){
							die("Could not connect to the database : <br/>". $db->connect_error);
						}
						// echo "string";
						while ($row = $resultmek3->fetch_object()){ 
							$mid3 = $row->id_mekanik; 
							$mname3 = $row->nama_mekanik; 
							echo '<option value='.$mid3.' '; 
							if(isset($mekanik3) && $mekanik3==$mid3)
							echo 'selected="true"';
							echo '>'.$mname3.'<br/></option>';
						} 
					?></select>
				</td>
				
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td valign="top">Mekanik 4</td>
				<td valign="top">:</td>
				<td valign="top"><select id="mekanik4" name="mekanik4" required>
					<option value="none">--Pilih Mekanik 4--</option>
					<?php
						$querymek4 = "select * from mekanik";
						$resultmek4 = $db->query($querymek4);
						if(!$resultmek4){
							die("Could not connect to the database : <br/>". $db->connect_error);
						}
						while ($row = $resultmek4->fetch_object()){ 
							$mid4 = $row->id_mekanik; 
							$mname4 = $row->nama_mekanik; 
							echo '<option value='.$mid4.' '; 
							if(isset($mekanik4) && $mekanik4==$mid4)
							echo 'selected="true"';
							echo '>'.$mname4.'<br/></option>';
						}
					?></select>
				</td>
				
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td valign="top">Deskripsi</td>
				<td valign="top">:</td>
				<td valign="top"><textarea name="deskripsi" rows="5" cols="30" maxlength="255" 
				placeholder="Masukkan deskripsi (maximal 255 karakter)" required> <?php echo $deskripsi; ?> </textarea></td>
				<td valign="top"><span class="error">&nbsp;&nbsp;*<?php if(!empty($error_deskripsi)) echo $error_deskripsi; ?></span></td>
			</tr>
			<tr>
				<td valign="top" colspan="3"> <br> <input type="submit" name="submit" value="Submit"></td>
			</tr>
		</table>
		</form>
		</div>
	</body>
	</html>
	<?php
		$db->close();
	?>