<?php
require_once '../config/database.php';

$stmt = $pdo->query("SELECT * FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Data de Criação</th>
    </tr>
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?= $user['id'] ?></td>
        <td><?= $user['name'] ?></td>
        <td><?= $user['email'] ?></td>
        <td><?= $user['created_at'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>
