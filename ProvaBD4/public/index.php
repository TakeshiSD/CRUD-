<?php
// Inclui a configuração de conexão com o banco de dados
require_once '../config/database.php';

// Busca todos os registros da tabela "users"
$stmt = $pdo->query("SELECT * FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD em PHP</title>
    <style>
        table {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        a {
            text-decoration: none;
            color: blue;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Sistema CRUD em PHP</h1>
    <div style="text-align: center; margin-bottom: 20px;">
        <a href="create.php">Cadastrar Novo Usuário</a>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['name'] ?></td>
            <td><?= $user['email'] ?></td>
            <td>
                <a href="update.php?id=<?= $user['id'] ?>">Editar</a> | 
                <a href="delete.php?id=<?= $user['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir este usuário?')">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>