<html>
<head>
<title>Gerenciador de Tarefas</title>
<link rel="stylesheet" href="estilo.css">
</head>
<body>
	<h1>Gerenciador de Tarefas</h1>
	<form>
		<fieldset class="um">
			<legend>Nova Tarefa</legend>
			<label>
				Tarefa:
				<input type="text" name="nome" />
			</label>
			<label> 
				Descrição (Opcional)
				<textarea name = "descricao"></textarea>
			</label>
			<label> 
				Prazo (Opcional)
				<textarea name = "prazo"></textarea>
			</label>
			<fieldset class="dois">
				<legend> Prioridade </legend>
				<label>
					<input type="radio" name="prioridade" value="baixa" checked />
					Baixa
					<input type="radio" name="prioridade" value="media" checked />
					Média
					<input type="radio" name="prioridade" value="alta" checked />
					Alta
				</label>
			</fieldset>
			<label>
				Tarefa Concluida:
				<input type="checkbox" name="concluida" value="sim">
			</label>
			<input type="submit" name="Cadastrar">
		</fieldset>
	</form>
	<table>
		<tr>
			<th>Tarefa</th>
			<th>Descrição</th>
			<th>Prazo</th>
			<th>Prioridade</th>
			<th>Concluído</th>
		</tr>
		<?php foreach ($lista_tarefas as $tarefa) : ?>
			<tr>
				<td><?php echo $tarefa['nome']; ?></td>
				<td><?php echo $tarefa['descricao']; ?></td>
				<td><?php echo $tarefa['prazo']; ?></td>
				<td><?php echo $tarefa['prioridade']; ?></td>
				<td><?php echo $tarefa['concluida']; ?></td>

			</tr>
		<?php endforeach ?>
	</table>
</body>
</html>