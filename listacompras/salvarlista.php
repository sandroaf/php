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
    <title>Salvar Lista</title>
</head>

<body>
    <main>
        <?php
        //Executar a Inclusão
        try {
            $parametro = ['nome' => $_GET['nome']];
            $stmt = $conn->prepare("INSERT INTO lista (codigo, nome) VALUES (null,:nome)");
            if ($stmt->execute($parametro)) {
                $msg = "Inclusão bem sucedida !";
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