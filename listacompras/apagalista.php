<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apagar Lista</title>
</head>
<body>
    <?php 
        //Abrir Conexao com Banco de Dados
        require_once "conexao.php";
        //Executar a Inclusão
        try {
            //apagar itens
            $parametro = ['codigo' => $_GET['codigo']];
            $stmt = $conn->prepare("DELETE FROM item WHERE item.codigo_lista = :codigo");
            if ($stmt->execute($parametro)) {
                echo "Exclusão itens bem sucedida !<br>";
            };

            //apagar lista
            $parametro = ['codigo' => $_GET['codigo']];
            $stmt = $conn->prepare("DELETE FROM lista WHERE lista.codigo = :codigo");
            if ($stmt->execute($parametro)) {
                echo "Exclusão lista bem sucedida !<br>";
            };

            //Excibir voltar
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