<?php
	class Exame
		{
            private $idTipoExames;
			private $tipoExame;
		 	private $statusExame;	
			 // Recebe dados como parametros
			public function __construct ($idTipoExames = "", $tipoExame = null, $statusExame = null) 
			
				{
					$this->idTipoExames = $idTipoExames;
					$this->tipoExame    = $tipoExame;	
					$this->statusExame  = $statusExame;	
				}
				
			//metodos get			
			public function getIdTipoExames() 
				{     
					return $this->idTipoExames;
				}

			public function getTipoExame() 
				{     
					return $this->tipoExame;
				}

			public function getStatusExame() 
				{     
					return $this->statusExame;
				}
			
			//metodos set
			public function setIdTipoExames($idTipoExames) 
				{     
					$this->idTipoExames = $idTipoExames;
				}	

			public function setTipoExame($tipoExame) 
				{     
					$this->tipoExame = $tipoExame;
				}

			public function setStatusExame($statusExame) 
				{     
					$this->statusExame = $statusExame;
				}
				
			// Método para exibir
			public function exibir() 
				{
					echo 'idTipoExames: ';
					echo $this->idTipoExames . '<br>';

					echo 'tipoExame: ';
					echo $this->tipoExame . '<br>';

					echo 'statusExame: ';
					echo $this->statusExame . '<br>';
				}			
		}		
?>
