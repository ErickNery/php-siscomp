<?php
if ($_POST['username'] == 'erick' && $_POST['password'] == 'erick'){
	if(!$_SESSION){
	session_start();
	$_SESSION['profile']=2;
	$_SESSION['profile_name']='admin';
	$_SESSION['user_name']=$_POST['username'];	}
	header('Location: index.php');
} else {
	header('Location: error.php');
}
exit;
?>