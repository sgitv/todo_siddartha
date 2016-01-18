<?php

require_once 'conne.php';
if(isset($_GET['as'], $_GET['item'])){
	$as   = $_GET['as'];
	$item = $_GET['item'];
	switch($as){
		case 'done':
		$doneQuery = $db->prepare("
			UPDATE items
			SET done = 1
			WHERE id = :item
		");											//strike out
		$doneQuery->execute([
			'item'=>$item
		]);
		break;
		case 'notdone':
			$doneQuery = $db->prepare("
			UPDATE items
			SET done = 0
			WHERE id = :item
		");											//ubdoo strikeout
		$doneQuery->execute([
			'item'=>$item
		]);
		break;
	}
}
header('Location: index.php');
?>