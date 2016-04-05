<?php
require_once('MySqlDb.php');
$Db = new MySqlDb('localhost', 'root', '', 'kingsfield_database');
$id=$_POST['id'];
$Db->where('reservation_id',$id);
$Db->delete('tb_reservation');
  
?>


