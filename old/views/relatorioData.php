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
					<h3 class="text-success">Relatório Por Data</h3>
				</div>
				<hr>		
                <form class="form-horizontal" action="../controllers/relatorioData.php" method="POST">	
                    <div class='row'>										
						<label><a> Informe o Período Desejado</a></label>
					</div>	
                    <hr>															
					<div class='row'>
						<div class="col px-md-1 col-md-3">
                            <input class="form-check-input" type="radio" name="pesquisa" value="dataCadastroE" id="pesquisa1" checked>
                            <label class="form-check-label" for="pesquisa1">Data de Cadastro</label>  
                        </div>	

                        <div class="col px-md-1 col-md-3">
                            <input class="form-check-input" type="radio" name="pesquisa" value="dataAmostra" id="pesquisa2">
                            <label class="form-check-label" for="pesquisa2">Data da Amostra</label>
                        </div>	
					
                        <div class="col px-md-5 col-md-3">
							<label for="inputSuccess" class="control-label">Data Inicial:</label>
							<input type="date"  class="form-control"   name="dataInicio" required>    
						</div>

                        <div class="col px-md-5 col-md-3">
							<label for="inputSuccess" class="control-label">Data Final:</label>
							<input type="date"  class="form-control"   name="dataFinal" required>    
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