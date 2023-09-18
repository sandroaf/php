<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salvar Lista</title>
</head>
<body>
    <?php 
    //Abrir Conexao com Banco de Dados
    require_once "conexao.php";

    //Executar a Inclusão
    try {
        $parametro = ['nome' => $_GET['nome']];
        $stmt = $conn->prepare("INSERT INTO lista (codigo, nome) VALUES (null,:nome)");
        if ($stmt->execute($parametro)) {
            echo "Inclusão bem sucedida !";
        };
        echo "<br>";
        echo "<a href='./index.php'>Voltar</a>";
    } catch(PDOException $e) {
        echo "<pre>";
        echo "Erro ao executar".$e->getMessage();
        echo "</pre>";
    }
    ?>
</body>
</html>