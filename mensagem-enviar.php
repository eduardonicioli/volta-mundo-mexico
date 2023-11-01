<?php

// Verifica se a solicitação é POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Conecte-se ao seu banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "volta-mundo";
    
    // Crie uma conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifique a conexão
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }


    // Recupere e limpe os dados do formulário
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $assunto = filter_input(INPUT_POST, 'assunto', FILTER_SANITIZE_STRING);
    $mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING);
    



    // Consulta SQL para inserir os dados na tabela usando declaração preparada
    $sql = "INSERT INTO tb_mensagem (nome, email, assunto, mensagem) VALUES (?,?,?,?)";

    // Preparar a declaração SQL
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Erro na preparação da consulta: " . $conn->error);
    }

    // Vincular os parâmetros e executar a consulta
    $stmt->bind_param("ssss", $nome,$email,$assunto,$mensagem );

    if ($stmt->execute() === true) {
        header('Location: index.html#contato');
        
    } else {
        echo "Erro ao inserir dados: " . $stmt->error;
    }

    // Feche a declaração e a conexão
    $stmt->close();
    $conn->close();
} else {
    echo "Método de solicitação inválido. Use o método POST para enviar o formulário.";
}


?>