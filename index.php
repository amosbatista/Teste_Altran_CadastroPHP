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
			<h2>Lista de usu�rios</h2>
			<?php
				$CadastroPessoa = new Pessoa;
				$listaPessoas = $CadastroPessoa -> Listar();
				
				if (mysqli_num_rows($listaPessoas) > 0) {
					echo "<ul>";
						
						while($linha = mysqli_fetch_assoc($listaPessoas)){
							echo "<li>";
								echo "<p>Id: " . $linha["ID"] . "</p>";
								echo "<p>Nome: " . $linha["nome"] . "</p>";
								echo "<p>Endere�o: " . $linha["endereco"] . ", " . $linha["numero"] . "</p>";
							echo "</li>";
						}
					
					echo "</ul>";
				}
				else{
					echo "N�o h� usu�rios cadastrados.";
				}
				
			?>
			
			<p class="linkCadastro">
				<a href="cadastrarPessoa.php">
					Cadastrar novo usu�rio.
				</a>
			</p>
			
		</div>
		
		
	</body>

</html>