<?php
    $now = time();
    
    $birthday = mktime(0,0,0,9,13,2003);
    
    $hour = getdate();
    $current_hour = $hour['hours'];
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
    // Вывод текущей даты и времени
    echo "Сегодня: " . date('d.m.Y H:i:s');
    echo "<br>";
    
    // Вывод дня рождения
    echo "Мой день рождения: " . date('d.m.Y', $birthday);
    echo "<br>";
    
    // Вывод текущего часа
    echo $current_hour;
    echo "<br>";
    
    // Определение приветствия
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
    
    // Вывод форматированной даты на русском
    $months = [
        1 => 'января', 2 => 'февраля', 3 => 'марта', 4 => 'апреля',
        5 => 'мая', 6 => 'июня', 7 => 'июля', 8 => 'августа',
        9 => 'сентября', 10 => 'октября', 11 => 'ноября', 12 => 'декабря'
    ];
    
    $weekdays = [
        0 => 'воскресенье', 1 => 'понедельник', 2 => 'вторник',
        3 => 'среда', 4 => 'четверг', 5 => 'пятница', 6 => 'суббота'
    ];
    
    $current_day = date('j');
    $current_month = date('n');
    $current_year = date('Y');
    $current_weekday = date('w');
    $current_time = date('H:i:s');
    
    echo "Сегодня $current_day $months[$current_month] $current_year года, $weekdays[$current_weekday] $current_time";
    echo "<br>";
    
    // Расчет времени до дня рождения
    $current_timestamp = time();
    $next_birthday_timestamp = mktime(0, 0, 0, 9, 13, date('Y')); // 13 сентября текущего года
    
    // Если день рождения в этом году уже прошел, берем следующий год
    if ($current_timestamp > $next_birthday_timestamp) {
        $next_birthday_timestamp = mktime(0, 0, 0, 9, 13, date('Y') + 1);
    }
    
    // Вычисляем разницу в секундах
    $seconds_until_birthday = $next_birthday_timestamp - $current_timestamp;
    
    // Вычисляем дни, часы, минуты и секунды
    $days = floor($seconds_until_birthday / (60 * 60 * 24));
    $hours = floor(($seconds_until_birthday % (60 * 60 * 24)) / (60 * 60));
    $minutes = floor(($seconds_until_birthday % (60 * 60)) / 60);
    $seconds = $seconds_until_birthday % 60;
    
    echo "До моего дня рождения осталось: $days дней, $hours часов, $minutes минут, $seconds секунд";
    ?>
</body>
</html>
