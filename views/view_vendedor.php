<?php
if ($_SERVER['PHP_SELF'] == '/estoque/views/view_gerente.php') {
    header('location: ../index.php');
}

require_once "functions/functions.php";
require_once "config/connect_db.php";

if(isset($_GET['sair'])) {
    exit_login();
}

$cargo = $_SESSION['authUser']['cargo'];
$nome = $_SESSION['authUser']['nome'];
$idUser = $_SESSION['authUser']['id'];

if(!isset($_GET['btnSearch'])){
    $sqlListProd = "SELECT * FROM produtos WHERE quantidade > 0";
}elseif(isset($_GET['btnSearch'])){
    $search = $_GET['textSearch'];
    $sqlListProd = "SELECT * FROM produtos WHERE nome LIKE '%$search%' OR marca LIKE '%$search%' AND quantidade > 0";
}else{
    $sqlListProd = "SELECT * FROM produtos WHERE quantidade > 0";
}

$resultListProd = $conn->query($sqlListProd);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b32c427eaf.js" crossorigin="anonymous"></script>
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="./assets/gerente.css">
<body>

    <header>
        <div>
            <h1>ESTOQUE</h1>
        </div>
        <nav>
            <ul class="nav-list">
                <li><?= $cargo ?></li>
                <li><?= $nome ?></li>
                <li id="li-exit">
                    <form action="<?= htmlspecialchars('') ?>" method="get">
                        <button class="btn_exit" type="sair" name="sair">Sair</button>
                    </form>
                </li>
            </ul>
        </nav>
    </header>

    <main>

        <div>
            <form action="<?= htmlspecialchars('') ?>" method="get">
                <input type="text" name="textSearch" id="textSearch">
                <button name="btnSearch" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>

        <div>

<?php
    if($resultListProd->num_rows == 0) {

        echo "Não há produtos!";

    } else {
        while($rowListProd = $resultListProd->fetch_assoc()) {
?>

            <div>
                <div>
                    <img style="height: 80px; aspect-ratio: 1 / 1;" src="assets/uploads/<?= $rowListProd['image'] ?>" alt="">
                </div>

                <div>
                    <p><?= $rowListProd['nome'] ?></p>
                    <p><?= $rowListProd['marca'] ?></p>
                    <p>R$<?= $rowListProd['preco'] ?></p> 
                </div>

                <form action="controllers/cont_compra.php" method="post">
                    <label for="quantidadeProd">Quantidade:<input type="number" name="quantidadeProd" max="<?= $rowListProd['quantidade'] ?>" min="1" required></label>

                    <input type="hidden" name="idProd" value="<?= $rowListProd['id'] ?>">

                    <button type="submit" name="btnCompra"><i class="fa-sharp fa-solid fa-arrow-right"></i></button>
                </form>
            </div>

<?php
        }
    }
?>
            
        </div>
        
    </main>
</body>
</html>