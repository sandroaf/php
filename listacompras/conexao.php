<?php 
    session_start();
    //Variáveis para realizar a conexão com o Banco de Dados
    require_once("config.php");
    //testa permissões de acesso a aplicação
    if ((isset($_SESSION["usuario"]) && isset($_SESSION["conectado"]))) {
        if (($_SESSION["usuario"] == usuario_app && $_SESSION["conectado"] == true)) {
            $usuario = $_SESSION["usuario"];
        } else {
            header("Location: ".url_app."/login.php",true);
            die();
        }
    } else {
        header("Location: ".url_app."/login.php",true);
        die();
    }

    $db_servidor = "localhost";
    $db_nome = "listacompras";
    $db_usuario = "root";
    $db_senha = "";

    try {
        /*Instancia um Objeto PDO com o Banco de Dados MySQL e 
        parametros das variáveis */
        $conn = new PDO("mysql:host=$db_servidor;dbname=$db_nome", $db_usuario, $db_senha);
        // configurar PDO Error para Exceção
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Conexão bem sucedida";
    } catch(PDOException $e) {
        echo "Erro ao conectar Banco de Dados".$e->getMessage();
    }
?>