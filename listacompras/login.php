<?php
require_once("config.php");
session_start();
if (isset($_POST["logar"])) {
    if (($_POST["usuario"] == usuario_app) && ($_POST["senha"] == senha_app)) {
        //login correto
        $_SESSION["usuario"] = $_POST["usuario"];
        $_SESSION["conectado"] = true;
        header("Location: " . url_app . "/index.php");
    } else {
        $msg=("Login ou senha inválido.<br>");
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= url_app ?>/estilo.css">
    <script src="<?=url_app?>/funcoes.js"></script>
    <title>Login</title>
    <script>
        <?php
           if ($msg) {
               echo "salvarmsg('" . $msg . "');";
               $msg = "";
           }
        ?>       
    </script>
</head>

<body onload="mostramsg()">
    <main>
        <header>
            <h1>Lista de Compras - Login</h1>
            <aside id="msg"></aside>
        </header>
        <form action="<?= url_app ?>/login.php" method="post">
            <label>Usuário: </label>
            <input type="text" name="usuario" id="iusuario">
            <br>
            <label>Senha: </label>
            <input type="password" name="senha" id="isenha">
            <br><br>
            <button type="submit" name="logar">Logar</button>
        </form>
    </main>
</body>

</html>