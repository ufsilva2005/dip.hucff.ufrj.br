<?php
    include_once "../dao/DAO-sistemaCihiv.php";
    include "../models/class-tipoExame.php";	
    include "../funcao/funcao.php";

    //iniciando o session start
    //1 => EDITAR exame
    //2 => ATIVAR exame
    //3 => DESATIVAR exame

	session_start();	
    $opcao =  $_GET['action'];        
	$idTipoExames =  $_GET['id'];  
    $nomeTabela = "tipoExames";
    $dado = "idTipoExames";

    $examesDAO = new SistemaDAO();   
    foreach ($examesDAO->PesquisaDados($nomeTabela,$dado,$idTipoExames) as $res)
        {
            $idTipoExamesBd = $res->idTipoExames;
            $tipoExameBd  = $res->tipoExame;                                                       
            $statusExameBd = $res->statusExame;
        }     

    if ($opcao == 1)  
		{
            $_SESSION['idTipoExames']= $idTipoExames;
            $_SESSION['tipoExameBd']=$tipoExameBd;
            $_SESSION['statusExameBd']= $statusExameBd;
            header("Location: ../views/examesEditar.php");
        }

    elseif ($opcao == 3 || $opcao == 2)  
		{
            if($opcao == 2)
                {
                    $statusExame = "ativo";
                }
            if($opcao == 3)
                {
                    $statusExame = "inativo";
                }

            $exame = new Exame($idTipoExames, $tipoExameBd, $statusExame);
            // echo "<br> inativar/ativar exames <br>";
            //$exame->exibir();
            
            $examesDAO = new SistemaDAO();  
            $examesDAO->ExameUpdate($exame);
            header("Location: ../views/examesGerenciar.php");
        }
        
    elseif ($opcao == 4)  
            {
                $descExame = converteMaiuscula($_POST['descExame']);
                $statExame = $_POST['statExame'];
                $tipoExameBd = $_SESSION['tipoExameBd'];
                $statusExameBd = $_SESSION['statusExameBd'];

                if ($descExame != $tipoExameBd || $statExame != $statusExameBd)
                    {
                        $exame = new Exame($idTipoExames, $descExame, $statExame);
                        //echo "<br> inativar/ativar exames <br>";
                        //$exame->exibir();                        
                        $examesDAO = new SistemaDAO();  
                        $examesDAO->ExameTipoUpdate($exame);
                        
                        echo "<script type='text/javascript'>alert('A ALTERAÇÃO FOI EFETUADA');</script>";
                        echo "<script>location = '../views/examesGerenciar.php';</script>";  
                    }
                else
                    {
                        echo "<script type='text/javascript'>alert('NENHUMA ALTERAÇÃO FOI EFETUADA');</script>";
                        echo "<script>location = '../views/examesGerenciar.php';</script>";     
                    }
                
                //header("Location: ../views/examesEditar.php");
            }
     else  
		{
            header("Location: ../views/examesGerenciar.php");
        }
?>