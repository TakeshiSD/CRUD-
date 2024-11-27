<?php
require_once '../config/database.php';

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
    $stmt->execute(['id' => $_GET['id']]);

    echo "Usuário excluído com sucesso!";
}
?>
