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

    echo "<br>opcao 0 => " .  $opcao;
    echo "<br>dataInicio 0 => " . $dataInicio;
    echo "<br>dataFinal 0 => " . $dataFinal;
    echo "<br>dataAtual 0 => " . $dataAtual;

    //se data inial for maior que data final
    //if($dataInicio > $dataFinal)
        //{
            //echo "<script type='text/javascript'>alert('A DATA INICIAL NÃO PODE SER MAIOR QUE DATA FINAL');</script>";
            //echo "<script>location = '../views/pacientesPesquisa.php';</script>"; 
        //}

    //ver se datas sao maiores que data atual
    if($dataInicio > $dataAtual ||  $dataFinal > $dataAtual)
        {
            echo "<script type='text/javascript'>alert('A DATA INICIAL OU DATA FINAL NÃO PODEM SER MAIOR QUE A DATA ATUAL');</script>";
            echo "<script>location = '../views/pacientesPesquisa.php';</script>"; 
            /*echo "<br>nomePaciente => " . $nomePaciente;
            echo "<br> dadosCpf => " . $dadosCpf;
            echo "<br>numSus => " . $numSus;
            echo "<br>numProtuario => " . $numProtuario;
            echo "<br>tipoPesquisa => " . $tipoPesquisa;
            echo "<br>valorPesquisa => " . $valor;
            echo "<br>dataInicio => " . $dataInicio;
            echo "<br>dataFinal => " . $dataFinal;
            echo "<br>dataAtual => " . $dataAtual;
            echo "<br>idPaciente => ". $idPaciente;
            echo "<br>numPacientes => ". $numPacientes;*/   
        }
         //se data inial for maior que data final
    elseif($dataInicio > $dataFinal && $dataFinal != "")
        {
            echo "<script type='text/javascript'>alert('A DATA INICIAL NÃO PODE SER MAIOR QUE DATA FINAL');</script>";
            echo "<script>location = '../views/pacientesPesquisa.php';</script>"; 
        }
    else
        {      
            echo "<br>opcao 1 => " .  $opcao;
            echo "<br>dataInicio 1 => " . $dataInicio;
            echo "<br>dataFinal 1 => " . $dataFinal;
            echo "<br>dataAtual 1 => " . $dataAtual;
            //se dataInicio = "" e dataFinal = "" pegar todos os exames existente
            if($dataInicio == "" && $dataFinal == "")
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
            else{
                $opcao = 0;
            }

            echo "<br>opcao 2 => " .  $opcao;
            echo "<br>dataInicio 2 => " . $dataInicio;
            echo "<br>dataFinal 2 => " . $dataFinal;
            echo "<br>dataAtual 2 => " . $dataAtual;
           
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
                    echo "<br>opcao 5 => " .  $opcao;
                    //echo "<script type='text/javascript'>alert('JÁ EXISTE(M) $numPacientes PACIENTE(S) COM ESSE NOME NO CADASTRO, VERIFICAR DADOS');</script>";
                    //echo "<script>location = '../views/.php';</script>"; 
                    //header("Location:../views/pacientesSelecNomeExame.php");
                }
            else 
                {
                    //$_SESSION['tipoPesquisa'] = "idPaciente";
                    $_SESSION['valorPesquisa'] = $idPaciente;
                    $_SESSION['nomePaciente'] = $nome;
                    $_SESSION['dataInicio'] = $dataInicio;
                    $_SESSION['dataFinal'] = $dataFinal;
                    echo "<br>opcao 6 => " .  $opcao;
                    //header("Location:../views/pacientesVerPesqExame.php?op=$opcao&id=0");
                }           
        }  
?>