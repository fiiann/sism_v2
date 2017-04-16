<?php
	require_once('functions.php');
	$db=new mysqli($db_host, $db_username, $db_password, $db_database);
	$detail = $_POST["detail"]; //job
	$unit = $_POST["unit"]; //section
	$job = $_POST["job"]; //job
	$section = $_POST["section"]; //section
?>
<div class="row">
	<div class="col-lg-12 text-center">
		<h2>Hasil Pencarian</h2>
		<hr class="star-light">
	</div>
	<table border='1' class="table-fill">
		<thead>
			<tr>
				<th class="text-center">No</th>
				<th class="text-center">Nama Mekanik</th>
				<th class="text-center">Section</th>
				<th class="text-center">Unit</th>
				<th class="text-center">Job</th>
				<th class="text-center">Detail</th>
				<th class="text-center">Experience</th>
			</tr>
		</thead>
		<tbody class="table-hover">

			<?php
					
				if($detail=''){
					$query = "SELECT * FROM work_order w WHERE INNER JOIN section s ON w.id_section=s.id_section INNER JOIN sub_section ss ON w.id_sub=ss.id_sub INNER JOIN main_job m ON w.id_job=m.id_job INNER JOIN job_detail j on w.id_job=j.id_job WHERE id_section ='$section' AND id_job = '$job' AND id_sub = '$unit' ";
				}else{
					$query = "SELECT * FROM work_order w INNER JOIN section s ON w.id_section=s.id_section INNER JOIN sub_section ss ON w.id_sub=ss.id_sub INNER JOIN main_job m ON w.id_job=m.id_job INNER JOIN job_detail j on w.id_job=j.id_job where id_detailjob = '$detail'";
				}
						$result = $con->query($query);
						$no = 1;
						while ($row = $result->fetch_object()){
							echo '<tr>';
							
							echo '<td class="text-center">'.$no.'</td>';
							
							 echo '<td class="text-center">'.$row->nama_mekanik.'</td>';
							 echo '<td class="text-center">'.$row->nama_section.'</td>';
							 echo '<td class="text-center">'.$row->nama_sub.'</td>';
							 echo '<td class="text-center">'.$row->nama_job.'</td>';
							 echo '<td class="text-center">'.$row->nama_detail.'</td>';

							echo "<td class='text-center'><a href='buku.php?isbn=".$row->isbn."'><img src='dashboard/assets/img/".$row->file_gambar."' height='150px;' /></a></td>";
							echo '<td class="text-center">'.$row->stok_tersedia.'</td>';
							echo '</tr>';
						}
					echo '</tbody>';
				echo '</table>';
				echo "<br>";
				echo "<h3><center>Hasil pencarian : ".$result->num_rows." Buku</center></h3>";
			?>
</div>

