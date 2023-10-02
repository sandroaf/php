<!DOCTYPE html>
<html lang="pt-br">
<?php require_once("config.php") ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="<?=url_app?>/estilo.css">
    <script src="<?=url_app?>funcoes.js"></script>
    <title>Incluir Lista</title>
    <script language="JavaScript">
        function cancelar() {
            event.preventDefault();
            history.back();
        }
    </script>
</head>

<body>
    <main>
        <header>
            <h1>Incluir Lista</h1>
        </header>
        <br>
        <form action="<?=url_app?>/salvarlista.php" method="get">
            <label for="inome">Nome: </label>
            <input type="text" id="inome" name="nome" placeholder="Inform um nome para a lista" size="100" required>
            <br><br>
            <button name="salvar" id="bsalvar" type="submit">Salvar</button>
            <button name="bcancelar" id="bcancelar" type="reset" onclick="cancelar()">Cancelar</button>
        </form>
</body>
</main>

</html>