<!DOCTYPE html>
<html lang="pt-br">
<?php
    //Abrir Conexao com Banco de Dado
    require_once "conexao.php";
 ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="<?=url_app?>/estilo.css">
    <script src="<?=url_app?>funcoes.js"></script>
    <title>Salvar Alteração Lista</title>
</head>

<body>
    <main>
        <?php

        //Executar a Inclusão
        try {
            $parametro = [
                'codigo' => $_GET['codigo'], 'nome' => $_GET['nome']
            ];
            $stmt = $conn->prepare("UPDATE lista SET nome = :nome WHERE lista.codigo = :codigo");
            if ($stmt->execute($parametro)) {
                $msg= "Alteração bem sucedida !')";
            };
            header("Location: ".url_app."/index.php?msg=".$msg);
        } catch (PDOException $e) {
            echo "<pre>";
            echo "Erro ao executar" . $e->getMessage();
            echo "</pre>";
        }
        ?>
    </main>
</body>

</html>