<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Compras</title>
</head>
<body>
    <?php 
       //Variáveis para realizar a conexão com o Banco de Dados
       $db_servidor = "localhost";
       $db_nome = "listacompras";
       $db_usuario = "root";
       $db_senha = "";

       try {
           /*Instancia um Objeto PDO com o Banco de Dados MySQL e 
           parametros das variáveis */
           $conn = new PDO("mysql:host=$db_servidor;dbname=$db_nome", $db_usuario, $db_senha);
           // configurar PDO Error para Exceção
           $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           echo "Conexão bem sucedida";

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
               echo(" - ".$linha["nome"]."</a></li>");
           }
           echo("</ul><br>");
           $conn = null;
       } catch(PDOException $e) {
          echo "Erro ao conectar Banco de Dados".$e->getMessage();
       }
    ?>
</body>
</html>