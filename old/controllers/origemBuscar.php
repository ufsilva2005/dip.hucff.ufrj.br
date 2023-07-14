<?php
    include_once "../dao/DAO-sistemaCihiv.php";
    include "../models/class-origem.php";	
    include "../funcao/funcao.php";

    //iniciando o session start
    //1 => EDITAR origem
    //2 => ATIVAR origem
    //3 => DESATIVAR origem
    //4 => UPDATE origem


	session_start();	
    $opcao =  $_GET['action'];        
	$idOrigem =  $_GET['id'];  
    $nomeTabela = "origem";
    $dado = "idOrigem";

    $origemsDAO = new SistemaDAO();   
    foreach ($origemsDAO->PesquisaDados($nomeTabela,$dado,$idOrigem) as $res)
        {
            $idOrigemBd = $res->idOrigem;
            $descricaoBd  = $res->descricao;                                                       
            $capBd = $res->cap;
            $numOrigemBd  = $res->numOrigem;                                                       
            $statusOrigemBd = $res->statusOrigem;
        }     

    if ($opcao == 1)  
		{
            $_SESSION['idOrigem']= $idOrigem;
            $_SESSION['descricaoBd']=$descricaoBd;
            $_SESSION['capBd']= $capBd;
            $_SESSION['numOrigemBd']=$numOrigemBd;
            $_SESSION['statusOrigemBd']= $statusOrigemBd;
            header("Location: ../views/origensEditar.php");
        }

    elseif ($opcao == 3 || $opcao == 2)  
		{
            if($opcao == 2)
                {
                    $statusOrigem = "ativo";
                }
            if($opcao == 3)
                {
                    $statusOrigem = "inativo";
                }

            $origem = new Origem($idOrigem, $descricaoBd, $capBd, $numOrigemBd, $statusOrigem);
            //echo "<br> inativar/ativar origems <br>";
            //$origem->exibir();
            
            $origemsDAO = new SistemaDAO();  
            $origemsDAO->OrigemUpdate($origem);
            header("Location: ../views/origensGerenciar.php");
        }
        
    elseif($opcao == 4)
        {
            $descricaoBd = $_SESSION['descricaoBd'];
            $capBd = $_SESSION['capBd'];
            $numOrigemBd = $_SESSION['numOrigemBd'];
            $statusOrigemBd = $_SESSION['statusOrigemBd'];

            $origemTipo = $_POST['origem'];
            $idOrigem = $origemTipo[0];
            $descricao = converteMaiuscula($origemTipo[1]);
            $cap = $origemTipo[2];
            $numOrigem = $origemTipo[3];
            $statusOrigem = $origemTipo[4];

            if($descricaoBd != $descricao || $capBd != $cap || $numOrigemBd != $numOrigem || $statusOrigemBd != $statusOrigem)
                {
                    $origem = new Origem($idOrigem, $descricao, $cap, $numOrigem, $statusOrigem);
                    //echo "<br> Origems cadatro <br>";
                    //$origem->exibir();                        
                    $origemsDAO = new SistemaDAO();  
                    $origemsDAO->OrigemUpdate2($origem); 
                    echo "<script type='text/javascript'>alert('TIPO DE ORIGEM ATUALIZADA');</script>";
                    echo "<script>location = '../views/origensGerenciar.php';</script>";
                }

            else
                {
                    echo "<script type='text/javascript'>alert('TIPO DE ORIGEM NÃO ALTERADA');</script>";
                    echo "<script>location = '../views/origensGerenciar.php';</script>";
                }
        }

    else  
		{
            header("Location: ../views/origensGerenciar.php");
        }
?>