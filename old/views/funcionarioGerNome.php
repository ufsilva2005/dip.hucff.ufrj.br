<?php
	include "../template/menuPrincipal.php";
    if($_SESSION['administrador'] != "sim" || $_SESSION['cadFucionario'] != "sim")
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
					<h3 class="text-success">Pesquisa de Funcionários</h3>
				</div>
						
				<div class="panel-content">
					<div class="col-md-12">																																
						<form  id="admin"  name="admin" class="form-horizontal" action="../views/funcionarioNomeGerenciar.php" method="POST">		
                            <div class="row">
                                <div class="col px-md-1 col-md-10">
                                    <label for="inputSuccess" class="control-label">Nome:</label>
                                    <input type="text" class="form-control" name="nome" >
                                </div>
                            </div>

                            <hr>

                            <div id="actions" class="row">
								<div class="col-md-2">
								    <button type="submit" class="btn btn-success">Pesquisar</button>
								</div>
								<div class="col-md-2">								
									<a  href="../template/menuPrincipal.php"><button type="button" class="btn btn-outline-warning">Voltar</button></a>
								</div>	
							</div>	
                        </form>
                    </div>
                </div>
            </div>
        </div>

