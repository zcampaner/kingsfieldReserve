<?php
require_once('MySqlDb.php');
$Db = new MySqlDb('localhost', 'root', '', 'kingsfield_database');
$id=$_POST['id'];
$Db->where('message_id',$id);
$Db->delete('tb_message');
  
?>


