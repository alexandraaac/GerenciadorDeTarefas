<?php
$bdServidor = '';
$bdUsuario = 'raiz';
$bdSenha = 'a483448833';
$bdBanco = 'tarefas';

$conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);
	if(mysqli_connect_errno()){
		echo "problemas para conectar no banco. Verifique os dados!". mysqli_connect_errno();
		die();
	}else{
		?>
		<p style="font-size: 20px ; font-family:verdana"; >Conexão estabelecida!<p>
	<?php } ?>
