<?php
session_start();
include ('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Listar</title>		
	</head>
	<body>
		<a href="index.php">Cadastrar</a>
		<h1>Listar Usuário</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		//depois 2 passo
		$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);
		$pagina = (!empty($pagina_atual))?$pagina_atual : 1; //se a pagina estiver vazia fica na mesma página
		//quantidade de resultado por pagina
		$qnt_result_pg =1;
		//calcular o inicio  visualização
		$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
		//depois 1 passo, 3 passo colocar o limit
		$result_usuarios = "SELECT * FROM usuarios LIMIT $inicio, $qnt_result_pg";
		$result_usuarios=mysqli_query($conn, $result_usuarios);
		while($row_usuario = mysqli_fetch_assoc($result_usuarios)){
			echo "id: ".$row_usuario['id']."<br>";
			echo "nome: ".$row_usuario['nome']."<br>";
			echo "email: ".$row_usuario['email']."<br>";
			echo "<a href = 'proc_deleta_usuario.php?id=".$row_usuario['id']."'>Apagar</a><br><hr>";
		}
		//paginação
		 $result_pg = "SELECT count(id) AS num_result FROM usuarios";
		 $resultado_pg = mysqli_query($conn, $result_pg);
		 $row_pg = mysqli_fetch_assoc($resultado_pg);
		 echo $row_pg['num_result']."<br>";//informa a quantidade de dados salvos no bd
		 //quantidade de página
		 $quantidade_pag = ceil ($row_pg['num_result']/$qnt_result_pg);
		//echo $quantidade_pag;
		 //limitar os links antes depois
		 $max_links = 3;
		 echo "<a href = 'listar.php?pagina=1'>Primeira </a>";
		 for($pag_ant = $pagina - $max_links; $pag_ant<=$pagina - 1; $pag_ant++){
			 if($pag_ant>=1){
			echo "<a href = 'listar.php?pagina=$pag_ant'> $pag_ant </a>";
			 }
		 }
		 //echo "$quantidade_pag";
		 for($pag_dep = $pagina +1; $pag_dep<=$pagina + $max_links; $pag_dep++){
			if($pag_dep<=$quantidade_pag){
		   echo "<a href = 'listar.php?pagina=$pag_dep'> $pag_dep </a>";
			}
		}

		 echo "<a href = 'listar.php?pagina=$quantidade_pag'> Ultima </a>";
		?>
		
	</body>
</html>