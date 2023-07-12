<?php
    session_start();
    include_once "../dao/DAO-sistemaCihiv.php";
    include "../funcao/funcao.php";

    $numPacientes = 0;
    $opcao = 0;  
    $idPaciente = 0;
    $nomePaciente = "";

    //recebe dados da view
    $tipoPesquisa = $_POST['pesquisa'];
    $nomePaciente = converteMaiuscula(filter_input(INPUT_POST, 'nomePaciente'));
	$dadosCpf = filter_input(INPUT_POST, 'dadosCpf');
    $numSus = filter_input(INPUT_POST, 'numSus');
    $numProtuario = filter_input(INPUT_POST, 'numProtuario');
    $dataInicio = filter_input(INPUT_POST, 'dataInicio');
    $dataFinal = filter_input(INPUT_POST, 'dataFinal');
    $nomeTabela = "paciente";   

    $dataAtual = date('Y-m-d');

    //ver se datas sao maiores que data atual
    if($dataInicio > $dataAtual ||  $dataFinal > $dataAtual)
        {
            echo "<script type='text/javascript'>alert('A DATA INICIAL OU DATA FINAL NÃO PODEM SER MAIOR QUE A DATA ATUAL');</script>";
            echo "<script>location = '../views/pacientesPesquisa.php';</script>"; 
        }

    //se data inial for maior que data final
    elseif($dataInicio > $dataFinal && $dataFinal != "")
        {
            echo "<script type='text/javascript'>alert('A DATA INICIAL NÃO PODE SER MAIOR QUE DATA FINAL');</script>";
            echo "<script>location = '../views/pacientesPesquisa.php';</script>"; 
        }
    else
        {      
            if($dataInicio != "" && $dataFinal != "")
                {
                    $opcao = 1;   
                    //echo "<br>if 1 => ";
                }
            //se dataInicio != "" e dataFinal = "" pegar da data inicial ate a data do dia
            elseif($dataInicio != "" && $dataFinal == "")
                {
                    $dataFinal = $dataAtual;   
                    $opcao = 1;
                    //echo "<br>if 2 => ";
                }

            //se dataInicio = "" e dataFinal != ""  igualar data inicio a data final pegar so exames do dia
            elseif($dataInicio == "" &&  $dataFinal != "")
                {
                    $dataInicio = $dataFinal;
                    $opcao = 2;
                    //echo "<br>if 3 => ";
                }
            //se dataInicio == ""  e dataFinal == "" pegar todos os exames do paciente
            else
                {
                    $opcao = 3;
                    //echo "<br>if 4 => ";
                }
           
            if( $nomePaciente != "" && $dadosCpf == "" && $numSus == "" && $numProtuario == "")
                {
                    $valor = $nomePaciente;
                }

            elseif( $nomePaciente == "" && $dadosCpf != "" && $numSus == "" && $numProtuario == "")
                {
                    $valor = $dadosCpf;
                }

            elseif( $nomePaciente == "" && $dadosCpf == "" && $numSus != "" && $numProtuario == "")
                {
                    $valor = $numSus;
                }

            elseif( $nomePaciente == "" && $dadosCpf == "" && $numSus == "" && $numProtuario != "")
                {
                    $valor = $numProtuario;
                }

            else
                {
                    header("Location:../views/pacientesPesquisa.php");
                }
        

            $pcienteDAO = new SistemaDAO();   
            //foreach ($pcienteDAO->PesquisaDados($nomeTabela,$tipoPesquisa,$valor) as $res)
            foreach ($pcienteDAO->PesquisaNomes($nomeTabela,$tipoPesquisa,$valor) as $res)
                {
                    $idPaciente = $res->idPaciente;
                    $nome = $res->nomePaciente;
                } 

            $numPacientes = $_SESSION['numResult'];
        }

    if( $idPaciente == 0 && $numPacientes == 0)
        {
            echo "<script type='text/javascript'>alert('PACIENTE NÃO ENCONTRADO');</script>";
            echo "<script>location = '../views/pacientesPesquisa.php';</script>";     
        }
    else
        {
            if($numPacientes > 1)
                {
                    $_SESSION['tipoPesquisa'] = $tipoPesquisa;
                    $_SESSION['valorPesquisa'] = $valor;
                    $_SESSION['dataInicio'] = $dataInicio;
                    $_SESSION['dataFinal'] = $dataFinal;
                    $_SESSION['nomePaciente'] = $nomePaciente;
                    //echo "<br>opcao 5 => " .  $opcao;
                    echo "<script type='text/javascript'>alert('EXISTEM ALGUNS PACIENTES COM ESSE NOME NO CADASTRO');</script>";
                    echo "<script>location = '../views/pacientesSelecNomeExame.php?op=$opcao';</script>"; 
                    //header("Location:../views/pacientesSelecNomeExame.php");
                }
            else 
                {
                    //$_SESSION['tipoPesquisa'] = "idPaciente";
                    $_SESSION['valorPesquisa'] = $idPaciente;
                    $_SESSION['nomePaciente'] = $nome;
                    $_SESSION['dataInicio'] = $dataInicio;
                    $_SESSION['dataFinal'] = $dataFinal;
                    //echo "<br>opcao 6 => " .  $opcao;
                    header("Location:../views/pacientesVerPesqExame.php?op=$opcao&id=0");
                }           
        }  
?>