<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo carregamento Imagens</title>
    <script>
        function abrir(arq) {
            console.log(arq);
            document.getElementById("img").innerHTML = "<img src='img/"+arq+"'>";
        }
    </script>
</head>

<body>
    <h2>Listando Imagens</h2>
    <?php
       $pasta = dir('img');
       echo "Handle: " . $pasta->handle . "<br>";
       echo "Pasta: " . $pasta->path . "<br>";
       
       while (($arq = $pasta->read()) !== false){
         if ($arq != "." and $arq != "..") {
            echo "Nome Arquivo: " . $arq . " - <button onclick='abrir(\"$arq\")'>Abrir</button><br>";
         }
       }
       $pasta->close();
    ?>    
    <div id="img"></div>
    <h2>Enviar Imagem</h2>
    <form action="carregar.php" method="post" enctype="multipart/form-data">
        <label for="arquivo">Selecione imagem para upload:</label><br>
        <input type="file" name="arquivo" id="arquivo">
        <br><br>
        <input type="submit" value="Carregar Imagem" name="submit">
    </form>
</body>

</html>