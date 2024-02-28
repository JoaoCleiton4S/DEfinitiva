<?php
session_start();
include 'backend.php';

$produtos = getProdutos();

if (isset($_GET['categoria'])) {
    $categoriaSelecionada = $_GET['categoria'];
    if ($categoriaSelecionada !== 'todos') {
        $produtosFiltrados = array_filter($produtos, function ($produto) use ($categoriaSelecionada) {
            return $produto['categoria'] === $categoriaSelecionada;
        });
        if (empty($produtosFiltrados)) {
            echo '<p>Não há produtos nesta categoria.</p>';
        } else {
            $produtos = $produtosFiltrados;
        }
    }
}

function exibirProdutos($produtos)
{
    foreach ($produtos as $produto) {
        echo '<div class="produto">';
        echo '<img src="' . $produto['imagem'] . '" alt="' . $produto['nome'] . '">';
        echo '<h3>' . $produto['nome'] . '</h3>';
        echo '<p>' . $produto['descricao'] . '</p>';
        echo '<p>Preço: R$' . number_format($produto['preco'], 2) . '</p>';
        echo '<form action="adicionar_ao_carrinho.php" method="post">';
        echo '<input type="hidden" name="produto_id" value="' . $produto['id'] . '">';
        echo '<input type="number" name="quantidade" value="1" min="1">';
        echo '<button type="submit" class="btn btn-primary">Adicionar ao Carrinho</button>';
        echo '</form>';
        echo '</div>';
    }
}

if (isset($_SESSION['mensagem'])) {
    echo '<p class="mensagem">' . $_SESSION['mensagem'] . '</p>';
    unset($_SESSION['mensagem']);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./estilos/estilos.css">

    <title>Cardápio ApenasUmBar</title>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">ApenasUmBar Cardápio</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Pratos Principais <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Acompanhamentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Bebidas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sobremesas</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="logi.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="carrinho.php">Carrinho</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <h1>Catálogo de Produtos</h1>

    <form action="index.php" method="get" class="form-inline mb-2">
        <label for="filtro">Filtrar por categoria:</label>
        <select name="categoria" id="filtro" class="form-control mr-2">
            <option value="todos">Todos</option>
            <option value="pratos_principais">Pratos Principais</option>
            <option value="acompanhamentos">Acompanhamentos</option>
            <option value="bebidas">Bebidas</option>
            <option value="sobremesas">Sobremesas</option>
        </select>
        <button type="submit" class="btn btn-primary">Filtrar</button>
    </form>

    <?php

    foreach ($produtos as $produto) : ?>
        <div class="produto">
            <img src="<?= $produto['imagem']; ?>" alt="<?= $produto['nome']; ?>">
            <h3><?= $produto['nome']; ?></h3>
            <p><?= $produto['descricao']; ?></p>
            <p>Preço: R$<?= number_format($produto['preco'], 2); ?></p>
            <form action="adicionar_ao_carrinho.php" method="post">
                <input type="hidden" name="produto_id" value="<?= $produto['id']; ?>">
                <input type="number" name="quantidade" value="1" min="1">
                <button type="submit" class="btn btn-primary">Adicionar ao Carrinho</button>
            </form>
        </div>
    <?php endforeach; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<br><br><br>
<footer>
    &copy; 2024 ApenasUmBar. Todos os direitos reservados.
    <a href="#">Política de Privacidade</a> | <a href="#">Termos de Serviço</a>
</footer>
</body>
</html>