<?php
if ($_SERVER['PHP_SELF'] == '/estoque/views/view_gerente.php') {
    header('location: ../index.php');
}

require_once "functions/functions.php";
require_once "config/connect_db.php";

if(isset($_GET['sair'])) {
    exit_login();
}

if(isset($_GET['deleteVendedor_btn'])) {
    $id_vendedor = $_GET['id_vendedor'];
    $sqlDeleteVendedor = "DELETE FROM users WHERE id = '$id_vendedor'";
    $conn->query($sqlDeleteVendedor);

    header("location: index.php");
}

$cargo = $_SESSION['authUser']['cargo'];
$nome = $_SESSION['authUser']['nome'];
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
            <form action="controllers/cont_createUser.php" method="post">
                <legend>Criar usuario vendedor:</legend>

                <label for="username"><input type="text" name="username" id="username" placeholder="Nome:" required></label>
                <label for="senha"><input type="password" name="senha" id="senha" placeholder="Senha:" required></label>
                <label for="cpf"><input type="text" name="cpf" id="cpf" placeholder="CPF:" required></label>

                <button type="submit" name="create_userVendedor"><i class="fa-solid fa-plus"></i></button>
            </form>
        </div>
        <div>
            <h3>Vendedores:</h3>

<?php
    $sqlListVend = "SELECT * FROM users WHERE cargo = 'VENDEDOR'";

    $resultVendList = $conn->query($sqlListVend);

    if($resultVendList->num_rows == 0) {
        echo "Não há vendedores";
    } else {
?>
    
        <table>
            <tr>
                <th>Nome</td>
                <th>CPF</td>
            </tr>

        <?php
            while($rowsDataVend = $resultVendList->fetch_assoc()) {
?>

            <tr>
                <td class="valor"><?= $rowsDataVend['nome'] ?></td>
                <td class="valor"><?= $rowsDataVend['cpf'] ?></td>
                <td>
                    <form action="<?= htmlspecialchars('') ?>" method="get" class="delVendForm">
                        <input type="hidden" name="id_vendedor" value="<?= $rowsDataVend['id'] ?>">
                        <button type="submit" name="deleteVendedor_btn" class="iconLixo"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
            </tr>

<?php
            }
        ?>

        </table>

<?php
    }
?>
        </div>
    <hr>
        <div>
            <form action="controllers/cont_addForn.php" method="post">

                <legend>Adicionar fornecedor:</legend>
            
                <label for="nome"><input type="text" name="nomeForn" id="nome" placeholder="Nome:" required></label>
                <label for="cnpj"><input type="text" name="cnpjForn" id="cnpj" placeholder="CNPJ:" required></label>
                <label for="contato"><input type="text" name="contForn" id="contato" placeholder="Email ou telefone:" required></label>

                <button type="submit" name="submitAddForn"><i class="fa-solid fa-plus"></i></button>
            </form>
        </div>

        <div>
            <h3>Fornecedores:</h3>

            <table>
                <tr>
                    <th>Nome</th>
                    <th>CNPJ</th>
                    <th>CONTATO</th>
                </tr>

            <?php
            $sqlViewForn = "SELECT * FROM fornecedor";

            $resultViewForn = $conn->query($sqlViewForn);

            if($resultViewForn->num_rows == 0) {
                echo "Nao existe nenhum fornecedor";
            } else {

                while($rowViewForn = $resultViewForn->fetch_assoc()) {

?>
                <tr>
                    <td class="valor"><?= $rowViewForn['nome'] ?></td>
                    <td class="valor"><?= $rowViewForn['cnpj'] ?></td>
                    <td class="valor"><?= $rowViewForn['contato'] ?></td>
                </tr>
<?php
                    
                }                

            }
            ?>

            </table>
        </div>
        <hr>

        <div>
            
            <form action="" method="post" enctype="multipart/form-data">
            <legend>Adicione o produto</legend>
                <label for="nomeProd"><input type="text" name="nomeProd" id="nomeProd" placeholder="Nome:" required></label>
                <label for="codigoProd"><input type="text" name="codigoProd" id="codigoProd" placeholder="Codigo:" required></label>

                <input type="file" name="" id="">

                <label for="fornProd" class="labelForn">Fornecedor
                <select name="fornecedorProd" id="fornProd">
                    
<?php
                $sqlListForn = "SELECT * FROM fornecedor";
                $resultListForn = $conn->query($sqlListForn);

                if($resultListForn->num_rows == 0) {
                    echo "Não existe fornecedor";
                } else {
                    while($rowListForn = $resultListForn->fetch_assoc()) {
?>
                        <option value="<?= $rowListForn['id'] ?>"><?= $rowListForn['nome'] ?></option>
<?php
                    }
                }
?>
                </select>
                </label>
                
                <label for="marcaProd"><input type="text" name="marcaProd" id="marcaProd" placeholder="Marca:" required></label>
                <label for="quantidadeProd"><input type="number" name="quantidadeProd" id="quantidadeProd" placeholder="Quantidade:" required></label>
                <label for="precoProd"><input type="number" name="precoProd" id="precoProd" placeholder="Preço da unidade (R$):" required></label>
                <label for="dataProd"><input type="date" name="dataProd" id="dataProd" placeholder="Data da compra:" required></label>

                <button type="submit" name="btnAddProduto"><i class="fa-solid fa-plus"></i></button>
            </form>


        </div>
    </main>

    <footer>

    </footer>
</body>
</html>