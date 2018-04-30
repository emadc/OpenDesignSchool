<?php
include_once '_head.php';

if($role == "ADMIN"){
	include_once '_header.php';
}
	
echo $contentPage;

if($role == "ADMIN"){
	include_once '_footer.php';
}