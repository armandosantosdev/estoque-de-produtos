<?php
function exit_login() {
    session_destroy(); header("location: index.php");
}
?>