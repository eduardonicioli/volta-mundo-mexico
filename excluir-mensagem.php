<?php
require_once 'classes/Mensagem.php';


$id_mensagem = $_GET['id_mensagem'];

$mensagem = new Mensagem($id_mensagem);
$mensagem->excluir();

header('Location: adm-faq.php');
?>