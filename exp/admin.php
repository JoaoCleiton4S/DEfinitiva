<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./estilos/estilos.css">
    <title>Administração do Cardápio - Restaurante</title>

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
                <a class="nav-link" href="PratosPrincipais.php">Pratos Principais <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            <li class="nav-item">
                <a class="nav-link" href="Acompanhamentos.php">Acompanhamentos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Bebidas.php">Bebidas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Sobremesas.php">Sobremesas</a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="LOGI.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Carrinho.php">Carrinho</a>
            </li>
        </ul>
    </div>
</nav>
</header>

<h2><br>Administração do Cardápio<br></h2>

<table>
    <tr>
        <th></th>
        <th>Segunda-feira</th>
        <th>Terça-feira</th>
        <th>Quarta-feira</th>
        <th>Quinta-feira</th>
        <th>Sexta-feira</th>
    </tr>
    <?php
    $horas = array("08:00", "09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00");
    foreach ($horas as $hora) {
        echo "<tr>";
        echo "<td class='hora'>$hora</td>";
        for ($i = 1; $i <= 5; $i++) {
            echo "<td class='atividade'></td>";
        }
        echo "</tr>";
    }
    ?>

    <tr>
        <td class='hora'>08:00</td>
        <td class='atividade'>Reunião</td>
        <td class='atividade destaque'>Treino</td>
        <td class='atividade'></td>
        <td class='atividade'></td>
        <td class='atividade'></td>
    </tr>
    <tr>
        <td class='hora'>09:00</td>
        <td class='atividade'></td>
        <td class='atividade'></td>
        <td class='atividade'></td>
        <td class='atividade'></td>
        <td class='atividade'></td>
    </tr>
    <tr>
        <td class='hora'>10:00</td>
        <td class='atividade'></td>
        <td class='atividade'></td>
        <td class='atividade'></td>
        <td class='atividade'></td>
        <td class='atividade'></td>
    </tr>
    
</table>

<p><br> Aqui você pode alterar o cardápio do restaurante.<br></p>
<h2>Editar Cardápio</h2>
    <table>
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Ações</th>
        </tr>
        <tr>
            <td>Frango à Parmegiana</td>
            <td>Peito de frango empanado, Molho de tomate, Queijo mussarela derretido por cima, Acompanhado de Arroz-Branco. Serve de 1 até 2 pessoas. Porção de 300g</td>
            <td>R$ 28.00</td>
            <td>
                <button class="edit-btn">Editar</button>
                <button class="delete-btn">Excluir</button>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Ações</th>
        </tr>
        <tr>
            <td>Sanduíche de Frango</td>
            <td>Pão, frango grelhado, alface, tomate, queijo e maionese </td>
            <td>R$ 18.00</td>
            <td>
                <button class="edit-btn">Editar</button>
                <button class="delete-btn">Excluir</button>
            </td>
        </tr>
    </table>

<br><button type="submit" class="btn btn-primary"><a href="logout.php">Sair</a></button>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<footer><br>Olá admin</footer>
</body>
</html>
