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
    $today = new DateTime();
    $nextBirthday = new DateTime();
    $nextBirthday->setDate($today->format('Y'), 9, 13); // 13 сентября
    
    // Если день рождения в этом году уже прошел, берем следующий год
    if ($today > $nextBirthday) {
        $nextBirthday->modify('+1 year');
    }
    
    // Разница между датами
    $interval = $today->diff($nextBirthday);
    
    // Получаем общее количество секунд до дня рождения
    $seconds_until_birthday = $nextBirthday->getTimestamp() - $today->getTimestamp();
    
    // Вычисляем дни, часы, минуты и секунды
    $days = $interval->days;
    $hours = $interval->h;
    $minutes = $interval->i;
    $seconds = $interval->s;
    
    // Альтернативный расчет для точного времени
    $total_hours = floor($seconds_until_birthday / 3600);
    $total_minutes = floor(($seconds_until_birthday % 3600) / 60);
    $total_seconds = $seconds_until_birthday % 60;
    
    // Используем данные из интервала для согласованности
    echo "До моего дня рождения осталось: $days дней, $hours часов, $minutes минут, $seconds секунд";
    ?>
</body>
</html>
