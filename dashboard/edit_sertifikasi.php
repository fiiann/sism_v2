<!--
	Tanggal		: 25 November 2016
	Program		: pendaftaran_petugas.php
	Deskripsi	: menambah data anggota pada database
-->
<?php
	require_once('sidebar.php');
	if($status=="anggota"){
		header('Location:./index.php');
	}

	$db=new mysqli($db_host, $db_username, $db_password, $db_database);

	if($db->connect_errno){
		die("Could not connect to the database : <br/>". $db->connect_error);
	}

	$errorLab='';


	$sukses=TRUE;

	// eksekusi tombol edit
	if(!isset($_POST['edit'])){
    if($_GET['id']==""){
			header('Location:./riwayat_sertif_wheel.php');
		}
		$id=$_GET['id'];
    // echo $id;
		$query = " SELECT * FROM sertifikasi m INNER JOIN section s ON m.id_sec=s.id_section inner join mekanik ON m.id_mekanik=mekanik.id_mekanik WHERE m.id_sertifikasi='".$id."'";
		// Execute the query
		$result = $con->query( $query );
		if (!$result){
			die ("Could not query the database: <br />". $con->error);
		}else{
			while ($row = $result->fetch_object()){
				// $nama=$row->nama_mekanik;
				$materi = $row->materi;
        $tanggal = $row->tanggal;
        $poin = $row->poin;
        $mekanik = $row->id_mekanik;
				$kategori = $row->id_sec;
			}
		}
	}else{
		// Cek Nama
    $kategori=test_input($_POST['kategori']);
    if($kategori == ''){
      $error_kategori= "Section harus diisi";
      $valid_kategori= FALSE;
    } else{
      $valid_kategori= TRUE;
    }

    $tanggal=test_input($_POST['tanggal']);
    if($tanggal == ''){
      $error_tanggal= "Tanggal harus diisi";
      $valid_tanggal= FALSE;
    }else{
      $valid_tanggal= TRUE;
    }

    $mekanik1 = test_input($_POST['mekanik1']);
    if($mekanik1 == '' || $mekanik1 == "none"){
      $error_mekanik= "mekanik harus diisi";
      $valid_mekanik1= FALSE;
    } else{
      $valid_mekanik1= TRUE;
    }

    $materi = test_input($_POST['materi']);
    if($materi == '' || $materi == "none"){
      $error_materi= "Sub Kategori harus diisi";
      $valid_materi= FALSE;
    } else{
      $valid_materi= TRUE;
    }

    $poin = test_input($_POST['poin']);
    if($poin == '' || $point == "none"){
      $error_point= "Point harus diisi";
      $valid_point= FALSE;
    } else{
      $valid_point= TRUE;
    }



		// jika tidak ada kesalahan input
		if ($valid_kategori && $valid_materi && $valid_point && $valid_mekanik1 && $valid_tanggal) {
      // echo $valid_kategori, $valid_materi, $valid_point, !$valid_mekanik1, !$valid_tanggal;
       $kategori=$db->real_escape_string($kategori);//
       $materi=$db->real_escape_string($materi);//
       $tanggal=$db->real_escape_string($tanggal);
       $mekanik1=$db->real_escape_string($mekanik1);//
       $poin=$db->real_escape_string($poin);//

			$query = "UPDATE sertifikasi SET id_mekanik='".$mekanik1."', id_sec='".$section."', tanggal='".$tanggal."' , poin='".$poin."' , materi='".$materi."' WHERE id_sertifikasi='".$id."'";

			$hasil=$con->query($query);
			if (!$hasil) {
				die("Tidak dapat menjalankan query database: <br>".$con->error);
			}else{
				$sukses=TRUE;
				echo "<br/>Berhasil edit data";
			}
		}
		else{
			$sukses=FALSE;
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
  <?php
  echo $mekanik; ?>
  <div class="col-md-12">
  <form method="POST" autocomplete="on" action="">
  <table>



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
      <td valign="top">Mekanik 1</td>
      <td valign="top">:</td>
      <td valign="top"><select id="mekanik1" name="mekanik1" required value="<?php {echo $mekanik;} ?>">
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
            if(isset($mekanik) && $mekanik==$mid1)
            echo 'selected="true"';
            echo '>'.$mname.'<br/></option>';
          }
        ?></select>
      </td>
      <td valign="top"><span class="error">&nbsp;&nbsp;* <?php if(!empty($error_1)) echo $error_1; ?></span></td>
    </tr>
    <tr><td><br></td></tr>
    <tr>
      <td valign="top" class="form-group">Materi Sertifikasi</td>
      <td valign="top">:</td>
      <td valign="top"><input type="text" id="materi" name="materi" size="50" maxlength="100" value="<?php {echo $materi;} ?>"
      placeholder="" required autofocus</td>
      <td valign="top"><span class="error">&nbsp;&nbsp;!<?php if(!empty($error_materi)) echo $error_materi; ?></span></td>
    </tr>
    <tr><td><br></td></tr>
    <tr>
      <td valign="top" class="form-group">Tanggal Lulus Sertifikasi</td>
      <td valign="top">:</td>
      <td valign="top"><input type="date" id="tanggal" name="tanggal" size="50" maxlength="100" value="<?php {echo $tanggal;} ?>"
      placeholder="ex : 2017-03-01" required autofocus</td>
      <td valign="top"><span class="error">&nbsp;&nbsp;!<?php if(!empty($error_tanggal)) echo $error_tanggal; ?></span></td>
    </tr>

    <tr><td><br></td></tr>

    <tr>
      <td valign="top" class="form-group">Point</td>
      <td valign="top">:</td>
      <td valign="top"><input type="text" id="poin" name="poin" size="50" maxlength="100" value="<?php if(isset($poin)){echo $poin;} ?>"
      placeholder="" required autofocus</td>
      <td valign="top"><span class="error">&nbsp;&nbsp;!<?php if(!empty($error_point)) echo $error_point; ?></span></td>
    </tr>




    <tr><td><br></td></tr>

    <tr>
      <td valign="top" colspan="3"> <br> <input type="submit" name="edit" value="Submit"></td>
    </tr>
  </table>
  </form>
  </div>
</body>
</html>
<?php
  $db->close();
?>
