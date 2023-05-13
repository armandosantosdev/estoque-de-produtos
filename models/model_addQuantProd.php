<?php
if(isset($_POST['btnSubmit'])) {

    require "../config/connect_db.php";

    $idProd = $_POST['idProdAdd'];
    $quantProdAdd = $_POST['quantProdAdd'];

    $sqlProd = "SELECT * FROM produtos WHERE id = $idProd";
    $resultProd = $conn->query($sqlProd);

    $rowProd = $resultProd->fetch_assoc();

    $quantProd = $rowProd['quantidade'];

    $quantidFinal = $quantProdAdd + $quantProd;

    $sqlAddQuand = "UPDATE produtos SET quantidade = $quantidFinal WHERE id = $idProd";
    $conm->query($sqlAddQuand);

    header("location: ../index.php");
    
}
?>