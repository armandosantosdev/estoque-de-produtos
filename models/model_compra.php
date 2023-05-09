<?php
session_start();

if(isset($_SESSION['idUser'])) {

    require_once "../config/connect_db.php";

    $quantidadeProd = $_SESSION['quantidadeProd'];
    $idUser = $_SESSION['idUser'];
    $idProd = $_SESSION['idProd'];

    $sqlEstoque = "SELECT quantidade FROM produtos WHERE id = $idProd";
    $resultEstoque = $conn->query($sqlEstoque);
    $rowEstoque = $resultEstoque->fetch_assoc();
    $quantidadeProdEstoque = $rowEstoque['quantidade'];

    $quantidadePos = $quantidadeProdEstoque - $quantidadeProd;

    $sqlInj = "UPDATE produtos SET quantidade = $quantidadePos WHERE id = $idProd";
    $conn->query($sqlInj);


    $sqlCompra = "INSERT INTO vendas(quant_prod, idUser, idProduto, dataVenda) VALUES ('$quantidadeProd', '$idUser', '$idProd', NOW())";

    $conn->query($sqlCompra);

    header('location: ../index.php');
    
}
?>