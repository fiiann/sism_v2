<?php
	require_once('functions.php');

	if(!isset($_SESSION['sip_masuk_aja'])){
	  header("Location:./login.php");
	}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php $site_name ?></title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
		<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" hKeloref="index.php"><i class="fa fa-thumbs-o-up"></i> <?php echo "SISM" ?></a>
            </div>
			<div style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;">
				<a href="profil.php" title='Ubah Password' style="color:#fff; font-size:12px;"><i class="fa fa-lock"></i> <?php if($status=="petugas") echo $petugas->nama; elseif($status=="dosen") echo $dosen->nama_dosen;elseif($status=="lab") echo $lab->nama_lab; else echo $anggota->nama; ?> </a>&nbsp;&nbsp;
				<a style="text-decoration: none; color:#fff; font-size:12px;"> <?php
					echo " ( ".date("D, Y-m-d") . " ". date("h:ia")." )&nbsp;&nbsp;";
				?>
				</a>
				<a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a>
			</div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
					<img src="assets/img/user/logo.jpg" class="user-image img-responsive"/>
				</li>
				<li>
					<a class="active-menu" href="index.php"><i class="fa fa-dashboard fa-2x"></i> Dashboard</a>
				</li>
				<?php
				if($status=="petugas"){
					echo '<li>
						<a href="#"><i class="fa fa-edit fa-2x"></i> Input Data<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<li><a href="input_pekerjaan.php">Pekerjaan</a></li>
<<<<<<< HEAD
							<li><a href="daftar_mekanik.php">Lihat Mekanik</a></li>
							
=======
							<li><a href="tambah_mekanik.php">Tambah Mekanik</a></li>
>>>>>>> b5ce0f958d9603a8af66bb71ab8b3656b6b8c56a
						</ul>
					</li>
					<li>
						<a href="#"><i class="fa fa-edit fa-2x"></i> Experience<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<li><a href="daftar_mekanik_wheel.php">Wheel</a></li>
							<li><a href="daftar_mekanik_track.php">Track</a></li>
							<li><a href="daftar_mekanik_sse.php">SSE</a></li>
							<li><a href="daftar_mekanik_crusher.php">Crusher</a></li>
							<li><a href="hapus_exp.php">Hapus Experience</a></li>

						</ul>
					</li>';
				}
				?>



					<li>
                        <a  href="http://localhost/sip/index.php#about"><i class="fa fa-square-o fa-2x"></i> About</a>
					</li>
                </ul>
            </div>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
