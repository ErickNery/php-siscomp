<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/header.php');
if(isset($_SESSION['profile'])){
require_once($_SERVER['DOCUMENT_ROOT'] . '/sidebar_menu.php'); }
switch($_GET['opcao']){
	case 1:
		require_once($_SERVER['DOCUMENT_ROOT'] . '/crud/inscricao/select_inscricao.php');
		break;
	case 2:
		require_once($_SERVER['DOCUMENT_ROOT'] . '/crud/inscricao/insert_inscricao.php');
		break;
	case 3:
		$_SESSION['id_pagina'] = $_GET['id'];
		$pagina = $_SERVER['DOCUMENT_ROOT'] . '/crud/inscricao/update_inscricao.php';
		require_once($pagina);
		break;
	case 4:
	    $_SESSION['id_pagina'] = $_GET['id'];
		$pagina = $_SERVER['DOCUMENT_ROOT'] . '/crud/inscricao/delete_inscricao.php';
		require_once($pagina);
		break;
	default:
	header('Location: error.php');
	
}
require_once($_SERVER['DOCUMENT_ROOT'] . '/footer.php');
?>