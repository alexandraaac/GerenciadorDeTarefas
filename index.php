<?php
	session_start();
	include "banco.php";

	if(isset($_GET['nome']) && $_GET['nome'] != ''){
		$tarefa = array();

		$tarefa['nome'] = $_GET['nome'];

		if(isset($_GET['descricao'])){
			$tarefa['descricao'] = $_GET['descricao'];
		}else{
			$tarefa['descricao'] = '';
		}
		if(isset($_GET['prazo'])){
			$tarefa['prazo'] = traduz_data_bd($_GET['prazo']);
		}else{
			$tarefa['prazo'] = '';
		}
		$tarefa['prioridade'] = $_GET['prioridade'];

		if(isset($_GET['concluida'])){
			$tarefa['concluida'] = "1";
		}else{
			$tarefa['concluida'] = "0";
		}

		
	} 
	gravar_tarefa($conexao, $tarefa);

	function gravar_tarefa($conexao, $tarefa)
	{
		$sqlGravar = "
			INSERT INTO tarefas
			(nome, descricao, prioridade, concluida, prazo)
			VALUES
			(
				'{$tarefa['nome']}',
				'{$tarefa['descricao']}',
				'{$tarefa['prioridade']}',
				'{$tarefa['concluida']}',
				'{$tarefa['prazo']}'

			)

		";

		mysqli_query($conexao, $sqlGravar);
	}
	
	function buscar_tarefas($conexao)
	{
		$sqlBusca = 'SELECT * FROM tarefas';
		$resultado = mysqli_query($conexao, $sqlBusca);

		$tarefas = array();

		while($tarefa = mysqli_fetch_assoc($resultado)){
			$tarefas[] = $tarefa;
		}
		return $tarefas;
	}
	function traduz_prioridade($codigo){
	$prioridade  = '';
	switch ($codigo) {
		case 1:
			$prioridade = 'Baixa';
			break;
		case 2:
			$prioridade = 'Média';
			break;
		case 3:
			$prioridade = 'Alta';
			break;
	}
	return $prioridade;
	}

	function traduz_data_bd($data){
		if($data == ""){
			return"";
		}
			$dados = explode("-", $data);
			$data_sql = "{$dados[2]}-{$dados[1]}-{$dados[0]}";
			return $data_sql;
	}
	
	function traduz_concluida($concluida){
		if($concluida == 1){
			return "Sim";
		}
			return "Não";
	}
	$lista_tarefas = buscar_tarefas($conexao);
	include "template.php";