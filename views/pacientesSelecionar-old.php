<?php
	include "../template/menuPrincipal.php";
    
    if($_SESSION['visualizar']  != "sim")
        {
            echo "<script type='text/javascript'>alert('USUÁRIO NÃO AUTORIZADO');</script>";
            echo "<script>location = '../template/menuPrincipal.php';</script>";  
        }

    $idFuncionario = $_SESSION['idFuncionario'];  
    $nomeFuncionario = $_SESSION['nomeFuncionario'];  
    $nomePaciente = $_SESSION['nomePaciente']; 
?>

        <div class="container">
            <div id="page-content-wrapper">
				<div class="panel-header">
					<i class="icon-tasks icon-blue"></i>
					<h3 class="text-success">Selecionar Pacientes</h3>
				</div>
				<hr>
                <div class="btn-group pull-right">
                    <a href="pacientesCadastroEndereco.php" class="btn btn-small btn-outline-success">cadastrar novo<i class="icon-remove"></i></a>
                </div>  
                <hr>		
				<div class="panel-content">
					<div class="col-md-12">																																
						<table class="table table-striped table-bordered table-condensed">
                            <thead>
                                <tr>                                    
                                    <th>Nome</th>                                            
                                    <th>CPF</th>
                                    <th>Nº SUS</th>
                                    <th>Nº Prontuário</th>
                                    <th>Opção</th>
                                </tr>
                            </thead>
                            <tbody> 
                                <?php
                                require_once '../dao/DAO-sistemaCihiv.php';
                                $pacienteDAO = new SistemaDAO();
                                $nomeTabela = "paciente";
                                $dado = "nomePaciente";
                                foreach($pacienteDAO->PesquisaNomes($nomeTabela,$dado,$nomePaciente) as $paciente)
                                    { 
                                        ?>													
                                            <tr>
                                                <?php $paciente->idPaciente ?>
                                                <td><?php echo $paciente->nomePaciente ?></td>  
                                                <td><?php echo $paciente->cpf ?></td>
                                                <td><?php echo $paciente->numSus ?></td>                                                
                                                <td><?php echo $paciente->prontuario ?></td>  

                                                <td class='operations'>
                                                    <div class="btn-group pull-right">
                                                        <a href="../controllers/pacientesCadastroEndereco.php?action=2&id=<?php echo $paciente->idPaciente;?>" class="btn btn-small btn-outline-warning">OK<i class="icon-remove"></i></a>
                                                    </div>                                                    
                                                </td>                                                                                           
                                            <tr>									
                                        <?php 
                                    } 
                                ?>   
                            </tbody>
                        </table>
                        <div class="btn-group pull-right">
                            <a href="pacientesCadastroEndereco.php" class="btn btn-small btn-outline-success">cadastrar novo<i class="icon-remove"></i></a>
                        </div>  
                    </div>	
				</div>	
            </div>	
		</div>	
    </body>
</html>