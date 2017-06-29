<!DOCTYPE html>
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
        $query = "TRUNCATE TABLE work_order";
        $result = $con->query( $query );
        echo 'Data petugas berhasil dihapus. <br />';

        echo '<a href="index.php"><button class="btn btn-info">Kembali ke Dashboard</button></a>';
    ?>
</body>
</html>
