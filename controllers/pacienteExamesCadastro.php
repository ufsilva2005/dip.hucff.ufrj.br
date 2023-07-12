<?php
    session_start();
	include "../funcao/funcao.php";	
	include "../models/class-paciente.php";
    include "../models/class-exameSolicitado.php";
	include "../dao/DAO-sistemaCihiv.php";	

    //pegar  a data atual
    $hoje = date('Y'); 
    $dataExame = date('Y-m-d');
    $horaCadastro = date('H:i:s'); 
    $numAmostraCega = 0;
    $numAmostraBd = 0;
    $imprimir = 0;
	//recebe dados da view
    $idExames = $_POST['tipoExames'];   
    $tiposExames = serialize($idExames); 
    $numAmostra = "0"; 
    $idOrigem = $_POST['numOrigem'];
    $dataCadastroE =  formatarData($_POST['dataCadastroE']);
    $dataAmostra = filter_input(INPUT_POST, 'dataAmostra');
    $idPaciente =  $_GET['idP'];     
    $idFuncionario = $_SESSION['idFuncionario'];  
    $nomePaciente = $_SESSION['nomePaciente'];    

    if($dataAmostra == "")
        {
            $dataAmostra = $dataCadastroE;
        }

    if($nomePaciente == "AMOSTRA CEGA")
        {
            $numAmostra = 0; 
            //procura último numero de amostra cega
            $amostraCegaDAO = new SistemaDAO();
            foreach ($amostraCegaDAO->PesquisaNumAmCega($dataAmostra) as $resp)
                { 
                    $idExamesSolicitados = $resp->idExamesSolicitados;	
                    $numAmostraCegaBd = $resp->numAmostraCega;	 
                }

            if( $numAmostraCegaBd == "")
                {
                    $numAmostraCega = "AC01";
                }

            if($numAmostraCegaBd != "")
                {
                    $CodigoAmCega = soNumero($numAmostraCegaBd);
                    $numAmostraCega = "AC0" . $CodigoAmCega + 1;
                }
            
            $exaSolicita = new ExameSolicitado($idExamesSolicitados = "", $numAmostra, $numAmostraCega, $dataCadastroE, $horaCadastro, $dataAmostra, 
            $tiposExames, $idFuncionario, $idPaciente, $idOrigem,  $imprimir);
            //echo "<br><= EXAMES SOLICITADOS => "; 
            //$exaSolicita->exibir();
            //echo "<br>";
            $exaSolicitaDAO = new SistemaDAO();  
            $exaSolicitaDAO->ExaSolicitaCadastrar($exaSolicita);
            $idExame = $_SESSION['idExamesSolic']; 
            $_SESSION['numAmostraCega'] = $numAmostraCega; 
            $_SESSION['numAmostra'] = $numAmostra; 
            $_SESSION['nomePaciente'] = $nomePaciente;   
            $_SESSION['dataCadastroE'] = $dataCadastroE; 
            $_SESSION['dataAmostra'] = $dataAmostra;      
            $_SESSION['tiposExames'] = $tiposExames; 
            $_SESSION['idOrigem'] = $idOrigem;       
               
            //echo "<script type='text/javascript'>alert('CADASTRO REALIZADO');</script>";
            //echo "<script>location = '../views/pacienteExamesCadVer.php?idP=$idPaciente&idE=$idExame';</script>";  
        }

    else
        { 
            //verifica numero de amostra de acorodo com data da amostra
            $amostraDAO = new SistemaDAO();
            foreach ($amostraDAO->PesquisaNumAmostra($dataAmostra) as $resp)
                { 
                    $idExamesSolicitados = $resp->idExamesSolicitados;	
                    $numAmostraBd = $resp->numAmostra;	 
                }
                
            if($numAmostraBd == 0)
                {
                    $dataCodigo = soNumero($dataAmostra);
                    $codigo = substr($dataCodigo,2,6)."001";
                    $numAmostra = $codigo;
                    $_SESSION['numAmostra'] = $numAmostra;
            
                    $exaSolicita = new ExameSolicitado($idExamesSolicitados = "", $numAmostra, $numAmostraCega, $dataCadastroE, $horaCadastro, $dataAmostra, 
                    $tiposExames, $idFuncionario, $idPaciente, $idOrigem,  $imprimir);
                    //echo "<br><= EXAMES SOLICITADOS => "; 
                    //$exaSolicita->exibir();
                    //echo "<br>";
                    $exaSolicitaDAO = new SistemaDAO();  
                    $exaSolicitaDAO->ExaSolicitaCadastrar($exaSolicita);
                    $idExame = $_SESSION['idExamesSolic']; 
                    $_SESSION['numAmostraCega'] = $numAmostraCega; 
                    $_SESSION['numAmostra'] = $numAmostra; 
                    $_SESSION['nomePaciente'] = $nomePaciente;   
                    $_SESSION['dataCadastroE'] = $dataCadastroE; 
                    $_SESSION['dataAmostra'] = $dataAmostra;  
                    $_SESSION['tiposExames'] = $tiposExames;
                    $_SESSION['idOrigem'] = $idOrigem; 
                    
                    header("Location: ../views/pacienteExamesCadVer.php?idP=$idPaciente&idE=$idExame");     
                    //echo "<script type='text/javascript'>alert('CADASTRO REALIZADO');</script>";
                    //echo "<script>location = '../views/pacienteExamesCadVer.php?idP=$idPaciente&idE=$idExame';</script>";  
                }
                
            else
                {
                    $numAmostra = $numAmostraBd+1;
                    $_SESSION['numAmostra'] = $numAmostra;                    
            
                    $exaSolicita = new ExameSolicitado($idExamesSolicitados = "", $numAmostra, $numAmostraCega, $dataCadastroE, $horaCadastro, $dataAmostra, 
                    $tiposExames, $idFuncionario, $idPaciente, $idOrigem,  $imprimir);
                    //echo "<br><= EXAMES SOLICITADOS => "; 
                    //$exaSolicita->exibir();
                    //echo "<br>";        
                    $exaSolicitaDAO = new SistemaDAO();  
                    $exaSolicitaDAO->ExaSolicitaCadastrar($exaSolicita);
                    $idExame = $_SESSION['idExamesSolic']; 
                    $_SESSION['numAmostraCega'] = $numAmostraCega; 
                    $_SESSION['numAmostra'] = $numAmostra; 
                    $_SESSION['nomePaciente'] = $nomePaciente;   
                    $_SESSION['dataCadastroE'] = $dataCadastroE; 
                    $_SESSION['dataAmostra'] = $dataAmostra;  
                    $_SESSION['tiposExames'] = $tiposExames;
                    $_SESSION['idOrigem'] = $idOrigem;   

                    //echo $numAmostra;
                    header("Location: ../views/pacienteExamesCadVer.php?idP=$idPaciente&idE=$idExame");     
                    //echo "<script type='text/javascript'>alert('CADASTRO REALIZADO');</script>";
                    //echo "<script>location = '../views/pacienteExamesCadVer.php?idP=$idPaciente&idE=$idExame';</script>";  
                }   
        }
   
    //header("Location: ../views/pacienteExamesCadVer.php?idP= &idE = ");
  ?>