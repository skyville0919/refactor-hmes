<?php include('conn.php') ?>

<?php 
    $id = $_POST['bedID'];

    $query = "SELECT * FROM bedroom WHERE bed_id =".$id;
?>