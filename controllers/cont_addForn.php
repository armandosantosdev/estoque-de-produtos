<?php
if(isset($_POST['submitAddForn'])) {
    session_start();

    $_SESSION['nomeForn'] = $_POST['nomeForn'];
    $_SESSION['cnpjForn'] = $_POST['cnpjForn'];
    $_SESSION['contForn'] = $_POST['contForn'];

    header("location: ../models/model_addForn.php");
}
?>