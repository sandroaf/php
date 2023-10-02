<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php
        //Abrir Conexao com Banco de Dado
        require_once "conexao.php";
    ?>
 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="<?=url_app?>/estilo.css">
    <script src="<?=url_app?>funcoes.js"></script>
    <title>Apagar Item</title>
</head>

<body>
    <main>
        <?php
        //Executar a Inclusão
        try {
            $parametro = ['codigo' => $_GET['codigo']];
            $stmt = $conn->prepare("DELETE FROM item WHERE item.codigo = :codigo");
            if ($stmt->execute($parametro)) {
                $msg="Exclusão de Item bem sucedida !";
            }
            //Voltar
            header("Location: ".url_app."/item.php?lista=".$_GET['codigo']."&msg=".$msg);
        } catch (PDOException $e) {
            echo "<pre>";
            echo "Erro ao executar" . $e->getMessage();
            echo "</pre>";
        }
        ?>
    </main>
</body>

</html>