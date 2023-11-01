<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Administraivo FAQ</title>
</head>
<body>
    <h1>Administraivo FAQ</h1>
    <h3>Listar Mensagens</h3>
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Assunto</th>
            <th>Mensagem</th>
        </tr>
        <?php foreach ($lista as $linha): ?>
        <tr>
            <td><?php echo $linha['nome'] ?></td>
            <td><?php echo $linha['email'] ?></td>
            <td><?php echo $linha['assunto'] ?></td>
            <td><?php echo $linha['mensagem'] ?></td>
            <td>
                <a href="#">Atualizar</a>
                <a href="#">Excluir</a>
            </td>
        </tr>
        <?php endforeach ?>
    </table>
    <br><br>
    <a href="alunos-inserir.php"></a>
</body>
</html>