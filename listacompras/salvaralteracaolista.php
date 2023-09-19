<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salvar Alteração Lista</title>
</head>
<body>
    <?php 
    //Abrir Conexao com Banco de Dados
    require_once "conexao.php";

    //Executar a Inclusão
    try {
        $parametro = ['codigo' => $_GET['codigo']
                     ,'nome'=> $_GET['nome']];
        $stmt = $conn->prepare("UPDATE lista SET nome = :nome WHERE lista.codigo = :codigo");
        if ($stmt->execute($parametro)) {
            echo "Alteração bem sucedida !";
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