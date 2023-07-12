<?php
	include "../template/menuPrincipal.php";
    
    if($_SESSION['exames']  != "sim")
        {
            echo "<script type='text/javascript'>alert('USUÁRIO NÃO AUTORIZADO');</script>";
            echo "<script>location = '../template/menuPrincipal.php';</script>";  
        }

    $idFuncionario = $_SESSION['idFuncionario'];  
    $nomeFuncionario = $_SESSION['nomeFuncionario']; 

    //$idFuncionario = $_SESSION['idFuncionario'];  
    $nomeFuncionario = $_SESSION['nomeFuncionario'];  
    $nomePaciente = $_SESSION['nomePaciente'];
    $dadosCpf = $_SESSION['dadosCpf'];
    $numSus = $_SESSION['numSus'];
    $prontuario = $_SESSION['prontuario'];
    //$numAmostra = $_SESSION['numAmostra']; 
    $idPaciente = $_SESSION['idPaciente'];
    //$idExamesSolic = $_SESSION['idExamesSolic'];
    $dataCadastroE = date('d/m/Y');
    include_once("../dao/conecta.php"); 
?>

        <script src="../js/descricao.js"></script>
		<script src="../js/codigoCap.js"></script>
		<!--script-- src="../js/sigla.js"></!--script-->

        <div class="container">
            <div id="page-content-wrapper">
				<div class="panel-header">
					<i class="icon-tasks icon-blue"></i>
					<h3 class="text-success">Cadastro de Pacientes</h3>
				</div>
						
				<div class="panel-content">
					<div class="col-md-12">																																
						<form  id="admin"  name="admin" class="form-horizontal" action="../controllers/pacienteExamesCadastro.php?idP=<?php echo $idPaciente;?>" method="POST">		
                            <div class="row">
                                <div class="col px-md-1 col-md-9">
                                    <label for="inputSuccess" class="control-label">Nome:</label>
                                    <input type="text" class="form-control" name="nomePaciente" value = "<?=$nomePaciente;?>" readonly>
                                </div>

                                <div class="col px-md-1 col-md-3">
									<label for="inputSuccess" class="control-label">Nº Prontuário:</label>
									<input type="text"  class="form-control" value = "<?=$prontuario;?>" readonly>
								</div>
                            </div>

                            <hr>

                            <div class="row">
                        	    <div class="col px-md-1 col-md-3">
									<label for="inputSuccess" class="control-label">Nº Cartão SUS:</label>
									<input type="text"  class="form-control" value = "<?=$numSus;?>" readonly >
								</div>
																					
								<div class="col px-md-1 col-md-3">
									<label for="inputSuccess" class="control-label">CPF:</label>
									<input type="text"  class="form-control" value = "<?=$dadosCpf;?>" readonly>    
								</div>

                                <div class="col px-md-1 col-md-2">
									<label for="inputSuccess" class="control-label">Data do Cadastro:</label>
									<input type="text"  class="form-control" name="dataCadastroE" value = "<?=$dataCadastroE;?>" readonly>    
								</div>

                                <div class="col px-md-1 col-md-2">
									<label for="inputSuccess" class="control-label">Data da Amostra:</label>
									<input type="date"  class="form-control"   name="dataAmostra" >    
								</div>
                            <div>                        

                            <hr>
                            <div class="row">
                                <div class="col px-md-1  col-md-2">					
                                    <label class="control-label">Nº Origem:</label>					
                                    <select class="form-control" name="numOrigem" id="numOrigem">
                                        <option value="">Escolha a Origem</option>
                                        <?php
                                                    $result_cat_post = "SELECT * FROM origem ORDER BY numOrigem";
                                                    $resultado_cat_post = mysqli_query($conn, $result_cat_post);
                                                    while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
                                                        echo '<option value="'.$row_cat_post['idOrigem'].'">'.$row_cat_post['numOrigem'].'</option>';
                                                    }
                                                ?>
                                    </select>
                                </div>

                                <div class="col px-md-1  col-md-5">					
                                    <label class="control-label">Descricao:</label>
                                    <select class="form-control" name="descricao" id="descricao" readonly>
                                        <option value="">descricao</option>
                                    </select>
                                </div>

                                <div class="col px-md-1  col-md-2">
                                    <label for="inputSuccess" class="control-label">Nº Cap:</label>
                                    <input type="text" class="form-control"  name="codigo" id="codigo" value =" " readonly>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                        	    <div class="col px-md-1 col-md-12">
                                   
                                        <?php
                                            include_once "../dao/DAO-sistemaCihiv.php";                                    
                                            $examesDAO = new SistemaDAO();   
                                            $nomeTabela = "tipoExames";
                                            $dado = "statusExame";
                                            $valor = "ativo";
                                                                    
                                            foreach ($examesDAO->PesquisaDados($nomeTabela,$dado,$valor) as $res)                                                                        
                                                {
                                                    ?>   
                                                        <div class="form-check form-check-inline">   
                                                            <input type="checkbox" class="form-check-input" name="tipoExames[]" value="<?php echo $res->idTipoExames;?>"><label><?php echo $res->tipoExame;?></label><br/>
                                                        </div>       
                                                    <?php      
                                                }                                                                    
                                        ?>
                                    
								</div>
                            <div>   

                            <hr>
                            <div class="col px-md-1  col-md-12">
                                <label for="inputSuccess" class="control-label">Cadastro Realizado Por:</label>
                                <input type="text" class="form-control"  value ="<?=$nomeFuncionario?>" readonly>
                            </div>
                            <hr>

                            <div id="actions" class="row">
								<div class="col-md-2">
								    <button type="submit" class="btn btn-primary">Salvar</button>
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
    </body>
</html>