<?php
	//recebemos nosso parametro vindo do form
	$parametro = isset($_POST['dadosCpf']) ? $_POST['dadosCpf'] : null;
	 if($parametro == "")
        {
			sleep(5);
            echo "<script language = JavaScript> document.cadastro.dadosCpf.focus();</script>";
            exit;            
        }	
	$msg = "";
    
    //requerimos a classe de conexão
    require_once('../dao/conexao.class.php');
    try {
            $pdo = new Conexao(); 
            $resultado = $pdo->select("SELECT * FROM funcionario WHERE cpf = '$parametro'");
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
                    echo "<script language = javascript> alert('JÁ EXISTE UM FUNCIONÁRIO NO CADASTRO COM ESTE CPF !!!' );</script>";
                    echo "<script language = javascript> document.cadastro.dadosCpf.value='' </script>";
                    echo "<script language = JavaScript> document.cadastro.dadosCpf.focus();</script>";
					exit;
                }	
        } 
   
?>
