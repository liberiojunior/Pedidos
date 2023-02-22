<?php

$telefone = $_GET['telefone'];
$database = new mysqli('localhost', 'root', '', 'tpa_oo');

try{
    $sql = "SELECT * FROM cliente WHERE telefone = '$telefone'";
    if($result = $database->query ($sql))
    {
        echo json_encode( $result->fetch_assoc());
    }
    else
    {
        echo  $database->error;
    }
} catch (Exception $e){

    echo "erro";
}