<?php
    session_start();
	include "../funcao/funcao.php";	
	include "../models/class-funcionario.php";
    include "../models/class-permissoes.php";
	include "../dao/DAO-sistemaCihiv.php";	

    $idPermissoes = 0;
    $idFuncionario = 0;
    $nomeFuncionario = converteMaiuscula($_POST['nomeFuncionario1']);
    $cpf = $_POST['dadosCpf'];
    $login = $_POST['login'];
    $testaSenha = $_POST['senha'];
    $senha = criptoSenha($_POST['senha']);
    $status = "ativo";
    $dataCadastroF = date('Y-m-d');

    $cadPaciente = $_POST['cadPaciente'];
    $editarPaciente = $_POST['editarPaciente'];
    $verDadosPaciente = $_POST['verDadosPaciente'];
    $cadFucionario = $_POST['cadFucionario'];
    $gerenExames = $_POST['gerenExames'];
    $administrador = $_POST['administrador'];

    //VERIFICAR SE ALGUM DADO ESTÃO EM BRANCO
    if($nomeFuncionario == "" || $login == "" || $testaSenha == "")
        {
            echo "<script type='text/javascript'>alert('USUÁRIO, LOGIN OU SENHA NÃO PODEM SER EM BRANCO');</script>";
            echo "<script>location = '../views/funcionarioCadastro.php';</script>";   
        }

    
    
    $permissoes = new Permissoes($idPermissoes, $gerenExames, $verDadosPaciente, $editarPaciente, $cadPaciente, $cadFucionario, $administrador);
    //echo "<br><== permissoes ==><br>";
    //$permissoes->exibir();

    $permissoesDAO = new SistemaDAO();
	foreach ($permissoesDAO->PermissoesPesquisa($gerenExames, $verDadosPaciente, $editarPaciente, $cadPaciente, $cadFucionario, $administrador) as $resp)
        { 
            $idPermissoes = $resp->idPermissoes;	
        } 

    //echo "<br>permissoes ==> " .  $idPermissoes;

    if($idPermissoes == 0)
        {
            $permissoesDAO = new SistemaDAO();  
            $permissoesDAO->PermissoesCadastrar($permissoes); 
            $idPermissoes = $_SESSION['idPermissoes']; 
        }

    $funcionario = new Funcionario($idFuncionario, $login, $senha, $nomeFuncionario, $cpf, $status, $dataCadastroF, $idPermissoes);
    //echo "<br><== funcionario ==><br>";
    //$funcionario->exibir();
    $funcionarioDAO = new SistemaDAO();  
    $funcionarioDAO->FuncionarioCadastrar($funcionario);

    echo "<script type='text/javascript'>alert('USUÁRIO CADASTRADO COM SUCESSO');</script>";
    echo "<script>location = '../views/funcionarioCadastro.php';</script>";   
?>
            

          
