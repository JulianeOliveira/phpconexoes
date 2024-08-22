<?php
session_start();
include("conexao.php");

$id = filter_input(INPUT_GET,'id');
$result_user ="DELETE FROM usuarios WHERE id='$id'";
$resultado_usuario =mysqli_query($conn, $result_user);

if(!empty($id)){
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style='color:green;'>Usuário apagado com sucesso</p>";
		header("Location: listar.php");
	}else{
		$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi apagado com sucesso</p>";
		header("Location: listar.php?id=$id");
	}
	
}