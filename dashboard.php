<?php
/**
 * Página de gerenciamento de produtos.
 */
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

include 'db.php';
$query = $pdo->query("SELECT * FROM produtos");
$produtos = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2 class="mt-5">Gerenciamento de Produtos</h2>
    <a href="add_product.php" class="btn btn-success mb-3">Adicionar Produto</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtos as $produto) { ?>
            <tr>
                <td><?= $produto['id'] ?></td>
                <td><?= $produto['nome'] ?></td>
                <td><?= $produto['descricao'] ?></td>
                <td>R$ <?= $produto['preco'] ?></td>
                <td><?= $produto['quantidade'] ?></td>
                <td>
                    <a href="update_product.php?id=<?= $produto['id'] ?>" class="btn btn-warning">Editar</a>
                    <a href="delete_product.php?id=<?= $produto['id'] ?>" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="logout.php" class="btn btn-secondary">Sair</a>
</div>
</body>
</html>
