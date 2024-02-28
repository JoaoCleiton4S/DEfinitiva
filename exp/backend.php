<?php
function getProdutoById($id)
{
    $produtos = getProdutos();
    foreach ($produtos as $produto) {
        if ($produto['id'] == $id) {
            return ['id' => $id, 'nome' => $produto['nome']];
        }
    }
    return null;
}

function getPrecoProdutoById($produto_id)
{
    $produtos = getProdutos();
    foreach ($produtos as $produto) {
        if ($produto['id'] == $produto_id) {
            return $produto['preco'];
        }
    }
    return null;
}

function getProdutosPorPagina($pagina, $itensPorPagina = 3)
{
    $produtos = getProdutos();
    $totalProdutos = count($produtos);
    $indiceInicial = ($pagina - 1) * $itensPorPagina;
    $indiceFinal = min($indiceInicial + $itensPorPagina, $totalProdutos);

    return array_slice($produtos, $indiceInicial, $indiceFinal - $indiceInicial);
}

function getProdutos()
{
    return [
        [
            'id' => 1,
            'nome' => 'Frango à Parmegiana',
            'descricao' => 'Peito de frango empanado, Molho de tomate, Queijo mussarela derretido por cima, 
            Acompanhado de Arroz-Branco. Serve de 1 até 2 pessoas. Porção de 300g',
            'preco' => 28.00,
            'imagem' => 'frangoApar.png',
            'categoria' => 'pratos_principais'
        ],
        [
            'id' => 2,
            'nome' => 'Feijoada Completa',
            'descricao' => 'A estrela do cardápio, composta por feijão-preto cozido, 
            carne de porco (costela, lombo e carne seca) e linguiça calabresa. 
            Acompanhado por: Arroz Branco, Couve Refogada, Farofa. Serve até 4 pessoas.',
            'preco' => 40.00,
            'imagem' => 'feijoada.png',
            'categoria' => 'pratos_principais'
        ],
        [
            'id' => 3,
            'nome' => 'Spaghetti Carbonara',
            'descricao' => 'Preparado com massa spaghetti, Bacon, Queijo parmesão, Ovos, 
            Pimenta preta e gratinado com queijo parmesão ralado',
            'preco' => 24.99,
            'imagem' => 'espaguete.png',
            'categoria' => 'pratos_principais'
        ],
        [
            'id' => 4,
            'nome' => 'Água Mineral com/s Gás',
            'descricao' => 'Garrafa de 500ml',
            'preco' => 3.99,
            'imagem' => 'aguamineral.png',
            'categoria' => 'bebidas'
        ],
        [
            'id' => 5,
            'nome' => 'Suco Natural',
            'descricao' => '300ml',
            'preco' => 5.99,
            'imagem' => 'suco.png',
            'categoria' => 'bebidas'
        ],
        [
            'id' => 6,
            'nome' => 'Refrigerante Coca-Cola',
            'descricao' => 'Lata 350ml',
            'preco' => 2.49,
            'imagem' => 'latinha.png',
            'categoria' => 'bebidas'
        ],
    ];
}

?>
