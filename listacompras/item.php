<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Compras - Nro:<?php echo($_GET["lista"])?></title>
</head>
<body>
    <h1> Lista de Compras - Nro:
        <?php echo($_GET["lista"]);?>
    </h1>
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
           //echo "Conexão bem sucedida";

           //Realizar Consulta a tabela item
           $parametro = ['lista' => $_GET['lista']];
           $stmt = $conn->prepare("SELECT * FROM item WHERE codigo_lista = :lista");
           $stmt->execute($parametro);
           echo("<br><ul>");
           foreach ($stmt as $linha) {
               echo("<li>".$linha["codigo"]." - "
               .$linha["datahora"]." - "
               .$linha["descricao"]." - "
               .$linha["quantidade"] 
               ."</li>");
           }
           echo("</ul><br>");
       } catch(PDOException $e) {
          echo "Erro ao conectar Banco de Dados".$e->getMessage();
       }
    ?>
    <br>
    <a href="/php/listacompras/index.php">Voltar</a>
</body>
</html>