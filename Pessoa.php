<?php
	include("banco.php");
	
	class Pessoa{
	
		public function Cadastrar($Nome, $Endereco, $Numero){
			$resultado = false;
			
			//Conexão no banco
			$Banco = new DB;
			$Conexao = $Banco -> Conectar();
			
			if ($Conexao->connect_error) {
				$resultado = "Falha na conexão: $Conexao->connect_error";
			} 
			else{
				$this -> VerificarBase($Banco, $Conexao);
				//Cadastrar
				$ComandoSQL = "INSERT INTO Pessoa(nome, endereco, numero) VALUES('$Nome', '$Endereco', $Numero)";
				if($Conexao -> query($ComandoSQL) === TRUE){
					$resultado = true;
				}
			}
			return $resultado;
		}
		
		public function Listar(){
			
			//Conexão no banco
			$Banco = new DB;
			$Conexao = $Banco -> Conectar();
			
			if ($Conexao->connect_error) {
				$resultado = "Falha na conexão: $Conexao->connect_error";
			} 
			else{
				$this -> VerificarBase($Banco, $Conexao);
				
				//Cadastrar
				$ComandoSQL = "SELECT ID, nome, endereco, numero from Pessoa";
				return $Conexao -> query($ComandoSQL);
			}
			return null;
		}
		
		function VerificarBase($Banco, $Conexao){
			// Verificar se tabela existe
			$ComandoSQL = "SHOW TABLES WHERE TABLES_IN_" . $Banco -> NomeBanco() . " = 'PESSOA'; ";
			
			$ResultPesquisaBanco = $Conexao -> query($ComandoSQL);
			
			if(mysqli_num_rows($ResultPesquisaBanco)<= 0){
				$ComandoSQL = "create table Pessoa( id int not null auto_increment ,	nome varchar(100) not null ,	endereco varchar(100) not null ,	numero int not null , primary key (id))";
				$Conexao -> query($ComandoSQL);
			}
		}
		
	}
?>