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
					<h3 class="text-success">Editar Origens dos Exames</h3>
				</div>
				<hr>		
                <form class="form-horizontal" action="../controllers/origemBuscar.php?action=4&id=<?php echo $_SESSION['idOrigem'];?>" method="POST">	
                    <div class="row">
						<div class="col px-md-1 col-md-2">
							<label for="inputSuccess" class="control-label">Id da Origem:</label>
							<input type="text" class="form-control" name="origem[]" id="origem" value = "<?=$_SESSION['idOrigem'];?>" readonly>
						</div>

                        <div class="col px-md-1 col-md-10">
							<label for="inputSuccess" class="control-label">Descrição da Origem do Exame:</label>
							<input type="text" class="form-control" name="origem[]" id="origem" value = "<?=$_SESSION['descricaoBd'];?>" >
						</div>
					</div>	

					<p></p><p></p>

                    <div class="row">
						<div class="col px-md-1 col-md-2">
							<label for="inputSuccess" class="control-label">Nº Cap da Origem:</label>
							<input type="text" class="form-control" name="origem[]" id="origem" value = "<?=$_SESSION['capBd'];?>" >
						</div>

                        <div class="col px-md-1 col-md-2">
							<label for="inputSuccess" class="control-label">Nº da Origem:</label>
							<input type="text" class="form-control" name="origem[]" id="origem" value = "<?=$_SESSION['numOrigemBd'];?>" >
						</div>

                        <div class="col px-md-1 col-md-2">
							<label for="inputSuccess" class="control-label">Status da Origem:</label>
							<input type="text" class="form-control" name="origem[]" id="origem" value = "<?=$_SESSION['statusOrigemBd'];?>" >
						</div>
					</div>			

					<hr>	
																
					<div id="actions" class="row">
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary">Alterar</button>
                            <a href="../template/menuPrincipal.php" type="reset" class="btn btn-small btn-outline-warning">Cancelar<i class="icon-remove"></i></a>
                        </div>     
                    </div>
				</form>	
            </div>	
		</div>	
    </body>
</html>