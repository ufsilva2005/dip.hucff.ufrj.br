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

    if($idTipoExames == 0)
        {
            echo "<script type='text/javascript'>alert('DADOS NÃO PODEM SER EM BRANCO');</script>";
            echo "<script>location = '../views/relatorioExame.php';</script>";
        }

    else
        {
            //echo "<br>idTipoExames 0 => " . $idTipoExames;

            //se data inicial ou data final for maior que data atual
            if($dataInicio > $dataAtual ||  $dataFinal > $dataAtual)
                {
                    echo "<script type='text/javascript'>alert('A DATA INICIAL OU DATA FINAL NÃO PODEM SER MAIOR QUE A DATA ATUAL');</script>";
                    echo "<script>location = '../views/relatorioExame.php';</script>"; 
                }

            //se data inial for maior que data final
            elseif($dataInicio > $dataFinal && $dataFinal != "")
                {
                    echo "<script type='text/javascript'>alert('A DATA INICIAL NÃO PODE SER MAIOR QUE DATA FINAL');</script>";
                    echo "<script>location = '../views/relatorioExame.php';</script>"; 
                }
            //se dataInicio = "" e dataFinal = "" pegar todos os exames existente
            elseif($dataInicio == "" && $dataFinal == "")
                {
                    $opcao = 2;   
                }
            //se dataInicio != "" e dataFinal = "" pegar da data inicial ate a data do dia
            elseif($dataInicio != "" && $dataFinal == "")
                {
                    $dataFinal = $dataAtual;   
                    $opcao = 1;
                }

            //se dataInicio = "" e dataFinal != ""  igualar data inicio a data final pegar so exames do dia
            elseif($dataInicio == "" &&  $dataFinal != "")
                {
                    $dataInicio = $dataFinal;
                    $opcao = 1;
                }

            //se dataInicio != ""  e dataFinal != "" pegar exames do periodo
            elseif($dataInicio != "" &&  $dataFinal != "")
                {
                    $opcao = 1;
                }

            else
                {
                    $opcao = 0;
                }

            //echo "<br>idTipoExames 1 => " . $idTipoExames;
            //echo "<br>opcao 0 => " . $opcao;
        
            if($opcao == 1)    
                {
                    $nomeTabela = "examesSolicitados";
                    $examesDAO = new SistemaDAO();   
                    //foreach($examesDAO->PesquisaTodosDados($nomeTabela) as $resp)
                    foreach($examesDAO->PesquisaTipoExamesData($dataInicio,$dataFinal) as $resp)
                        { 
                            $idExamesSolicitados = $resp->idExamesSolicitados;    
                            $tiposExames = $resp->tiposExames;
                            $tiposExames =  unserialize($tiposExames);
                            $t = sizeof($tiposExames);
                            for ($i = 0; $i < $t; $i++) 
                                {
                                    $id = $tiposExames[$i];
                                    if( $id == $idTipoExames)
                                        {
                                            $auxIdSolicitados[] = $idExamesSolicitados;
                                        }
                                }     
                        } 
                }

            elseif($opcao == 2)
                {
                    $nomeTabela = "examesSolicitados";
                    $examesDAO = new SistemaDAO();   
                    //foreach($examesDAO->PesquisaTodosDados($nomeTabela) as $resp)
                    foreach($examesDAO->PesquisaTodosDados($nomeTabela) as $resp)
                        { 
                            $idExamesSolicitados = $resp->idExamesSolicitados;    
                            $tiposExames = $resp->tiposExames;
                            $tiposExames =  unserialize($tiposExames);
                            $t = sizeof($tiposExames);
                            for ($i = 0; $i < $t; $i++) 
                                {
                                    $id = $tiposExames[$i];
                                    if( $id == $idTipoExames)
                                        {
                                            $auxIdSolicitados[] = $idExamesSolicitados;
                                        }
                                }     
                        } 
                }

            else
                {
                    echo "<script type='text/javascript'>alert('EXAMES NÃO ENCONTRADOS');</script>";
                    echo "<script>location = '../views/relatorioExame.php';</script>"; 
                }
        }

    //echo "<br>idExamesSolicitados => " . $idExamesSolicitados;
    //echo "<br>auxIdSolicitados 00 => ";
    print_r($auxIdSolicitados);
    if($auxIdSolicitados == "")
        {
            $tamanho = 0;
        }
    else
        {
            $tamanho = sizeof($auxIdSolicitados);
        }

    if ($tamanho != 0)
        {
            $nomeTabela = "tipoExames";
            $dado = "idTipoExames";
            $tipoExameDAO = new SistemaDAO();   
            //foreach($examesDAO->PesquisaTodosDados($nomeTabela) as $resp)
            foreach($tipoExameDAO->PesquisaDados($nomeTabela,$dado,$idTipoExames) as $resp)
                { 
                    $tipoExame = $resp->tipoExame;    
                } 

                $_SESSION['auxIdSolicitados'] = $auxIdSolicitados;
                $_SESSION[' $tipoExame'] = $tipoExame;
                $_SESSION['dataInicio'] = $dataInicio;
                $_SESSION['$dataFinal'] = $dataFinal;
                //echo "<br>opcao => " . $opcao;
                header("location: ../views/relatorioExameVer.php");
        }
    else
        {
            echo "<script type='text/javascript'>alert('EXAMES NÃO ENCONTRADOS');</script>";
            echo "<script>location = '../views/relatorioExame.php';</script>"; 
        }
?>