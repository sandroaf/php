<?php 
    //Variáveis para realizar a conexão com o Banco de Dados
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