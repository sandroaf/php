<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo ações em PHP</title>
</head>
<body>
    <h1>Ações em PHP</h1>
    <form method="get" action="index.php">
        <label for="inumero">Número</label>
        <input type="text" name="numero" id="inumero" placeholder="Infor um número">
        <br>
        <select name="acao" id="sacao">
            <option value="parimpar">1. Para/Ímpar</option>
            <option value="tabuada">2. Tabuada</option>
        </select>
        <br>
        <br>
        <button type="submit">Executar</button>
    </form> 
    <br>
    <div id="dresultado">
        <?php
            function parimpar($numero) {
               if (($numero % 2) == 0) {
                  return "Número: $numero é Par";
               } else {
                return "Número: $numero é Ímpar";
               }     
            }

            function tabuada($numero) {
                $resultado = "";
                for ($i=0;$i<=10;$i++) 
                {
                    $resultado .= "$numero * $i = ".$numero*$i;
                    $resultado .= "<br>";
                }
                return $resultado;
            }

            if (!empty($_SERVER['QUERY_STRING'])) {
                if ($_GET["acao"] == "parimpar" ) {
                    echo parimpar($_GET["numero"]); 
                } elseif ($_GET["acao"] == "tabuada" ) {
                    echo tabuada($_GET["numero"]);
                } else {
                    echo "<em>Ação inexistente</em>";
                }
            } else {
                echo "... Resultado ...";
            }  
        ?>
    </div>
</body>
</html>