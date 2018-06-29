<a href="index.php">Простой выбор</a>
<a href="secure-data-selection.php">Защищенный выбор данных</a>
<a href="data-insertion.php">Вытавка данных</a>
<a href="delete-data.php">Удаление данных</a>

<?php  

	$db = new PDO("mysql:host=localhost; dbname=test", "root", "");
	
	$sql = "UPDATE `user` SET `name` = :name WHERE `id` = :id";
	$stmt = $db->prepare($sql);

	$userName = "New Bob";
	$id = 13;

	$stmt->bindValue(':name', $userName);
	$stmt->bindValue(':id', $id);
	$stmt->execute();

	// lastInsertId() - метод возвращает айди последней вставленной строки
	echo "<p>Было затронуто строк: ".$stmt->rowCount()."</p>";

?>