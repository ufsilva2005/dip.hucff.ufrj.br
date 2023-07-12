<?php
    session_start();
    include_once "../dao/DAO-sistemaCihiv.php";
    include "../models/class-funcionario.php";	
    include "../funcao/funcao.php";

    //iniciando o session start
    //1 => Procura funcionario
    //2 => Altera Senha
    $opcao = 0;
    $idFuncionario = 0;
    $opcao = 0;
	//session_start();	
    $opcao =  $_GET['action']; 
    if( $opcao == 1)
        {
            $nomeFuncionario = converteMaiuscula($_POST['nomeFuncionario1']);
            $dadosCpf = $_POST['dadosCpf'];

            $nomeTabela = "funcionario";
            $dado1 = "nomeFuncionario";
            $valor1 = $nomeFuncionario;
            $dado2 = "cpf";
            $valor2 = $dadosCpf;
           
            $senhaDAO = new SistemaDAO();   
            foreach ($senhaDAO->Pesquisa2Dados($nomeTabela,$dado1,$valor1,$dado2,$valor2)as $res)
                {
                    $idFuncionario = $res->idFuncionario;
                    $nomeFuncionario  = $res->nomeFuncionario;                                                       
                    $cpf = $res->cpf;
                }   
           
            if($idFuncionario == 0)
                {
                    echo "<script type='text/javascript'>alert('DADOS INCORRETOS OU USUÁRIO NÃO CADASTRADO');</script>";
                    echo "<script>location = '../index.php';</script>";     
                }

            if($idFuncionario != 0)
                {
                    $_SESSION['idFuncionario'] = $idFuncionario;  
                    $_SESSION['nomeFuncionario'] = $nomeFuncionario;  
                    $_SESSION['dadosCpf'] = $cpf;   

                    //echo $_SESSION['dadosCpf'];
                    
                    header("Location: ../views/senhaAtualiza.php");  
                }
        }  

    elseif($opcao == 2)
        {
            $senha = "";
            $login = "";
            $auxSenha = filter_input(INPUT_POST, 'senha');  
            if($auxSenha != "") 
                {
                    $senha = criptoSenha($auxSenha);
                }
            $login = $_POST['login'];
            //verificar se login existe
            $idFuncionario =  $_GET['id']; 

            if ( $senha != "" && $login != "")
                {
                    $funcionario = new funcionario($idFuncionario, $login, $senha, $nomeFuncionarioBd, $cpf, $status, $dataCadastroF, $idPermissoes);
                    //echo "<br>Login e Senha<br>";
                    //$funcionario->exibir();                    
                    $funcionariosDAO = new SistemaDAO();  
                    $funcionariosDAO->funcionarioLoginSenhaUpdate($funcionario);

                    echo "<script type='text/javascript'>alert('DADOS ATUALIZADOS');</script>";
                    echo "<script>location = '../index.php';</script>";  
                }
                 
            elseif ( $senha != "" && $login == "")
                {
                    $funcionario = new funcionario($idFuncionario, $login, $senha, $nomeFuncionarioBd, $cpf, $status, $dataCadastroF, $idPermissoes);
                    //echo "<br>Senha<br>";
                    //$funcionario->exibir();                    
                    $funcionariosDAO = new SistemaDAO();  
                    $funcionariosDAO->funcionarioSenhaUpdate($funcionario);

                    echo "<script type='text/javascript'>alert('DADOS ATUALIZADOS');</script>";
                    echo "<script>location = '../index.php';</script>";  
                }
                 
            elseif ( $senha == "" && $login != "")
                {
                    $funcionario = new funcionario($idFuncionario, $login, $senha, $nomeFuncionarioBd, $cpf, $status, $dataCadastroF, $idPermissoes);
                    //echo "<br>Login<br>";
                    //$funcionario->exibir();                    
                    $funcionariosDAO = new SistemaDAO();  
                    $funcionariosDAO->funcionarioLoginUpdate($funcionario);

                    echo "<script type='text/javascript'>alert('DADOS ATUALIZADOS');</script>";
                    echo "<script>location = '../index.php';</script>";  
                }
            
            else
                {
                    echo "<script type='text/javascript'>alert('DADOS INCORRETOS');</script>";
                    echo "<script>location = '../index.php';</script>";     
                }
        }

    else
        {
            echo "<script type='text/javascript'>alert('DADOS INCORRETOS OU USUÁRIO NÃO CADASTRADO');</script>";
            echo "<script>location = '../index.php';</script>";     
        }
?>
