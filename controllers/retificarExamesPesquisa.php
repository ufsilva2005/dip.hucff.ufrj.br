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
    $dataInicio = filter_input(INPUT_POST, 'dataInicio');
    $dataFinal = filter_input(INPUT_POST, 'dataFinal');
    $nomeTabela = "paciente";  
    $dataAtual = date('Y-m-d');

      //se data inial ou que data final for maior que data atual
    if ($dataInicio > $dataAtual || $dataFinal > $dataAtual)
        {
            echo "<script type='text/javascript'>alert('A DATA INICIAL E/OU DATA FINAL NÃO PODE(M) SER MAIOR(ES) QUE DATA ATUAL');</script>";
            echo "<script>location = '../views/retificarExamesPacientes.php';</script>"; 
        }

    //se data inial for maior que data final
    elseif($dataInicio > $dataFinal)
        {
            echo "<script type='text/javascript'>alert('A DATA INICIAL NÃO PODE SER MAIOR QUE DATA FINAL');</script>";
            echo "<script>location = '../views/retificarExamesPacientes.php';</script>"; 
        }

    else
        {
            if( $nomePaciente != "" && $dadosCpf == "" )
                {
                    $valor = $nomePaciente;
                }
            elseif( $nomePaciente == "" && $dadosCpf != "" )
                {
                    $valor = $dadosCpf;
                }
            else
                {
                    echo "<script type='text/javascript'>alert('DADOS DO PACIENTE EM BRANCO');</script>";
                    echo "<script>location = '../views/retificarExamesPacientes.php';</script>"; 
                    //header("Location:../views/retificarExamesPacientes.php");
                }
                
            if($tipoPesquisa == "paciente")
                {
                    $tipoPesquisa = "nomePaciente";
                }

            $pcienteDAO = new SistemaDAO();  
            foreach ($pcienteDAO->PesquisaExameRetificar($tipoPesquisa,$valor,$dataInicio,$dataFinal) as $res)
                {
                    $idPaciente = $res->idPaciente;
                    $nome = $res->nomePaciente;
                    $idExamesSolicitados = $res->idExamesSolicitados;
                } 

            $numPacientes = $_SESSION['numResult'];
       
            if( $idPaciente == 0 && $numPacientes == 0)
                {
                    echo "<script type='text/javascript'>alert('EXAMES E/OU PACIENTE NÃO ENCONTRADO');</script>";
                    echo "<script>location = '../views/retificarExamesPacientes.php';</script>";     
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
                            echo "<script type='text/javascript'>alert('EXISTEM MAIS DE UM PACIENTE/EXAME NO PERIODO SELECIONADO');</script>";
                            echo "<script>location = '../views/pacienteSelectExameRetificar.php';</script>"; 
                            //header("Location:../views/pacienteSelectExameRetificar.php");
                        }
                    else 
                        {
                            $_SESSION['tipoPesquisa'] = "idPaciente";
                            $_SESSION['valorPesquisa'] = $idPaciente;
                            $_SESSION['nomePaciente'] = $nome;
                            $_SESSION['dataInicio'] = $dataInicio;
                            $_SESSION['dataFinal'] = $dataFinal;
                            header("Location:../views/retificarSelectPaciente.php?id=$idPaciente&idE=$idExamesSolicitados");
                        }           
                }
        }
?>