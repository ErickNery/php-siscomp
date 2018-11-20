<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/header.php');
if(isset($_SESSION['profile'])){
require_once($_SERVER['DOCUMENT_ROOT'] . '/sidebar_menu.php'); }
switch($_GET['opcao']){
	case 1:
		require_once($_SERVER['DOCUMENT_ROOT'] . '/crud/rodada/select_rodada.php');
		break;
	case 2:
		require_once($_SERVER['DOCUMENT_ROOT'] . '/crud/rodada/insert_rodada.php');
		break;
	case 3:
		$_SESSION['id_pagina'] = $_GET['id'];
		$pagina = $_SERVER['DOCUMENT_ROOT'] . '/crud/rodada/update_rodada.php';
		require_once($pagina);
		break;
	case 4:
	    $_SESSION['id_pagina'] = $_GET['id'];
		$pagina = $_SERVER['DOCUMENT_ROOT'] . '/crud/rodada/delete_rodada.php';
		require_once($pagina);
		break;
	default:
	header('Location: error.php');
	
}
require_once($_SERVER['DOCUMENT_ROOT'] . '/footer.php');
?>