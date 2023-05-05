<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/login.css">
    <title>Login</title>
</head>
<body>
    <form action="controllers/cont_login.php" method="post">
        <input type="text" name="username" id="username" placeholder="Nome:" required><br>
        <input type="password" name="senha" id="senha" placeholder="Senha:" required><br>

        <button type="submit" name="submit_login">Entrar</button>
    </form>
</body>
</html>
-->


<!DOCTYPE html>
<html>
<head>
    <title></title>
    <!-- lib de icons -->
    <link rel="stylesheet" type="text/css" href="./assets/login.css">
    <link rel="stylesheet" type="text/css"href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
</head>
<body>
      <main>
      <h1><div style='text-align:right'>Login </div> </h1>

        <form action="./controllers/cont_login.php" method="post">
            <label for="email">
                <span>Usuário</span>
            <div>
                <input type="text" id="nome" name="username">
            </div>
            </label>

            <label for="password">
                <span>Senha</span>
                <div>
                <input type="password" id="senha" name="senha">
                <span class="lnr lnr-eye"></span>
            </div>
            </label>

        <h2>
            <button type="submit" name="submit_login">Entrar</button>
        </h2>
    </form>

     </main>

</body>
<script type="text/javascript">

let btn = document.querySelector('.lnr-eye');

btn.addEventListener('click', function() {
    
    let input = document.querySelector('#senha');
    if(input.getAttribute('type') == 'password') {
    input.setAttribute('type', 'text');

} else {

    input.setAttribute('type', 'password');

}
});
</script>
</html>