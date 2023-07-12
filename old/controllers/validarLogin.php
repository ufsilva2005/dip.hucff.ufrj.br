<?php	
    session_start();
	include "../funcao/funcao.php";
    include "../dao/DAO-sistemaCihiv.php";  
    
    #Define variáveis para análise
    $usuarioLogin = $_POST['login'];
    $senhaLogin = $_POST['senha'];
    
    $nomeTabela = "funcionario";           
    $usuarioLoginDAO = new SistemaDAO();
    foreach($usuarioLoginDAO->VerificarLoginSenha($nomeTabela, $usuarioLogin) as $logar)
        { 	
            $idFuncionario = $logar->idFuncionario;
            $nomeFuncionario = $logar->nomeFuncionario ;
            $login = $logar->login;
            $hash = $logar->senha;	
            $idPermissoes = $logar->idPermissoes;			
        }
    $numUser = $_SESSION['numUser'];

    if($numUser != 0)
        {
            $verificaSenha = decriptoSenha($senhaLogin, $hash);
        }

    if($numUser != 0 &&  $verificaSenha != 0) 
        {
            $nomeTabela = "permissoes";
            $permissaoDAO = new SistemaDAO();
            foreach($permissaoDAO->VerificarDados($nomeTabela, $idPermissoes) as $resp)
                { 	
                    $exames = $resp->gerenExames;
                    $visualizar = $resp->verDadosPaciente;
                    $editar = $resp->editarPaciente;
                    $cadPaciente = $resp->cadPaciente;
                    $cadFucionario = $resp->cadFucionario;
                    $administrador = $resp->administrador;
                }

            $_SESSION['exames'] = $exames;
            $_SESSION['visualizar'] = $visualizar;
            $_SESSION['editar'] = $editar;
            $_SESSION['cadPaciente'] = $cadPaciente; 
            $_SESSION['cadFucionario'] = $cadFucionario;   
            $_SESSION['administrador'] = $administrador;   
            $_SESSION['idFuncionario'] = $idFuncionario;  
            $_SESSION['nomeFuncionario'] = $nomeFuncionario;   

            header("Location: ../template/menuPrincipal.php");     
        }

    else
        {
            echo "<script type='text/javascript'>alert('USUÁRIO OU SENHA INVÁLIDO(S) ');</script>";
            echo "<script>location = '../index.php';</script>";     
        }
?>
