<?php
if(!isset($_SESSION['username'])){
	$db->redirect("index.php");
}
?>