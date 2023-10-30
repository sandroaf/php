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
    <script src="<?= url_app ?>/funcoes.js"></script>
    <link rel="stylesheet" href="<?= url_app ?>/estilo.css">
    <script src="<?= url_app ?>/funcoes.js"></script>

    <title>Lista de Compras - Nro:<?php echo ($_GET["lista"]) ?></title>
    <script language="JavaScript">
        function incluir() {
            event.preventDefault();
            window.location = "<?= url_app ?>/incluiritem.php/?lista=" + <?= $_GET["lista"] ?>;
        }

        function apagar(codigo, lista) {
            event.preventDefault();
            if (window.confirm("Confirma exclusão do item: " + codigo)) {
                window.location = "<?= url_app ?>/apagaitem.php/?lista=" + lista + "&codigo=" + codigo;
            }
        }
        <?php
        if (!empty($_GET['msg'])) {
            echo "salvarmsg('" . $_GET['msg'] . "');";
        }
        ?>
    </script>

</head>

<body onload="mostramsg()">
    <main>
        <header>
            <h1> Lista de Compras - Nro:
                <?php echo ($_GET["lista"]); ?>
            </h1>
            <?php
               if ($_SESSION["conectado"]) {
                  echo "<a class='sair' href='".url_app."/logout.php'>SAIR</a><br>";
               }
            ?>
        </header>
        <aside id="msg"></aside>
        <?php
        try {
            //Realizar Consulta a tabela item
            $parametro = ['lista' => $_GET['lista']];
            $stmt = $conn->prepare("SELECT * FROM item WHERE codigo_lista = :lista");
            $stmt->execute($parametro);
            echo ("<br><ul>");
            foreach ($stmt as $linha) {
                $datahora = date_create($linha["datahora"]);
                echo ("<li>" . $linha["codigo"] . " - "
                    . date_format($datahora, "d/m/Y H:i:s") . " - "
                    . $linha["descricao"] . " - "
                    . $linha["quantidade"]
                    . "&nbsp;&nbsp;<button onclick='apagar(" . $linha['codigo'] . "," . $linha['codigo_lista'] . ")')><img src='" . url_app . "/img/lixeira.png' title='Apagar Item'></button>"
                    . "</li>");
            }
            echo ("</ul><br>");
        } catch (PDOException $e) {
            echo "<pre>";
            echo "Erro ao executar" . $e->getMessage();
            echo "</pre>";
        }
        ?>
        <br>
        <button class="incluir" name="bincluir" id="bincluir" type="button" onclick="incluir()">
            <img src="<?= url_app ?>/img/mais.png"> Novo item
        </button>
        <br>
        <br>
        <a href="<?= url_app ?>/index.php">Voltar</a>
    </main>
</body>

</html>