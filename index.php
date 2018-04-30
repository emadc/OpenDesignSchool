<?php
include_once('_config.php');

MyAutoload::start();

$request="";

if(isset($_GET['r'])){
	$request = $_GET['r'];
}

$routeur = new Routeur($request);
$routeur->renderController();
?>