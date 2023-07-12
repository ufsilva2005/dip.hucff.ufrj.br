<?php
	class Contatos
		{
            private $idContato;
            private $telefone;
            private $celular;
            private $possuiWhatsApp;
			private $email;	
            private $idPaciente;
			
			 // Recebe dados como parametros
			public function __construct ($idContato = "", $telefone = null, $celular = null, $possuiWhatsApp = null, $email = null, 
            $idPaciente = null)  
			
				{
				    $this->idContato      = $idContato;
					$this->telefone       = $telefone; 
					$this->celular        = $celular;  
                    $this->possuiWhatsApp = $possuiWhatsApp;
                    $this->email          = $email;                    
                    $this->idPaciente     = $idPaciente;		
				}
				
			//metodos get
			public function getIdContato() 
				{     
					return $this->idContato;
				}
				
			public function getTelefone()
				{
					return $this->telefone;
				}   
				
            public function getCelular() 
				{
					return $this->celular;
				} 	

            public function getPossuiWhatsApp()
				{
					return $this->possuiWhatsApp;
				} 
				
			public function getEmail() 
				{     
					return $this->email;
				}
														
			public function getIdPaciente()
				{
					return $this->idPaciente;
				} 
			
			//metodos set
			public function setIdContato($idContato) 
				{     
					$this->idContato = $idContato;
				}	
		 
			public function setTelefone($telefone)
				{
					 $this->telefone = $telefone;
				}  
				
            public function setCelular($celular) 
				{
					 $this->celular = $celular;
				}

            public function setPossuiWhatsApp($possuiWhatsApp)
				{
					 $this->possuiWhatsApp = $possuiWhatsApp;
				}
				
            public function setEmail($email) 
				{     
					 $this->email = $email;
				}
				
			public function setIdPaciente($idPaciente)
				{
					 $this->idPaciente = $idPaciente;
				} 				
			
			// Método para exibir
			public function exibir() 
				{
					echo 'idContato: ';
					echo $this->idContato . '<br>';
										
					echo 'telefone: ';
					echo $this->telefone . '<br>';
					
					echo 'celular: ';
					echo $this->celular . '<br>';

                    echo 'possuiWhatsApp: ';
					echo $this->possuiWhatsApp . '<br>';	
					
					echo 'email: ';
					echo $this->email . '<br>';
					
					echo 'idPaciente: ';
					echo $this->idPaciente . '<br>';	                    
				}			
		}		
?>
