<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="../estilo.css">

    <title>Apagar Item</title>
</head>

<body>
    <main>
        <?php
        //Abrir Conexao com Banco de Dados
        require_once "conexao.php";
        //Executar a Inclusão
        try {
            $parametro = ['codigo' => $_GET['codigo']];
            $stmt = $conn->prepare("DELETE FROM item WHERE item.codigo = :codigo");
            if ($stmt->execute($parametro)) {
                echo "Exclusão bem sucedida !";
            };
            echo "<br>";
            echo "<a href='../index.php'>Voltar</a>";
        } catch (PDOException $e) {
            echo "<pre>";
            echo "Erro ao executar" . $e->getMessage();
            echo "</pre>";
        }
        ?>
    </main>
</body>

</html>