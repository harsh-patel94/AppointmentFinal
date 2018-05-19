<?php
include('dbcon.php');
// $id=$_POST['id'];
$service_id = $row['service_id'];
mysqli_query($db, "delete from members where service_id = '$service_id'");
?>