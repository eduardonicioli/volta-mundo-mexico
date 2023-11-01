<?php
class Contato{
    public $nome;
    public $email;
    public $assunto;
    public $mensagem;

    public function __construct($nome = false){
        if($nome){
            $this->nome = $nome;
            $this->carregar();
        }
    }

    public function inserir(){

        $sql = "INSERT INTO tb_contato (nome, email, assunto, mensagem) VALUES ('{$this->nome}','{$this->email}','{$this->assunto}','{$this->mensagem}')";

        $conexao = new PDO('mysql:host=localhost;dbname=volta-mundo','root','');

        $conexao->exec($sql);
    }

    public function listar(){
        // Define a string SQL para selecionar todos os registros da tabela
        $sql = "SELECT * FROM tb_contato";

        // Cria uma nova conexão PDO com o banco de dados "sis-escolar"
        $conexao = new PDO('mysql:host=localhot;dbname=volta-mundo','root','');

        // Executa a string SQL na conexão retornando um objeto de resultado
        $resultado = $conexao->query($sql);

        // Extrai todos os registros do objeto e os armazena em um array
        $lista = $resultado->fetchAll();

        // Retorna o array contendo todos os registros da tabela "tb_turmas"
        return $lista;
	}

    public function carregar()
    {
        // Query SQL para buscar uma turma no banco de dados pelo id
        $sql = "SELECT * FROM tb_contato WHERE id=" . $this->nome;
        $conexao = new PDO('mysql:host=localhost;dbname=volta-mundo', 'root', '');

        // Execução da query e armazenamento do resultado em uma variável
        $resultado = $conexao->query($sql);
        // Recuperação da primeira linha do resultado como um array associativo
        $linha = $resultado->fetch();

        // Atribuição dos valores dos campos da turma recuperados do banco às propriedades do objeto
        $this->nome = $linha['nome'];
        $this->email = $linha['email'];
        $this->assunto = $linha['assunto'];
        $this->mensagem = $linha['mensagem'];
    }


}


?>