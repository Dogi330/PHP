<?php
    $now = time();
    echo "Текущее время: " . $now;
    echo "<br>";
    
    $birthday = mktime(0,0,0,7,21,2005);
    echo "Мой день рождения: " . date('d.m.Y', $birthday);
    echo "<br>";
    
    $hour = getdate();
    $current_hour = $hour['hours'];
    echo "Текущий час: " . $current_hour;
    echo "<br>";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Использование функций даты и времени</title>
</head>
<body>
    
    <?php
    $welcome = "";
    if ($current_hour >= 0 && $current_hour < 6) {
        $welcome = 'Доброй ночи';
    } elseif ($current_hour >= 6 && $current_hour < 12) {
        $welcome = 'Доброе утро';
    } elseif ($current_hour >= 12 && $current_hour < 18) {
        $welcome = 'Добрый день';
    } else {
        $welcome = 'Добрый вечер';
    }
    echo $welcome;
    echo "<br>";
    
    // Простой способ вывода текущей даты
    echo "Сегодня: " . date('d.m.Y H:i:s');
    echo "<br>";
    
    // Альтернативный способ с IntlDateFormatter (если расширение установлено)
    if (class_exists('IntlDateFormatter')) {
        $formatter = new IntlDateFormatter(
            'ru_RU',
            IntlDateFormatter::FULL,
            IntlDateFormatter::MEDIUM,
            'Europe/Moscow'
        );
        echo "Текущая дата: " . $formatter->format(time());
        echo "<br>";
    }
    
    // Расчет дней до дня рождения
    $today = new DateTime();
    $nextBirthday = new DateTime();
    $nextBirthday->setDate($today->format('Y'), 7, 21); // 21 июля
    
    // Если день рождения в этом году уже прошел, берем следующий год
    if ($today > $nextBirthday) {
        $nextBirthday->modify('+1 year');
    }
    
    $interval = $today->diff($nextBirthday);
    
    echo "До моего дня рождения осталось: " . $interval->days . " дней";
    echo "<br>";
    
    // Более подробный вывод
    echo "До моего дня рождения осталось: " . $interval->format('%a дней, %h часов, %i минут, %s секунд');
    ?>
</body>
</html>
