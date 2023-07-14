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
    $auxIdSolicitados = $_SESSION['auxIdSolicitados'];
    $tipoExame = $_SESSION[' $tipoExame'];
    $dataInicio = $_SESSION['dataInicio'];
    $dataFinal = $_SESSION['$dataFinal'];
    if($dataInicio == "" && $dataFinal == "")
        {
            $texto = "Todos os exames Cadastrados";
        }
    else
        {
            $texto = "Do dia: " .  formatardata2($dataInicio) . " ao dia: " . formatardata2($dataFinal);
        }

?>
        <div class="container">
            <div id="page-content-wrapper">
				<div class="panel-header">
					<i class="icon-tasks icon-blue"></i>
					<h3 class="text-success">Pesquisa de: <?php echo $tipoExame . " <=> " . $texto;?> </h3>
				</div>
				<hr>		
				<div class="panel-content">
					<div class="col-md-12">																																
						<table class="table table-striped table-bordered table-condensed">
                            <thead>
                                <tr>
                                    <th>Nome Paciente</th>                                            
                                    <th>Nº Amostra</th>
                                    <th>Nº Amostra Cega</th>
                                    <th>Origem</th>                                    
                                </tr>
                            </thead>
                            <tbody> 
                                <?php
                                    require_once '../dao/DAO-sistemaCihiv.php';
                                    $examesDAO = new SistemaDAO();
                                    $result = count($auxIdSolicitados);
                                    for ($i = 0; $i < $result; $i++) 
                                        {
                                            $valor = $auxIdSolicitados[$i];
                                            foreach($examesDAO->EtiqutasDados($valor) as $resp)
                                                { 
                                                    ?>													
                                                        <tr>
                                                            <td><?php echo $resp->nomePaciente ?></td>
                                                            <td><?php echo $resp->numAmostra ?></td>
                                                            <td><?php echo $resp->numAmostraCega ?></td>                                                                                                         
                                                            <td><?php echo $resp->numOrigem;?></td>  
                                                        <tr>									
                                                    <?php 
                                                }
                                        }
                                ?>   
                            </tbody>
                        </table>
                    </div>	
				</div>	
                <div id="actions" class="row">
					<div class="col-md-12">
                        <a href="../views/pacientesPesqExame.php" type="reset" class="btn btn-small btn-outline-warning">Voltar<i class="icon-remove"></i></a>
                    </div>     
                </div>
            </div>	
		</div>	
    </body>
</html>