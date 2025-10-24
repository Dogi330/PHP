<?php
/*
ЗАДАНИЕ 1
*/
$name = 'Титов';
$age = 22;

?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Переменные и вывод</title>
</head>

<body>
    <h1>Переменные и вывод</h1>

    <?php
	// Выводим данные
	echo "Меня зовут: $name<br>";
	echo "Мне $age года<br>";
	echo "Тип переменной \$name: " . gettype($name) . "<br>";
	echo "Тип переменной \$age: " . gettype($age) . "<br>";

	// Удаляем переменные
	unset($name, $age);

	echo "Переменные удалены.";
	?>

</body>

</html>