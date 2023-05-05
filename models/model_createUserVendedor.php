<?php
session_start();

if(isset($_SESSION['usernameCreate'])) {

    $username = $_SESSION['usernameCreate'];
    $senha = $_SESSION['senhaCreate'];
    $cpfCreate = $_SESSION['cpfCreate'];

    require_once "../config/connect_db.php";

    $sqlVerifExistUser = "SELECT * FROM users WHERE nome = '$username' OR cpf = '$cpf'";

    $resultVerif = $conn->query($sqlVerifExistUser);

    if($resultVerif->num_rows > 0) {

        header("location: ../index.php");

    } else {

        $sql = "INSERT INTO users (cargo, nome, senha, cpf) VALUES ('VENDEDOR', '$username', '$senha', '$cpfCreate')";

        $result = $conn->query($sql);

        header("location: ../index.php");

    }

}
?>