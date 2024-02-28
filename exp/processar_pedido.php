<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./estilos/estilos.css">
    <title>Formuláriode Compras</title>
</head>
<body>

<h1>Informações do Pedido</h1>

<form action="processar_pedido.php" method="post">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required><br><br>

    <label for="endereco">Endereço:</label>
    <input type="text" id="endereco" name="endereco" required><br><br>

    <label for="cidade">Cidade:</label>
    <input type="text" id="cidade" name="cidade" required><br><br>

    <label for="estado">Estado:</label>
    <input type="text" id="estado" name="estado" required><br><br>

    <label for="cep">CEP:</label>
    <input type="text" id="cep" name="cep" required><br><br>

    <label for="pagamento">Meio de Pagamento:</label>
    <select id="pagamento" name="pagamento">
        <option value="cartao">Cartão de Crédito</option>
        <option value="boleto">Boleto Bancário</option>
        <option value="paypal">PayPal</option>
    </select><br><br>

    <label for="valor_total">Valor Total:</label>
    <input type="number" id="valor_total" name="valor_total" min="0" step="0.01" required><br><br>

    <label for="descontos">Descontos:</label>
    <input type="number" id="descontos" name="descontos" min="0" step="0.01"><br><br>

    <label for="frete">Frete:</label>
    <input type="number" id="frete" name="frete" min="0" step="0.01" required><br><br>

    <br><button type="submit">Finalizar Pedido</button><br>
</form>
<br><br><br>
<footer>
    &copy; 2024 ApenasUmBar. Todos os direitos reservados.
    <a href="#">Política de Privacidade</a> | <a href="#">Termos de Serviço</a>
</footer>

</body>
</html>
