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
    $administrador = $_SESSION['administrador'];
    
    $op = $_GET['op'];
    $id = $_GET['id'];
    $_SESSION['opcao'] = $op;
    
    if($id != "")
        {
            $idPaciente = $id;
        }
    else
        {
            $idPaciente = $_SESSION['idPaciente'];
        }    
    $_SESSION['idP'] = $idPaciente;     
?>
 
        <div class="container">
            <div id="page-content-wrapper">
				<div class="panel-header">
					<i class="icon-tasks icon-blue"></i>
					<h3 class="text-success">Relatório do Dia: <?php echo  formatarData2($_SESSION['dataInicio']) . " ao Dia " . formatarData2($_SESSION['dataFinal']); ?></h3>
				</div>
				<hr>		
				<div class="panel-content">
					<div class="col-md-12">																																
						<table class="table table-striped table-bordered table-condensed border border-primary">
                            <thead>
                                <tr>
                                    <th>FUNCIONÁRIO</th> 
                                    <th>PACIENTE</th> 
                                    <th>Nº AMOSTRA</th> 
                                    <th>Nº AMOSTRA CEGA</th> 
                                    <th>DATA AMOSTRA</th>                                             
                                    <th>DATA CADASTRO</th>
                                    <th>ORIGEM</th>   
                                    <th>EXAMES</th>                                          
                                </tr>
                            </thead>
                            <tbody> 
                                <?php
                                    require_once '../dao/DAO-sistemaCihiv.php';
                                    $exameDAO = new SistemaDAO();
                                    if($op == 1)                                       
                                        {
                                            require_once '../dao/DAO-sistemaCihiv.php';
                                            $exameDAO = new SistemaDAO();
                                            foreach($exameDAO->RelatorioPacientePeriodo($idPaciente, $_SESSION['dataInicio'], $_SESSION['dataFinal']) as $resp)
                                                { 
                                                    ?>													
                                                        <tr>
                                                            <td>
                                                                <?php 
                                                                    if($administrador == "sim")
                                                                        {
                                                                            echo $resp->nomeFuncionario;
                                                                        }
                                                                    else
                                                                        {
                                                                            echo "";
                                                                        }
                                                                ?>
                                                            </td> 
                                                            <td><?php echo $resp->nomePaciente; ?></td>
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
                                            require_once '../dao/DAO-sistemaCihiv.php';
                                            $exameDAO = new SistemaDAO();
                                            foreach($exameDAO-> RelatorioPacienteTodos($idPaciente) as $resp)
                                                { 
                                                    ?>													
                                                        <tr>
                                                            <td>
                                                            <?php 
                                                                    if($administrador == "sim")
                                                                        {
                                                                            echo $resp->nomeFuncionario;
                                                                        }
                                                                    else
                                                                        {
                                                                            echo "";
                                                                        }
                                                                ?>
                                                            </td> 
                                                            <td><?php echo $resp->nomePaciente; ?></td>
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
                            <a href="./relatorioPacienteExel.php"><button type="button" class="btn btn-sm btn-success">Gerar Excel</button></a>					
						    <a href="../template/menuPrincipal.php"><button type="button" class="btn btn-outline-warning">Voltar</button></a>
						</div>	
					</div>	
				</div>	
            </div>	
		</div>	
    </body>
</html>