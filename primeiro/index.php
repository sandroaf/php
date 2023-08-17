<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Olá mundo em PHP</title>
</head>
<body>
    <p>Esse exemplo trás um primeiro programa integrando HTML + PHP</p>
    <!-- Inicia código PHP -->
    <?php 
       echo "<h1>Olá Mundo do Server-Side Sript com PHP</h1>";
       echo "<br>";
       date_default_timezone_set('America/Sao_Paulo');
       echo "Data e hora da execução:  ".date("H:i:s d/m/Y");
    ?> 
    <!-- Termina código PHP -->
    <br>
    <br>
    <script language="JavaScript">
        document.write(new Date());
    </script>
</body>
</html>