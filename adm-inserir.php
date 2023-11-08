<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Cadastro Administrador</title>
  
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card-body">
                <h3 class="col md-4">Novo Administrador</h3>
                    <form action="adm-gravar.php" method="post">
                        <div class="form-group">
                            <label for="usuario">Usuário:</label>
                            <input type="text" class="form-control" name="usuario">
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha:</label>
                            <input type="password" class="form-control" name="senha">
                        </div>
                        <button type="submit" class="btn btn-primary">Gravar</button>
                    </form>
            </div>
            
        </div>
    </div>
        

</body>
</html>
