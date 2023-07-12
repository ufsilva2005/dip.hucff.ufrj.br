<?php
	include "../template/menuPrincipal.php";
    include "../scripts/mascara.php"; 
    include "../scripts/validarCpf.php";
    include "../scripts/pesquisaNumCpf.php"; 
    include "../scripts/pesquisaLogin.php";
   
    if($_SESSION['administrador'] != "sim" || $_SESSION['cadFucionario'] != "sim")
        {
            echo "<script type='text/javascript'>alert('USUÁRIO NÃO AUTORIZADO');</script>";
            echo "<script>location = '../template/menuPrincipal.php';</script>";  
        }

    $idFuncionario = $_SESSION['idFuncionario'];  
    $nomeFuncionario = $_SESSION['nomeFuncionario'];  
?>

        <div class="container">
            <div id="page-content-wrapper">
				<div class="panel-header">
					<i class="icon-tasks icon-blue"></i>
					<h3 class="text-success">Cadastro de Funcionários</h3>
				</div>
						
				<div class="panel-content">
					<div class="col-md-12">																																
						<form  id="cadastro"  name="cadastro" class="form-horizontal" action="../controllers/funcionariosCadastrar.php" method="POST">		
                            <div class="row">
                                <div class="col px-md-1 col-md-10">
                                    <label for="inputSuccess" class="control-label">Nome:</label>
                                    <input type="text" class="form-control" name="nomeFuncionario1" required>
                                </div>

                                <div class="col px-md-1 col-md-2">
                                    <label for="inputSuccess" class="control-label">CPF:</label>
                                    <input type="text" class="form-control" name="dadosCpf" id="dadosCpf" onblur = "ValidarCPF(cadastro.dadosCpf)" required>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                        	    <div class="col px-md-1 col-md-3">
									<label for="inputSuccess" class="control-label">Login:</label>
									<input type="text" minlength="3" class="form-control" name="login"  id="login" required>
								</div>
																					
								<div class="col px-md-1 col-md-3">
									<label for="inputSuccess" class="control-label">Senha:</label>
									<input class="form-control" name = "senha"  type = "password" placeholder = "password" required>    
								</div>
							</div>

                            <hr>

                            <h6 class="text-success">Novas Permissões de Gerenciamento </h6>
							<div class="row">
                                <table class="table table-striped table-bordered table-condensed">
                                    <thead>
                                        <tr>
                                            <th>Gerenciar Exames</th>
                                            <th>Visualizar Pacientes</th> 
                                            <th>Editar Pacientes</th> 
                                            <th>Cadastrar Pacientes</th> 
                                            <th>Cadastrar Funcionários</th>  
                                            <th>Administrador</th>                                            
                                        </tr>
                                    </thead>        
                                    <tbody> 
                                        <tr>       
                                            <td>
                                                <input type="radio" class="btn-check" name="gerenExames" id="gerenExames" autocomplete="off"  value = "sim">
                                                <label class="btn btn-outline-success" for="gerenExames">SIM</label>

                                                <input type="radio" class="btn-check" name="gerenExames" id="gerenExames1" autocomplete="off" checked value = "não">
                                                <label class="btn btn-outline-danger" for="gerenExames1">NÃO</label>
                                            </td>    

                                             <td>
                                                <input type="radio" class="btn-check" name="verDadosPaciente" id="verDadosPaciente" autocomplete="off"  value = "sim">
                                                <label class="btn btn-outline-success" for="verDadosPaciente">SIM</label>

                                                <input type="radio" class="btn-check" name="verDadosPaciente" id="verDadosPaciente1" autocomplete="off" checked value = "não">
                                                <label class="btn btn-outline-danger" for="verDadosPaciente1">NÃO</label>
                                            </td> 

                                             <td>
                                               <input type="radio" class="btn-check" name="editarPaciente" id="editarPaciente" autocomplete="off"  value = "sim">
                                                <label class="btn btn-outline-success" for="editarPaciente">SIM</label>

                                                <input type="radio" class="btn-check" name="editarPaciente" id="editarPaciente1" autocomplete="off" checked value = "não">
                                                <label class="btn btn-outline-danger" for="editarPaciente1">NÃO</label>
                                            </td>   

                                            <td>
                                                <input type="radio" class="btn-check" name="cadPaciente" id="cadPaciente" autocomplete="off"  value = "sim">
                                                <label class="btn btn-outline-success" for="cadPaciente">SIM</label>

                                                <input type="radio" class="btn-check" name="cadPaciente" id="cadPaciente1" autocomplete="off" checked value = "não">
                                                <label class="btn btn-outline-danger" for="cadPaciente1">NÃO</label>
                                            </td>  

                                            <td>
                                               <input type="radio" class="btn-check" name="cadFucionario" id="cadFucionario" autocomplete="off"  value = "sim">
                                                <label class="btn btn-outline-success" for="cadFucionario">SIM</label>

                                                <input type="radio" class="btn-check" name="cadFucionario" id="cadFucionario1" autocomplete="off" checked value = "não">
                                                <label class="btn btn-outline-danger" for="cadFucionario1">NÃO</label>
                                            </td>   

                                            <td>
                                                <input type="radio" class="btn-check" name="administrador" id="administrador" autocomplete="off"  value = "sim">
                                                <label class="btn btn-outline-success" for="administrador">SIM</label>

                                                <input type="radio" class="btn-check" name="administrador" id="administrador1" autocomplete="off" checked value = "não">
                                                <label class="btn btn-outline-danger" for="administrador1">NÃO</label>
                                            </td>                                             
                                        </tr>	
                                    </tbody>
                                </table>	
                            </div>

							<hr>

                            <div id="actions" class="row">
								<div class="col-md-2">
								    <button type="submit" class="btn btn-success">Salvar</button>
								</div>
								<div class="col-md-2">								
									<a  href="../template/menuPrincipal.php"><button type="button" class="btn btn-outline-warning">Voltar</button></a>
								</div>	

                                <div class="col px-md-1 col-md-12" id="MostraPesq">	</div>
								<div class="col px-md-1 col-md-12" id="MostraPesq1"> </div>		
							</div>	
                        </form>
                    </div>	
				</div>	
            </div>	
		</div>	
    </body>
</html>