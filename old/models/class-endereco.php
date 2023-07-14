<?php
	class Endereco
		{
            private $idEndereco;
			private $logradouro;
            private $numero;
            private $complemento;
            private $bairro;
			private $cidade;
            private $cep;
            private $uf;
            private $idPaciente;
			
			 // Recebe dados como parametros
			public function __construct ($idEndereco = "", $logradouro = null, $numero = null, $complemento = null, $bairro = null,  
            $cidade = null, $cep = null, $uf = null, $idPaciente = null) 
			
				{
					$this->idEndereco  = $idEndereco;
                    $this->logradouro         = $logradouro;
                    $this->numero      = $numero;  
                    $this->complemento = $complemento;   
                    $this->bairro      = $bairro;               
                    $this->cidade      = $cidade;
                    $this->cep         = $cep;	
                    $this->uf          = $uf;	
                    $this->idPaciente  = $idPaciente;				
				}
				
			//metodos get
			public function getIdEndereco()
				{     
					return $this->idEndereco;
				}
                
            public function getLogradouro()
				{
					return $this->logradouro;
				}    

			public function getNumero() 
				{
					return $this->numero;
				}
         
            public function getComplemento() 
				{
					return $this->complemento;
                }
                
            public function getBairro() 
				{
					return $this->bairro;
				}
			
            public function getCidade() 
				{     
					return $this->cidade;
				}

			public function getCep()
				{
					return $this->cep;
                } 
                
            public function getUf()
				{
					return $this->uf;
				} 

            public function getIdPaciente()
				{
					return $this->idPaciente;
				} 
                
			//metodos set
			public function setIdEndereco($idEndereco) 
				{     
					$this->idEndereco = $idEndereco;
				}
            
            public function setLogradouro($logradouro)
				{
					$this->logradouro = $logradouro;
                } 
			
			public function setNumero($numero) 
				{
					 $this->numero = $numero;
                }
                
            public function setComplemento($complemento) 
				{
					 $this->complemento = $complemento;
                }
                
            public function setBairro($bairro) 
				{
					 $this->bairro = $bairro;
				}
                
            public function setCidade($cidade) 
				{     
					 $this->cidade = $cidade;
				}
				
			public function setCep($cep)
				{
					 $this->cep = $cep;
				} 				
            
            public function setUf($uf)
				{
					 $this->uf = $uf;
                } 

            public function setIdPaciente($idPaciente)
				{
					 $this->idPaciente = $idPaciente;
                } 
                
			// Método para exibir
			public function exibir() 
				{
					echo 'idEndereco: ';
					echo $this->idEndereco . '<br>';					
					
					echo 'logradouro: ';
                    echo $this->logradouro . '<br>';
                    
					echo 'numero: ';
					echo $this->numero . '<br>';
                    
                    echo 'complemento: ';
					echo $this->complemento . '<br>';

					echo 'bairro: ';
					echo $this->bairro . '<br>';
                    
                    echo 'cidade: ';
					echo $this->cidade . '<br>';

					echo 'cep: ';
                    echo $this->cep . '<br>';
                    
                    echo 'uf: ';
					echo $this->uf . '<br>';	

                    echo 'idPaciente: ';
					echo $this->idPaciente . '<br>';        
				}			
		}		
?>
