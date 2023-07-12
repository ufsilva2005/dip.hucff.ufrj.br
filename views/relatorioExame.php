<?php
	include "../template/menuPrincipal.php";
    
    if($_SESSION['visualizar']  != "sim")
    {
        echo "<script type='text/javascript'>alert('USUÁRIO NÃO AUTORIZADO');</script>";
        echo "<script>location = '../template/menuPrincipal.php';</script>";  
    }

    $idFuncionario = $_SESSION['idFuncionario'];  
    $nomeFuncionario = $_SESSION['nomeFuncionario'];
?>

        <div class="container">
            <div id="page-content-wrapper">
				<div class="panel-header">
					<i class="icon-tasks icon-blue"></i>
					<h3 class="text-success">Relatório por tipo de Exames</h3>
				</div>
				<hr>		
                <form class="form-horizontal" action="../controllers/relatorioExame.php" method="post">	                    
					<div class='row'>										
						<label><a>Selecione o Tipo do Exame</a></label>
					</div>	
					<hr>
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
                                                <input type="radio" class="form-check-input" id="tipoExame" name="tipoExame" value="<?php echo $res->idTipoExames;?>"><label><?php echo $res->tipoExame;?></label><br/>
                                            </div>       
                                        <?php      
                                    }                                                                    
                            ?>
                                    
						</div>
                    <div>  

					<hr>	
                    
                    <div class='row'>										
						<label><a>Selecione o Periodo do Exame</a></label>
					</div>

                    <div class='row'>	
                        <div class="col px-md-5 col-md-3">
                            <label for="inputSuccess" class="control-label">Data Inicial:</label>
                            <input type="date"  class="form-control"   name="dataInicio" value = "" required>    
                        </div>

                        <div class="col px-md-5 col-md-3">
                            <label for="inputSuccess" class="control-label">Data Final:</label>
                            <input type="date"  class="form-control"   name="dataFinal" value = "" required>    
                        </div>
                    </div>	
                              
                    <hr>

					<div id="actions" class="row">
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary">OK</button>
                            <a href="../template/menuPrincipal.php" type="reset" class="btn btn-small btn-outline-warning">Cancelar<i class="icon-remove"></i></a>
                        </div>     
                    </div>
				</form>	
            </div>	
		</div>	
    </body>
</html>