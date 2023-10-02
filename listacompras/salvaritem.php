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
    <title>Salvar Items</title>
</head>

<body>
    <main>
        <?php
        //Executar a Inclusão
        try {
            $parametro = [
                'descricao' => $_GET['descricao'], 'quantidade' => $_GET['quantidade'], 'codigolista' => $_GET['codigolista']
            ];
            $stmt = $conn->prepare("INSERT INTO item (codigo, datahora, descricao, quantidade, codigo_lista) VALUES (null,current_timestamp(),:descricao,:quantidade,:codigolista)");
            if ($stmt->execute($parametro)) {
                $msg="Inclusão bem sucedida !";
            };
            header("Location: ".url_app."/item.php?lista=".$_GET['codigolista']."&msg=".$msg);
        } catch (PDOException $e) {
            echo "<pre>";
            echo "Erro ao executar" . $e->getMessage();
            echo "</pre>";
        }
        ?>
    </main>
</body>

</html>