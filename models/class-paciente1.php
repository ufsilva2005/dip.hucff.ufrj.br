<?php
	class Paciente
		{
            private $idPaciente;
			private $nomePaciente;
            private $dataNasce;
			private $prontuario;
            private $gestante;
			private $numSus;
            private $cpf;   
            private $sexo;
            private $identidade;
            private $orgaoEmissor;
            private $naturalidade;
            private $nacionalidade;
            private $dataCadastroP;
            private $idFuncionario;
			private $dataAltCad;
            private $idFuncionarioAlt;
			
			 
			// Recebe dados como parametros
			public function __construct ($idPaciente = "", $nomePaciente = null, $dataNasce = null,  $prontuario = null, $gestante = null, $numSus = null, 
            $cpf = null, $sexo = null, $identidade = null, $orgaoEmissor = null, $naturalidade = null, $nacionalidade = null,
            $dataCadastroP = null, $idFuncionario = null, $dataAltCad = null, $idFuncionarioAlt = null) 
			
				{
					$this->idPaciente    	= $idPaciente;
					$this->nomePaciente  	= $nomePaciente;
					$this->dataNasce 		= $dataNasce;
					$this->prontuario    	= $prontuario;
					$this->gestante      	= $gestante;
					$this->numSus        	= $numSus;
					$this->cpf           	= $cpf; 
                    $this->sexo          	= $sexo;
                    $this->identidade    	= $identidade;		
                    $this->orgaoEmissor  	= $orgaoEmissor;	
                    $this->naturalidade  	= $naturalidade; 
                    $this->nacionalidade 	= $nacionalidade;
                    $this->dataCadastroP  	= $dataCadastroP;		
                    $this->idFuncionario 	= $idFuncionario;	
					$this->dataAltCad 		= $dataAltCad;
             		$this->idFuncionarioAlt = $idFuncionarioAlt;					
				}
				
			//metodos get
			public function getIdPaciente() 
				{     
					return $this->idPaciente;
				}

			public function getNomePaciente() 
				{     
					return $this->nomePaciente;
				}

			public function getDataNasce() 
				{     
					return $this->dataNasce;
				}

			public function getProntuario() 
				{     
					return $this->prontuario;
				}	
				
			public function getGestante() 
				{
					return $this->gestante;
				} 

			public function getNumSus() 
				{
					return $this->numSus;
				} 
			
			public function getCpf()
				{
					return $this->cpf;
				} 

			public function getSexo()
				{
					return $this->sexo;
                } 
                
            public function getIdentidade()
				{
					return $this->identidade;
                } 
                
            public function getOrgaoEmissor()
				{
					return $this->orgaoEmissor;
				} 

            public function getNaturalidade()
                {
                    return $this->naturalidade;
                } 

            public function getNacionalidade()
                {
                    return $this->nacionalidade;
                } 

            public function getDataCadastroP()
                {
                    return $this->dataCadastroP;
                } 

            public function getIdFuncionario()
                {
                    return $this->idFuncionario;
                }    
			public function getDataAltCad()
                {
                    return $this->dataAltCad;
                } 

            public function getIdFuncionarioAlt()
                {
                    return $this->idFuncionarioAlt;
                } 

			//metodos set
			public function setIdPaciente($idPaciente) 
				{     
					$this->idPaciente = $idPaciente;
				}	

			public function setNomePaciente($nomePaciente) 
				{     
					$this->nomePaciente = $nomePaciente;
				}
				
			public function setDataNasce($dataNasce) 
				{     
					 $this->dataNasce = $dataNasce;
				}
				
			public function setProntuario($prontuario) 
				{     
					 $this->prontuario = $prontuario;
				}
				
			public function setGestante($gestante) 
				{
					 $this->gestante = $gestante;
				}

			public function setNumSus($numSus) 
				{
					 $this->numSus = $numSus;
				}

			public function setCpf($cpf)
				{
					 $this->cpf = $cpf;
				}  
				
			public function setSexo($sexo)
				{
					 $this->sexo = $sexo;
				} 				
            
            public function setIdentidade($identidade)
				{
					 $this->identidade = $identidade;
                } 		
                
            public function setOrgaoEmissor($orgaoEmissor)
				{
					 $this->orgaoEmissor = $orgaoEmissor;
				} 	


            public function setNaturalidade($naturalidade)
				{
					 $this->naturalidade = $naturalidade;
				}  
				
			public function setNacionalidade($nacionalidade)
				{
					 $this->nacionalidade = $nacionalidade;
				} 				
            
            public function setDataCadastroP($dataCadastroP)
				{
					 $this->dataCadastroP = $dataCadastroP;
                } 		
                
            public function setIdFuncionario($idFuncionario)
				{
					 $this->idFuncionario = $idFuncionario;
				} 	  
			
			public function setDataAltCad($dataAltCad)
				{
					 $this->dataAltCad = $dataAltCad;
                } 		
                
            public function setIdFuncionarioAlt($idFuncionarioAlt)
				{
					 $this->idFuncionarioAlt = $idFuncionarioAlt;
				} 	

			// Método para exibir
			public function exibir() 
				{
					echo 'idPaciente: ';
					echo $this->idPaciente . '<br>';

					echo 'nomePaciente: ';
					echo $this->nomePaciente . '<br>';

					echo 'dataNasce: ';
					echo $this->dataNasce . '<br>';				

					echo 'prontuario: ';
					echo $this->prontuario . '<br>';

					echo 'gestante: ';
					echo $this->gestante . '<br>';	

					echo 'numSus: ';
					echo $this->numSus . '<br>';	
					
					echo 'cpf: ';
					echo $this->cpf . '<br>';
					
					echo 'sexo: ';
                    echo $this->sexo . '<br>';	
                    
                    echo 'identidade: ';
                    echo $this->identidade . '<br>';	
                    
                    echo 'orgaoEmissor: ';
					echo $this->orgaoEmissor . '<br>';
                    
                    echo 'naturalidade: ';
					echo $this->naturalidade . '<br>';
					
					echo 'nacionalidade: ';
                    echo $this->nacionalidade . '<br>';	
                    
                    echo 'dataCadastroP: ';
                    echo $this->dataCadastroP . '<br>';	
                    
                    echo 'idFuncionario: ';
					echo $this->idFuncionario . '<br>';	

					echo 'dataAltCad: ';
                    echo $this->dataAltCad . '<br>';	
                    
                    echo 'idFuncionarioAlt: ';
					echo $this->idFuncionarioAlt . '<br>';	
				}			
		}		
?>
