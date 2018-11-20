<?php
//pagina de principal
session_start();
require_once('header.php');
if(isset($_SESSION['profile'])){
require_once('sidebar_menu.php'); }
require_once('home_content.php');
require_once('footer.php');
?>