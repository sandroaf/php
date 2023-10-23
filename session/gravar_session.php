<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gavar Dados na Session</title>
</head>
<body>
    <?php
      if (isset($_POST['nomedado'])) {
         $_SESSION[$_POST['nomedado']] = $_POST['valordado'];
         echo ("Dado ".$_POST['nomedado']. " salvo com sucesso na sessão.<br>");
      }
    ?>  
    <a href="index.php">Voltar</a>
</body>
</html>