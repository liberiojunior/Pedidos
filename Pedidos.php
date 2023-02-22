

<?php


require_once 'index.php';
header("Content-Type: text/html; charset=utf8");


class Pedidos {

		private $id;
		private $quantidade;
		private $descricao;
		private $preco_compra;
		private $preco_venda;
		private $foto;

		public function __construct($id=null,$quantidade=null,$descricao=null,$preco_compra=null,$preco_venda=null,$foto=null){

        $this->id = $id;
        $this->quantidade = $quantidade;
        $this->descricao = $descricao;
        $this->preco_compra = $preco_compra;
        $this->preco_venda = $preco_venda;
        $this->foto = $foto;

    }

    public function listarProduto(){



        define('SERVIDOR', 'mysql:host=localhost;dbname=tpa_oo');
        define('USUARIO', 'root');
        define('SENHA', '');

        $con = new PDO(SERVIDOR, USUARIO, SENHA);
        $sql = $con->prepare("SELECT * FROM produto");
        $sql->execute();
        $produtos=$sql->fetchAll(PDO::FETCH_CLASS);

        echo "<table class='table table-hover'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>DESCRIÇÃO:</th>";
        echo "<th>PREÇO DE VENDA:</th>"; 
        echo "<th>FOTO DO PRODUTO:</th>";
        echo "</tr>";
        echo "</thead>";
        foreach($produtos AS $p){
        	//echo "<tbody>";
            echo "<tr>";
        	echo "<td>".$p->descricao."</td>";
        	echo "<td>".$p->preco_venda."</td>";
			echo "<td><img height='130px' src='../produtos/images/".$p->foto."'></td>";
            echo "<td><button  class='btn btn-danger'  onclick=\"AddTableRow(this,'$p->descricao','$p->preco_venda')\">+ Adicionar</button></td>";
        	
        	echo "</tr>";
            //echo "</tbody>";
        }
        echo "</table>";

}


 }