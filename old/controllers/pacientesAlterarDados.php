<?php
    session_start();
	include "../funcao/funcao.php";	
	include "../models/class-paciente.php";
    include "../models/class-contato.php";
    include "../models/class-endereco.php";
	include "../dao/DAO-sistemaCihiv.php";	
	
    $nomePaciente = "";
	$dadosCpf = "";
    $numSus = "";
    $identidade = "";
    $orgaoEmissor = "";
    $naturalidade = "";
    $nacionalidade = "";
    $dataAltCad = date('Y-m-d');
    $auxP = 0;
    $auxC = 0;
    $auxE = 0;

    //dados antigos
    $idPaciente = $_SESSION['idPaciente'];
    //$_SESSION['nomePaciente'] = $nomePaciente;
    //$_SESSION['prontuario'] =  $prontuario;
    //$_SESSION['gestante'] =  $gestante;
    //$_SESSION['numSus'] =  $numSus;
    //$_SESSION['dadosCpf'] =  $dadosCpf;
    //$_SESSION['sexo'] =  $sexo;
    $dataCadastroP = $_SESSION['dataCadastroP'];
    $idFuncionarioAlt = $_SESSION['idFuncionario'];    
    //$_SESSION['dataAltCad'] =  $dataAltCad;
    $idFuncionarioCad = $_SESSION['idFuncionarioCad'];

    $idContato = $_SESSION['idContato'];
    //$_SESSION['telefone'] =  $telefone;
    //$_SESSION['celular'] =  $celular;
    //$_SESSION['possuiWhatsApp'] =  $possuiWhatsApp;
    //$_SESSION['email'] =  $email;

    $idEndereco = $_SESSION['idEndereco'];
    //$_SESSION['logradouro'] =  $logradouro;
    //$_SESSION['numero'] =  $numero;
    //$_SESSION['complemento'] =  $complemento;
    //$_SESSION['bairro'] =  $bairro;
    //$_SESSION['cidade'] =  $cidade;
    //$_SESSION['cep'] =  $cep;
    //$_SESSION['uf'] =  $uf;

	//recebe dados novos da view    
    $nomeAlt = converteMaiuscula($_POST['nome']);
    $dataNasceAlt = $_POST['dataNasce'];
    $prontuarioAlt = $_POST['prontuario'];
    $cartaoAlt = $_POST['cartao'];
    $cpfAlt = $_POST['dadosCpf'];
    $sexoAlt = $_POST['sexo'];
    $gestanteAlt = $_POST['gestante'];
    $contatosTelAlt = $_POST['contatosTel'];
    $contatosCelAlt = $_POST['contatosCel'];
    $contatosEmailAlt = $_POST['contatosEmail'];
    $WhatsAppAlt = $_POST['possuiWhatsApp'];
    $cepAlt = $_POST['cep'];
    $ruaAlt = converteMaiuscula($_POST['rua']);
    $numeroAlt = $_POST['number'];
	$complementoAlt = converteMaiuscula($_POST['complement']);
    $bairroAlt = converteMaiuscula($_POST['bairro']);
    $cidadeAlt = converteMaiuscula($_POST['cidade']);
    $ufAlt = $_POST['uf'];

    //verifica se houve alteração dados pessoais
    if($_SESSION['nomePaciente'] != $nomeAlt || $_SESSION['dataNasce'] !=  $dataNasceAlt || $_SESSION['prontuario'] !=  $prontuarioAlt || $_SESSION['gestante'] !=  $gestanteAlt ||
    $_SESSION['numSus'] !=  $cartaoAlt || $_SESSION['dadosCpf'] !=  $cpfAlt || $_SESSION['sexo'] !=  $sexoAlt)
        {
            $auxP = 1;
            $paciente = new Paciente($idPaciente, $nomeAlt, $dataNasceAlt, $prontuarioAlt, $gestanteAlt, $cartaoAlt, $cpfAlt, $sexoAlt, $identidade, $orgaoEmissor, $naturalidade,
            $nacionalidade, $dataCadastroP, $idFuncionarioCad, $dataAltCad, $idFuncionarioAlt);
            //echo "<br>dados Pessoais<br>";
            //$paciente->exibir();
            $pacienteDAO = new SistemaDAO();  
            $pacienteDAO->PacienteUpdate($paciente);
            $idPaciente = $_SESSION['idPaciente'];
        }

    //verifica contatos
    if($_SESSION['telefone'] !=  $contatosTelAlt || $_SESSION['celular'] !=  $contatosCelAlt || $_SESSION['possuiWhatsApp'] !=  $WhatsAppAlt ||
        $_SESSION['email'] !=  $contatosEmailAlt)
        {
            $auxC = 1;
            $contato = new Contatos($idContato, $contatosTelAlt, $contatosCelAlt, $WhatsAppAlt, $contatosEmailAlt, $idPaciente);
            //echo "<br>Contatos<br>";
            //$contato->exibir();           
            $contatoDAO = new SistemaDAO();  
            $contatoDAO->ContatoUpdate($contato);

            if($auxP == 0 && $auxE == 0)
                {
                    $paciente = new Paciente($idPaciente, $nomeAlt, $dataNasceAlt, $prontuarioAlt, $gestanteAlt, $cartaoAlt, $cpfAlt, $sexoAlt, $identidade, $orgaoEmissor, $naturalidade,
                    $nacionalidade, $dataCadastroP, $idFuncionarioCad, $dataAltCad, $idFuncionarioAlt);
                    //echo "<br>dados Pessoais<br>";
                    //$paciente->exibir();
                    $pacienteDAO = new SistemaDAO();  
                    $pacienteDAO->PacienteUpdate2($paciente);
                }
        }

    //verifica endereço
    if($_SESSION['logradouro'] !=  $ruaAlt || $_SESSION['numero'] !=  $numeroAlt || $_SESSION['complemento'] !=  $complementoAlt ||
        $_SESSION['bairro'] !=  $bairroAlt || $_SESSION['cidade'] !=  $cidadeAlt || $_SESSION['cep'] !=  $cepAlt || $_SESSION['uf'] !=  $ufAlt)
        {
            $auxE = 1;
            $endereco = new Endereco($idEndereco, $ruaAlt, $numeroAlt, $complementoAlt, $bairroAlt, $cidadeAlt, $cepAlt, $ufAlt, $idPaciente);
            //echo "<br>Endereco<br>";
            //$endereco->exibir();            
            $enderecoDAO = new SistemaDAO();  
            $enderecoDAO->EnderecoUpdate($endereco);
            if($auxP == 0 && $auxC == 0)
                {
                    $paciente = new Paciente($idPaciente, $nomeAlt, $dataNasceAlt, $prontuarioAlt, $gestanteAlt, $cartaoAlt, $cpfAlt, $sexoAlt, $identidade, $orgaoEmissor, $naturalidade,
                    $nacionalidade, $dataCadastroP, $idFuncionarioCad, $dataAltCad, $idFuncionarioAlt);
                    //echo "<br>dados Pessoais<br>";
                    //$paciente->exibir();
                    $pacienteDAO = new SistemaDAO();  
                    $pacienteDAO->PacienteUpdate2($paciente);
                }                        
        }   
    
    if($auxP == 0 && $auxC == 0 && $auxE == 0)
        {
            echo "<script type='text/javascript'>alert('NENHUM DADO FOI ALTERADO');</script>";
            echo "<script>location = '../views/pacienteEditarPesquisa.php';</script>";     
        }
    else
        {
            echo "<script type='text/javascript'>alert('DADO(S) ALTERADOS COM SUCESSO');</script>";
            echo "<script>location = '../views/pacienteEditarPesquisa.php';</script>";     
        }

   