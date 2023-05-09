<?php
    if(isset($_POST['btnCompra'])) {

        session_start();

        $_SESSION['quantidadeProd'] = $_POST['quantidadeProd'];
        $_SESSION['idUser'] = $_SESSION['authUser']['id'];
        $_SESSION['idProd'] = $_POST['idProd'];

        header('location: ../models/model_compra.php');
        
    }
?>