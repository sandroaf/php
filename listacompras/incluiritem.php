<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incluir Item</title>
    <script language="JavaScript">
        function cancelar() {
            event.preventDefault();
            history.back();
        }
    </script>
</head>
<body>
    <h1>Incluir Item na Lista</h1>
    <br>
    <form action="../salvaritem.php" method="get">
        <label for="idescricao">Descrição: </label>
        <input type="text" id="idescricao" name="descricao" placeholder="Informe uma descrição para o item da lista" size="100" required>
        <br>
        <label for="iquantidade">Quantidade: </label>
        <input type="number" id="iquantidade" name="quantidade">
        <input type="hidden" id="hcodigolista" name="codigolista" value="<?=$_GET['lista']?>">
        <br><br>
        <button name="salvar" id="bsalvar" type="submit">Salvar</button> 
        <button name="bcancelar" id="bcancelar"
        type="reset" onclick="cancelar()">Cancelar</button>
    </form>
</body>
</html>