
<html>
<head>
    <meta charset="utf-8">
    <title>My page</title>

    <!-- CSS dependencies -->
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body>
<?php 
    require_once('sidebar.php');
?>
<p>Hapus Semua Experience</p>
    <script type="text/javascript">
                
                function myFunction() {
                    confirm("Apakah anda yakin?");
                }           
    </script>
    <a href="delete_work_order.php"><button onclick="myFunction()" class="btn btn-info">Hapus Data</button></a>
</body>
</html>