<?php
	include "../template/menuPrincipal.php";  
	include "../scripts/mascara.php";
	include "../scripts/validarCpf.php";
    $aux = 0;
    $aux = $_GET['action'];

    if($aux != 1)
        {
            echo "<script type='text/javascript'>alert('USUÁRIO NÃO AUTORIZADO');</script>";
            echo "<script>location = '../index.php';</script>";  
        }        
?>
        <div class="container">
            <div id="page-content-wrapper">
				<div class="panel-header">
					<i class="icon-tasks icon-blue"></i>
					<h3 class="text-success">Recuperação Senhas</h3>
				</div>
						
				<div class="panel-content">
					<div class="col-md-12">																																
						<form  id="cadastro"  name="cadastro" class="form-horizontal" action="../controllers/esqueceSenha.php?action=1" method="POST">		
                            <div class="row">
                                <div class="col px-md-1 col-md-10">
                                    <label for="inputSuccess" class="control-label">Nome:</label>
                                    <input type="text" class="form-control" name="nomeFuncionario1" required>
                                </div>

                                <div class="col px-md-1 col-md-2">
                                    <label for="inputSuccess" class="control-label">CPF:</label>
                                    <input type="text" class="form-control" name="dadosCpf" id="dadosCpf" onblur = "ValidarCPF(cadastro.dadosCpf)" required>
                                </div>
                            </div>

							<hr>

                            <div id="actions" class="row">
								<div class="col-md-2">
								    <button type="submit" class="btn btn-success">Continuar</button>
								</div>
								<div class="col-md-2">								
									<a  href="../template/menuPrincipal.php"><button type="button" class="btn btn-outline-warning">Voltar</button></a>
								</div>	

                                <div class="col px-md-1 col-md-12" id="MostraPesq">	</div>
								<div class="col px-md-1 col-md-12" id="MostraPesq1"> </div>		
							</div>	
                        </form>
                    </div>	
				</div>	
            </div>	
		</div>	
    </body>
</html>