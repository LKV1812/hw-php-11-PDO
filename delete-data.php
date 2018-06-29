<a href="index.php">Простой выбор</a>
<a href="secure-data-selection.php">Защищенный выбор данных</a>
<a href="data-insertion.php">Вытавка данных</a>
<a href="updating-data.php">Обновление данных</a>

<?php  

	$db = new PDO("mysql:host=localhost; dbname=test", "root", "");
	
	$sql = "DELETE FROM `user` WHERE `id` = :id";
	$stmt = $db->prepare($sql);

	$id = 14;

	$stmt->bindValue(':id', $id);
	$stmt->execute();

	echo "<p>Было затронуто строк: ".$stmt->rowCount()."</p>";

?>