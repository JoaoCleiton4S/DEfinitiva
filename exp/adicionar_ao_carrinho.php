<?php
session_start();
include 'backend.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['produto_id'])) {
    $produto_id = $_POST['produto_id'];

    
    if (!isset($_SESSION['carrinho'][$produto_id])) {
        $_SESSION['carrinho'][$produto_id] = 0;
    }
    $_SESSION['carrinho'][$produto_id]++;

    
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;
}
?>
