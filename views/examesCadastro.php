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
					<h3 class="text-success">Cadastro de Tipos de Exames</h3>
				</div>
				<hr>		
                <form class="form-horizontal" action="../controllers/exameCadastro.php" method="POST">	
                    <div class="row">
                        <div class="col px-md-1 col-md-9">
							<label for="inputSuccess" class="control-label">Descrição do Exame:</label>
							<input type="text" class="form-control" name="descExame" >
						</div>

                        <div class="col px-md-1 col-md-2">
							<label for="inputSuccess" class="control-label">Status do Exame:</label>
							<input type="text" class="form-control" name="statExame"  value = "ativo" readonly>
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