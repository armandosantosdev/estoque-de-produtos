
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