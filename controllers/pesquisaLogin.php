<?php
	//recebemos nosso parametro vindo do form
	$parametro1 = isset($_POST['login']) ? $_POST['login'] : null;
	//echo $parametro;
	 if($parametro1 == "")
        {
			sleep(5);
            //echo "<script language=javascript>alert( 'O CAMPO NUMERO NAO PODE SER EM BRANCO !' );</script>";
            echo "<script language = JavaScript> document.cadastro.login.focus();</script>";
            exit;            
        }	
	$msg = "";
				
    //requerimos a classe de conexão
    require_once('../dao/conexao.class.php');
    try {
            $pdo = new Conexao(); 
            $resultado = $pdo->select("SELECT * FROM funcionario WHERE login = '$parametro1'");
            $pdo->desconectar();
								
        }
    catch (PDOException $e)
        {
            echo $e->getMessage();
        }
        
    //resgata os dados na tabela
    if(count($resultado))
        {
            foreach ($resultado as $res) 
                {
                    echo "<script language = javascript> alert( 'JÁ EXISTE UM FUNCIONÁRIO NO CADASTRO COM ESTE LOGIN !!!' );</script>";
                    echo "<script language = javascript> document.cadastro.login.value='' </script>";
                    echo "<script language = JavaScript> document.cadastro.login.focus();</script>";
					exit;
                }	
        } 
   
?>
