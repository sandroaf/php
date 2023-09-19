<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Lista</title>
    <script language="JavaScript">
        function cancelar() {
            event.preventDefault();
            window.location = "./index.php";
        }
    </script>
</head>
<body>
    <?php 
       require_once "conexao.php"; 
       try {
           /*Realizar Consulta a tabela lista buscando dados 
           da Lista que se deseja alterar*/
           //Prepara o SQL
           $stmt = $conn->prepare("SELECT * FROM lista WHERE codigo =".$_GET["codigo"]);
           //Executa o SQL
           $stmt->execute();
           //buscar dados da lista selecionada
           $lista = $stmt->fetch(PDO::FETCH_ASSOC);
           $conn = null;
       } catch(PDOException $e) {
          echo "<pre>";
          echo "Erro ao executar".$e->getMessage();
          echo "</pre>";
       }
    ?>
    <h1>Alterar Lista: <?=$lista["codigo"]."-".$lista["nome"]?></h1>
    <br>
    <form action="salvaralteracaolista.php" method="get">
        <input id="icodigo" name="codigo" type="hidden" value=
        "<?=$lista['codigo']?>">
        <label for="inome">Nome: </label>
        <input type="text" id="inome" name="nome"size="100" value="<?=$lista['nome']?>"required>
        <br><br>
        <button name="salvar" id="bsalvar" type="submit">Salvar</button> 
        <button name="bcancelar" id="bcancelar"
        type="reset" onclick="cancelar()">Cancelar</button>
    </form>
</body>
</html>