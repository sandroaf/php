<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo carregamento Imagens</title>
</head>

<body>
    <form action="carregar.php" method="post" enctype="multipart/form-data">
        <label for="arquivo">Selecione imagem para upload:</label><br>
        <input type="file" name="arquivo" id="arquivo">
        <br><br>
        <input type="submit" value="Carregar Imagem" name="submit">
    </form>
</body>

</html>