<?php

	define("Servidor", "localhost");
	define("Usuario", "xTractorUser");
	define("Senha", "amos28amos");
	define("Banco", "amos");
		
	class DB{			
		public function Conectar(){
			$conexao = new mysqli(Servidor, Usuario, Senha, Banco);
			
			return $conexao;
		}
		
		public function NomeBanco(){
			return Banco;
		}
	}
?>