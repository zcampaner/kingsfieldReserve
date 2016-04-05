<?php
require_once'../include/MySqlDb.php';
$DB = new MysqlDB('localhost','root','','kingsfield_database');
$result = $DB->query("SELECT username FROM tb_guest");
	

/* RECEIVE VALUE */
$validateValue=$_REQUEST['fieldValue'];
$validateId=$_REQUEST['fieldId'];


$validateError= "This username is already taken";
$validateSuccess= "This username is available";



	/* RETURN VALUE */
	$arrayToJs = array();
	$arrayToJs[0] = $validateId;
	
	foreach($result as $key => $row){	
	
	$user = $row['username'];
	
	}
if($validateValue == $user){		// validate??
	$arrayToJs[1] = false;			// RETURN TRUE
	echo json_encode($arrayToJs);			// RETURN ARRAY WITH success
}else{
	for($x=0;$x<1000000;$x++){
		if($x == 990000){
			$arrayToJs[1] = true;
			echo json_encode($arrayToJs);		// RETURN ARRAY WITH ERROR
		}
	}
	


}
	
?>