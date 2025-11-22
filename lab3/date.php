<?php
declare(strict_types=1);

/*
ЗАДАНИЕ 1
- Присвойте переменной $now значение метки времени актуальной даты(сегодня)
- Присвойте переменной $birthday значение метки времени Вашего дня рождения
- Создайте переменную $hour
- С помощью функции getdate() присвойте переменной $hour текущий час
*/

/**
 * Инициализирует переменные с датами и временем
 * 
 * @return array Массив с временными данными
 */
function initializeDateTimeVariables(): array
{
    $now = time();
    
    // День рождения 13 сентября 2003 года
    $birthday = mktime(0, 0, 0, 9, 13, 2003);
    
    $currentDate = getdate();
    $hour = $currentDate['hours'];
    
    return [
        'now' => $now,
        'birthday' => $birthday,
        'hour' => $hour
    ];
}

/**
 * Определяет приветствие в зависимости от времени суток
 * 
 * @param int $hour Текущий час (0-23)
 * @return string Приветственное сообщение
 */
function getWelcomeMessage(int $hour): string
{
    if ($hour >= 0 && $hour < 6) {
        return 'Доброй ночи';
    } elseif ($hour >= 6 && $hour < 12) {
        return 'Доброе утро';
    } elseif ($hour >= 12 && $hour < 18) {
        return 'Добрый день';
    } else {
        return 'Добрый вечер';
    }
}

/**
 * Форматирует дату на русском языке
 * 
 * @param int $timestamp Метка времени
 * @return string Отформатированная дата
 */
function formatRussianDate(int $timestamp): string
{
    // Если расширение intl не установлено, используем ручной формат
    if (!extension_loaded('intl')) {
        $months = [
            1 => 'января', 2 => 'февраля', 3 => 'марта', 4 => 'апреля',
            5 => 'мая', 6 => 'июня', 7 => 'июля', 8 => 'августа',
            9 => 'сентября', 10 => 'октября', 11 => 'ноября', 12 => 'декабря'
        ];
        
        $weekdays = [
            0 => 'воскресенье', 1 => 'понедельник', 2 => 'вторник',
            3 => 'среда', 4 => 'четверг', 5 => 'пятница', 6 => 'суббота'
        ];
        
        $day = date('d', $timestamp);
        $month = (int)date('n', $timestamp);
        $year = date('Y', $timestamp);
        $weekday = (int)date('w', $timestamp);
        $time = date('H:i:s', $timestamp);
        
        return "Сегодня $day $months[$month] $year года, $weekdays[$weekday] $time";
    }
    
    $fmt = datefmt_create(
        'ru_RU',
        IntlDateFormatter::FULL,
        IntlDateFormatter::MEDIUM,
        'Europe/Moscow',
        IntlDateFormatter::GREGORIAN,
        "Сегодня d MMMM y 'года', eeee HH:mm:ss"
    );
    
    return datefmt_format($fmt, $timestamp);
}

/**
 * Вычисляет оставшееся время до дня рождения
 * 
 * @param int $now Текущая метка времени
 * @param int $birthday Метка времени дня рождения
 * @return array Массив с оставшимися днями, часами, минутами и секундами
 */
function getTimeUntilBirthday(int $now, int $birthday): array
{
    // Создаем объекты DateTime для расчета
    $today = new DateTime();
    $nextBirthday = new DateTime();
    $nextBirthday->setTimestamp($birthday);
    $nextBirthday->setDate((int)$today->format('Y'), (int)$nextBirthday->format('m'), (int)$nextBirthday->format('d'));
    
    // Если день рождения в этом году уже прошел, берем следующий год
    if ($today > $nextBirthday) {
        $nextBirthday->modify('+1 year');
    }
    
    // Вычисляем разницу в секундах
    $secondsLeft = $nextBirthday->getTimestamp() - $now;
    
    $days = floor($secondsLeft / (60 * 60 * 24));
    $hours = floor(($secondsLeft % (60 * 60 * 24)) / (60 * 60));
    $minutes = floor(($secondsLeft % (60 * 60)) / 60);
    $seconds = $secondsLeft % 60;
    
    return [
        'days' => $days,
        'hours' => $hours,
        'minutes' => $minutes,
        'seconds' => $seconds
    ];
}

// Инициализация переменных
$data = initializeDateTimeVariables();
$now = $data['now'];
$birthday_timestamp = $data['birthday'];
$hour = $data['hour'];

// Получение приветствия
$welcome = getWelcomeMessage($hour);

// Форматирование даты
$formattedDate = formatRussianDate($now);

// Вычисление времени до дня рождения
$timeUntilBirthday = getTimeUntilBirthday($now, $birthday_timestamp);
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
    // Вывод в требуемом формате
    echo "Сегодня: " . date('d.m.Y H:i:s', $now);
    echo "<br>";
    
    echo "Мой день рождения: " . date('d.m.Y', $birthday_timestamp);
    echo "<br>";
    
    echo $hour;
    echo "<br>";
    
    echo $welcome;
    echo "<br>";
    
    echo $formattedDate;
    echo "<br>";
    
    echo "До моего дня рождения осталось: " . 
         $timeUntilBirthday['days'] . " дней, " .
         $timeUntilBirthday['hours'] . " часов, " .
         $timeUntilBirthday['minutes'] . " минут, " .
         $timeUntilBirthday['seconds'] . " секунд";
    ?>
    
</body>
</html>
