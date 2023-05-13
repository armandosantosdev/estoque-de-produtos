<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(isset($_POST['btnSubmit'])) {

    require_once "../config/connect_db.php";

    $idProd = $_POST['idProdAdd'];
    $quantProdAdd = $_POST['quantProdAdd'];

    $sqlProd = "SELECT * FROM produtos WHERE id = $idProd";
    $resultProd = $conn->query($sqlProd);

    $rowProd = $resultProd->fetch_assoc();

    $quantProd = $rowProd['quantidade'];

    $quantidFinal = $quantProdAdd + $quantProd;

    $sqlAddQuand = "UPDATE produtos SET quantidade = $quantidFinal WHERE id = $idProd";
    $conn->query($sqlAddQuand);

    header("location: ../index.php");
    
}
?>