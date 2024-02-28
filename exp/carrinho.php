<?php
session_start();
include 'backend.php';

function adicionarAoCarrinho($produto_id)
{

    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = [];
    }

    if (isset($_SESSION['carrinho'][$produto_id])) {

        $_SESSION['carrinho'][$produto_id]++;
    } else {

        $_SESSION['carrinho'][$produto_id] = 1;
    }
}

function removerDoCarrinho($produto_id)
{

    if (isset($_SESSION['carrinho'][$produto_id])) {

        unset($_SESSION['carrinho'][$produto_id]);
    }
}

function getCarrinho()
{
    return isset($_SESSION['carrinho']) ? $_SESSION['carrinho'] : [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['produto_id'])) {

    $produto_id = $_POST['produto_id'];

    removerDoCarrinho($produto_id);

    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;
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
    <title>Carrinho de Compras</title>

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
                        <a class="nav-link" href="Carrinho.php">Carrinho</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <h1>Itens no Carrinho</h1>

    <?php

    $carrinho = getCarrinho();

    if (empty($carrinho)) {
        echo '<p>O carrinho está vazio.</p>';
    } else {
        echo '<table class="table">';
        echo '<thead><tr><th>Nome do Produto</th><th>Quantidade</th>
        <th>Preço</th><th>Total</th><th>Remover</th></tr></thead>';
        echo '<tbody>';
        foreach ($carrinho as $produto_id => $quantidade) {
            $produto = getProdutoById($produto_id);
            if ($produto) {
                $preco = getPrecoProdutoById($produto_id);
                if ($preco !== null) {
                    $totalItem = $preco * $quantidade;
                    echo "<tr><td>{$produto['nome']}</td><td>$quantidade</td><td>R$ $preco</td><td>R$ $totalItem</td><td>
                    <a href='remover_do_carrinho.php?produto_id=$produto_id' class='btn btn-danger'>Remover</a></td></tr>";
                } else {
                    echo "<tr><td colspan='5'>Erro: Preço não disponível para o produto.</td></tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Erro: Produto não encontrado.</td></tr>";
            }
        }
    }

    ?>
    <br>
    <form action="processar_pedido.php" method="post">
        <button type="submit" class="botao-finalizar">Finalizar Compra</button>
    </form>

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