<?php
/**
 * Script para excluir um produto.
 */
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = $pdo->prepare("DELETE FROM produtos WHERE id = ?");
    $query->execute([$id]);

    header("Location: dashboard.php");
    exit();
}
?>
