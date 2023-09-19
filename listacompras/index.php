<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <h1>Lista de Compras</h1>
    <?php 
       require_once "conexao.php"; 
       try {
           //Realizar Consulta a tabela lista
           //Prepara o SQL
           $stmt = $conn->prepare("SELECT * FROM lista");
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
               echo("<button onclick='alterar(".$linha["codigo"].")'><img src='pencil.png'></button>");
               echo("&nbsp;&nbsp;");
               echo("<button onclick='apagar(".$linha["codigo"].")'><img src='lixeira.png'></button></li>");
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
    <button name="bincluir" id="bincluir" type="button" onclick="incluir()">Nova lista</button>
</body>
</html>