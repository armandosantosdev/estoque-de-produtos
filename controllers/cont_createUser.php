<?php
if(isset($_POST['create_userVendedor'])) {

    session_start();
    
    $_SESSION['usernameCreate'] = $_POST['username'];
    $_SESSION['senhaCreate'] = $_POST['senha'];
    $_SESSION['cpfCreate'] = $_POST['cpf'];

    header('location: ../models/model_createUserVendedor.php');
}
?>