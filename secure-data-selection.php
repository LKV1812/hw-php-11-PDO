<a href="index.php">Простой выбор</a>
<a href="data-insertion.php">Вытавка данных</a>
<a href="updating-data.php">Обновление данных</a>
<a href="delete-data.php">Удаление данных</a>


<?php  
	
	$db = new PDO("mysql:host=localhost; dbname=test;", "root", "");

	// выборка без защиты
	// $userName = "Em";
	// $userPassword = 123456;

	// $sql = "SELECT * FROM `user` WHERE `name` = '{$userName}' AND `password` = '{$userPassword}'";

	// $result = $db->query($sql);
	// // print_r($result->fetch(PDO::FETCH_ASSOC));

	// echo "<h2>Выборка без защиты от SQL инъекций</h2>";
	// // rowCount() - метод определяет кол-во строк
	// if ($result->rowCount() == 1) {
	// 	$user = $result->fetch(PDO::FETCH_ASSOC);
	// 	echo "<h3>name: {$user['name']}</h3>";
	// 	echo "<h3>password: {$user['password']}</h3>";
	// }

	/*****************Выборка с защитой в ручном режиме******************/

	// echo "<h2>Выборка с ручной защитой от SQL инъекций</h2>";

	// $userName = "Em";
	// $userPassword = 123456;

	// quote($userName) - метод проверяет введенные защищая от инъекций
	// strtr($userName, array('_' => '\_', '%' => '\%')) - экранируем нежелательные символы
	// $userName = $db->quote($userName);
	// $userName = strtr($userName, array('_' => '\_', '%' => '\%'));

	// $userPassword = $db->quote($userPassword);
	// $userPassword = strtr($userPassword, array('_' => '\_', '%' => '\%'));

	// $sql = "SELECT * FROM `user` WHERE `name` = '{$userName}' AND `password` = '{$userPassword}'";

	// $result = $db->query($sql);

	// print_r($result->fetch(PDO::FETCH_ASSOC));

	// rowCount() - метод определяет кол-во строк
	// if ($result->rowCount() == 1) {
	// 	$user = $result->fetch(PDO::FETCH_ASSOC);
	// 	echo "<h3>name: {$user['name']}</h3>";
	// 	echo "<h3>password: {$user['password']}</h3>";
	// }

	/*****************Выборка с защитой в автоматическом режиме******************/

	// :username - данная конструкция создает контейнер в который будут передаваться значения
	$sql = "SELECT * FROM `user` WHERE `name` =  :username AND `password` = :userpassword";

	// prepare($sql) - метод корорый подготавливает sql запрос
	$stmt = $db->prepare($sql);

	$userName = "Em";
	$userPassword = 123456;

	// bindValue() - данный метод делает подстановку значений в созданный контейнер :username
	$stmt->bindValue(':username', $userName);
	$stmt->bindValue(':userpassword', $userPassword);

	// execute(); - данный метод выполняет подготовленный запрос и зиписыват его в массив
	$stmt->execute();

	// в execute(); можно сразу передать массив с подготовленными полями не используя bindValue()
	// $stmt->execute(array(':username' => $userName, ':userpassword' => $userPassword));

	$stmt->bindColumn('name', $name);
	$stmt->bindColumn('email', $email);

	echo "<h2>Выборка с автоматической защитой от SQL инъекций</h2>";


	$stmt->fetch();
	
	echo "Имя пользователя: {$name} <br>";
	echo "Имя пользователя: {$email} <br>";

	/*****************Выборка с защитой в автоматическом режиме 2-й способ******************/

	// на место вопросов будем передавать значения, их необходимо передавать в том же порядке, в котором стоят вопрос иначе они получат значения, котрое предназначены не для них
	$sql = "SELECT * FROM `user` WHERE `name` =  ? AND `password` = ?";

	$stmt = $db->prepare($sql);

	$userName = "Em";
	$userPassword = 123456;

	// числа обозначают номер параметра, которому передаем значение
	$stmt->bindValue(1, $userName);
	$stmt->bindValue(2, $userPassword);
	$stmt->execute();

	// можно сразу передать массив с подготовленными полями не используя bindValue(), в данном примере ключи не нужны, главное предать значения в правильном порядке
	// $stmt->execute( array($userName, $userPassword) );

	$stmt->bindColumn('name', $name);
	$stmt->bindColumn('email', $email);

	echo "<h2>Выборка с автоматической защитой от SQL инъекций</h2>";

	$stmt->fetch();
	
	echo "Имя пользователя: {$name} <br>";
	echo "Имя пользователя: {$email} <br>";

	/*****************Защита от передачи скриптов******************/

	// htmlentities(string); - преобразовывает символы <> в &
	$string = "<script>hello!</script>";
	$string = htmlentities($string);
	echo "$string";

?>