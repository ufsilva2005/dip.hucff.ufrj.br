<?php
	include "../template/menuPrincipal.php";
    include "../dao/DAO-sistemaCihiv.php";
    //include "../funcao/funcao.php";	
    
    if($_SESSION['administrador'] != "sim")
	{
		echo "<script type='text/javascript'>alert('USUÁRIO NÃO AUTORIZADO');</script>";
		echo "<script>location = '../template/menuPrincipal.php';</script>";  
	}

    $idPaciente =  $_GET['idP'];   
    $idexame =  $_GET['idE'];  
    $numAmostraCega = $_SESSION['numAmostraCega']; 
    $numAmostra = $_SESSION['numAmostra']; 
    $nomePaciente = $_SESSION['nomePaciente'];
    $dataCadastroE = $_SESSION['dataCadastroE']; 
    $dataAmostra = $_SESSION['dataAmostra'];
    $tiposExames = $_SESSION['tiposExames'];
    $idOrigem = $_SESSION['idOrigem'];
    $idExamesSolic = $_SESSION['idExamesSolic'];
    $_SESSION['etiquetaExames'] = $idExamesSolic;
?>

        <div class="container">
            <div id="page-content-wrapper">
				<div class="panel-header">
					<i class="icon-tasks icon-blue"></i>
					<h3 class="text-success">Cadastro de Pacientes</h3>
				</div>
						
				<div class="panel-content">
					<div class="col-md-12">																																
						<form  id="admin"  name="admin" class="form-horizontal" action="../controllers/etiquetaExame.php?idE=<?php echo $idExamesSolic;?>" method="POST">		
                            <div class="row">
                                <div class="col px-md-1 col-md-1">
                                    <label for="inputSuccess" class="control-label">ID:</label>
                                    <input type="text" class="form-control" name="idPaciente" value = "<?=$idPaciente;?>" readonly>
                                </div>

                                <div class="col px-md-1 col-md-8">
                                    <label for="inputSuccess" class="control-label">Nome:</label>
                                    <input type="text" class="form-control" name="nomePaciente" value = "<?=$nomePaciente;?>" readonly>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col px-md-1 col-md-3">
									<label for="inputSuccess" class="control-label">Nº Amostra:</label>
									<input type="text"  class="form-control" name = "numAmostra" value = "<?=$numAmostra;?>" readonly>
								</div>

                                <div class="col px-md-1 col-md-3">
									<label for="inputSuccess" class="control-label">Nº Amostra Cega:</label>
									<input type="text"  class="form-control"  name = "numAmostraCega" value = "<?=$numAmostraCega;?>" readonly>
								</div>

                                <div class="col px-md-1 col-md-3">
									<label for="inputSuccess" class="control-label">Data do Cadastro:</label>
									<input type="date"  class="form-control" value = "<?=$dataCadastroE;?>" readonly>
								</div>
                                
                                <div class="col px-md-1 col-md-2">
									<label for="inputSuccess" class="control-label">Data da Amostra:</label>
									<input type="date"  class="form-control"   value = "<?=$dataAmostra;?>" readonly>    
								</div>
                            <div>                        

                            <hr>
                            <div class="row">
                                <?php
                                    $origemDAO = new SistemaDAO();
                                    $nomeTabela = "origem";
                                    $dado = "idOrigem";
                                    foreach($origemDAO-> PesquisaDados($nomeTabela,$dado,$idOrigem) as $resp)
                                        { 
                                            $numOrigem = $resp->numOrigem; 
                                            $descricao = $resp->descricao;                                            
                                            $cap = $resp->cap;  
                                        } 
                                ?>   

                                <div class="col px-md-1 col-md-3">
									<label for="inputSuccess" class="control-label">Nº Origem::</label>
									<input type="text"  class="form-control" name = "numOrigem" value = "<?=$numOrigem;?>" readonly>
								</div>

                                <div class="col px-md-1 col-md-3">
									<label for="inputSuccess" class="control-label">Descricao:</label>
									<input type="text"  class="form-control" value = "<?=$descricao;?>" readonly>
								</div>
                                
                                <div class="col px-md-1 col-md-2">
									<label for="inputSuccess" class="control-label">Nº Cap:</label>
									<input type="text"  class="form-control"   value = "<?=$cap;?>" readonly>    
								</div>
                            </div>

                            <hr>

                            <div class="row">
                        	    <div class="col px-md-1 col-md-12">
                                    <table class="table table-striped table-bordered table-condensed">
                                        <thead>
                                            <tr>
                                                <th>Exame</th>   
                                                <th>Quantidade de Etiquetas</th>
                                            </tr>
                                        </thead>
                                        <tbody> 
                                            <tr>
                                                <td>
                                                    <?php
                                                        $tiposExames =  unserialize($tiposExames);
                                                        //echo "<br>idExamesBd1 => ";
                                                        //print_r($tiposExames);
                                                        $t = sizeof($tiposExames);
                                                        $result = count($tiposExames);
                                                        //echo "</br>t => " . $t . " <=> " . $result . "<br>";
                                                    
                                                        for ($i = 0; $i < $t; $i++) 
                                                            {
                                                                $id = $tiposExames[$i];
                                                                //ver nome de exmes no bd
                                                                $nomeTabela = "tipoExames";
                                                                $dado = "idTipoExames";
                                                                $exameDAO = new SistemaDAO();
                                                                foreach ($exameDAO->PesquisaDados($nomeTabela,$dado,$id) as $resp)
                                                                    { 
                                                                        echo $tipoExame = $resp->tipoExame . "&emsp;";
                                                                    }
                                                            }                                                 
                                                    ?>
                                                </td>
                                                <td>                                                                        
                                                    <div class="col px-md-1 col-md-2">
                                                        <input type="text"  class="form-control" name="quantidade[]" autofocus >    
                                                    </div>
                                                </td>   
                                            </tr>   	
                                        </tbody>
                                    </table>
								</div>
                            <div>   
                           
                            <hr>

                            <div id="actions" class="row">
                                <div class="col-md-2">	
                                    <button type="submit" class="btn btn-success">Imprimir</button>
                                </div>
                                                                        
                                <div class="col-md-2">							
									<a  href="./pacientesCadastro.php"><button type="button" class="btn btn-outline-warning">Voltar</button></a>
								</div>	
							</div>	
                        </form>
                    </div>	
				</div>	
            </div>	
		</div>	
    </body>
</html>