<?php
    session_start();
    include_once "../dao/DAO-sistemaCihiv.php";
    include "../funcao/funcao.php";

    //$auxIdSolicitados[];
    $opcao = 0;  
    $idExamesSolicitados = 0;
    //recebe dados da view
    $idTipoExames = $_POST['tipoExame'];
    $dataInicio = filter_input(INPUT_POST, 'dataInicio');
    $dataFinal = filter_input(INPUT_POST, 'dataFinal');
    $dataAtual = date('Y-m-d');

    //se data inicial ou data final for maior que data atual
    if($dataInicio > $dataAtual ||  $dataFinal > $dataAtual)
        {
            echo "<script type='text/javascript'>alert('A DATA INICIAL OU DATA FINAL NÃO PODEM SER MAIOR QUE A DATA ATUAL');</script>";
            echo "<script>location = '../views/pacientesPesqExame.php';</script>"; 
        }

    //se data inial for maior que data final
    if($dataInicio > $dataFinal && $dataFinal != "")
        {
            echo "<script type='text/javascript'>alert('A DATA INICIAL NÃO PODE SER MAIOR QUE DATA FINAL');</script>";
            echo "<script>location = '../views/pacientesPesqExame.php';</script>"; 
        }
    //se dataInicio = "" e dataFinal = "" pegar todos os exames existente
    if($dataInicio == "" && $dataFinal == "")
        {
            $opcao = 2;   
        }
    //se dataInicio != "" e dataFinal = "" pegar da data inicial ate a data do dia
    if($dataInicio != "" && $dataFinal == "")
        {
            $dataFinal = $dataAtual;   
            $opcao = 1;
        }

    //se dataInicio = "" e dataFinal != ""  igualar data inicio a data final pegar so exames do dia
    if($dataInicio == "" &&  $dataFinal != "")
        {
            $dataInicio = $dataFinal;
            $opcao = 1;
        }

    //se dataInicio != ""  e dataFinal != "" pegar exames do periodo
      if($dataInicio != "" &&  $dataFinal != "")
        {
            $opcao = 1;
        }
   
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

     if($opcao == 2)
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

    if ($idExamesSolicitados != 0)
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
            header("Location: ../views/pacienteVerPesqTipoExame.php"); 

            $result = count($auxIdSolicitados);
            $nomeTabela = "examesSolicitados";
            $dado = "idExamesSolicitados";
            for ($i = 0; $i < $result; $i++) 
                {
                    $valor = $auxIdSolicitados[$i];
                    //foreach($examesDAO->PesquisaDados($nomeTabela,$dado,$valor) as $resp)
                    foreach($examesDAO->EtiqutasDados($valor)  as $resp) 
                        { 
                            echo "<br>" . $resp->numAmostra;
                            echo "<br>" . $resp->numAmostraCega;
                            echo "<br>" . $resp->nomePaciente;
                            echo "<br>" . $resp->numOrigem;
                         }
                }
        }

    else
        {
            echo "<script type='text/javascript'>alert('NÃO EXISTEM EXAMES PARA O PERÍODO SELECIONADO');</script>";
            echo "<script>location = '../views/pacientesPesqExame.php';</script>";     
        }
?>