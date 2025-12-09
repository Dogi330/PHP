<?php
declare(strict_types=1);

use MyProject\Classes\User;
use MyProject\Classes\SuperUser;

spl_autoload_register(function ($class) {

    //namespace
    $prefix = 'MyProject\\Classes\\';

    if (strpos($class, $prefix) !== 0) {
        return;
    }

    $relativePath = str_replace($prefix, '', $class);

    // Преобразуем namespace
    $relativePath = str_replace('\\', DIRECTORY_SEPARATOR, $relativePath);

    // Путь к файлам классов
    $file = __DIR__ . '/MyProject/Classes/' . $relativePath . '.php';

    if (file_exists($file)) {
        require_once $file;
    }
});

// Создание объектов
$user1 = new User("Александр Воронов", "voronov", "password1");
$user2 = new User("Дмитрий Соколов", "sokolov", "password2");
$user3 = new SuperUser("Админ", "admin", "superpass", "administrator");

// Вывод информации
$user1->showInfo();
$user2->showInfo();
$user3->showInfo();
