<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Retorno Idade</title>
</head>
<body>
    <h1>Retorno da IDADE em PHP</h1>
    <form action="idade.php" method="get">
        <label for="inome">Nome: </label> 
        <input name="nome" type="text" placeholder="Informe seu nome" id="inome">
        <br>
        <label far="idatanascto">Data de Nascimento:</label>
        <input name="datanascto" type="idatanascto" placeholder="dd/mm/yyyy" id="idatanascto">
        <br><br>
        <button type="submite">Idade</button>
    </form>
    <?php 
       date_default_timezone_set("America/Sao_Paulo"); //Define o Fuso horáro default

       print_r(new DateTime()); // Data no formato que é criado.


       $agora = new DateTime();
       echo "<br> Agora: ".$agora->format("d/m/Y"); //Data formatada para padrão do Brasil
    ?>
</body>
</html>