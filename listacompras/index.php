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
    <script src="<?=url_app?>/funcoes.js"></script>
    <title>Lista de Compras</title>
    <script language="JavaScript">
        function incluir() {
            event.preventDefault();
            window.location = "<?=url_app?>/incluirlista.php";
        }

        function apagar(codigo) {
            event.preventDefault();
            if (window.confirm("Confirma execlusão da lista: "+codigo)) {
                window.location = "<?=url_app?>/apagalista.php?codigo="+codigo;    
            }
        }

        function alterar(codigo) {
            event.preventDefault();
            window.location = "<?=url_app?>/alterarlista.php?codigo="+codigo;    
        }
        <?php 
           if (!empty($_GET['msg'])) {
              echo "salvarmsg('".$_GET['msg']."');"; 
           }
        ?>
    </script>
</head>
<body onload="mostramsg()">
    <main>
        <header>
            <h1>Lista de Compras</h1>
            <?php
               if ($_SESSION["conectado"]) {
                  echo "<a href='logout.php'>SAIR</a><br>";
               }
            ?>
        </header>
        <aside id="msg"></aside>
            <form id="fbusca" action="index.php" method="get">
            <input id="ibusca" name="busca" placeholder="Digite algo para buscar">
            <button id="bbusca" name="bbusca" value="busca"><img src="<?=url_app?>/img/lupa.png"></button> 
        </form>
        <?php 
        try {
            //Realizar Consulta a tabela lista
            //Prepara o SQL 
            if (empty($_GET["busca"])) {
                //busca todos os dados da tabela
                $stmt = $conn->prepare("SELECT * FROM lista");
            } else {
                //busca os dados da tabela, aplicando a busca digitada pelo usuário
                //Monta SQL com parametros da busca
                $sql = "SELECT * FROM lista WHERE CODIGO = '".$_GET["busca"]
                        ."' OR NOME LIKE '%".$_GET["busca"]."%'";
                //echo $sql;
                echo "<strong>Pesquisando por: </strong><mark>".$_GET["busca"]."</mark><br>";
                $stmt = $conn->prepare($sql);
            }

            //Executa o SQL
            $stmt->execute();
            echo("<br><ul>");
            //Para Cada linha da Tabela faz
            foreach ($stmt as $linha) {
                //apresenta dados das Listas
                echo("<li>");
                echo("<a href='".url_app."/item.php/?lista=".$linha["codigo"]."'>".$linha["codigo"]);
                echo(" - ".$linha["nome"]."</a>");
                echo("&nbsp;&nbsp;");
                echo("<button onclick='alterar(".$linha["codigo"].")'><img src='".url_app."/img/pencil.png'></button>");
                echo("&nbsp;&nbsp;");
                echo("<button onclick='apagar(".$linha["codigo"].")'><img src='".url_app."/img/lixeira.png'></button></li>");
            }
            echo("</ul><br>");
            $conn = null;
        } catch(PDOException $e) {
            echo "<pre>";
            echo "Erro ao executar".$e->getMessage();
            echo "</pre>";
        }
        ?>
        <br>
        <button class="incluir" name="bincluir" id="bincluir" type="button" onclick="incluir()">
        <img src="<?=url_app?>/img/mais.png">  Nova lista
        </button>
    </main>
    </body>
</html>