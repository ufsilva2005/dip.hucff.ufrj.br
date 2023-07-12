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
					<h3 class="text-success">Gerenciar Origens dos Exames</h3>
				</div>
				<hr>		
				<div class="panel-content">
					<div class="col-md-12">																																
						<table class="table table-striped table-bordered table-condensed">
                            <thead>
                                <tr>
                                    <th>Id</th>                                    
                                    <th>Descrição</th>                                            
                                    <th>Cap</th>
                                    <th>Nº de Origem</th>
                                    <th>Status</th>
                                    <th>Opção</th>
                                </tr>
                            </thead>
                            <tbody> 
                                <?php
                                require_once '../dao/DAO-sistemaCihiv.php';
                                $exameDAO = new SistemaDAO();
                                $nomeTabela = "origem";
                                foreach($exameDAO->PesquisaTodosDados($nomeTabela) as $exame)
                                    { 
                                        ?>													
                                            <tr>
                                                <td><?php echo $exame->idOrigem ?></td>
                                                <td><?php echo $exame->descricao ?></td>  
                                                <td><?php echo $exame->cap ?></td>
                                                <td><?php echo $exame->numOrigem ?></td>                                                
                                                <td><?php echo $exame->statusOrigem;  $statusOrigem = $exame->statusOrigem;?></td>  

                                                <td class='operations'>
                                                    <div class="btn-group pull-right">
                                                        <a href="../controllers/origemBuscar.php?action=1&id=<?php echo $exame->idOrigem;?>" class="btn btn-small btn-outline-warning">Editar<i class="icon-remove"></i></a>
                                                    </div>

                                                    <div class="btn-group pull-left">
                                                        <?php                                    
                                                            if ($statusOrigem != "ativo") 
                                                                {
                                                                    $html = " <a href='../controllers/origemBuscar.php?action=2&id=$exame->idOrigem'  class='btn btn-small btn-outline-success'>Ativar<i class='icon-edit'></i></a>";
                                                                    echo $html;
                                                                }                                    
                                                      
                                                            elseif ($statusOrigem == "ativo") 
                                                                {
                                                                    $html = "<a href='../controllers/origemBuscar.php?action=3&id=$exame->idOrigem' class='btn btn-small btn-outline-danger'>Excluir<i class='icon-remove'></i></a>";
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