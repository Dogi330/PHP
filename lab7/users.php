<?php
declare(strict_types=1);

spl_autoload_register(function ($className) {
    // Преобразуем пространство имен в путь к файлу
    $filePath = str_replace('MyProject\\Classes\\', 'MyProject/Classes/', $className) . '.php';
    
    if (file_exists($filePath)) {
        require_once $filePath;
        return true;
    }
    return false;
});

use MyProject\Classes\User;
use MyProject\Classes\SuperUser;

echo "<h1>Демонстрация работы с классами</h1>";

echo "<h2>Обычные пользователи:</h2>";
/**
 * Создание объектов пользователей
 */
$user1 = new User("Александр Воронов", "voronov", "password1");
$user2 = new User("Дмитрий Соколов", "sokolov", "password2");
$user3 = new User("Анна Козлова", "kozlova", "password3");

/**
 * Вывод информации о пользователях
 */
$user1->showInfo();
$user2->showInfo();
$user3->showInfo();

/**
 * Создание суперпользователя
 */
echo "<h2>Суперпользователь:</h2>";
$superUser = new SuperUser("Администратор", "admin", "admin123", "Супер-администратор");
$superUser->showInfo();

echo "<p>Скрипт завершен. Объекты будут уничтожены автоматически.</p>";

?>

