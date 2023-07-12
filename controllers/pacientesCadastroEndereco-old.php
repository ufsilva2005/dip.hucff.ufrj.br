<?php
    session_start();
	include "../funcao/funcao.php";	
	include "../models/class-paciente.php";
    include "../models/class-contato.php";
    include "../models/class-endereco.php";
	include "../dao/DAO-sistemaCihiv.php";	
	
    $opcao =  $_GET['action'];        
	$idPaciente =  $_GET['id'];  
    $temExame = 0;

    if( $opcao == 1 && $idPaciente == 0)
        {
            //recebe dados da view
            $idExamesSolicitados = 0;	
            $numAmostraBd = 0;	
            $numAmostraCegaBd = "";
            $nomePaciente = converteMaiuscula($_POST['nome']);
            $dataNasce = $_POST['dataNasce'];
            $prontuario = $_POST['prontuario'];
            $numSus = $_POST['cartao'];
            $dadosCpf = $_POST['dadosCpf'];
            $sexo = $_POST['sexo'];
            $gestante = $_POST['gestante'];
            $telefone = $_POST['contatosTel'];
            $celular = $_POST['contatosCel'];
            $email = $_POST['contatosEmail'];
            $possuiWhatsApp = $_POST['possuiWhatsApp'];
            $cep = $_POST['cep'];
            $logradouro = converteMaiuscula($_POST['rua']);
            $numero = $_POST['number'];
            $complemento = converteMaiuscula($_POST['complement']);
            $bairro = converteMaiuscula($_POST['bairro']);
            $cidade = converteMaiuscula($_POST['cidade']);
            $uf = $_POST['uf'];
            $nomeTabela1 = "paciente";
            $idFuncionario = $_SESSION['idFuncionario'];  
            $nomeFuncionario = $_SESSION['nomeFuncionario']; 
            $idPaciente = "";
            $idContato = "";
            $idEndereco = "";
            $identidade = "";
            $orgaoEmissor = "";
            $naturalidade = "";
            $nacionalidade = "";
            $dataAmostra = "";
            $dataCadastroP = date('Y-m-d');
            $dataAltCad = "0000-00-00";
            $idFuncionarioAlt = 0;            

            $paciente = new Paciente($idPaciente, $nomePaciente, $prontuario, $gestante, $numSus, $dadosCpf, $sexo, $dataNasce, $identidade, $orgaoEmissor, $naturalidade,
            $nacionalidade, $dataCadastroP, $idFuncionario, $dataAltCad, $idFuncionarioAlt);
            $paciente->exibir();
            echo "<br>";
            $pacienteDAO = new SistemaDAO();  
            $pacienteDAO->PacienteCadastrar($paciente);
            $idPaciente = $_SESSION['idPaciente'];

            $contato = new Contatos($idContato, $telefone, $celular, $possuiWhatsApp, $email, $idPaciente);
            //echo "<br>Contatos";
            //$contato->exibir();           
            $contatoDAO = new SistemaDAO();  
            $contatoDAO->ContatoCadastrar($contato);

            $endereco = new Endereco($idEndereco, $logradouro, $numero, $complemento, $bairro, $cidade, $cep, $uf, $idPaciente);
            //echo "<br>Endereco";
            //$endereco->exibir();            
            $enderecoDAO = new SistemaDAO();  
            $enderecoDAO->EnderecoCadastrar($endereco);

            //salva dados do paciente e criar sessao com id paciente
           

            $_SESSION['nomePaciente'] = $nomePaciente;
            $_SESSION['dadosCpf'] = $dadosCpf;
            $_SESSION['numSus'] = $numSus;
            $_SESSION['prontuario'] = $prontuario;
            $_SESSION['idPaciente'] = $idPaciente;

            header("Location: ../views/pacientesExamesCadastro.php");
        }

    else
        {
            $temExame = 1;
            $dataAtual  = date('Y-m-d');
            $nomeTabela = "paciente";
            $dado = "idPaciente";   
            $pacienteDAO = new SistemaDAO();
            foreach ($pacienteDAO->PesquisaDados($nomeTabela,$dado,$idPaciente) as $paciente)
                { 
                    $idPaciente = $paciente->idPaciente;
                    $nomePaciente = $paciente->nomePaciente;	
                    $prontuario = $paciente->prontuario;	 
                    $gestante = $paciente->gestante;     
                    $numSus = $paciente->numSus;    
                    $cpf = $paciente->cpf;				          
                }
            $_SESSION['nomePaciente'] = $nomePaciente;
            $_SESSION['dadosCpf'] = $cpf;
            $_SESSION['numSus'] = $numSus;
            $_SESSION['prontuario'] = $prontuario;
            $_SESSION['idPaciente'] = $idPaciente;

            $ultimoExameDAO = new SistemaDAO();
            foreach($ultimoExameDAO->ExamePacienteUltimo($idPaciente) as $resp)
                {
                    $numAmostra = $resp->numAmostra; 
                    $numAmostraCega = $resp->numAmostraCega; 
                    $dataAmostra = formatarData2($resp->dataAmostra);                                              
                    $dataCadastroE = $resp->dataCadastroE; 
                    $numOrigem = $resp->numOrigem; 
                    $tiposExames =$resp->tiposExames;                   
                }

            if($dataCadastroE == $dataAtual)
                {
                    echo "<script type='text/javascript'>alert('ESTE PACIENTE JÁ FOI CADASTRADO HOJE !!');</script>";
                    echo "<script>location = '../views/pacientesCadastro.php';</script>";     
                }

            else
                {
                    $_SESSION['dataAmostra'] = $dataAmostra;
                    $_SESSION['datUltimoCad'] = formatarData2($dataCadastroE);
                    $_SESSION['tiposExames'] = $tiposExames;
                    $_SESSION['temExame'] = $temExame;

                    $tiposExames =  unserialize($tiposExames);
                    $t = sizeof($tiposExames);
                    $result = count($tiposExames);
                    for ($i = 0; $i < $t; $i++) 
                        {
                            $id = $tiposExames[$i];
                            $nomeTabela3 = "tipoExames";
                            $dado3 = "idTipoExames";
                            $exame1DAO = new SistemaDAO();
                            foreach ($exame1DAO->PesquisaDados($nomeTabela3,$dado3,$id) as $resp)
                                { 
                                    $tipoExame = $resp->tipoExame . "&emsp;";  
                                }
                        }   
                    header("Location: ../views/pacientesExamesCadastro.php");
                }
        }
?>
