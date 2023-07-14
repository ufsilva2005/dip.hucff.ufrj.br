<?php
	class Funcionario
		{
            private $idFuncionario;
			private $login;
            private $senha;
            private $nomeFuncionario;
			private $cpf; 
			private $status;
            private $dataCadastroF;   
            private $idPermissoes;
			
			 // Recebe dados como parametros
			public function __construct ($idFuncionario = "", $login = null, $senha = null, $nomeFuncionario = null, $cpf = null, $status = null, 
			$dataCadastroF = null, $idPermissoes = null) 
			
				{
					$this->idFuncionario   = $idFuncionario;
					$this->login           = $login;
					$this->senha       	   = $senha;
					$this->nomeFuncionario = $nomeFuncionario;
					$this->cpf 			   = $cpf;
					$this->status          = $status;
					$this->dataCadastroF    = $dataCadastroF; 
                    $this->idPermissoes    = $idPermissoes;					
				}
				
			//metodos get
			public function getIdFuncionario() 
				{     
					return $this->idFuncionario;
				}

			public function getLogin() 
				{     
					return $this->login;
				}

			public function getSenha() 
				{     
					return $this->senha;
				}	
				
			public function getNomeFuncionario() 
				{
					return $this->nomeFuncionario;
				}
				 
			public function getCpf() 
				{
					return $this->cpf;
				}

			public function getStatus() 
				{
					return $this->status;
				} 
			
			public function getDataCadastroF()
				{
					return $this->dataCadastroF;
				} 

			public function getIdPermissoes()
				{
					return $this->idPermissoes;
                } 
			
			//metodos set
			public function setIdFuncionario($idFuncionario) 
				{     
					$this->idFuncionario = $idFuncionario;
				}	

			public function setLogin($login) 
				{     
					$this->login = $login;
				}
				
			public function setSenha($senha) 
				{     
					 $this->senha = $senha;
				}
				
			public function setNomeFuncionario($nomeFuncionario) 
				{
					 $this->nomeFuncionario = $nomeFuncionario;
				}
				
			public function setCpf($cpf) 
				{
					 $this->cpf = $cpf;
				}

			public function setStatus($status) 
				{
					 $this->status = $status;
				}

			public function setDataCadastroF($dataCadastroF)
				{
					 $this->dataCadastroF = $dataCadastroF;
				}  
				
			public function setIdPermissoes($idPermissoes)
				{
					 $this->idPermissoes = $idPermissoes;
				} 

			// Método para exibir
			public function exibir() 
				{
					echo 'idFuncionario: ';
					echo $this->idFuncionario . '<br>';

					echo 'login: ';
					echo $this->login . '<br>';

					echo 'senha: ';
					echo $this->senha . '<br>';

					echo 'nomeFuncionario: ';
					echo $this->nomeFuncionario . '<br>';	

					echo 'cpf: ';
					echo $this->cpf . '<br>';	

					echo 'status: ';
					echo $this->status . '<br>';	
					
					echo 'dataCadastroF: ';
					echo $this->dataCadastroF . '<br>';
					
					echo 'idPermissoes: ';
                    echo $this->idPermissoes . '<br>';	
				}			
		}		
?>
