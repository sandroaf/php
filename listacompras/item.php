<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="../estilo.css">
    <title>Lista de Compras - Nro:<?php echo ($_GET["lista"]) ?></title>
    <script language="JavaScript">
        function incluir() {
            event.preventDefault();
            window.location = "../incluiritem.php/?lista=" + <?= $_GET["lista"] ?>;
        }

        function apagar(codigo) {
            event.preventDefault();
            if (window.confirm("Confirma exclusão do item: " + codigo)) {
                window.location = "../apagaitem.php/?codigo=" + codigo;
            }
        }
    </script>
</head>
<body>
    <main>
        <header>
            <h1> Lista de Compras - Nro:
                <?php echo ($_GET["lista"]); ?>
            </h1>
        </header>
        <?php
        try {
            require_once "conexao.php";
            //Realizar Consulta a tabela item
            $parametro = ['lista' => $_GET['lista']];
            $stmt = $conn->prepare("SELECT * FROM item WHERE codigo_lista = :lista");
            $stmt->execute($parametro);
            echo ("<br><ul>");
            foreach ($stmt as $linha) {
                echo ("<li>" . $linha["codigo"] . " - "
                    . $linha["datahora"] . " - "
                    . $linha["descricao"] . " - "
                    . $linha["quantidade"]
                    . "&nbsp;&nbsp;<button onclick='apagar(" . $linha['codigo'] . ")')><img src='../img/lixeira.png' title='Apagar Item'></button>"
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
        <button class="incluir" name="bincluir" id="bincluir" type="button" onclick="incluir()"><img src="../img/mais.png"> Novo item</button>
        <br>
        <br>
        <a href="/php/listacompras/index.php">Voltar</a>
    </main>
</body>

</html>