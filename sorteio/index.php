<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorteio do Dado</title>
   </head>
<body>
    <!-- 1. Formulário com um botão para executar o Sortei -->
    <h1>Sorteio do Dado</h1>
    <!-- action "vazio" fará com que o mesmo arquivo seja executado ao enviar o formulário -->
    <form action="" method="get"> 
        <button id="bJogar" name="jogar" value="jogar" type="submit">
           JOGAR DADO
        </button>
    </form>
    <br>
    <!-- 2. Verificar se foi jogado o Dado, testando o valor do campo jogar enviado por GET para a página index.php -->
    <?php 
       //testar se o jogar foi clicado 
       if (!empty($_GET['jogar']) and $_GET['jogar'] == "jogar") {
          echo "Dado arremessado<br><br>";
          //armazena valor sorteado na variável $dado
          $dado = mt_rand(1,6);
          //Exibe imagem conforme o dado Sorteado
          echo "<img src='dados/$dado.png' width='320px'>";
       } else {
          echo "Clique no botão para Jogar";
       }
    ?>
</body>
</html>