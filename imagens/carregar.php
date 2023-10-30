<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carregamento Arquivo - Imagem</title>
</head>

<body>
    <?php
    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["arquivo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Verifica se é uma imagem real
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["arquivo"]["tmp_name"]);
        if ($check !== false) {
            echo "Arquivo é uma imagem - " . $check["mime"] . ".<br>";
            $uploadOk = 1;
        } else {
            echo "Arquivo não é uma imagem.<br>";
            $uploadOk = 0;
        }
    }

    // Verifica se o arquivo já não existe
    if (file_exists($target_file)) {
        echo "Desculpe, arquivo já existe<br>";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["arquivo"]["size"] > 500000) {
        echo "Desculpe, arquivo muito grande.<br>";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Desculpe, suportado somente JPG, JPEG, PNG & GIF.<br>";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Desculpe, seu arquivo não foi carregado.<br>";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["arquivo"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["arquivo"]["name"])) . " carregado com sucesso.<br>";
        } else {
            echo "Desculpe, ocorreu um erro ao carregar o arquivo.<br>";
        }
    }
    ?>
    <br> 
    <a href="index.php"><- Voltar</a>
</body>

</html>