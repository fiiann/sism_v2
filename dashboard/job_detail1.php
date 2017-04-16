<?php
	require_once('functions.php');
	if(isset($_GET['search']) && isset($_GET['search1']) && isset($_GET['search2'])){
		$search=$_GET['search'];
		$search1=$_GET['search1'];
		$search2=$_GET['search2'];
		// $id_mekanik=$_GET['id_mekanik'];
		
	}
?>
<div class="row">
	<div class="col-lg-12 text-center">
		<h2>Hasil Pencarian</h2>
		<hr class="star-light">
	</div>
	<div class="table-responsive">
		<table class="table trooable-striped table-bordered table-hover">
		<thead>
			<th>No</th>
			<th>Id Mekanik</th>
			<th>Nama Mekanik</th>
			<th>Section</th>
			<th>Unit</th>
			<th>job</th>
			<th>Detail Job</th>
			<!-- <th>Exp</th> -->
		</thead>
		<tbody class="table-hover">

<?php
// echo $search1;
// echo $search;
echo $search2;
// echo $id_mekanik;
// $query = "SELECT * FROM work_order w WHERE id_job='".$search."' and id_sub='".$search1."' and id_section='1'"; 
// WHERE w.id_job=$search and w.id_sub=$search1 and id_section='1'
$query = "SELECT * FROM mekanik m INNER JOIN work_order w ON m.id_mekanik=w.mekanik1 WHERE w.id_section='1' AND w.id_sub=$search1 AND w.mekanik1=$search2" ;
$result = $con->query($query);
$i=1;
					while($row = $result->fetch_object()){
								echo "<tr>";
								echo "<td>".$i."</td>";$i++;
								echo "<td>".$row->id_mekanik."</td>";
								echo "<td>".$row->nama_mekanik."</td>";
								echo "<td>Wheel</td>";
								echo "<td>".$row->id_sub."</td>";
								echo "<td>".$row->id_job."</td>";
								echo "<td>".$row->id_detailjob."</td>";
								// echo "<td>".$rowDua->jumlah."</td>";
								echo "</tr>";
					}
echo '</tbody>';
echo '</table>';

?>
	</div>
