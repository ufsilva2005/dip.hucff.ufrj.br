<?php
	class Origem
		{
            private $idOrigem;
            private $descricao;
            private $cap;
			private $numOrigem;	
			private $statusOrigem;
			
			 // Recebe dados como parametros
			public function __construct ($idOrigem = "", $descricao = null, $cap = null, $numOrigem = null, $statusOrigem = null) 
			
				{
					$this->idOrigem     = $idOrigem;
					$this->descricao    = $descricao; 
					$this->cap   	    = $cap;  
                    $this->numOrigem    = $numOrigem; 	
					$this->statusOrigem = $statusOrigem;		
				}
				
			//metodos get
			public function getIdOrigem() 
				{     
					return $this->idOrigem;
				}
				
			public function getDescricao()
				{
					return $this->descricao;
				}   
				
            public function getCap() 
				{
					return $this->cap;
				} 	
				
			public function getNumOrigem() 
				{     
					return $this->numOrigem;
				}

			public function getStatusOrigem() 
				{     
					return $this->statusOrigem;
				}
			
			
			//metodos set
			public function setIdOrigem($idOrigem) 
				{     
					$this->idOrigem = $idOrigem;
				}	
		 
			public function setDescricao($descricao)
				{
					 $this->descricao = $descricao;
				}  
				
            public function setCap($cap) 
				{
					 $this->cap = $cap;
				}
				
            public function setNumOrigem($numOrigem) 
				{     
					 $this->numOrigem = $numOrigem;
				}

			public function setStatusOrigem($statusOrigem) 
				{     
					 $this->statusOrigem = $statusOrigem;
				}

			// Método para exibir
			public function exibir() 
				{
					echo 'idOrigem: ';
					echo $this->idOrigem . '<br>';
										
					echo 'descricao: ';
					echo $this->descricao . '<br>';
					
					echo 'cap: ';
					echo $this->cap . '<br>';
					
					echo 'numOrigem: ';
					echo $this->numOrigem . '<br>';

					echo 'statusOrigem: ';
					echo $this->statusOrigem . '<br>';
				}			
		}
		
?>