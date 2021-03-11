<?php 
//iniciando sessao
session_start();
//incluindo arquivo de conexao
include_once("conexao.php");
//pegando id
$id = $_SESSION['usuario_id'];
//consulta sql e resultados da consulta
$sql = "SELECT * FROM usuarios WHERE usu_id = '$id'";
$resultado = mysqli_query($conn, $sql);
$dados = mysqli_fetch_array($resultado);

//consulta para verificar se o usuário já votou
$sql2 = "SELECT * FROM votos WHERE voto_usu_id ='".$_SESSION['usuario_id']."'";
$resultado2 = mysqli_query($conn, $sql2);
$dados2 = mysqli_fetch_array($resultado2);

//se a consulta nos retornar um valor não vazio, significa que o usuário já votou e será mostrada uma mensagem de erro dizendo que ele já votou, impedindo sua votação.
if(!empty($dados2)){
	$_SESSION['msg'] = "<span style='color: red'>Seu voto já foi computado!</span>";
	header('Location: principal.php');
//caso o registro da consulta esteja vazio, será redirecionado para o else
}else{
	//salvando registro no banco que o usuário já votou
	$salvar_voto = "INSERT INTO votos (voto_usu_id,voto_chapa_id) VALUES (".$_SESSION['usuario_id'].",".$_GET['id'].")";
	mysqli_query($conn, $salvar_voto);

	//inserindo voto de usuário na chapa referida
	$result_chapa = "UPDATE chapas SET qnt_voto = qnt_voto + 1
		WHERE chapa_id ='".$_GET['id']."'"; 
		$resultado_chapa = mysqli_query($conn, $result_chapa);
		//mensagem de voto contabilizado
		$_SESSION['msg'] = "<span style='color: green'>Voto contabilizado com sucesso!</span><br>";
		header('Location: principal.php');
}
