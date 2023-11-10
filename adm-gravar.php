<?php

try{
    $usuario = $_POST["usuario"];


    //gera um bash SHA-256 da senha recebido pelo formulário
    $senha = hash("sha256", $_POST["senha"]);

    $now = new DateTime();
    $date = $now -> format('d-m-y h:i:s');

    $sql = "INSERT INTO tb_adm (usuario, senha, datacad)
            VALUES ('{$usuario}','{$senha}','{$date}')";
     

    include_once "classes/conexao.php";
    $conexao->exec($sql);
    echo '<div class="alert alert-success" role="alert">';
    echo "<h3>Registro gravado com sucesso</h3>";
    echo '<a href="adm-index.html" class="alert-link">Fazer login</a>';
    echo '</div>';
   
}

catch (Exception $erro) {
    //habilitar o codigo abaixo para depurar o erro
    //echo $erro->getMessage();
    echo '<div class="alert alert-danger" role="alert">';
    echo "Ocorreu um erro. Por favor, tente novamente mais tarde.";
    echo '</div>';

}