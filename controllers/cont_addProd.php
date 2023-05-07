<?php
if(isset($_POST['btnAddProduto'])) {
    session_start();

    $_SESSION['nomeProd'] = $_POST['nomeProd'];
    $_SESSION['codigoProd'] = $_POST['codigoProd'];
    $_SESSION['fornecedorProd'] = $_POST['fornecedorProd'];
    $_SESSION['marcaProd'] = $_POST['marcaProd'];
    $_SESSION['quantidadeProd'] = $_POST['quantidadeProd'];
    $_SESSION['precoProd'] = $_POST['precoProd'];
    $_SESSION['dataProd'] = $_POST['dataProd'];
    
    $target_dir = "../assets/uploads/";
    $target_file = $target_dir . basename($_FILES["imgProd"]["name"]);
    $uploadOk = 1;
    $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if ($_FILES["imgProd"]["size"] > 10000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if($FileType != "jpg" && $FileType != "png" && $FileType != "jpeg") {
        echo "Sorry, only PDF files are allowed."; 
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["imgProd"]["tmp_name"], $target_file)) {
            $_SESSION['imgProd'] = htmlspecialchars( basename( $_FILES["imgProd"]["name"]));

        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    header("location: ../models/model_addProd.php");
}
?>