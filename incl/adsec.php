<?php
if(!isset($_SESSION['admin'])){
	$db->redirect("index.php");
}
?>