<?php
declare(strict_types=1);

    function printStringVertically(string $str): void
    {
        $i = 0;
        $length = strlen($str);
        
        while ($i < $length) {
            echo $str[$i] . "<br>";
            $i++;
        }
    }

    $var = "HELLO";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Цикл while</title>
</head>
<body>
    <h1>Цикл while</h1>
    <?php
    printStringVertically($var);
    ?> 
</body>
</html>
