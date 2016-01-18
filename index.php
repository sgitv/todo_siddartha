<?php

require_once 'conne.php';

$itemsQuery = $db->prepare("
	SELECT id,name,done,created
	FROM items
	WHERE user = 1
	");

$itemsQuery->execute();

$items = $itemsQuery->rowCount()? $itemsQuery : [];


?>

<!DOCTYPE html>
<html>
	<head>
		<title>To do</title></title>
		<link rel="stylesheet" href="theams.css">
	</head>
	<body>
		<div class="list">
			<h1 style="color:white">Todo List</h1>

			<?php if(!empty($items)): ?>	
			<ol class="items">
				<?php foreach($items as $item):?>		
					<li>
						<span class="item<?php echo $item['done']?' done':''?>"><?php echo $item['name'];?></span>	<!-- display List  -->
						<span class="item color"><?php echo $item['created']; ?></span>							   <!-- Date of created  -->
						<?php if(!$item['done']):?>
						<a href="done1.php?as=done&item=<?php echo $item['id'];?>" class="done-button">done</a>      <!-- doneButton  -->
						<?php endif;?>
						<?php if($item['done']): ?>
							<a href="done1.php?as=notdone&item=<?php echo $item['id'];?>" class="done-button">Undo</a>	<!-- undoButton  -->
							<a href="delete.php?item=<?php echo $item['id'];?>" class="done-button">delete</a>	       <!-- deleteButton  -->
						<?php endif;?>
					</li>
				<?php endforeach; ?>
			</ol>
			<?php else:?>
				<P>Add your ToDo list below</P>
			<?php endif;?>
			<form class="item-add" action="insert.php" method="post">
				<input type="text" name="name" placeholder="Add here" class="input" autocomplete="off" required>   <!-- input -->
				<input type="submit" value="Add" class="submit">
			</form>
		</div>
	</body>
</html>