<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="./estilo.css">
    <title>Lista de Compras</title>
    <script language="JavaScript">
        function incluir() {
            event.preventDefault();
            window.location = "./incluirlista.php";
        }

        function apagar(codigo) {
            event.preventDefault();
            if (window.confirm("Confirma execlusão da lista: "+codigo)) {
                window.location = "./apagalista.php?codigo="+codigo;    
            }
        }

        function alterar(codigo) {
            event.preventDefault();
            window.location = "./alterarlista.php?codigo="+codigo;    
        }
    </script>
</head>
<body>
    <main>
        <header>
            <h1>Lista de Compras</h1>
        </header>
        <form id="fbusca" action="index.php" method="get">
            <input id="ibusca" name="busca" placeholder="Digite algo para buscar">
            <button id="bbusca" name="bbusca" value="busca"><img src="./img/lupa.png"></button> 
        </form>
        <?php 
        require_once "conexao.php"; 
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
                echo $sql;
                echo "<strong>Pesquisando por: </strong><mark>".$_GET["busca"]."</mark>";
                $stmt = $conn->prepare($sql);
            }

            //Executa o SQL
            $stmt->execute();
            echo("<br><ul>");
            //Para Cada linha da Tabela faz
            foreach ($stmt as $linha) {
                //apresenta dados das Listas
                echo("<li>");
                echo("<a href='item.php/?lista=".$linha["codigo"]."'>".$linha["codigo"]);
                echo(" - ".$linha["nome"]."</a>");
                echo("&nbsp;&nbsp;");
                echo("<button onclick='alterar(".$linha["codigo"].")'><img src='img/pencil.png'></button>");
                echo("&nbsp;&nbsp;");
                echo("<button onclick='apagar(".$linha["codigo"].")'><img src='img/lixeira.png'></button></li>");
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
        <button class="incluir" name="bincluir" id="bincluir" type="button" onclick="incluir()"><img src="./img/mais.png">  Nova lista</button>
    </main>
    </body>
</html>