<a href="secure-data-selection.php">Защищенный выбор данных</a>
<a href="data-insertion.php">Вытавка данных</a>
<a href="updating-data.php">Обновление данных</a>
<a href="delete-data.php">Удаление данных</a>



<?php  
	// подключение к бд
	$db = new PDO("mysql:host=localhost; dbname=hw-php-6-films;", "root", "");
	$sql = "SELECT * FROM `films`";

	// query() - метод PDO отправляет запрос в бд
	$result = $db->query($sql);

	// echo "<h2>Вывод записей из результата по одной:</h2>";

	// // fetch - метод PDO, выводит результат из каждой строки таблицы
	// $result ->fetch(PDO::FETCH_ASSOC);

	// // получаем несколько строк из бд
	// echo "<pre>";
	// print_r($result ->fetch(PDO::FETCH_ASSOC));
	// echo "</pre>";

	// echo "<pre>";
	// print_r($result ->fetch(PDO::FETCH_ASSOC));
	// echo "</pre>";

	// echo "<pre>";
	// print_r($result ->fetch(PDO::FETCH_ASSOC));
	// echo "</pre>";

	// // либо вывод через цикл
	// while ($film = $result ->fetch(PDO::FETCH_ASSOC)) {
		
	// 	echo "<pre>";
	// 	print_r($film);
	// 	echo "</pre>";

	// }

	/**************************Получить всю бд, записать все строки в бд********************/

	// echo "<h2>Вывод всех строк, всего полученного массива из бд:</h2>";

	// // fetchALL() - метод PDO формирует ассоциативный массив в который записывает все строки из БД
	// $films = $result->fetchALL(PDO::FETCH_ASSOC);

	// echo "<pre>";
	// print_r($films);
	// echo "</pre>";

	/*************************Получить колонки БД, записать их в переменные*****************/

	// bindColumn(); - метод записывает колонки БД в отдельные переменные, принимет ключ колонки и имя переменной в которую будет записана колонка
	$result->bindColumn('id', $id);
	$result->bindColumn('title', $title);
	$result->bindColumn('genre', $genre);
	$result->bindColumn('year', $year);

	echo "<h2>Вывод всех столбцов записанных в переменные:</h2>";
	
	while ($result->fetch()) {
		echo "<p>ID: {$id}</p>";
		echo "<p>TITLE: {$title}</p>";
		echo "<p>GENRE: {$genre}</p>";
		echo "<p>YEAR: {$year}</p>";
		echo "<br>";
	}
?>

