<?php include 'inc/header.php';
header("Content-Type: text/html; charset=utf8");
require_once ("Pedidos.php");
$pedido = new Pedidos();?>

<br><br><br><br>
<html lang="en">
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>

<script>


    $(document).ready(function() {

        $("#telefone").blur(function () {


            $.getJSON("webservice.php?telefone="+ $(this).val(), function(dados) {

                $("#nome").val(dados.nome);
                $("#email").val(dados.email);
                $("#endereco").val(dados.endereco);
                


            });

        });


    });

    (function($) {

        AddTableRow = function(item, descricao, preco) {
            var newRow = $("<tr>");
            var cols = "";
            var i = 1;

            cols += '<td class="col-sm-11"><button onclick="RemoveTableRow(this)"  type="button" class="btn btn-danger btn-no-print"><i class="glyphicon glyphicon-trash" aria-hidden="true"></i></button>&nbsp;';
            cols += descricao;

            cols += '</td><td class="col-sm-1 text-right subtotal">'+ parseFloat(preco).toFixed(2)+'</td>';
            newRow.append(cols);
            $("#products-table").append(newRow);

            var soma = 0;
            $(".subtotal" ).each( function() {
                soma += Number( $( this ).html() );
            } );


            $( "#total" ).val(  "R$ " + parseFloat(soma).toFixed(2) );

            return false;
        };

    })(jQuery);

    (function($) {

        RemoveTableRow = function(item) {
            var tr = $(item).closest('tr');

            async: false;
            tr.remove();
            async: true;

            var soma = 0;
            $( ".subtotal" ).each( function() {
                soma += Number( $( this ).html() );
            } );
            $( "#total" ).val( "R$ " + parseFloat(soma).toFixed(2) );


            return false;
        }

    })(jQuery);

</script>

<script>

    function pedidos(){

        var pedido = {
            nome : $( "#nome" ).val(),
            endereco : $( "#endereco" ).val(),
            telefone : $( "#telefone" ).val(),
            itens: []
        }

        var $th = $('#products-table th');
        $('#products-table tbody tr').each(function(i, tr){
            var obj = {}, $tds = $(tr).find('td');
            $th.each(function(index, th){
                obj[$(th).text()] = $tds.eq(index).text();
            });
            pedido.itens.push(obj);
        });

        $.post("salvar.php", {pedido: pedido}, function(result){
            alert(result)
        });

    };

</script>

<body>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-4 ">
        <div class="col-sm-11">
        
            <h4><b>Dados do Cliente</b></h4><br>
            <label for="telefone">Telefone:</label>
            <input type="telefone" class="form-control" id="telefone" name="telefone" >
            <label for="nome">Nome:</label>
            <input type="nome" class="form-control" id="nome" name="nome" >
            <label for="endereco">Endereço:</label>
            <input type="endereco" class="form-control" id="endereco" name="endereco" >
            <br><br>
            </div>
            <br> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            
            <div class="col-sm-11 well">
                <h4><b>Lista de Compras</b></h4>

                 <table class="table table-hover" id="products-table" name="products-table">
                     <thead>
                     <tr>
                         <th>Descrição</th>
                         <th>Quantidade</th>
                         <th>Preço</th>
                     </tr>
                     </thead>
                     <tbody>

                     </tbody>
                 </table>
               <h5><b>Total:</b></h5>
                &nbsp;&nbsp;&nbsp; <input type="text" id="total" name="total" disabled>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button onclick="return pedidos()" class='btn btn-danger' id="btn-imprimir" name="btn-imprimir">Finalizar </button>


            </div>
           
            

        </div>
        <div class="col-sm-8">
        
            <h4><b>Produtos</b></h4>
            <?php
            $pedido->listarProduto(); ?>
        </div>

    </div>


</div>

</body>
</html>
