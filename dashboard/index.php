<?php
	include_once('sidebar.php');
	$id=$_SESSION['sip_masuk_aja'];
	$db=new mysqli($db_host, $db_username, $db_password, $db_database);
	include_once('sidebar.php');
	if($status=='petugas'){
			$pesanWelcome='"Mari berikan layanan yang SIP bagi setiap pengunjung"';
	}else{
			$pesanWelcome='"Banyak baca buku biar makin SIP"';
	}

	$query="SELECT count(id_mekanik) as counter FROM mekanik";
	$result = $con->query($query);
	$row=$result->fetch_object();
	$jml_mekanik=$row->counter;

	$query="SELECT count(mekanik1) as counter FROM work_order WHERE id_section='1'";
	$result = $con->query($query);
	$row=$result->fetch_object();
	$jml_wheel=$row->counter;

	$query="SELECT count(mekanik1) as counter FROM work_order WHERE id_section='2'";
	$result = $con->query($query);
	$row=$result->fetch_object();
	$jml_track=$row->counter;


	$query="SELECT count(mekanik1) as counter FROM work_order WHERE id_section='3'";
	$result = $con->query($query);
	$row=$result->fetch_object();
	$jml_sse=$row->counter;

	$query="SELECT count(mekanik1) as counter FROM work_order WHERE id_section='4'";
	$result = $con->query($query);
	$row=$result->fetch_object();
	$jml_crusher=$row->counter;


	$query="SELECT count(no) as counter FROM work_order";
	$result = $con->query($query);
	$row=$result->fetch_object();
	$jml_wo=$row->counter;
?>
<div class="row">
    <div class="col-md-12">
        <h2>Dashboard</h2>
        <h5>Selamat datang <b><?php if($status=="petugas") echo $petugas->nama; elseif($status=="dosen") echo $dosen->nama_dosen;elseif($status=="lab") echo $lab->nama_lab; else echo "$anggota->nama"; ?></b>. <small><i><?php echo $pesanWelcome ?></i></small></h5>
    </div>
</div><hr />
 <div class="row">
					<div class="col-md-3 col-sm-6 col-xs-6">
						<div class="panel panel-back noti-box">
							<span class="icon-box bg-color-green set-icon">
								<i class="fa fa-book"></i>
							</span>
							<div class="text-box" >
								<div class="main-text"><?php echo $jml_mekanik ?></div>
								<div class="text-muted">Jumlah Mekanik</div>
							</div>
						</div>
					</div>
          <div class="col-md-3 col-sm-6 col-xs-6">
						<div class="panel panel-back noti-box">
							<span class="icon-box bg-color-blue set-icon">
								<i class="fa fa-users"></i>
							</span>
							<div class="text-box" >

								<div class="main-text"><?php if(($status=='anggota')||($status=='lab')) echo $jml_tr1;else echo $jml_wheel; ?></div>
								<div class="text-muted"><?php if($status=='anggota') echo 'Pernah dipinjam'; else echo 'Jumlah WO oleh WHEEL'; ?></div>
							</div>
						 </div>
					</div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
						<div class="panel panel-back noti-box">
							<span class="icon-box bg-color-red set-icon">
								<?php if($status=='anggota') echo '<i class="fa fa-book"></i>'; else echo '<i class="fa fa-users"></i>'; ?>
							</span>
							<div class="text-box" >
								<div class="main-text"><?php if($status=='anggota') echo $belum_kembali; else echo $jml_track; ?></div>
								<div class="text-muted"><?php if($status=='anggota') echo 'Belum kembali'; elseif ($status=='dosen') echo 'apa ini'; else echo 'Jumlah WO oleh TRACK'; ?></div>
							</div>
						 </div>
					</div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
						<div class="panel panel-back noti-box">
							<span class="icon-box bg-color-brown set-icon">
								<i class="fa fa-money"></i>
							</span>
							<div class="text-box" >
								<div class="main-text"> <?php echo $jml_wo ?></div>

								<div class="text-muted">Jumlah <?php if($status=='anggota') echo 'Total Denda Anda'; else echo ' Work Order '; ?></div>

								<!-- <div class="text-muted">Jumlah<?php if($status=='anggota') echo 'Total Denda Anda'; else echo ' Work Order '; ?></div> -->

							</div>
						 </div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-6">
							<div class="panel panel-back noti-box">
								<span class="icon-box bg-color-brown set-icon">
									<i class="fa fa-users"></i>
								</span>
								<div class="text-box" >

									<div class="main-text"> <?php echo $jml_sse ?></div>
									<div class="text-muted">Jumlah <?php if($status=='anggota') echo 'Total Denda Anda'; else echo 'WO Oleh SSE '; ?></div>

									<!-- <div class="main-text"> <?php echo $jml_wo ?></div>
									<div class="text-muted">Jumlah<?php if($status=='anggota') echo 'Total Denda Anda'; else echo ' Oleh SSe '; ?></div> -->

								</div>
	 					</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-6">
							<div class="panel panel-back noti-box">
								<span class="icon-box bg-color-green set-icon">
									<i class="fa fa-users"></i>
								</span>
								<div class="text-box" >

									<div class="main-text"> <?php echo $jml_crusher ?></div>
									<div class="text-muted">Jumlah <?php if($status=='anggota') echo 'Total Denda Anda'; else echo 'WO Oleh Crusher '; ?></div>
<!--
									<div class="main-text"> <?php echo $jml_wo ?></div>
									<div class="text-muted">Jumlah<?php if($status=='anggota') echo 'Total Denda Anda'; else echo ' Oleh Crusher '; ?></div> -->

								</div>
	 					</div>
					</div>
				</div>
				<hr />
