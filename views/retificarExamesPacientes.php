<?php
	include "../template/menuPrincipal.php";
    include "../scripts/select.php";
    include "../scripts/mascara.php"; 
    include "../scripts/validarCpf.php";

    if($_SESSION['cadPaciente']  != "sim")
		{
			echo "<script type='text/javascript'>alert('USUÁRIO NÃO AUTORIZADO');</script>";
			echo "<script>location = '../template/menuPrincipal.php';</script>";  
		}

    $idFuncionario = $_SESSION['idFuncionario'];  
    $nomeFuncionario = $_SESSION['nomeFuncionario']; 
?>
<style>
    input.form-control {
        display: none;
    }
</style>

        <hr>
        <script src="../js/jquery-2.2.4.js"></script>
        <div class="container">
            <div class="panel-header">
				<i class="icon-tasks icon-blue"></i>
				<h3 class="text-success">Retificar Exames de Pacientes</h3>
			</div>
            <hr>
            <form name="cadastro" id="cadastro" method="post" action="../controllers/retificarExamesPesquisa.php" onsubmit="ValidarCPF(cadastro.dadosCpf);">					
                <div class="row">                
                    <div  class="col-md-6">														
                        <label for="inputSuccess" class="text-success">Nome do Paciente ou CPF:</label> <br>                        
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pesquisa" value="paciente" id="pesquisa1">
                            <label class="form-check-label" for="pesquisa1">Nome Paciente</label>  
                        </div>	

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pesquisa" value="cpf" id="pesquisa2">
                            <label class="form-check-label" for="pesquisa2">CPF</label>
                        </div>	
                    </div>	 
                    
                    <div  class="col-md-6">
                        <label for="inputSuccess" class="text-success">Data de Cadastro:</label> <br> 
                        <div class="form-check form-check-inline">
                            <label for="inputSuccess" class="control-label">Data Inicial:</label>
                            <input type="date"  class="form-check"   name="dataInicio" required>    
                        </div>

                        <div class="form-check form-check-inline">
                            <label for="inputSuccess" class="control-label">Data Final:</label>
                            <input type="date"  class="form-check"   name="dataFinal" required>    
                        </div>	
                    </div>	 
                </div>	
                <hr>
                &emsp;
                <div class="row">	  
                    <input type="text" class="form-control" value="" name="nomePaciente" id="nomePaciente" placeholder="Nome Paciente">      
                    <input type="text" class="form-control" value="" name="dadosCpf" id="dadosCpf" onblur = "ValidarCPF(cadastro.dadosCpf)" >
                    <hr>        
                    <div class="form-check form-check-inline">
                        <div id="actions" class="row">
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">OK</button>
                            </div>
                            <div class="col-md-2">
                                <a href="../template/menuPrincipal.php" type="reset" class="btn btn-small btn-outline-warning">Cancelar<i class="icon-remove"></i></a>
                            </div>
                        </div> 
                    </div>                   
                </div>		
            </form>	
        </div>		
    </body>
</html>				