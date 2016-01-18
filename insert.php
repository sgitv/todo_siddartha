<?php

require_once 'conne.php';

if(isset($_POST['name'])){
	$name = trim($_POST['name']);

	if(!empty($name)){
		$addedQuery = $db->prepare("
			INSERT INTO items(name,user,done,created)
			VALUES(:name, 1 , 0, NOW())
		");														//inserting into table

		$addedQuery->execute([
			'name'=>$name
		]);
	}
}
header('location: index.php');
?>