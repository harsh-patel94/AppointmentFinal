<?php
include('dbcon.php');
$id=$_POST['id'];
mysql_query("delete from users where service_id = '$service_id'") or die(mysql_error());
?>