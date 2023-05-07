<?php
    session_start();

    if(isset($_SESSION['nomeProd'])) {

        require_once "../config/connect_db.php";

        $nomeProd = $_SESSION['nomeProd'];
        $codigoProd = $_SESSION['codigoProd'];
        $fornecedorProd = $_SESSION['fornecedorProd'];
        $marcaProd = $_SESSION['marcaProd'];
        $quantidadeProd = $_SESSION['quantidadeProd'];
        $precoProd = $_SESSION['precoProd'];
        $dataProd = $_SESSION['dataProd'];
        $imgProd = $_SESSION['imgProd'];
        $idMyUser = $_SESSION['authUser']['id'];

        $sql = "INSERT INTO produtos (`nome`, `codigo`, `marca`, `quantidade`, `preco`, `image`, `idFornecedor`, `idUser`, `dataCompra`) VALUES ('$nomeProd','$codigoProd','$marcaProd','$quantidadeProd','$precoProd','$imgProd',$fornecedorProd,$idMyUser,'$dataProd')";

        $conn->query($sql);

        header('location: ../index.php');

        echo "01";

    } else {

        header('location: ../index.php');
        
    }
?>