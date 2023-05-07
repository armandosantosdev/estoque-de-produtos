<?php
session_start();

if(isset($_SESSION['nomeForn'])) {
    $nomeForn =  $_SESSION['nomeForn'];
    $cnpjForn = $_SESSION['cnpjForn'];
    $contForn = $_SESSION['contForn'];

    require_once "../config/connect_db.php";

    $sqlVerifForn = "SELECT * FROM fornecedor WHERE nome = '$nomeForn' OR cnpj = '$cnpjForn'";

    $resultForn = $conn->query($sqlVerifForn);

    if($resultForn->num_rows == 0) {
        $sqlAddForn = "INSERT INTO fornecedor (nome_forn, cnpj, contato) VALUES ('$nomeForn', '$cnpjForn', '$contForn')";

        if($conn->query($sqlAddForn) == TRUE) {
            header("location: ../index.php");
        } else {
            echo "error add fornecedor";
        }
    } else {
        header("location: ../index.php");
    }
}
?>