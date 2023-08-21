<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo da idade</title>
</head>
<body>
    <?php
       function idade ($datanascto) {
            /*Variável $datanascto vem no vormado dd/mm/aaaa
            list = separa valores de um array para variáveis
            Explode = "separa string com base em um separador em um array
            */
            list($d,$m,$y) = explode("/",$datanascto);
            //Criar nova data no formar Y-m-d
            $date = new DateTime($y."-".$m.'-'.$d);
            //
            $intervalo = $date->diff( new DateTime( date('Y-m-d') ) );
            return $intervalo->format('%Y');
       }
    ?>
</body>
</html>