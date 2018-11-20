<?php
$host="127.0.0.1";
$user="drupal";
$pass="drupal";
$db="sys_comp";
$conn = mysqli_connect($host,$user,$pass,$db) or die("Servidor fora do ar");
		mysqli_select_db($conn,$db) or die("Sem acesso ao banco");
	//mysql_select_db($db,$conn) or die("Sem acesso ao banco");

?>