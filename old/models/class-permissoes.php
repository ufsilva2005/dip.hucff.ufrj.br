<?php
	class Permissoes
		{
            private $idPermissoes;
            private $gerenExames;
            private $verDadosPaciente;
			private $editarPaciente;		
			private $cadPaciente;
			private $cadFucionario;
			private $administrador;

			 // Recebe dados como parametros
			public function __construct ($idPermissoes = "", $gerenExames = null, $verDadosPaciente = null, $editarPaciente = null, 
            $cadPaciente = null, $cadFucionario = null, $administrador = null) 
			
				{
					$this->idPermissoes 	  = $idPermissoes;
					$this->gerenExames  	  = $gerenExames; 
					$this->verDadosPaciente	  = $verDadosPaciente;  
                    $this->editarPaciente     = $editarPaciente;                    
					$this->cadPaciente  	  = $cadPaciente;	
                    $this->cadFucionario 	  = $cadFucionario;			
					$this->administrador 	  = $administrador;
				}
				
			//metodos get
			public function getIdPermissoes() 
				{     
					return $this->idPermissoes;
				}
				
			public function getGerenExames()
				{
					return $this->gerenExames;
				}   
				
            public function getVerDadosPaciente() 
				{
					return $this->verDadosPaciente;
				} 	
				
			public function getEditarPaciente() 
				{     
					return $this->editarPaciente;
				}
														
			public function getCadPaciente()
				{
					return $this->cadPaciente;
				} 
                												
			public function getCadFucionario()
				{
					return $this->cadFucionario;
				} 
				
			public function getAdministrador()
				{
					return $this->administrador;
				} 
			
			//metodos set
			public function setIdPermissoes($idPermissoes) 
				{     
					$this->idPermissoes = $idPermissoes;
				}	
		 
			public function setGerenExames($gerenExames)
				{
					 $this->gerenExames = $gerenExames;
				}  
				
            public function setVerDadosPaciente($verDadosPaciente) 
				{
					 $this->verDadosPaciente = $verDadosPaciente;
				}
				
            public function setEditarPaciente($editarPaciente) 
				{     
					 $this->editarPaciente = $editarPaciente;
				}
				
			public function setCadPaciente($cadPaciente)
				{
					 $this->cadPaciente = $cadPaciente;
				} 	
                
			public function setCadFucionario($cadFucionario)
				{
					 $this->cadFucionario = $cadFucionario;
				} 					
			
				public function setAdministrador($administrador)
				{
					 $this->administrador = $administrador;
				} 	
			// Método para exibir
			public function exibir() 
				{
					echo 'idPermissoes: ';
					echo $this->idPermissoes . '<br>';
										
					echo 'gerenExames: ';
					echo $this->gerenExames . '<br>';
					
					echo 'verDadosPaciente: ';
					echo $this->verDadosPaciente . '<br>';
					
					echo 'editarPaciente: ';
					echo $this->editarPaciente . '<br>';
					
					echo 'cadPaciente: ';
					echo $this->cadPaciente . '<br>';	

                    echo 'cadFucionario: ';
					echo $this->cadFucionario . '<br>';	

					echo 'administrador: ';
					echo $this->administrador . '<br>';	
				}
			
		}
		
?>
