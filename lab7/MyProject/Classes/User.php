<?php
declare(strict_types=1);

namespace MyProject\Classes;
class User
{
    public string $name;
    public string $login;
    private string $password;
    public function __construct(string $name, string $login, string $password)
    {
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
    }
    public function showInfo(): void
    {
        echo "<p>Имя: {$this->name}<br>Логин: {$this->login}</p>";
    }
    public function __destruct()
    {
        echo "<p>Пользователь {$this->login} удален.</p>";
    }
}
