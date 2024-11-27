<?php
require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
    $stmt->execute(['name' => $name, 'email' => $email]);

    echo "Usuário criado com sucesso!";
}
?>

<form method="POST">
    <input type="text" name="name" placeholder="Nome" required>
    <input type="email" name="email" placeholder="Email" required>
    <button type="submit">Cadastrar</button>
</form>