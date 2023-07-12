<?php
	include "../template/menuPrincipal.php";
    
	if($_SESSION['administrador'] != "sim")
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
					<h3 class="text-success">Cadastrar Origens dos Exames</h3>
				</div>
				<hr>		
                <form class="form-horizontal" action="../controllers/origemCadastrar.php" method="POST">	
                    <div class="row">
						

                        <div class="col px-md-1 col-md-6">
							<label for="inputSuccess" class="control-label">Descrição da Origem do Exame:</label>
							<input type="text" class="form-control" name="origem[]"  >
						</div>
					
						<div class="col px-md-1 col-md-2">
							<label for="inputSuccess" class="control-label">Nº Cap da Origem:</label>
							<input type="text" class="form-control" name="origem[]" >
						</div>

                        <div class="col px-md-1 col-md-2">
							<label for="inputSuccess" class="control-label">Nº da Origem:</label>
							<input type="text" class="form-control" name="origem[]" >
						</div>
					</div>			

					<hr>	
																
					<div id="actions" class="row">
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary">Salvar</button>
                            <a href="../template/menuPrincipal.php" type="reset" class="btn btn-small btn-outline-warning">Cancelar<i class="icon-remove"></i></a>
                        </div>     
                    </div>
				</form>	
            </div>	
		</div>	
    </body>
</html>