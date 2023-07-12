<?php
	include "../template/menuPrincipal.php";
    include "../scripts/escodeInput.php";
    include "../scripts/mascara.php"; 
    include "../scripts/validarCpf.php";
    
    if($_SESSION['editar'] != "sim")
        {
            echo "<script type='text/javascript'>alert('USUÁRIO NÃO AUTORIZADO');</script>";
            echo "<script>location = '../template/menuPrincipal.php';</script>";  
        }

    $idFuncionario = $_SESSION['idFuncionario'];  
    $nomeFuncionario = $_SESSION['nomeFuncionario'];
?>

        <div class="container">
			<div class="panel-header">
				<i class="icon-tasks icon-blue"></i>
				<h4 class="text-success">Pacientes</h4>
			</div>
			<hr>		
            <form name="cadastro" id="cadastro" class="form-horizontal" action="../controllers/pacienteEditarPesquisa.php?op=1" onsubmit="ValidarCPF(cadastro.dadosCpf);" method="POST">	
                <div class="row">
                    <div class="col px-md-1 col-md-6">															
                        <label for="inputSuccess" class="control-label">Selecione o Tipo de Pesquisa</label> <br><br>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pesquisa" value="nomePaciente" id="pesquisa1">
                            <label class="form-check-label" for="pesquisa1">Nome Paciente</label>  
                        </div>	

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pesquisa" value="cpf" id="pesquisa2">
                            <label class="form-check-label" for="pesquisa2">CPF</label>
                        </div>	

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pesquisa" value="numSus" id="pesquisa3">
                            <label class="form-check-label" for="pesquisa3">SUS</label>
                        </div>		
                        
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pesquisa" value="prontuario" id="pesquisa4">
                            <label class="form-check-label" for="pesquisa4">Nº Prontuário</label>
                        </div>
                    </div>	
                </div>	

                <div id="palco" class="row">									
                    <div id="nomePaciente" >
                        <a>Nome do Paciente:</a>
                        <input type="text" class="form-control" name="nomePaciente" >
                        <hr>
                        <button type="submit" class="btn btn-primary">OK</button>
                        <a href="../template/menuPrincipal.php" type="reset" class="btn btn-small btn-outline-warning">Cancelar<i class="icon-remove"></i></a>
                    </div>

                    <div id="cpf" >
                        <a>Nº do CPF:</a>
                        <input type="text" class="form-control" name="dadosCpf" id="dadosCpf" onblur = "ValidarCPF(cadastro.dadosCpf)">
                        <hr>
                        <button type="submit" class="btn btn-primary">OK</button>
                        <a href="../template/menuPrincipal.php" type="reset" class="btn btn-small btn-outline-warning">Cancelar<i class="icon-remove"></i></a>
                    </div>

                    <div id="numSus" >
                        <a>Nº Cartão SUS:</a>
                        <input type="text" class="form-control" name="numSus" >
                        <hr>
                        <button type="submit" class="btn btn-primary">OK</button>
                        <a href="../template/menuPrincipal.php" type="reset" class="btn btn-small btn-outline-warning">Cancelar<i class="icon-remove"></i></a>
                    </div>

                    <div id="prontuario" >
                        <a>Nº Prontuário:</a>
                        <input type="text" class="form-control" name="numProtuario" >
                        <hr>
                        <button type="submit" class="btn btn-primary">OK</button>
                        <a href="../template/menuPrincipal.php" type="reset" class="btn btn-small btn-outline-warning">Cancelar<i class="icon-remove"></i></a>
                    </div>
                </div>		
			</form>	
		</div>	
    </body>
</html>