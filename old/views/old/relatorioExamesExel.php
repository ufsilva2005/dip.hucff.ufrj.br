<?php
	//include "../template/menuPrincipal.php";
    include "../funcao/funcao.php";
    /*$cadFucionario = $_SESSION['cadFucionario'];  
    if($cadFucionario != "sim")
        {
            echo "<script type='text/javascript'>alert('USUÁRIO NÃO AUTORIZADO');</script>";
            echo "<script>location = '../template/menuPrincipal.php';</script>";  
        }

    $idFuncionario = $_SESSION['idFuncionario'];  
    $nomeFuncionario = $_SESSION['nomeFuncionario'];*/ 
    
    //$op = $_GET['op'];
    //echo $_SESSION['dataInicio'] . " < = > " . $_SESSION['dataFinal']; 
    //$dataInicio = $_SESSION['dataInicio'];
    //$dataFinal = $_SESSION['dataFinal'];  

    // Definimos o nome do arquivo que será exportado
	$arquivo = 'relatorioData.xls';
		
	// Criamos uma tabela HTML com o formato da planilha
	$html = '';
	$html .= '<table border="1">';
	$html .= '<tr>';
	$html .= '<td colspan="5">Planilha Relatório Data</tr>';
	$html .= '</tr>';

	$html .= '<tr>';
	$html .= '<td><b>Funcionário</b></td>';
	$html .= '<td><b>Nome</b></td>';
	$html .= '<td><b>Nº amostra</b></td>';
	$html .= '<td><b>Nº Amostra Cega</b></td>';
	$html .= '<td><b>Data Amostra</b></td>';
    $html .= '<td><b>Data cadastro</b></td>';
	$html .= '<td><b>Origem</b></td>';
	$html .= '<td><b>tipo exame</b></td>';
	$html .= '</tr>';
						                                          
    require_once '../dao/DAO-sistemaCihiv.php';
    //$nomeTabela = "examesSolicitados";
    $exameDAO = new SistemaDAO();
    foreach($exameDAO-> RelatorioTodos() as $resp)
        { 
            $html .= '<tr>';
			$html .= '<td>' . $resp->nomeFuncionario .'</td>';
			$html .= '<td>' . $resp->nomePaciente .'</td>';
			$html .= '<td>' . $resp->numAmostra .'</td>';
			$html .= '<td>' . $resp->numAmostraCega .'</td>';
			$html .= '<td>' . formatarData2($resp->dataAmostra) . '</td>';
			$html .= '<td>' . formatarData2($resp->dataCadastroE) .'</td>';
            $html .= '<td>' . $resp->numOrigem .'</td>';
            /*$tiposExames =$resp->tiposExames;
            $tiposExames =  unserialize($tiposExames);
            $t = sizeof($tiposExames);
            $result = count($tiposExames);
            for ($i = 0; $i < $t; $i++) 
                {
                    $id = $tiposExames[$i];
                    $nomeTabela3 = "tipoExames";
                    $dado3 = "idTipoExames";
                    $exame1DAO = new SistemaDAO();
                    foreach ($exame1DAO->PesquisaDados($nomeTabela3,$dado3,$id) as $resp)
                        { 
                            $html .= '<td>'. $tipoExame = $resp->tipoExame . '</td>';  
                        }
                }   
			$html .= '</tr>';
        }
		
		// Configurações header para forçar o download
		//header ("Expires: Mon, 26 Jul 2997 05:00:00 GMT");
        header("Expires: 0");
		header ("Last-Modified: " . gmdate("D M Y H:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type:application/x-msexcel;charset=UTF-8");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
        echo "\xEF\xBB\xBF";
		echo $html;
		exit; */
?>