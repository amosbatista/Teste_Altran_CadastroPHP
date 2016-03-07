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
			<h2>Lista de usuários</h2>
			<?php
				$CadastroPessoa = new Pessoa;
				$listaPessoas = $CadastroPessoa -> Listar();
				
				if (mysqli_num_rows($listaPessoas) > 0) {
					echo "<ul>";
						
						while($linha = mysqli_fetch_assoc($listaPessoas)){
							echo "<li>";
								echo "<p>Id: " . $linha["ID"] . "</p>";
								echo "<p>Nome: " . $linha["nome"] . "</p>";
								echo "<p>Endereço: " . $linha["endereco"] . ", " . $linha["numero"] . "</p>";
							echo "</li>";
						}
					
					echo "</ul>";
				}
				else{
					echo "Não há usuários cadastrados.";
				}
				
			?>
			
			<p class="linkCadastro">
				<a href="cadastrarPessoa.php">
					Cadastrar novo usuário.
				</a>
			</p>
			
		</div>
		
		
	</body>

</html>