<?php
    session_start();
    include_once "../dao/DAO-sistemaCihiv.php";
    include "../models/class-funcionario.php";	
    include "../models/class-permissoes.php";	
    include "../funcao/funcao.php";

    //iniciando o session start
    //1 => EDITAR funcionario
    //2 => ATIVAR funcionario
    //3 => DESATIVAR funcionario
    //4 => funcionario Update
    $_GET['ret'] = "";
	//session_start();	
    $opcao =  $_GET['action']; 
    $retorno =  $_GET['ret'];        
	$idFuncionario =  $_GET['id'];  
    $nomeTabela = "funcionario";
    $dado = "idFuncionario";
    $idPermissoesAlt = 0;
    $auxPermissoes = 0;   
    $senha = "";

    $funcionariosDAO = new SistemaDAO();   
    foreach ($funcionariosDAO->PesquisaDados($nomeTabela,$dado,$idFuncionario) as $res)
        {
            $idFuncionarioBd = $res->idFuncionario;
            $login = $res->login;
            $nomeFuncionarioBd  = $res->nomeFuncionario;   
            $cpf = $res->cpf;                                                 
            $statusBd = $res->status;
            $dataCadastroF = $res->dataCadastroF;
            $idPermissoes = $res->idPermissoes;
        }     

    if ($opcao == 1)  
		{
            $_SESSION['idFuncionario'] = $idFuncionario;
            $_SESSION['login'] = $login;
            $_SESSION['nomeFuncionarioBd'] = $nomeFuncionarioBd;            
            $_SESSION['cpf'] = $cpf;
            $_SESSION['statusBd'] = $statusBd;
            $_SESSION['dataCadastroF'] = $dataCadastroF;
            $_SESSION['idPermissoes'] = $idPermissoes;

            $nomeTabela = "permissoes";
            $dado = "idPermissoes";
            $permissoesDAO = new SistemaDAO();   
            foreach ($permissoesDAO->PesquisaDados($nomeTabela,$dado,$idPermissoes) as $res)
                {
                    $idPermissoes = $res->idPermissoes;
                    $gerenExames = $res->gerenExames;
                    $verDadosPaciente  = $res->verDadosPaciente;   
                    $editarPaciente = $res->editarPaciente;                                                 
                    $cadPaciente = $res->cadPaciente;
                    $cadFucionario = $res->cadFucionario;
                    $administrador = $res->administrador;
                }     

            $_SESSION['gerenExamesF'] = $gerenExames;
            $_SESSION['verDadosPacienteF'] = $verDadosPaciente;   
            $_SESSION['editarPacienteF'] = $editarPaciente;                                                 
            $_SESSION['cadPacienteF'] = $cadPaciente;
            $_SESSION['cadFucionarioF'] = $cadFucionario;
            $_SESSION['administradorF'] = $administrador;

            $_SESSION['auxRetorono'] = $retorno; 
            header("Location: ../views/funcionarioEditar.php");
        }

    elseif ($opcao == 3 || $opcao == 2)  
		{
            $_SESSION['nome']=$nomeFuncionarioBd;

            if($opcao == 2)
                {
                    $status = "ativo";
                }
            if($opcao == 3)
                {
                    $status = "inativo";
                }

            $funcionario = new funcionario($idFuncionario, $login, $senha, $nomeFuncionarioBd, $cpf, $status, $dataCadastroF, $idPermissoes);
            //echo "<br> inativar/ativar funcionarios <br>";
            //$funcionario->exibir();
            
            $funcionariosDAO = new SistemaDAO();  
            $funcionariosDAO->funcionarioStatusUpdate($funcionario);
            if($retorno == 1)
                {                    
                    header("Location: ../views/funcionarioNomeGerenciar.php");
                }

            else
                {
                    header("Location: ../views/funcionarioGerTodos.php");
                }
           
        }
        
    elseif ($opcao == 4)  
            {
                $retorno = $_SESSION['auxRetorono'];
                 
                $descfuncionario = converteMaiuscula($_POST['nomeAlt']);
                $statfuncionario = $_POST['statusAlt'];
                $cadPaciente = $_POST['cadPaciente'];
                $cpf = $_POST['dadosCpf'];
                $loginAlt = $_POST['loginAlt'];
                $statusAlt = $_POST['statusAlt'];
                $editarPaciente = $_POST['editarPaciente'];
                $verDadosPaciente = $_POST['verDadosPaciente'];
                $cadFucionario = $_POST['cadFucionario'];
                $gerenExames = $_POST['gerenExames'];
                $administrador = $_POST['administrador'];

                $nomeFuncionarioBd = $_SESSION['nomeFuncionarioBd'];
                $status = $_SESSION['statusBd'];
                $login = $_SESSION['login'];

                if($nomeFuncionarioBd !=  $descfuncionario)
                    {
                        $nomeFuncionarioAlt =  $descfuncionario;
                    }
                else
                    {
                        $nomeFuncionarioAlt =  $nomeFuncionarioBd;
                    }

                if($loginAlt !=  $login)
                    {
                        $loginBd =  $loginAlt;
                    }
                else
                    {
                        $loginBd =  $login;
                    }

                if($statusAlt !=  $status)
                    {
                        $statusBd =  $statusAlt;
                    }
                else
                    {
                        $statusBd =  $status;
                    }
                            
                $permissoes = new Permissoes($idPermissoes, $gerenExames, $verDadosPaciente, $editarPaciente, $cadPaciente, $cadFucionario, 
                $administrador);
                //echo "<br><== permissoes ==><br>";
                //$permissoes->exibir();
            
                $permissoesDAO = new SistemaDAO();
                foreach ($permissoesDAO->PermissoesPesquisa($gerenExames, $verDadosPaciente, $editarPaciente, $cadPaciente, $cadFucionario, 
                $administrador) as $resp)
                    { 
                        $idPermissoesAlt = $resp->idPermissoes;	
                    }             
              
                if($idPermissoesAlt == 0)
                    {
                        $permissoesDAO = new SistemaDAO();  
                        $permissoesDAO->PermissoesCadastrar($permissoes); 
                        $idPermissoesAlt = $_SESSION['idPermissoes'];
                    }
                if($idPermissoes == $idPermissoesAlt)
                    {
                        $auxPermissoes = 1;
                    }
                else
                    {
                        $idPermissoes = $idPermissoesAlt;
                    }

                if ($descfuncionario != $nomeFuncionarioBd || $statfuncionario != $status || $auxPermissoes != 1)
                    {
                        $funcionario = new funcionario($idFuncionario, $loginBd, $senha, $nomeFuncionarioAlt, $cpf, $statusBd, $dataCadastroF,
                        $idPermissoes);
                        //echo "<br> inativar/ativar funcionarios <br>";
                        //$funcionario->exibir();                        
                        $funcionariosDAO = new SistemaDAO();  
                        $funcionariosDAO->FuncionarioTipoUpdate($funcionario);

                        
                        
                        echo "<script type='text/javascript'>alert('A ALTERAÇÃO FOI EFETUADA');</script>";

                        if($retorno == 1)
                            {                    
                               echo "<script>location = ('../views/funcionarioNomeGerenciar.php');</script>";
                            }

                        else
                            {
                               echo "<script>location = ('../views/funcionarioGerTodos.php');</script>"; 
                            }
                    }
                else
                    {
                        echo "<script type='text/javascript'>alert('NENHUMA ALTERAÇÃO FOI EFETUADA');</script>";
                        if($retorno == 1)
                            {                    
                                echo "<script>location = ('../views/funcionarioNomeGerenciar.php');</script>";
                            }

                        else
                            {
                                echo "<script>location = ('../views/funcionarioGerTodos.php');</script>"; 
                            }
                    }
                
                //header("Location: ../views/funcionariosEditar.php");
            }
     else  
		{
            header("Location: ../views/funcionariosGerenciar.php");
        }
        
?>