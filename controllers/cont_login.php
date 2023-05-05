<?php
    if(isset($_POST['submit_login'])) {
        session_start();

        $username = $_POST['username'];
        $senha = $_POST['senha'];

        $_SESSION['username'] = $username;
        $_SESSION['senha'] = $senha;

        header('location: ../models/model_login.php');

    } else {
        header('location: ../index.php');
    }
?>