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
    <title>Apagar Lista</title>
</head>

<body>
    <main>
        <?php
        //Executar a Inclusão
        try {
            //apagar itens
            $parametro = ['codigo' => $_GET['codigo']];
            $stmt = $conn->prepare("DELETE FROM item WHERE item.codigo_lista = :codigo");
            $msg = "";

            if ($stmt->execute($parametro)) {
                $msg .= "Exclusão Itens bem sucedida ! "; 
            };

            //apagar lista
            $parametro = ['codigo' => $_GET['codigo']];
            $stmt = $conn->prepare("DELETE FROM lista WHERE lista.codigo = :codigo");
            if ($stmt->execute($parametro)) {
                $msg .= "Exclusão lista bem sucedida !";
            };

            //Voltar
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