<?php
require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $stmt = $pdo->prepare("UPDATE users SET name = :name, email = :email WHERE id = :id");
    $stmt->execute(['id' => $id, 'name' => $name, 'email' => $email]);

    echo "Usuário atualizado com sucesso!";
} elseif (isset($_GET['id'])) {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->execute(['id' => $_GET['id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<form method="POST">
    <input type="hidden" name="id" value="<?= $user['id'] ?>">
    <input type="text" name="name" value="<?= $user['name'] ?>" required>
    <input type="email" name="email" value="<?= $user['email'] ?>" required>
    <button type="submit">Atualizar</button>
</form>
