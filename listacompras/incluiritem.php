<!DOCTYPE html>
<html lang="pt-br">
<?php require_once("config.php") ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="<?=url_app?>/estilo.css">
    <script src="<?=url_app?>funcoes.js"></script>
    <title>Incluir Item</title>
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
            <h1>Incluir Item na Lista</h1>
        </header>

        <br>
        <form action="<?=url_app?>/salvaritem.php" method="get">
            <label for="idescricao">Descrição: </label>
            <input type="text" id="idescricao" name="descricao" placeholder="Informe uma descrição para o item da lista" size="100" required>
            <br>
            <label for="iquantidade">Quantidade: </label>
            <input type="number" id="iquantidade" name="quantidade">
            <input type="hidden" id="hcodigolista" name="codigolista" value="<?= $_GET['lista'] ?>">
            <br><br>
            <button name="salvar" id="bsalvar" type="submit">Salvar</button>
            <button name="bcancelar" id="bcancelar" type="reset" onclick="cancelar()">Cancelar</button>
        </form>
    </main>
</body>

</html>