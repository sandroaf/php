<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testes de Sessão</title>
</head>
<body>
    <h1>Teste de Sessão</h1>
    Exemplo de código para testar o uso de Sessões em PHP.
    <form action="gravar_session.php" method="post">
          <fieldset>
            <legend>Dados para Sessão</legend>
            <label for="inomedado">Nome do Dado:</label>  
            <input type="text" name="nomedado" id="inomedado">
            <br>
            <label for="ivalordado">Valor do Dado:</label>  
            <input type="text" name="valordado" id="ivalordado">
            <br>
            <button type="submit">Enviar</button>
          </fieldset>
    </form>
    <br>
    <a href="lista_session.php">Listar dados Sessão</a>
</body>
</html>