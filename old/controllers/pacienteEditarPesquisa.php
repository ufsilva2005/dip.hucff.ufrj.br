<?php
    session_start();
    include_once "../dao/DAO-sistemaCihiv.php";
    include "../funcao/funcao.php";

    $opcao =  $_GET['op']; 
    $nomeTabela = "paciente";   
    $nomeTabela1 = "contato";
    $nomeTabela2 = "endereco";
    //echo  $opcao;

    if($opcao == 1)
        {
            $numPacientes = 0;
            //$opcao = 0;  
            $idPaciente = 0;
            $nomePaciente = "";
       

            //recebe dados da view
            $tipoPesquisa = $_POST['pesquisa'];
            $nomePaciente = converteMaiuscula(filter_input(INPUT_POST, 'nomePaciente'));
            $dadosCpf = filter_input(INPUT_POST, 'dadosCpf');
            $numSus = filter_input(INPUT_POST, 'numSus');
            $numProtuario = filter_input(INPUT_POST, 'numProtuario');
           

            $dataAtual = date('Y-m-d');

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
                    header("Location:../views/pacienteEditarPesquisa.php");
                }
  
            $pcienteDAO = new SistemaDAO();   
            //foreach ($pcienteDAO->PesquisaDados($nomeTabela,$tipoPesquisa,$valor) as $res)
            foreach ($pcienteDAO->PesquisaNomes($nomeTabela,$tipoPesquisa,$valor) as $res)
                {
                    $idPaciente = $res->idPaciente;
                    $nome = $res->nomePaciente;
                } 

            $numPacientes = $_SESSION['numResult'];

            /*echo "<br>tipoPesquisa => " . $tipoPesquisa;
            echo "<br>nomePaciente => " . $nomePaciente;
            echo "<br>dadosCpf => " . $dadosCpf;
            echo "<br>numProtuario => " . $numProtuario;
            echo "<br>nomeTabela => " . $nomeTabela;
            echo "<br>numPacientes => " . $numPacientes;*/
        }

    else
        {
            $idPaciente =  $_GET['id'];
            //echo "<br>idPaciente ===> " . $idPaciente;
            $numPacientes = 1;
        }

    if($numPacientes == 0)
        {
            echo "<script type='text/javascript'>alert('PACIENTE NÃO ENCONTRADO');</script>";
            echo "<script>location = '../views/pacienteEditarPesquisa.php';</script>";     
        }

    elseif($numPacientes == 1)
        {
            $dado = "idPaciente";
            $pacienteDAO = new SistemaDAO();   
            foreach ($pacienteDAO->PesquisaDados($nomeTabela,$dado,$idPaciente) as $res)
                {
                    //$idPaciente = $res->
                    $nomePaciente = $res->nomePaciente;
                    $dataNasce = $res->dataNasce;
                    $prontuario = $res->prontuario;
                    $gestante = $res->gestante;
                    $numSus = $res->numSus;
                    $dadosCpf = $res->cpf;
                    $sexo = $res->sexo;
                    $identidade = $res->identidade;
                    $orgaoEmissor = $res->orgaoEmissor;
                    $naturalidade = $res->naturalidade;
                    $nacionalidade = $res->nacionalidade;
                    $dataCadastroP = $res->dataCadastroP;
                    $idFuncionario = $res->idFuncionario;
                    $dataAltCad = $res->dataAltCad;
                    $idFuncionarioCad = $res->idFuncionario;
                }   

            $contatoDAO = new SistemaDAO();   
            foreach ($contatoDAO->PesquisaDados($nomeTabela1,$dado,$idPaciente) as $res)
                    {
                        $idContato = $res->idContato;
                        $telefone = $res->telefone;
                        $celular = $res->celular;
                        $possuiWhatsApp = $res->possuiWhatsApp;
                        $email = $res->email;
                    }   
                
            $enderecoDAO = new SistemaDAO();   
            foreach ($enderecoDAO->PesquisaDados($nomeTabela2,$dado,$idPaciente) as $res)
                {
                    $idEndereco = $res->idEndereco;
                    $logradouro = $res->logradouro;
                    $numero = $res->numero;
                    $complemento = $res->complemento;
                    $bairro = $res->bairro;
                    $cidade = $res->cidade;
                    $cep = $res->cep;
                    $uf = $res->uf;
                }

            /*echo "<br>===== Dados Pessoais ======";
            echo "<br>idPaciente => " . $idPaciente;
            echo "<br>nomePaciente => " . $nomePaciente;
            echo "<br>prontuario => " . $prontuario;
            echo "<br>gestante => " . $gestante;
            echo "<br>numSus => " . $numSus;
            echo "<br>dadosCpf => " . $dadosCpf;
            echo "<br>dataCadastroP => " . $dataCadastroP;
            echo "<br>idFuncionario => " . $idFuncionario;
            echo "<br>dataAltCad => " . $dataAltCad;
            echo "<br>idFuncionarioCad => " . $idFuncionarioCad;

            echo "<br>===== Dados contato ======";
            echo "<br>idContato => " . $idContato;
            echo "<br>telefone => " . $telefone;
            echo "<br>celular => " . $celular;
            echo "<br>possuiWhatsApp => " . $possuiWhatsApp;
            echo "<br>email => " . $email;

            echo "<br>===== Dados Endereço ======";
            echo "<br>idEndereco => " . $idEndereco;
            echo "<br>logradouro => " . $logradouro;
            echo "<br>numero => " . $numero;
            echo "<br>complemento => " . $complemento;
            echo "<br>bairro => " . $bairro;
            echo "<br>cidade => " . $cidade;
            echo "<br>cep => " . $cep;
            echo "<br>uf => " . $uf;*/


            $_SESSION['idPaciente'] = $idPaciente;
            $_SESSION['nomePaciente'] = $nomePaciente;
            $_SESSION['dataNasce'] =  $dataNasce;
            $_SESSION['prontuario'] =  $prontuario;
            $_SESSION['gestante'] =  $gestante;
            $_SESSION['numSus'] =  $numSus;
            $_SESSION['dadosCpf'] =  $dadosCpf;
            $_SESSION['sexo'] =  $sexo;
            $_SESSION['dataCadastroP'] =  $dataCadastroP;
            $_SESSION['idFuncionario'] =  $idFuncionario;
            $_SESSION['dataAltCad'] =  $dataAltCad;
            $_SESSION['idFuncionarioCad'] =  $idFuncionarioCad;

            $_SESSION['idContato'] =  $idContato;
            $_SESSION['telefone'] =  $telefone;
            $_SESSION['celular'] =  $celular;
            $_SESSION['possuiWhatsApp'] =  $possuiWhatsApp;
            $_SESSION['email'] =  $email;

            $_SESSION['idEndereco'] =  $idEndereco;
            $_SESSION['logradouro'] =  $logradouro;
            $_SESSION['numero'] =  $numero;
            $_SESSION['complemento'] =  $complemento;
            $_SESSION['bairro'] =  $bairro;
            $_SESSION['cidade'] =  $cidade;
            $_SESSION['cep'] =  $cep;
            $_SESSION['uf'] =  $uf;

            header("Location:../views/pacienteEditarDados.php");
        }

    else
        {
            echo "<br>existem => " . $numPacientes . " => pacientes";
            echo "<br>tipoPesquisa => " . $tipoPesquisa;
            echo "<br>valor => " . $valor;
            $_SESSION['tipoPesquisa'] =  $tipoPesquisa;
            $_SESSION['valor'] =  $valor;
            header("Location:../views/pacienteSelecionaEditarDados.php");
        }