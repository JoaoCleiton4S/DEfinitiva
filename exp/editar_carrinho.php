<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['produto_id']) && isset($_POST['nova_quantidade'])) {
    $produto_id = $_POST['produto_id'];
    $nova_quantidade = $_POST['nova_quantidade'];

    if (isset($_SESSION['carrinho'][$produto_id])) {
        $_SESSION['carrinho'][$produto_id]['quantidade'] = $nova_quantidade;
    }
}

header('Location: carrinho.php');
?>
