<?php
	include "../template/menuPrincipal.php";
    include "../dao/DAO-sistemaCihiv.php";
   
    if($_SESSION['exames'] != "sim")
        {
            echo "<script type='text/javascript'>alert('USUÁRIO NÃO AUTORIZADO');</script>";
            echo "<script>location = '../template/menuPrincipal.php';</script>";  
        }
    
    $dataCadastro = filter_input(INPUT_POST, 'dataCadastro');
?>
        <div cIlass="container">
            <div id="page-content-wrapper">
				<div class="panel-header">
					<i class="icon-tasks icon-blue"></i>
					<h3 class="text-success">Reimprimir Etiquetas</h3>
				</div>

                <div class="panel-header">
                    <form action="./etiquetasReImprimir.php" method="POST"> 
                        <div class='row'> 
                            <div class="col px-md-5 col-md-2">
                                <label class="text-success">Data de Cadastro:</label>
                                <input type="date"  class="form-control"   name="dataCadastro" required>    
                            </div>
                            <div class="col py-md-4 col-md-2"> 
                                <button type="submit" class="btn btn-success">OK</button>
                            </div>  
                        </div> 
                    </form>
                </div>

				<hr>	

				<div class="panel-content">
					<div class="col-md-12">	
                        <table class="table table-striped table-bordered table-condensed">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th>Nº Amostra</th>  
                                    <th>Nº Amostra Cega</th>  
                                    <th>Origem</th>
                                    <th>Exames</th> 
                                    <th>Quantidade</th>                                                
                                </tr>
                            </thead>
                            <tbody> 
                                <?php
                                    if($dataCadastro != "")
                                        {
                                            require_once '../dao/DAO-sistemaCihiv.php';
                                            $origemDAO = new SistemaDAO();
                                            foreach($origemDAO->ReimprimirEtiquetas($dataCadastro) as $resp)
                                                {   
                                                    ?>													
                                                        <tr> 
                                                            <td><?php echo $idExamesSolicitados = $resp->idExamesSolicitados;?></td> 
                                                            <td><?php echo $nomePaciente = $resp->nomePaciente;?></td> 
                                                            <td><?php echo $numAmostra = $resp->numAmostra;?></td> 
                                                            <td><?php echo $numAmostraCega = $resp->numAmostraCega;?></td> 
                                                            <td><?php echo $numOrigem = $resp->numOrigem;?></td> 
                                                            <td>
                                                                <?php
                                                                    $tiposExames = $resp->tiposExames;
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
                                                            <td>       
                                                                <form action="../controllers/etiquetasImprimir.php?action=2&id=<?php echo $idExamesSolicitados; ?>" method="POST">     
                                                                    <div class="row">                                                          
                                                                        <div class="col px-md-1 col-md-2">                                                               
                                                                            <input type="text"  class="form-control" name="quantidade" >    
                                                                        </div>
                                                                        <div class="col px-md-1 col-md-2"> 
                                                                            <button type="submit" class="btn btn-success">Imprimir</button>
                                                                            <!--a href='../controllers/etiquetasImprimir.php?id=<?php echo $idExamesSolicitados; ?>' class="btn btn-success">Imprimir<i class='icon-remove'></i></!--a-->
                                                                        </div>                                                           
                                                                    </div>
                                                                </form>
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
						    <a  href="../template/menuPrincipal.php"><button type="button" class="btn btn-outline-warning">Voltar</button></a>
						</div>	
					</div>	
                </div>
            </div>	
		</div>	
    </body>
</html>