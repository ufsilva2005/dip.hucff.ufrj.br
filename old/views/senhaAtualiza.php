<?php
	include "../template/menuPrincipal.php";  
	include "../scripts/pesquisaLogin.php";

    $idFuncionario = $_SESSION['idFuncionario'];  
    $nomeFuncionario = $_SESSION['nomeFuncionario'];  
    $dadosCpf = $_SESSION['dadosCpf'];   

    if($idFuncionario == "" || $nomeFuncionario == "" || $dadosCpf == "" )
        {
            echo "<script type='text/javascript'>alert('USUÁRIO NÃO AUTORIZADO');</script>";
            echo "<script>location = '../index.php';</script>";  
        }        
?>
         <div class="container">
            <div id="page-content-wrapper">
				<div class="panel-header">
					<i class="icon-tasks icon-blue"></i>
					<h3 class="text-success">Atualizar Login ou Senha</h3>
				</div>

				<div id="order-form-container" class="container p-6 my-md-4 px-md-0">
					<div class="col-md-12">																																
						<form  name="cadastro" id="cadastro" class="form-horizontal" action="../controllers/esqueceSenha.php?action=2&id=<?=$idFuncionario;?>" method="POST">		
                            <div class="row mb-3">
                                <div class="form-floating col px-md-1 col-md-1">
									<input type="text"  class="form-control shadow-none" id="Id" name="Id"  value = "<?=$idFuncionario;?>" placeholder="Id" readonly />
									<label for="Id">Id:</label>
								</div>

                                <div class="form-floating col px-md-1 col-md-8">                                    
                                    <input type="text" class="form-control shadow-none" id="nome" name="nome"  value = "<?=$nomeFuncionario;?>" placeholder="nome" readonly />
									<label for="nome">Nome:</label>
                                </div>

                                <div class="form-floating col px-md-1 col-md-2">									
									<input type="text"  class="form-control shadow-none" id="cpf" name="cpf" value = "<?=$dadosCpf;?>" placeholder="cpf" readonly />
									<label for="cpf">Nº CPF:</label>
								</div>
                            </div>

                            <hr>
                            <div class="panel-header">
                                <i class="icon-tasks icon-blue"></i>
                                <h3 class="text-success">Insira o Dado Que Deseja Alterar</h3>
                            </div>
                            <hr>
                            <div class="row">									
								<div class="form-floating col px-md-1 col-md-2">									
									<input type="password"  class="form-control shadow-none"  id="senha" name="senha" placeholder="senha"  value = "" /> 
									<label for="senha">Senha:</label>   
								</div>

								<div class="form-floating col px-md-1 col-md-2">									
									<input type="text"  class="form-control shadow-none"  id="login" name="login" placeholder="login" /> 
									<label for="login">Login:</label>   
								</div>
                            </div>		

							<hr>	

                            <div id="actions" class="row">
								<div class="col-md-2">
								    <button type="submit" class="btn btn-success">Salvar</button>
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