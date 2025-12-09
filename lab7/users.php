<?php
declare(strict_types=1);

use MyProject\Classes\User;
use MyProject\Classes\SuperUser;

/**
 * Создание объектов пользователей
 * @var User $user1 Первый пользователь
 * @var User $user2 Второй пользователь
 * @var User $user3 Третий пользователь
 */

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

/**
 * Вывод информации о пользователях
 * 
 * Отображает заголовок и вызывает метод showInfo() для каждого пользователя.
 * Метод showInfo() выводит информацию в отформатированном виде.
 */

// Вывод информации
$user1->showInfo();
$user2->showInfo();
$user3->showInfo();

/**
 * Создание суперпользователя
 * 
 * Создает экземпляр класса SuperUser, который наследует от User
 * и добавляет дополнительное свойство - роль.
 * 
 * @var SuperUser $superUser Суперпользователь с правами администратора
 */







