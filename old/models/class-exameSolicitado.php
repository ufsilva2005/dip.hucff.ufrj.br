<?php
	class ExameSolicitado
		{
            private $idExamesSolicitados;
			private $numAmostra;
			private $numAmostraCega;
			private $dataCadastroE;  
			private $horaCadastro;   
            private $dataAmostra;     
			private $tiposExames;    
			private $idFuncionario;  
            private $idPaciente;			
            private $idOrigem;
			private $imprimir;
			
			
			 // Recebe dados como parametros
			public function __construct ($idExamesSolicitados = "", $numAmostra = null, $numAmostraCega = null, $dataCadastroE = null, 
			$horaCadastro = null, $dataAmostra = null, $tiposExames = null, $idFuncionario = null, $idPaciente = null, $idOrigem = null, $imprimir = null)
			
				{
					$this->idExamesSolicitados  = $idExamesSolicitados;
					$this->numAmostra   		= $numAmostra;
					$this->numAmostraCega		= $numAmostraCega;
					$this->dataCadastroE			= $dataCadastroE;
					$this->horaCadastro 		= $horaCadastro;
					$this->dataAmostra  		= $dataAmostra;
					$this->tiposExames 			= $tiposExames;
					$this->idFuncionario 		= $idFuncionario;
                    $this->idPaciente   		= $idPaciente;						
                    $this->idOrigem     		= $idOrigem;	
					$this->imprimir 			= $imprimir;						
				}
				
			//metodos get
			public function getIdExamesSolicitados() 
				{     
					return $this->idExamesSolicitados;
				}

			public function getNumAmostra() 
				{     
					return $this->numAmostra;
				}
				
			public function getNumAmostraCega() 
				{     
					return $this->numAmostraCega;
				}

			public function getDataCadastroE() 
				{     
					return $this->dataCadastroE;
				}	
				
			public function getHoraCadastro() 
				{     
					return $this->horaCadastro;
				}	

			public function getDataAmostra() 
				{     
					return $this->dataAmostra;
				}	

			public function getTiposExames()
				{
					return $this->tiposExames;
                } 
				
			public function getIdFuncionario()
				{
					return $this->idFuncionario;
                } 

			public function getIdPaciente()
				{
					return $this->idPaciente;
                } 

            public function getIdOrigem()
				{
					return $this->idOrigem;
				} 
			
			
			 public function getImprimir()
				{
					return $this->imprimir;
				} 	
			//metodos set
			public function setIdExamesSolicitados($idExamesSolicitados) 
				{     
					$this->idExamesSolicitados = $idExamesSolicitados;
				}	

			public function setNumAmostra($numAmostra) 
				{     
					$this->numAmostra = $numAmostra;
				}
				
			public function setNumAmostraCega($numAmostraCega) 
				{     
					$this->numAmostraCega = $numAmostraCega;
				}
				
			public function setDataCadastroE($dataCadastroE) 
				{     
					 $this->dataCadastroE = $dataCadastroE;
				}	
				
			public function setHoraCadastro($horaCadastro) 
				{     
					 $this->horaCadastro = $horaCadastro;
				}
				
			public function setDataAmostra($dataAmostra) 
				{     
					 $this->dataAmostra = $dataAmostra;
				}	
					
			public function setTiposExames($tiposExames)
				{
					 $this->tiposExames = $tiposExames;
				} 
				
			public function setIdFuncionario($idFuncionario)
				{
					 $this->idFuncionario = $idFuncionario;
				} 

			public function setIdPaciente($idPaciente)
				{
					 $this->idPaciente = $idPaciente;
				} 	
			
            public function setIdOrigem($idOrigem)
				{
					 $this->idOrigem = $idOrigem;
				} 	
				
			public function setImprimir($imprimir)
				{
					 $this->imprimir = $imprimir;
				} 	

			// Método para exibir
			public function exibir() 
				{
					echo '<br>idExamesSolicitados: ';
					echo $this->idExamesSolicitados . '<br>';

					echo 'numAmostra: ';
					echo $this->numAmostra . '<br>';

					echo 'numAmostraCega: ';
					echo $this->numAmostraCega . '<br>';

					echo 'dataCadastroE: ';
					echo $this->dataCadastroE . '<br>';

					echo 'horaCadastro: ';
					echo $this->horaCadastro . '<br>';

					echo 'dataAmostra: ';
					echo $this->dataAmostra . '<br>';

					echo 'tiposExames: ';
                    echo $this->tiposExames . '<br>';

					echo 'idFuncionario: ';
                    echo $this->idFuncionario . '<br>';
					
					echo 'idPaciente: ';
                    echo $this->idPaciente . '<br>';
                                        
                    echo 'idOrigem: ';
					echo $this->idOrigem . '<br>';	

					echo 'imprimir: ';
					echo $this->imprimir . '<br>';						
				}			
		}		
?>
