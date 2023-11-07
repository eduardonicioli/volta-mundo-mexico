<?php
class Mensagem{
    public $id_mensagem;
    public $nome;
    public $email;
    public $assunto;
    public $mensagem;

    public function __construct($id_mensagem = false){
        if($id_mensagem){
            $this->id_mensagem = $id_mensagem;
            $this->carregar();
        }
    }

    public function inserir(){

        $sql = "INSERT INTO tb_mensagem (nome, email, assunto, mensagem) VALUES ('{$this->nome}','{$this->email}','{$this->assunto}','{$this->mensagem}')";

        $conexao = new PDO('mysql:host=localhost;dbname=volta-mundo','root','');

        $conexao->exec($sql);
    }

    public function listar(){

        $sql = "SELECT * FROM tb_mensagem";
        $conexao = new PDO('mysql:host=localhost;dbname=volta-mundo','root','');

        $resultado = $conexao->query($sql);
        $lista = $resultado->fetchAll();
        return $lista;
	}

    public function carregar(){

        $sql = "SELECT * FROM tb_mensagem WHERE id_mensagem=" . $this->id_mensagem;
        $conexao = new PDO('mysql:host=localhost;dbname=volta-mundo', 'root', '');

        $resultado = $conexao->query($sql);
        $linha = $resultado->fetch();

        $this->nome = $linha['nome'];
        $this->email = $linha['email'];
        $this->assunto = $linha['assunto'];
        $this->mensagem = $linha['mensagem'];
    }

    public function excluir(){
	
        $sql = "DELETE FROM tb_mensagem WHERE id_mensagem=".$this->id_mensagem;

        $conexao = new PDO('mysql:host=localhost;dbname=volta-mundo','root','');
        $conexao->exec($sql);
	}


}


?>