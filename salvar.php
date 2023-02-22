<?php

header("Content-Type: text/html; charset=utf8");
extract($_POST);

echo "Cliente: " . $pedido['nome'] . "
";
echo "Endereco: " . $pedido['endereco'] . "
";
echo "Telefone: " . $pedido['telefone'] . "
";
foreach ($pedido['itens'] AS $p){
    echo "Item: " . $p['Descrição'] . " preço: " . $p['Preço'];
}

