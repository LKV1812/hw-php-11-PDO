<a href="index.php">Простой выбор</a>
<a href="secure-data-selection.php">Защищенный выбор данных</a>
<a href="updating-data.php">Обновление данных</a>
<a href="delete-data.php">Удаление данных</a>


<?php  

	$db = new PDO("mysql:host=localhost; dbname=test", "root", "");
	
	$sql = "INSERT INTO `user` (`name`, `email`) VALUES (:name, :email)";
	$stmt = $db->prepare($sql);

	$userName = "Bob";
	$userMail = "bob@boby.com";

	$stmt->bindValue(':name', $userName);
	$stmt->bindValue(':email', $userMail);
	$stmt->execute();

	// lastInsertId() - метод возвращает айди последней вставленной строки
	echo "<p>Было затронуто строк: ".$stmt->rowCount()."</p>";
	echo "<p>ID вставленной записи : ".$db->lastInsertId()."</p>";

?>