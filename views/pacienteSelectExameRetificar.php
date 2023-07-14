<?php
	include "../template/menuPrincipal.php";
    include "../funcao/funcao.php";

    if($_SESSION['visualizar']  != "sim")
        {
            echo "<script type='text/javascript'>alert('USUÁRIO NÃO AUTORIZADO');</script>";
            echo "<script>location = '../template/menuPrincipal.php';</script>";  
        }

    $idFuncionario = $_SESSION['idFuncionario'];  
    $nomeFuncionario = $_SESSION['nomeFuncionario'];  
    $valor = $_SESSION['nomePaciente']; 
    $tipoPesquisa = $_SESSION['tipoPesquisa'];
?>

        <div class="container">
            <div id="page-content-wrapper">
				<div class="panel-header">
					<i class="icon-tasks icon-blue"></i>
					<h3 class="text-success">Selecionar Pacientes Para Retificar Exames</h3>
				</div>
				<hr>		
				<div class="panel-content">
					<div class="col-md-12">																																
						<table class="table table-striped table-bordered table-condensed">
                            <thead>
                                <tr>
                                    <th>Id</th>                                    
                                    <th>Nome</th>                                     
                                    <th>Data da Amostra</th>                                   
                                    <th>CPF</th>
                                    <th>Opção</th>
                                </tr>
                            </thead>
                            <tbody> 
                                <?php
                                require_once '../dao/DAO-sistemaCihiv.php';
                                $pacienteDAO = new SistemaDAO();
                                $nomeTabela = "paciente";
                                foreach($pacienteDAO->PesquisaExameRetificar($tipoPesquisa,$valor,$_SESSION['dataInicio'],$_SESSION['dataFinal']) as $paciente)
                                    { 
                                        ?>													
                                            <tr>
                                                <td><?php echo $paciente->idPaciente ?></td>
                                                <td><?php echo $paciente->nomePaciente ?></td>  
                                                <td><?php echo formatarData2($paciente->dataAmostra) ?></td> 
                                                <td><?php $paciente->idExamesSolicitados ?></td>
                                                <td><?php echo $paciente->cpf ?></td>

                                                <td class='operations'>
                                                    <div class="btn-group pull-right">
                                                        <a href="./retificarSelectPaciente.php?id=<?php echo $paciente->idPaciente; ?>&idE=<?php echo $paciente->idExamesSolicitados;?>" class="btn btn-small btn-outline-success">Confirmar<i class="icon-remove"></i></a>
                                                    </div>                                                    
                                                </td>                                                                                           
                                            <tr>									
                                        <?php 
                                    } 
                                ?>   
                            </tbody>
                        </table>
                        <div class="btn-group pull-right">
                            <a href="./retificarExamesPacientes.php" class="btn btn-small btn-outline-warning">Voltar<i class="icon-remove"></i></a>
                        </div>  
                    </div>	
				</div>	
            </div>	
		</div>	
    </body>
</html>