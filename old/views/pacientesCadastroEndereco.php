<?php
	include "../template/menuPrincipal.php";  
	include "../scripts/mascara.php";		
	include "../scripts/scriptCep.php"; 
	include "../scripts/validarCpf.php";
	
	if($_SESSION['cadPaciente']  != "sim")
		{
			echo "<script type='text/javascript'>alert('USUÁRIO NÃO AUTORIZADO');</script>";
			echo "<script>location = '../template/menuPrincipal.php';</script>";  
		}

    $idFuncionario = $_SESSION['idFuncionario'];  
    $nomeFuncionario = $_SESSION['nomeFuncionario'];  
    $nomePaciente = $_SESSION['nomePaciente'];
    $dadosCpf = $_SESSION['dadosCpf'];
    $numSus = $_SESSION['numSus'];    
?>
	
		<div class="container">
            <div id="page-content-wrapper">
				<div class="panel-header">
					<i class="icon-tasks icon-blue"></i>
					<h3 class="text-success">Cadastro de Pacientes</h3>
				</div>

				<div id="order-form-container" class="container p-6 my-md-4 px-md-0">
					<div class="col-md-12">																																
						<form  name="cadastro" id="address-form" class="form-horizontal" action="../controllers/pacientesCadastroEndereco.php?action=1&id=0" method="POST">		
                            <div class="row mb-3">
                                <div class="form-floating col px-md-1 col-md-8">                                    
                                    <input type="text" class="form-control shadow-none" id="nome" name="nome"  value = "<?=$nomePaciente;?>" placeholder="Nome" />
									<label for="nome">Nome:</label>
                                </div>

								<div class="form-floating col px-md-1 col-md-2">									
									<input type="date"  class="form-control shadow-none" id="dataNasce" name="dataNasce" />
									<label for="dataNasce">Nascimento:</label> 
								</div>

                                <div class="form-floating col px-md-1 col-md-2">									
									<input type="text"  class="form-control shadow-none" id="prontuario" name="prontuario" placeholder="Prontuário" />
									<label for="prontuario">Nº Prontuário:</label>
								</div>
                            </div>

                            <hr>

                            <div class="row  mb-3">
                        	    <div class="form-floating col px-md-1 col-md-2">
									<input type="text"  class="form-control shadow-none" id="cartao" name="cartao"  value = "<?=$numSus;?>" placeholder="Cartão" />
									<label for="cartao">Nº Cartão SUS:</label>
								</div>
																					
								<div class="form-floating col px-md-1 col-md-2">									
									<input type="text"  class="form-control shadow-none"  id="dadosCpf" name="dadosCpf" placeholder="CPF"  value = "<?=$dadosCpf;?>"  onblur = "ValidarCPF(cadastro.dadosCpf)" /> 
									<label for="dadosCpf">CPF:</label>   
								</div>

								<div class="form-floating col px-md-1 col-md-2">									
									<input type="text"  class="form-control shadow-none"  id="proj" name="proje" placeholder="CPF" /> 
									<label for="proj">Pojeto:</label>   
								</div>

                               	<div class="col px-md-1 col-md-3">														
                                    <label for="">Sexo:</label> <br>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sexo" value="Masculino" id="sexo1" checked>
                                        <label class="form-check-label" for="sexo1">Masculino</label>  
                                    </div>	

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sexo" value="Feminino" id="sexo2">
                                        <label class="form-check-label" for="sexo2">Feminino</label>
                                    </div>
                                </div>		

                               	<div class="col px-md-1 col-md-3">															
                                    <label for="">Gestante:</label> <br>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gestante" value="sim" id="gestante1">
                                        <label class="form-check-label" for="gestante1">Sim</label>  
                                    </div>	

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gestante" value="não" id="gestante2" checked>
                                        <label class="form-check-label" for="gestante2">Não</label>
                                    </div>
                                </div>		
							</div>                        

							<hr>

                            <!--Contatos-->
							<div class="row">										
								<label><a> Dados Contatos:</a></label>
							</div>	

                            <div class="row">
								<div class="form-floating col px-md-1 col-md-2">
									<input type="text" class="form-control shadow-none" name="contatosTel" id="contatosTel" placeholder = "telefone" >
									<label for="contatosTel">Telefone:</label>
								</div>
									 
								<div class="form-floating col px-md-1 col-md-2">
									<input type="text" class="form-control shadow-none" name="contatosCel" id = "contatosCel" placeholder = "celular" >
									<label for="contatosCel">Celular:</label>
								</div>  
									
								<div class="form-floating col px-md-1 col-md-3">
									<input type="email" class="form-control shadow-none"  name="contatosEmail" placeholder = "nome@nome.nome" >
									<label for="contatosEmail">Email:</label>
								</div>  
									
								<div class="col px-md-1 col-md-3">															
                                    <label for="">WhatsApp:</label> <br>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="possuiWhatsApp" value="sim" id="possuiWhatsApp1">
                                        <label class="form-check-label" for="possuiWhatsApp1">Sim</label>  
                                    </div>	

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="possuiWhatsApp" value="não" id="possuiWhatsApp2" checked>
                                        <label class="form-check-label" for="possuiWhatsApp2">Não</label>
                                    </div>
								</div>	
							</div>								
								
							<br>
                            <!--Endereço-->
                            <div class="row">										
								<label><a> Dados Endereço:</a></label>
							</div>	

                            <div class="row">
								
								
								<div class="row mb-3">
									<div class="form-floating col px-md-1 col-md-2">
										<input type="text" class="form-control shadow-none" id="cep" name="cep" placeholder="Digite o Cep da residência" maxlength="9" onblur="pesquisacep(this.value);" />
										<label for="cep">cep</label>
									</div>

									<div class="form-floating col px-md-1 col-md-4">
										<input type="text" class="form-control shadow-none" id="rua" name="rua" placeholder="Rua" readonly tabindex="-1"/>
										<label for="address">Rua</label>
									</div>

									<div class="form-floating col px-md-1 col-md-2">
										<input type="text" class="form-control shadow-none" id="number" name="number" placeholder="Digite o número da residência" />
										<label for="number">Número da Residência</label>
									</div>

									<div class="form-floating col px-md-1 col-md-4">
										<input type="text" class="form-control shadow-none" id="complement" name="complement" placeholder="Digite o complemento" />
										<label for="complement">Digite o complemento</label>
									</div>
								</div>
							</div>        
        
        					<input name="ibge" type="text" id="ibge" size="8" hidden/>

							<div class="row">							
 								<div class="form-floating col px-md-1 col-md-4">
									<input type="text" class="form-control shadow-none" id="bairro" name="bairro" placeholder="Bairro" required data-input readonly tabindex="-1"/>
									<label for="bairro">Bairro</label>
								</div>
								
								<div class="form-floating col px-md-1 col-md-4">
									<input type="text" class="form-control shadow-none" id="cidade" name="cidade" placeholder="Cidade" required data-input readonly tabindex="-1"/>
									<label for="cidade">Cidade</label>
								</div>

								<div class="form-floating col px-md-1 col-md-4">
									<input type="text" class="form-control shadow-none" id="uf" name="uf" placeholder="uf" required data-input readonly tabindex="-1"/>
									<label for="uf">UF</label>
								</div>
							</div>
														
                            <hr>
							
                            <div id="actions" class="row">
								<div class="col-md-2">
								    <button type="submit" class="btn btn-success">Salvar</button>
								</div>
								<div class="col-md-2">								
									<a  href="../template/menuPrincipal.php"><button type="button" class="btn btn-outline-warning">Voltar</button></a>
								</div>	
							</div>	
                        </form>
                    </div>	
				</div>	
            </div>	
		</div>	
    </body>
</html>