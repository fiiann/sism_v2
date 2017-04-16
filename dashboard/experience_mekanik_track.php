<?php
$id_mekanik = $_GET['id_mekanik'];
include_once('sidebar.php');
$id=$_SESSION['sip_masuk_aja'];
	// require_once('db_login.php');
$db=new mysqli($db_host, $db_username, $db_password, $db_database);
// Assign the query
// $query = " SELECT * FROM mekanik m INNER JOIN work_order w ON m.id_mekanik=w.mekanik1  WHERE id_mekanik='".$id_mekanik."'";
$query = "SELECT * FROM mekanik m INNER JOIN work_order w ON m.id_mekanik=w.mekanik1 INNER JOIN sub_section s ON w.id_sub=s.id_sub INNER JOIN main_job mj on mj.id_job=w.id_job INNER JOIN job_detail jd ON jd.id_jobdetail=w.id_detailjob WHERE id_mekanik='".$id_mekanik."'";
$queryDua = "SELECT count(mekanik1) as jumlah FROM work_order w WHERE id_mekanik='".$id_mekanik."'";
$result = $db->query($query);
$resultDua = $db->query($queryDua);

// Execute the query
?>
<html>
<head>
	<script src="js/jquery.js" type="text/javascript"></script> 
	<script src="assets/js/jquery-3.1.1.min.js" type="text/javascript"></script> 
</head>

<?php
// $result = $con->query($query);
// $row = $result->fetch_object();

		
		echo '<br />';
		echo '<select id="unit" name="unit">';
		echo '<option value="">Pilih Unit</option>';
		$query1 = "SELECT * FROM sub_section WHERE id_sec='2'";
		$result1 = $db->query($query1);
		if ($result1){
			while ($row2 = $result1->fetch_object()){
				$uid = $row2->id_sub; 
				echo '<option value="'.$row2->id_sub.'">'.$row2->nama_sub.'</option>';
					}
		}
		echo "</select>";
		echo '&nbsp;&nbsp';
		echo '<select id="job" name="job" required>';
		echo '<option value="none">--Pilih Job--</option>';
		$querykat = "select * from main_job";
		$resultkat = $db->query($querykat);
		if(!$resultkat){
			die("Could not connect to the database : <br/>". $db->connect_error);
		}
		while ($row3 = $resultkat->fetch_object()){ 
			$kid = $row3->id_job; 
			$kname = $row3->nama_job; 
			echo '<option value='.$kid.' '; 
			if(isset($job) && $job==$kid)
				echo 'selected="true"';
				echo '>'.$kname.'<br/></option>';
			} 
		echo '</select>';
		echo '&nbsp;&nbsp';
		// echo '<select id="detail" name="detail" required>';
		// echo '<option value="none">--Pilih Detail--</option></select>';	
		echo '</td>';
		echo '<br />';echo '<br />';
		$con->close();
?>

<div id="hasil_cari" class="col-md-12">
	
</div>
<div class="panel-body">
	<div id="hasil_cari1" class="table-responsive">
	<table class="table trooable-striped table-bordered table-hover">
		<thead>
			<th>No</th>
			<th>Id Mekanik</th>
			<th>Nama Mekanik</th>
			<th>Section</th>
			<th>Unit</th>
			<th>job</th>
			<th>Detail Job</th>
			<th>Deskripsi</th>
			<th>Tanggal</th>
			<!-- <th>Exp</th> -->
		</thead>
		<tbody>
				<?php
					$i=1;
					while($row = $result->fetch_object()){
								echo "<tr>";
								echo "<td>".$i."</td>";$i++;
								echo "<td>".$row->id_mekanik."</td>";
								echo "<td>".$row->nama_mekanik."</td>";
								echo "<td>Wheel</td>";
								echo "<td>".$row->nama_sub."</td>";
								echo "<td>".$row->nama_job."</td>";
								echo "<td>".$row->nama_detail."</td>";
								echo "<td>".$row->deskripsi."</td>";
								echo "<td>".$row->tanggal."</td>";
								// echo "<td>".$rowDua->jumlah."</td>";
								echo "</tr>";
							}			
				?>
			</tr>
		</tbody>
	</table>
</div>
<a href="daftar_mekanik_track.php"><button class="btn btn-info">Kembali ke Daftar Mekanik Track</button></a>
</div>

<?php
	include_once('footer.php');
?>