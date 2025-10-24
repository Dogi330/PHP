<?php
declare(strict_types=1);

function createTableDimensions(): array
{
    $cols = 8;
    $rows = 6;
    return ['cols' => $cols, 'rows' => $rows];
}

function generateMultiplicationTable(int $cols, int $rows): string
{
    $html = '<table>';
    
    for ($i = 1; $i <= $rows; $i++) {
        $html .= '<tr>';
        for ($j = 1; $j <= $cols; $j++) {
            
            if ($i === 1 || $j === 1) {
                $html .= "<th>" . ($i * $j) . "</th>";
            } else {
                $html .= "<td>" . ($i * $j) . "</td>";
            }
        }
        $html .= '</tr>';
    }
    
    $html .= '</table>';
    return $html;
}


$dimensions = createTableDimensions();
$cols = $dimensions['cols'];
$rows = $dimensions['rows'];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Таблица умножения</title>
    <style>
        table {
            border: 2px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid black;
            text-align: center;
        }

        th {
            background-color: yellow;
            font-weight: bold;
        }
        
        td {
            background-color: white;
        }
    </style>
</head>
<body>
    <h1>Таблица умножения</h1>
    <?php
    echo generateMultiplicationTable($cols, $rows);
    ?> 
</body>
</html>
