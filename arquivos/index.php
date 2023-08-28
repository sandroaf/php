<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar aquivos de uma pasta</title>
</head>
<body>
    <?php 
       if (!empty($_GET["novo"]) && $_GET["novo"] == "novo") {
          if (!empty($_GET["nomearq"])) {
            $arq = fopen("arq/".$_GET["nomearq"],"w");
            fwrite($arq,$_GET["conteudo"]);
            fclose($arq);
          }
       }
    ?>
    <h2>Listando Arquivos</h2>
    <?php
       $pasta = dir('arq');
       echo "Handle: " . $pasta->handle . "<br>";
       echo "Pasta: " . $pasta->path . "<br>";
       
       while (($arq = $pasta->read()) !== false){
         if ($arq != "." and $arq != "..") {
            echo "Nome Arquivo: " . $arq . " - <a href='ler.php?nomearq=$arq'>ler</a><br>";
         }
       }
       $pasta->close();
    ?>
    <hr>
    <form action="" method="get">
        <label for="iNomeArq">Nome Arquivo</label>
        <input type="text" id="iNomeArq" name="nomearq">
        <br>
        <label for="tConteudo">Conteúdo</label><br>
        <textarea id="tConteudo" name="conteudo" rows="5" cols="60" placeholder="...Escreva..."></textarea>
        <br>
        <button type="submit" name="novo" value="novo">
            Criar Arquivo
        </button>
    </form>    
</body>
</html>