<?php
	include("Pessoa.php");
?>


<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta charset="ISO_8859-9:1989">
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="mystyle.css" />		
	</head>

	<body>
		
		<div id="formulario">
			<h2>Realize o cadastro do nome neste formulário</h2>
			
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
				<p class="label">Nome:</p> 
				<p><input id="txtNome" type="text" name="txtNome" class="campo" /></p>
				<p class="label">Endereço:</p>
				<p><input id="txtEndereco" type="text" name="txtEndereco" class="campo"/></p>
				<p class="label">Número:</p>
				<p><input id="txtNumero" type="text" name="txtNumero" class="campo"/></p>
				
				<p><input id="btnEnviar" type="submit" name="btnEnviar" class="botao"></input></p>
			</form>
		</div>
		
		<!-- Visualização do resultado de inserção, caso tenha sido cadastrado -->
		<?php
			$alerta = "";
			$resultado = false;
			
			if($_SERVER["REQUEST_METHOD"] == "POST"){
				
				//Validação
				if ($_POST["txtNome"] == ""){
					$alerta .= "O campo Nome não foi informado.<br>";
				}
				else if ($_POST["txtEndereco"] ==""){
					$alerta .= "O campo Endereço não foi informado.<br>";
				}
				else if ($_POST["txtNumero"] == ""){
					$alerta .= "O campo Número não foi informado.<br>";
				}
				else if (!filter_var($_POST["txtNumero"],FILTER_VALIDATE_INT)){
					$alerta .= "O campo Número precisa receber um valor numérico válido.";
				}
				else{
					$CadastroPessoa = new Pessoa;
					$resultado = $CadastroPessoa -> Cadastrar($_POST["txtNome"], $_POST["txtEndereco"], $_POST["txtNumero"]);
				}
				
				if ($resultado != true){
					echo "<script type='text/javascript'>alert('$alerta');</script>";
				}
				else{
					echo "<script type='text/javascript'>alert('Pessoa cadastrada com sucesso.');</script>";
					echo "<script type='text/javascript'>window.location.href = 'https://localhost/Teste_Altran_PHP/index.php';</script>";
				}
			}
		?>
	</body>

</html>