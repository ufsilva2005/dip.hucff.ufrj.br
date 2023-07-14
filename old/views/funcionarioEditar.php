<?php
	include "../template/menuPrincipal.php";
	include "../scripts/mascara.php"; 
    include "../scripts/validarCpf.php";

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
					<h3 class="text-success">Editar Origens Funcionários</h3>
				</div>
				<hr>		
                <form class="form-horizontal" action="../controllers/funcionarioBuscar.php?action=4&id=<?php echo $_SESSION['idFuncionario'];?>" method="POST">	
                    <div class="row">
						<div class="col px-md-1 col-md-1">
							<label for="inputSuccess" class="control-label">Id:</label>
							<input type="text" class="form-control" name="id" id="id" value = "<?=$_SESSION['idFuncionario'];?>" readonly>
						</div>

                        <div class="col px-md-1 col-md-6">
							<label for="inputSuccess" class="control-label">Nome:</label>
							<input type="text" class="form-control" name="nomeAlt" id="nomeAlt" value = "<?=$_SESSION['nomeFuncionarioBd'];?>" >
						</div>
				
						<div class="col px-md-1 col-md-2">
							<label for="inputSuccess" class="control-label">Login:</label>
							<input type="text" class="form-control" name="loginAlt" id="loginAlt" value = "<?=$_SESSION['login'];?>" >
						</div>

                        <div class="col px-md-1 col-md-2">
							<label for="inputSuccess" class="control-label">Nº do CPF:</label>
							<input type="text" class="form-control" name="dadosCpf" id="dadosCpf" onblur = "ValidarCPF(cadastro.dadosCpf)" value = "<?=$_SESSION['cpf'];?>" >
						</div>

                        <div class="col px-md-1 col-md-1">
							<label for="inputSuccess" class="control-label">Status:</label>
							<input type="text" class="form-control" name="statusAlt" id="statusAlt" value = "<?=$_SESSION['statusBd'];?>" >
						</div>
					</div>	
					<hr>
					<h6 class="text-success">Permissões de Gerenciamento </h6>
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
                                        <?php
                                            if( $_SESSION['gerenExamesF'] == "sim")
                                                {
                                                    $html = "<input type='radio' class='btn-check' name='gerenExames' id='gerenExames' autocomplete='off' checked value = 'sim'>
                                                        <label class='btn btn-outline-success' for='gerenExames'>SIM</label>

                                                        <input type='radio' class='btn-check' name='gerenExames' id='gerenExames1' autocomplete='off'  value = 'não'>
                                                        <label class='btn btn-outline-danger' for='gerenExames1'>NÃO</label>";
                                                }

                                            else
                                                {
                                                    $html = "<input type='radio' class='btn-check' name='gerenExames' id='gerenExames' autocomplete='off' value = 'sim'>
                                                        <label class='btn btn-outline-success' for='gerenExames'>SIM</label>

                                                        <input type='radio' class='btn-check' name='gerenExames' id='gerenExames1' autocomplete='off' checked value = 'não'>
                                                        <label class='btn btn-outline-danger' for='gerenExames1'>NÃO</label>";
                                                }
                                            echo $html;
                                        ?>   
                                    </td>    

                                    <td>
                                        <?php
                                            if( $_SESSION['verDadosPacienteF'] == "sim")
                                                {
                                                    $html = "<input type='radio' class='btn-check' name='verDadosPaciente' id='verDadosPaciente' autocomplete='off' checked value = 'sim'>
                                                            <label class='btn btn-outline-success' for='verDadosPaciente'>SIM</label>

                                                            <input type='radio' class='btn-check' name='verDadosPaciente' id='verDadosPaciente1' autocomplete='off'  value = 'não'>
                                                            <label class='btn btn-outline-danger' for='verDadosPaciente1'>NÃO</label>";
                                                }

                                            else
                                                {
                                                    $html = "<input type='radio' class='btn-check' name='verDadosPaciente' id='verDadosPaciente' autocomplete='off'  value = 'sim'>
                                                            <label class='btn btn-outline-success' for='verDadosPaciente'>SIM</label>

                                                            <input type='radio' class='btn-check' name='verDadosPaciente' id='verDadosPaciente1' autocomplete='off' checked value = 'não'>
                                                            <label class='btn btn-outline-danger' for='verDadosPaciente1'>NÃO</label>";
                                                }
                                            echo $html;
                                        ?>   
                                    </td> 

                                     <td>
                                       <?php
                                            if( $_SESSION['editarPacienteF'] == "sim")
                                                {
                                                    $html = "<input type='radio' class='btn-check' name='editarPaciente' id='editarPaciente' autocomplete='off' checked value = 'sim'>
                                                            <label class='btn btn-outline-success' for='editarPaciente'>SIM</label>

                                                            <input type='radio' class='btn-check' name='editarPaciente' id='editarPaciente1' autocomplete='off'  value = 'não'>
                                                            <label class='btn btn-outline-danger' for='editarPaciente1'>NÃO</label>";
                                                }

                                            else
                                                {
                                                    $html = "<input type='radio' class='btn-check' name='editarPaciente' id='editarPaciente' autocomplete='off'  value = 'sim'>
                                                            <label class='btn btn-outline-success' for='editarPaciente'>SIM</label>

                                                            <input type='radio' class='btn-check' name='editarPaciente' id='editarPaciente1' autocomplete='off' checked value = 'não'>
                                                            <label class='btn btn-outline-danger' for='editarPaciente1'>NÃO</label>";
                                                }
                                            echo $html;
                                        ?>   
                                    </td>   

                                    <td>
                                      <?php
                                            if( $_SESSION['cadPacienteF'] == "sim")
                                                {
                                                    $html = "<input type='radio' class='btn-check' name='cadPaciente' id='cadPaciente' autocomplete='off' checked value = 'sim'>
                                                            <label class='btn btn-outline-success' for='cadPaciente'>SIM</label>

                                                            <input type='radio' class='btn-check' name='cadPaciente' id='cadPaciente1' autocomplete='off'  value = 'não'>
                                                            <label class='btn btn-outline-danger' for='cadPaciente1'>NÃO</label>";
                                                }

                                            else
                                                {
                                                    $html = "<input type='radio' class='btn-check' name='cadPaciente' id='cadPaciente' autocomplete='off'  value = 'sim'>
                                                            <label class='btn btn-outline-success' for='cadPaciente'>SIM</label>

                                                            <input type='radio' class='btn-check' name='cadPaciente' id='cadPaciente1' autocomplete='off' checked value = 'não'>
                                                            <label class='btn btn-outline-danger' for='cadPaciente1'>NÃO</label>";
                                                }
                                            echo $html;
                                        ?>   
                                    </td>  

                                    <td>
                                        <?php
                                            if( $_SESSION['cadFucionarioF'] == "sim")
                                                {
                                                    $html = "<input type='radio' class='btn-check' name='cadFucionario' id='cadFucionario' autocomplete='off' checked value = 'sim'>
                                                            <label class='btn btn-outline-success' for='cadFucionario'>SIM</label>

                                                            <input type='radio' class='btn-check' name='cadFucionario' id='cadFucionario1' autocomplete='off'  value = 'não'>
                                                            <label class='btn btn-outline-danger' for='cadFucionario1'>NÃO</label>";
                                                }

                                            else
                                                {
                                                    $html = "<input type='radio' class='btn-check' name='cadFucionario' id='cadFucionario' autocomplete='off'  value = 'sim'>
                                                            <label class='btn btn-outline-success' for='cadFucionario'>SIM</label>

                                                            <input type='radio' class='btn-check' name='cadFucionario' id='cadFucionario1' autocomplete='off' checked value = 'não'>
                                                            <label class='btn btn-outline-danger' for='cadFucionario1'>NÃO</label>";
                                                }
                                            echo $html;
                                        ?>   
                                    </td>   

                                    <td>
                                        <?php
                                            if( $_SESSION['administradorF'] == "sim")
                                                {
                                                    $html = "<input type='radio' class='btn-check' name='administrador' id='administrador' autocomplete='off' checked value = 'sim'>
                                                            <label class='btn btn-outline-success' for='administrador'>SIM</label>

                                                            <input type='radio' class='btn-check' name='administrador' id='administrador1' autocomplete='off'  value = 'não'>
                                                            <label class='btn btn-outline-danger' for='administrador1'>NÃO</label>";
                                                }

                                            else
                                                {
                                                    $html = "<input type='radio' class='btn-check' name='administrador' id='administrador' autocomplete='off'  value = 'sim'>
                                                            <label class='btn btn-outline-success' for='administrador'>SIM</label>

                                                            <input type='radio' class='btn-check' name='administrador' id='administrador1' autocomplete='off' checked value = 'não'>
                                                            <label class='btn btn-outline-danger' for='administrador1'>NÃO</label>";
                                                }
                                            echo $html;
                                        ?>   
                                    </td>   
                                </tr>	
                            </tbody>
                        </table>	
                    </div>

					<hr>	
																
					<div id="actions" class="row">
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary">Alterar</button>
                            <a href="../template/menuPrincipal.php" type="reset" class="btn btn-small btn-outline-warning">Cancelar<i class="icon-remove"></i></a>
                        </div>     
                    </div>
				</form>	
            </div>	
		</div>	
    </body>
</html>