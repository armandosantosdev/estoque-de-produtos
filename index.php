<?php
session_start();

if(empty($_SESSION['authUser'])) {

    include  "views/login.php";

} else if($_SESSION['authUser']['cargo'] == "GERENTE") {

    include "views/view_gerente.php";
    
} else if($_SESSION['authUser']['cargo'] == "VENDEDOR") {

    include "views/view_vendedor.php";
    
}
 ?>