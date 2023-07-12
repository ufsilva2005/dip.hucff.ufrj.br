<?php
	session_start();
    include "../funcao/funcao.php";
    
    $administrador = $_SESSION['administrador'];
    $auxIdSolicitados = $_SESSION['auxIdSolicitados'];
    $tipoExame = $_SESSION['tipoExame'];
    $dataInicio = $_SESSION['dataInicio'];
    $dataFinal = $_SESSION['dataFinal'];

    // Definimos o nome do arquivo que será exportado
	$arquivo = 'relatorioExames.xls';
		
	// Criamos uma tabela HTML com o formato da planilha
	$html = '';
	$html .= '<table border="1">';
	$html .= '<tr>';
	$html .= '<td colspan="5">Planilha Relatório Exames</tr>';
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
    $examesDAO = new SistemaDAO();
    $result = count($auxIdSolicitados);
    for ($i = 0; $i < $result; $i++) 
        {
            $valor = $auxIdSolicitados[$i];
            foreach ($examesDAO->PesqTipoExame($valor) as $resp) 
                {
                    $html .= '<tr>';
                    if ($administrador == "sim") 
                        {
                            $html .= '<td>' . $resp->nomeFuncionario . '</td>';
                        } 
                    else 
                        {
                            $html .= '<td> </td>';
                        }
                    $html .= '<td>' . $resp->nomePaciente . '</td>';
                    $html .= '<td>' . $resp->numAmostra . '</td>';
                    $html .= '<td>' . $resp->numAmostraCega . '</td>';
                    $html .= '<td>' . formatarData2($resp->dataAmostra) . '</td>';
                    $html .= '<td>' . formatarData2($resp->dataCadastroE) . '</td>';
                    $html .= '<td>' . $resp->numOrigem . '</td>';
                }
            $html .= '</tr>';
        }
        
		// Configurações header para forçar o download
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
		exit; 
        
?>