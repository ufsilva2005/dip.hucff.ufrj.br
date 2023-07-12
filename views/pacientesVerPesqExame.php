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
    
    $op = $_GET['op'];
    $id = $_GET['id'];
    if($id != 0)
        {
            $idPaciente = $id;
            require_once '../dao/DAO-sistemaCihiv.php';
            $nomeDAO = new SistemaDAO();
            $nomeTabela = "paciente";
            $dado = "idPaciente";
            foreach($nomeDAO->PesquisaDados($nomeTabela,$dado,$id) as $resp)
                {
                    $nome = $resp->nomePaciente;
                }
        }
    else
        {
            $idPaciente = $_SESSION['valorPesquisa'];
            $nome = $_SESSION['nomePaciente'];
        }
?>
        <div class="container">
            <div id="page-content-wrapper">
				<div class="panel-header">
					<i class="icon-tasks icon-blue"></i>
					<h3 class="text-success">Pesquisa de Exames do Paciente: <?php echo $nome;?></h3>
                    <h3 class="text-success">Periodo: <?php echo formatarData2($_SESSION['dataInicio']);?> - <?php echo formatarData2($_SESSION['dataFinal']);?></h3>
				</div>
				<hr>		
				<div class="panel-content">
					<div class="col-md-12">																																
						<table class="table table-striped table-bordered table-condensed">
                            <thead>
                                <tr>
                                    <th>Nº amostra</th> 
                                    <th>Nº Amostra Cega</th> 
                                    <th>data amostra</th>                                             
                                    <th>data cadastro</th>
                                    <th>Origem</th>   
                                    <th>tipo exame</th>                                                                    
                                </tr>
                            </thead>
                            <tbody> 
                                <?php
                                    $dataInicio = $_SESSION['dataInicio'];
                                    $dataFinal = $_SESSION['dataFinal'];
                                    require_once '../dao/DAO-sistemaCihiv.php';
                                    $exameDAO = new SistemaDAO();
                                    if($op == 1 || $op == 2)                                       
                                        {
                                            require_once '../dao/DAO-sistemaCihiv.php';
                                            $exameDAO = new SistemaDAO();
                                            foreach($exameDAO->RelatorioPacientePeriodo($idPaciente, $dataInicio, $dataFinal) as $resp)
                                                { 
                                                    ?>													
                                                        <tr>
                                                            <td><?php echo $resp->numAmostra; ?></td>
                                                            <td><?php echo $resp->numAmostraCega; ?></td>
                                                            <td><?php echo formatarData2($resp->dataAmostra); ?></td>                                               
                                                            <td><?php echo formatarData2($resp->dataCadastroE); ?></td>  
                                                            <td><?php echo $resp->numOrigem;?></td>    
                                                            <?php $tiposExames =$resp->tiposExames;?>   
                                                            <td>
                                                                <?php
                                                                    $tiposExames =  unserialize($tiposExames);
                                                                    $t = sizeof($tiposExames);
                                                                    $result = count($tiposExames);
                                                                    for ($i = 0; $i < $t; $i++) 
                                                                        {
                                                                            $id = $tiposExames[$i];
                                                                            $nomeTabela3 = "tipoExames";
                                                                            $dado3 = "idTipoExames";
                                                                            $exame1DAO = new SistemaDAO();
                                                                            foreach ($exame1DAO->PesquisaDados($nomeTabela3,$dado3,$id) as $resp)
                                                                                { 
                                                                                    echo $tipoExame = $resp->tipoExame . "&emsp;";  
                                                                                }
                                                                        }                                               
                                                                ?>
                                                            </td>      
                                                                                                                
                                                        <tr>									
                                                    <?php 
                                                } 
                                        }
                                    else
                                        {
                                            $nomeTabela1 = "examesSolicitados";
                                            $dado1 = "idPaciente";
                                            foreach($exameDAO-> RelatorioPacienteTodos($idPaciente) as $resp)
                                                { 
                                                    ?>													
                                                        <tr>
                                                            <td><?php echo $resp->numAmostra; ?></td>
                                                            <td><?php echo $resp->numAmostraCega; ?></td>
                                                            <td><?php echo formatarData2($resp->dataAmostra); ?></td>                                               
                                                            <td><?php echo formatarData2($resp->dataCadastroE); ?></td>  
                                                            <td><?php echo $resp->numOrigem;?></td>    
                                                            <?php $tiposExames =$resp->tiposExames;?>   
                                                            <td>
                                                                <?php
                                                                    $tiposExames =  unserialize($tiposExames);
                                                                    $t = sizeof($tiposExames);
                                                                    $result = count($tiposExames);
                                                                    for ($i = 0; $i < $t; $i++) 
                                                                        {
                                                                            $id = $tiposExames[$i];
                                                                            $nomeTabela3 = "tipoExames";
                                                                            $dado3 = "idTipoExames";
                                                                            $exame1DAO = new SistemaDAO();
                                                                            foreach ($exame1DAO->PesquisaDados($nomeTabela3,$dado3,$id) as $resp)
                                                                                { 
                                                                                    echo $tipoExame = $resp->tipoExame . "&emsp;";  
                                                                                }
                                                                        }                                               
                                                                ?>
                                                            </td>      
                                                                                                                
                                                        <tr>									
                                                    <?php 
                                                }   
                                        }
                                ?>   
                            </tbody>
                        </table>
                    </div>	
                    <hr>
                    <div id="actions" class="row">
                        <div class="col-md-2">							
						    <a  href="./pacientesPesquisa.php"><button type="button" class="btn btn-outline-warning">Voltar</button></a>
						</div>	
					</div>	
				</div>	
            </div>	
		</div>	
    </body>
</html>