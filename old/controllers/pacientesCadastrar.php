<?php
    session_start();
	include "../funcao/funcao.php";	
	include "../models/class-paciente.php";
	include "../dao/DAO-sistemaCihiv.php";	
	
    $nomePaciente = "";
	$dadosCpf = "";
    $numSus = "";

	//recebe dados da view
    $tipoPesquisa = $_POST['pesquisa'];
    $nomePaciente = converteMaiuscula($_POST['nomePaciente']);
	$dadosCpf = $_POST['dadosCpf'];
    $numSus = $_POST['numSus'];
    $nomeTabela = "paciente";


    if($tipoPesquisa == "paciente" &&  $nomePaciente != "")
        {
            $dado = "nomePaciente";           
            $pacienteDAO = new SistemaDAO();
			foreach ($pacienteDAO->PesquisaNomes($nomeTabela,$dado,$nomePaciente) as $paciente)
                { 
                    $idPaciente = $paciente->idPaciente;	
                }


            if( $idPaciente == 0)
                {
                    $_SESSION['nomePaciente'] = $nomePaciente;
                    $_SESSION['dadosCpf'] = " ";
                    $_SESSION['numSus'] = " ";
                    header("Location: ../views/pacientesCadastroEndereco.php");
                }
            else
                {
                    $numPaciente = $_SESSION['numUser'];
                    $_SESSION['nomePaciente'] = $nomePaciente;
                    echo "<script type='text/javascript'>alert('JÁ EXISTE(M) PACIENTE(S) COM ESSE NOME NO CADASTRO, VERIFICAR DADOS');</script>";
                    echo "<script>location = '../views/pacientesSelecionar.php';</script>";                    
                }          
        }

    elseif($tipoPesquisa == "cpf" && $dadosCpf != "")
        {
            $dado = "cpf";           
            $pacienteDAO = new SistemaDAO();
			foreach ($pacienteDAO->PesquisaDados($nomeTabela,$dado,$dadosCpf) as $paciente)
                { 
                    $idPaciente = $paciente->idPaciente;
                }

            if( $idPaciente == 0)
                {
                    $_SESSION['dadosCpf'] = $dadosCpf;
                    $_SESSION['numSus'] = " ";
                    $_SESSION['nomePaciente'] =" ";
                    header("Location: ../views/pacientesCadastroEndereco.php");
                }
            else
                {
                    header("Location: ../controllers/pacientesCadastroEndereco.php?action=2&id=$idPaciente");
                }
        }

    elseif($tipoPesquisa == "sus" && $numSus != "")
        {
            $dado = "numSus"; 
            $pacienteDAO = new SistemaDAO();
			foreach ($pacienteDAO->PesquisaDados($nomeTabela,$dado,$numSus) as $paciente)
                { 
                    $idPaciente = $paciente->idPaciente;
                }

            if( $idPaciente == 0)
                {
                    $_SESSION['numSus'] = $numSus;
                    $_SESSION['dadosCpf'] = " ";
                    $_SESSION['nomePaciente'] =" ";
                    header("Location: ../views/pacientesCadastroEndereco.php");
                }
            else
                {
                    header("Location: ../controllers/pacientesCadastroEndereco.php?action=2&id=$idPaciente");
                }
        }
    else
        {
            echo "<script type='text/javascript'>alert('DADO NÃO PODE SER EM BRANCO');</script>";
            echo "<script>location = '../views/pacientesCadastro.php';</script>";  
        }    
?>