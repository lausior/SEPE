<?php
$tabla = max(1, min(10, (int)($_GET['num'] ?? 1)));
?>
<!DOCTYPE html>
<html lang='es'>

<head>
    <meta charset='UTF-8'>
    <title>Tabla del <?= $tabla ?></title>
    <style>
        body {
            font-family: Arial;
            max-width: 600px;
            margin: 40px auto;
        }

        nav {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        nav a {
            padding: 8px 14px;
            background: #1A3C6E;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }

        nav a.activo {
            background: #2E75B6;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #1A3C6E;
            color: white;
            padding: 10px;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #eee;
            text-align: center;
        }

        tr:nth-child(even) {
            background: #f0f4f8;
        }

        .resultado {
            font-weight: bold;
            color: #1A3C6E;
            font-size: 1.1em;
        }
    </style>
</head>

<body>
    <h1>Tabla del <?= $tabla ?></h1>
    <nav>
        <?php for ($i = 1; $i <= 10; $i++): ?>
            <a href='?num=<?= $i ?>' class='<?= $i === $tabla ? 'activo' : '' ?>'>
                Tabla del <?= $i ?>
            </a>
        <?php endfor; ?>
    </nav>
    <table>
        <tr>
            <th>Operación</th>
            <th>Resultado</th>
        </tr>
        <?php for ($i = 1; $i <= 10; $i++): ?>
            <tr>
                <td><?= $tabla ?> × <?= $i ?></td>
                <td class='resultado'><?= $tabla * $i ?></td>
            </tr>
        <?php endfor; ?>
    </table>
</body>

</html>