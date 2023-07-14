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
    
    $idE = $_GET['idE'];
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
        
    include_once("../dao/conecta.php");   
?>
        <script src="../js/descricao.js"></script>
		<script src="../js/codigoCap.js"></script>
        <div class="container">
            <div id="page-content-wrapper">
				<div class="panel-header">
					<i class="icon-tasks icon-blue"></i>
					<h3 class="text-success">Retificar Exames do Paciente: <?php echo $nome;?></h3>
                    <h5 class="text-success">Periodo: <?php echo formatarData2($_SESSION['dataInicio']);?> - <?php echo formatarData2($_SESSION['dataFinal']);?></h5>
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
                                    $exameDAO = new SistemaDAO();
                                    require_once '../dao/DAO-sistemaCihiv.php';
                                    $exameDAO = new SistemaDAO();
                                    foreach($exameDAO->ListarExameRetificar($idPaciente,$idE) as $resp)
                                        { 
                                            ?>													
                                                <tr>
                                                    <td><?php echo $resp->numAmostra; ?></td>
                                                    <td><?php echo $resp->numAmostraCega; ?></td>
                                                    <td><?php echo formatarData2($resp->dataAmostra); ?></td>                                               
                                                    <td><?php echo formatarData2($resp->dataCadastroE); ?></td>  
                                                    <td>
                                                        <?php 
                                                            echo $resp->numOrigem;
                                                            $_SESSION['numOrigemAnt'] = $numOrigemAnt = $resp->idOrigem;
                                                        ?>
                                                    </td>    
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
                                ?>   
                            </tbody>
                        </table>
                    </div>	

                    <hr>
                    <form name="cadastro" id="cadastro" method="post" action="../controllers/pacienteSelectExameRetificar.php?id=<?php echo $idPaciente; ?>&idE=<?php echo $idE;?>">
                        <h5 class="text-success">Selecione os Exames</h5>
                        <div class="row">
                            <div class="col px-md-1 col-md-12">
                                <?php
                                    include_once "../dao/DAO-sistemaCihiv.php";                                    
                                    $examesDAO = new SistemaDAO();   
                                    $nomeTabela = "tipoExames";
                                                                        
                                    foreach ($examesDAO->PesquisaTodosDados($nomeTabela) as $res)                                                                        
                                        {
                                            ?>   
                                                <div class="form-check form-check-inline">   
                                                    <input type="checkbox" class="form-check-input" name="tipoExames[]" value="<?php echo $res->idTipoExames;?>"><label><?php echo $res->tipoExame;?></label><br/>
                                                </div>       
                                            <?php      
                                        }                                                                    
                                ?>    
                            </div>
                        <div> 

                        <hr>
                        <div class="row">
                            <h5 class="text-success">Selecione a Origem</h5>
                            <div class="col px-md-1  col-md-2">					
                                <label class="control-label">Nº Origem:</label>					
                                <select class="form-control" name="numOrigem" id="numOrigem" >
                                    <option value="">Escolha a Origem</option>
                                    <?php
                                        $result_cat_post = "SELECT * FROM origem ORDER BY numOrigem";
                                        $resultado_cat_post = mysqli_query($conn, $result_cat_post);
                                        while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) 
                                            {
                                                echo '<option value="'.$row_cat_post['idOrigem'].'">'.$row_cat_post['numOrigem'].'</option>';
                                            }
                                    ?>
                                </select>
                            </div>

                            <div class="col px-md-1  col-md-5">					
                                <label class="control-label">Descricao:</label>
                                 <select class="form-control" name="descricao" id="descricao" readonly tabindex="-1">
                                    <option value="">descricao</option>
                                </select>
                            </div>

                            <div class="col px-md-1  col-md-2">
                                <label for="inputSuccess" class="control-label">Nº Cap:</label>
                                <input type="text" class="form-control"  name="codigo" id="codigo" value =" " readonly tabindex="-1">
                            </div>
                        </div>

                        <hr>

                        <div id="actions" class="row">
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">OK</button>
                            </div>
                            <div class="col-md-2">
                                <a href="../tmplate/.php" type="reset" class="btn btn-small btn-outline-warning">Cancelar<i class="icon-remove"></i></a>
                            </div>
                        </div>	
                    </form>
				</div>	
            </div>	
		</div>	
    </body>
</html>