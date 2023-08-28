<!DOCTYPE html>
<html lang="en">
<?php
   $arquivo = $_GET["nomearq"];
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lendo Arquivo: <?php echo($arquivo); ?></title>
</head>
<body>
    <h2>Arquivo: <?=$arquivo?></h2>
    <?php 
       $arq = fopen("arq/$arquivo", "r") or die("Não pode abrir o arquivo!");
       echo "<pre>";
       echo fread($arq,filesize("arq/$arquivo"));
       fclose($arq);
       echo "</pre>";
    ?>
    <hr>
    <a href="javascript:history.back()">Voltar</a>
</body>
</html>