<?php 
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Sessão</title>
</head>
<body>
    <h1>Dados Armazenados na sessão</h1>
    <pre>
        <?php 
        print_r($_SESSION);
        ?>
    </pre>
    <br>
    <a href="index.php">Voltar</a>
</body>
</html>