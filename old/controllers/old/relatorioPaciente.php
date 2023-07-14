<?php
    session_start();
    include_once "../dao/DAO-sistemaCihiv.php";
    include "../funcao/funcao.php";
   
    $tipoPesquisa = "";
    $nomePaciente = "";
    $dadosCpf = "";
    $numSus = "";
    $dataAtual = "";
    $numProtuario = "";
    $numPacientes = 0;
    $valor = 0;
    $opcao = 0;

    $dataInicio = filter_input(INPUT_POST, 'dataInicio');
    $dataFinal = filter_input(INPUT_POST, 'dataFinal');
    $dataAtual = date('Y-m-d');
    $nomePaciente = converteMaiuscula($_POST['nomePaciente']);
    $dadosCpf = filter_input(INPUT_POST, 'dadosCpf');
    $numSus = filter_input(INPUT_POST, 'numSus');
    $numProtuario = filter_input(INPUT_POST, 'prontuario');
    $tipoPesquisa = filter_input(INPUT_POST, 'pesquisa');
    $nomeTabela = "paciente";

    echo "<br>dataInicio 0 => " . $dataInicio;
    echo "<br>dataFinal 0 => " . $dataFinal;

    //verificar se paciente existe
    if( $nomePaciente == "" && $dadosCpf == "" && $numSus == "" && $numProtuario == "")
        {
            echo "<script type='text/javascript'>alert('DADOS EM BRANCO');</script>";
            echo "<script>location = '../views/relatorioPaciente.php';</script>";
        }

    elseif( $nomePaciente != "" && $dadosCpf == "" && $numSus == "" && $numProtuario == "")
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
            //header("Location: ../template/menuPrincipal.php");     
        }

    //echo "<br>tipoPesquisa 0 => " . $tipoPesquisa;
    //echo "<br>valor 0 => " . $valor;

    $pcienteDAO = new SistemaDAO();   
    foreach ($pcienteDAO->PesquisaNomes($nomeTabela,$tipoPesquisa,$valor) as $res)
        {
            $idPaciente = $res->idPaciente;
            $nome = $res->nomePaciente;
        } 

    $numPacientes = $_SESSION['numResult'];

    //se paciente nao existe
    if($numPacientes == 0)
        {
            echo "<script type='text/javascript'>alert('PACIENTE NÃO ENCONTRADO');</script>";
            echo "<script>location = '../views/relatorioPaciente.php';</script>";     
        }

    else
        {
            //verificar data
            if($dataInicio > $dataAtual || $dataFinal > $dataAtual)
                {
                    echo "<script type='text/javascript'>alert('A DATA INICIAL OU DATA FINAL NÃO PODEM SER MAIOR QUE A DATA ATUAL');</script>";
                    echo "<script>location = '../views/relatorioPaciente.php';</script>"; 
                }

            elseif($dataInicio != "" && $dataFinal == "")
                {
                    $dataFinal = date('Y-m-d');
                    $_SESSION['dataInicio'] = $dataInicio;
                    $_SESSION['dataFinal'] = $dataFinal;
                    $_SESSION['tipoPesquisa'] = $tipoPesquisa;
                    $opcao = 1;//relatorio idpaciente + data
                }

            elseif($dataInicio == "" && $dataFinal != "")
                {
                    $dataInicio = $dataFinal; 
                    $_SESSION['dataInicio'] = $dataInicio;
                    $_SESSION['dataFinal'] = $dataFinal;
                    $_SESSION['tipoPesquisa'] = $tipoPesquisa;
                    $opcao = 1;//relatorio idpaciente + data
                }

            elseif($dataInicio != "" && $dataFinal != "")
                {
                    if($dataInicio > $dataFinal)
                        {
                            echo "<script type='text/javascript'>alert('A DATA INICIAL NÃO PODE SER MAIOR QUE A DATA FINAL');</script>";
                            echo "<script>location = '../views/relatorioPaciente.php';</script>"; 
                        }
                        
                    else
                        {
                            $_SESSION['dataInicio'] = $dataInicio;
                            $_SESSION['dataFinal'] = $dataFinal;
                            $_SESSION['tipoPesquisa'] = $tipoPesquisa;
                            $opcao = 1;//relatorio idpaciente + data
                        }
                }

            else
                {
                    $_SESSION['dataInicio'] = "0000-00-00";
                    $_SESSION['dataFinal'] = "0000-00-00";
                    $opcao = 2;//relatorio todos
                }

            if($numPacientes != 1)
                {
                    $_SESSION['tipoPesquisa'] = $tipoPesquisa;
                    $_SESSION['valor'] = $valor;
                    //echo "<br>dataInicio 1 => " . $_SESSION['dataInicio'];
                    //echo "<br>dataFinal 1 => " . $_SESSION['dataFinal'];
                    //echo "<br>tipoPesquisa 1 => " . $tipoPesquisa;
                    //echo "<br>valor 1 => " . $valor;
                    //echo "<br>numPacientes 1 => " . $numPacientes;
                    //echo "<br>opcao 1 => " . $opcao;
                    //echo "<br>nomePaciente 1 => " . $nomePaciente;

                    header("Location:../views/relatorioPacienteSeleciona.php?op=$opcao");    
                }
                
            else
                {
                    //echo "<br>dataInicio 1 => " . $_SESSION['dataInicio'];
                    //echo "<br>dataFinal 1 => " . $_SESSION['dataFinal'];
                    //echo "<br>tipoPesquisa 2 => " . $tipoPesquisa;
                    //echo "<br>numPacientes 2 => " . $numPacientes;
                    //echo "<br>idPaciente 2 => " . $idPaciente;
                    //echo "<br>valor 2 => " . $valor;
                    //echo "<br>opcao 1 => " . $opcao;
                    $_SESSION['idPaciente'] = $idPaciente;

                    //header("Location:../views/relatorioPacienteVer.php?$opcao");
                }
                
        }

?>