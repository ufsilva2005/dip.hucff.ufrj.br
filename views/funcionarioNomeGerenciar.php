<?php
    include "../template/menuPrincipal.php";
    
    if($_SESSION['administrador'] != "sim" || $_SESSION['cadFucionario'] != "sim")
        {
            echo "<script type='text/javascript'>alert('USUÁRIO NÃO AUTORIZADO');</script>";
            echo "<script>location = '../template/menuPrincipal.php';</script>";  
        }

    $idFuncionario = $_SESSION['idFuncionario'];  
    $nomeFuncionario = $_SESSION['nomeFuncionario'];  
    $nomeFuncPesq = filter_input(INPUT_POST, 'nome');   
    if($nomeFuncPesq == "")
        {
            $nomeFuncPesq = $_SESSION['nome'];
        }
?>

        <div class="container">
            <div id="page-content-wrapper">
				<div class="panel-header">
					<i class="icon-tasks icon-blue"></i>
					<h3 class="text-success">Gerenciar Tipos de funcionarios</h3>
				</div>
				<hr>		
				<div class="panel-content">
					<div class="col-md-12">																																
						<table class="table table-striped table-bordered table-condensed">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nome do Funcionário</th>                                            
                                    <th>Status</th>
                                    <th>Opção</th>
                                </tr>
                            </thead>
                            <tbody> 
                                <?php
                                require_once '../dao/DAO-sistemaCihiv.php';
                                $funcionarioDAO = new SistemaDAO();
                                $nomeTabela = "funcionario";
                                foreach($funcionarioDAO->PesquisaNomeFuncionarios($nomeFuncPesq) as $funcionario)
                                    { 
                                        ?>													
                                            <tr>
                                                <td><?php echo $funcionario->idFuncionario ?></td>
                                                <td><?php echo $funcionario->nomeFuncionario ?></td>                                               
                                                <td><?php echo $funcionario->status;  $status = $funcionario->status;?></td>  

                                                <td class='operations'>
                                                    <div class="btn-group pull-right">
                                                        <a href="../controllers/funcionarioBuscar.php?action=1&ret=1&id=<?php echo $funcionario->idFuncionario;?>" class="btn btn-small btn-outline-warning">Editar<i class="icon-remove"></i></a>
                                                    </div>

                                                    <div class="btn-group pull-left">
                                                        <?php                                    
                                                            if ($status != "ativo") 
                                                                {
                                                                    $html = " <a href='../controllers/funcionarioBuscar.php?action=2&ret=1&id=$funcionario->idFuncionario'  class='btn btn-small btn-outline-success'>Ativar<i class='icon-edit'></i></a>";
                                                                    echo $html;
                                                                }                                    
                                                      
                                                            elseif ($status == "ativo") 
                                                                {
                                                                    $html = "<a href='../controllers/funcionarioBuscar.php?action=3&ret=1&id=$funcionario->idFuncionario' class='btn btn-small btn-outline-danger'>Excluir<i class='icon-remove'></i></a>";
                                                                    echo $html;
                                                                }                                    
                                                        ?>  
                                                    </div>
                                                </td>                                                                                           
                                            <tr>									
                                        <?php 
                                    } 
                                ?>   
                            </tbody>
                        </table>
                    </div>	
				</div>	
            </div>	
		</div>	
    </body>
</html>