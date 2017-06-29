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
    $kategori=$_POST['kategori'];
    $mekanik=$_POST['mekanik'];
    $materi=$_POST['materi'];
    $tanggal=$_POST['tanggal']; //unit
    $point=$_POST['point'];

    $kategori=test_input($_POST['kategori']);
    if($kategori == ''){
      $error_section= "Section harus diisi";
      $valid_section= FALSE;
    } else{
      $valid_section= TRUE;
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

    $point = test_input($_POST['point']);
    if($point == '' || $point == "none"){
      $error_point= "Point harus diisi";
      $valid_point= FALSE;
    } else{
      $valid_point= TRUE;
    }

  }

  //update data barang ke database
  if($valid_section && $valid_tanggal && $valid_point && $valid_materi && $valid_mekanik1){
    //escape inputs data
    $kategori=$db->real_escape_string($kategori);
    $tanggal=$db->real_escape_string($tanggal);
    $point=$db->real_escape_string($point);
    $materi=$db->real_escape_string($materi);
    $mekanik1=$db->real_escape_string($mekanik1);
    //asign a query

      $query1  = " INSERT INTO sertifikasi (id_sec, tanggal, materi, id_mekanik, poin) VALUES ('$kategori','$tanggal','$materi','$mekanik1','$point')";




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
      <td valign="top" class="form-group">Materi Sertifikasi</td>
      <td valign="top">:</td>
      <td valign="top"><input type="text" id="materi" name="materi" size="50" maxlength="100"
      placeholder="" required autofocus</td>
      <td valign="top"><span class="error">&nbsp;&nbsp;!<?php if(!empty($error_materi)) echo $error_materi; ?></span></td>
    </tr>
    <tr><td><br></td></tr>
    <tr>
      <td valign="top" class="form-group">Tanggal Lulus Sertifikasi</td>
      <td valign="top">:</td>
      <td valign="top"><input type="date" id="tanggal" name="tanggal" size="50" maxlength="100"
      placeholder="ex : 2017-03-01" required autofocus</td>
      <td valign="top"><span class="error">&nbsp;&nbsp;!<?php if(!empty($error_tanggal)) echo $error_tanggal; ?></span></td>
    </tr>

    <tr><td><br></td></tr>

    <tr>
      <td valign="top" class="form-group">Point</td>
      <td valign="top">:</td>
      <td valign="top"><input type="text" id="point" name="point" size="50" maxlength="100"
      placeholder="" required autofocus</td>
      <td valign="top"><span class="error">&nbsp;&nbsp;!<?php if(!empty($error_point)) echo $error_point; ?></span></td>
    </tr>









    <tr><td><br></td></tr>

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
