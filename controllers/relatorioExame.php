<?php
    session_start();
    include_once "../dao/DAO-sistemaCihiv.php";
    include "../funcao/funcao.php";
    //$auxIdSolicitados[] = "";
    $idTipoExames = 0;  
    $idExamesSolicitados = 0;
    $idTipoExames = filter_input(INPUT_POST, 'tipoExame');  
    $dataInicio = filter_input(INPUT_POST, 'dataInicio');
    $dataFinal = filter_input(INPUT_POST, 'dataFinal');
    $dataAtual = date('Y-m-d');
    $auxIdSolicitados =  array();
    $aux1 = 0;
    $aux2 = 0;

    //echo $idTipoExames . "<br>";

    if($idTipoExames == 0)
        {
            echo "<script type='text/javascript'>alert('DADOS NÃO PODEM SER EM BRANCO');</script>";
            echo "<script>location = '../views/relatorioExame.php';</script>";
        } 
    else 
        {
            //se data inicial ou data final for maior que data atual
            if ($dataInicio > $dataAtual || $dataFinal > $dataAtual) 
                {
                    echo "<script type='text/javascript'>alert('A DATA INICIAL OU DATA FINAL NÃO PODEM SER MAIOR QUE A DATA ATUAL');</script>";
                    echo "<script>location = '../views/relatorioExame.php';</script>";
                }

            //se data inial for maior que data final
            elseif ($dataInicio > $dataFinal && $dataFinal != "") 
                {
                    echo "<script type='text/javascript'>alert('A DATA INICIAL NÃO PODE SER MAIOR QUE DATA FINAL');</script>";
                    echo "<script>location = '../views/relatorioExame.php';</script>";
                }
            //se dataInicio = "" e dataFinal = "" pegar todos os exames existente
            elseif ($dataInicio == "" && $dataFinal == "") 
                {
                    echo "<script type='text/javascript'>alert('A DATA INICIAL E DATA FINAL NÃO PODEM SER EM BRANCO');</script>";
                    echo "<script>location = '../views/relatorioExame.php';</script>";
                }
            //se dataInicio != "" e dataFinal = "" pegar da data inicial ate a data do dia
            elseif ($dataInicio != "" && $dataFinal == "") 
                {
                    $dataFinal = $dataAtual;
                }

            //se dataInicio = "" e dataFinal != ""  igualar data inicio a data final pegar so exames do dia
            elseif ($dataInicio == "" && $dataFinal != "")
                {
                    $dataInicio = $dataFinal;
                }

            //se dataInicio != ""  e dataFinal != "" pegar exames do periodo
            elseif ($dataInicio != "" && $dataFinal != "") 
                {
                    $opcao = 1;
                } 
            else 
                {
                    $opcao = 0;
                }

            $examesDAO = new SistemaDAO();
            foreach ($examesDAO->PesquisaTipoExamesData($dataInicio, $dataFinal) as $resp) 
                {
                    $idExamesSolicitados = $resp->idExamesSolicitados;
                    $tiposExames = (unserialize($resp->tiposExames));
                    //print_r($tiposExames);
                    $t = sizeof($tiposExames);

                    for ($i = 0; $i < $t; $i++) 
                        {
                            $id = $tiposExames[$i];
                            if ($id == $idTipoExames) 
                                {
                                    $auxIdSolicitados[$aux1] = $idExamesSolicitados;
                                    $aux1++;
                                }
                            //$aux1++;
                        }
                }

            $tamanho = sizeof($auxIdSolicitados);

            //print_r( $auxIdSolicitados);

            if ($tamanho == 0) 
                {
                    echo "<script type='text/javascript'>alert('EXAMES NÃO ENCONTRADOS');</script>";
                    echo "<script>location = '../views/relatorioExame.php';</script>";
                }

            if ($tamanho != 0) 
                {
                    $nomeTabela = "tipoExames";
                    $dado = "idTipoExames";
                    $tipoExameDAO = new SistemaDAO();
                    foreach ($tipoExameDAO->PesquisaDados($nomeTabela, $dado, $idTipoExames) as $resp) 
                        {
                            $tipoExame = $resp->tipoExame;
                        }

                    $_SESSION['auxIdSolicitados'] = $auxIdSolicitados;
                    $_SESSION['tipoExame'] = $tipoExame;
                    $_SESSION['dataInicio'] = $dataInicio;
                    $_SESSION['dataFinal'] = $dataFinal;
                    //echo "<br>opcao => " . $opcao;
                    header("location: ../views/relatorioExameVer.php");
                }
        }
?>