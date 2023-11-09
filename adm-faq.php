<?php

// Conexão com o banco de dados
try {
    $pdo = new PDO('mysql:host=localhost;dbname=volta-mundo', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}

// Consulta para buscar as mensagens
$sql = "SELECT * FROM tb_mensagem";
try {
    $stmt = $pdo->query($sql);
    $mensagens = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro na consulta: " . $e->getMessage());
}

// Verifica se a mensagem deve ser marcada como lida
if (isset($_GET['marcar_lida']) && is_numeric($_GET['marcar_lida'])) {
    $mensagemId = $_GET['marcar_lida'];

    // Atualiza o status da mensagem para lida no banco de dados
    $sql = "UPDATE tb_mensagem SET lida = 1 WHERE id_mensagem = :id_mensagem";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_mensagem', $mensagemId, PDO::PARAM_INT);

    try {
        $stmt->execute();
    } catch (PDOException $e) {
        die("Erro ao marcar a mensagem como lida: " . $e->getMessage());
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Administrativo FAQ</title>
  
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    

</head>
<body>
    <div class="container">
        <h1 class="mt-4">Administrativo FAQ</h1>
        <h3>Lista de Mensagens enviadas ao FAQ</h3>
        <table class="table table-bordered">
            <tr>
                <th>Id Mensagem</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Assunto</th>
                <th>Mensagem</th>
                <th>Status</th>
         
            </tr>
            <?php foreach ($mensagens as $mensagem): ?>
                <tr>
                    <td><?php echo $mensagem['id_mensagem'] ?></td>
                    <td><?php echo $mensagem['nome'] ?></td>
                    <td><?php echo $mensagem['email'] ?></td>
                    <td><?php echo $mensagem['assunto'] ?></td>
                    <td><?php echo $mensagem['mensagem'] ?></td>
                    <td>
                        <?php if (!$mensagem['lida']): ?>
                            <a href="?marcar_lida=<?php echo $mensagem['id_mensagem']; ?>" class="btn btn-success">Marcar como lida</a>
                        <?php else: ?>
                            <span class="text-success">Mensagem lida</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
        <br><br>
        <a href="adm-inserir.php" class="btn btn-primary">Adicionar administrador</a><br><br>
        <a href="index.html" class="btn btn-secondary">Home</a><br><br>
    </div>

</body>
</html>
