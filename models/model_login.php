<?php
session_start();

if(isset($_SESSION['username'])) {
    require_once '../config//connect_db.php';

    $username = $_SESSION['username'];
    $senha = $_SESSION['senha'];

    echo $username . $senha;

    $sql = "SELECT * FROM users WHERE nome = '$username' AND senha = '$senha'";

    $result = $conn->query($sql);

    if($result->num_rows == 1) {
        while($row = $result->fetch_assoc()) {
            $_SESSION['authUser'] = [
                "id" => $row['id'],
                "cargo" => $row['cargo'],
                "nome" => $row['nome'],
                "cpf" => $row['cpf']
            ];
        }

        header('location: ../index.php');
    } else {
        header('location: ../index.php');
    }
} else {
    header("location: ../index.php");
}
?>