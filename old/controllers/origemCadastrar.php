<?php
    include_once "../dao/DAO-sistemaCihiv.php";
    include "../models/class-origem.php";	
    include "../funcao/funcao.php";

    $idOrigem = 0;
    $origemTipo = $_POST['origem'];
    $descricao = converteMaiuscula($origemTipo[0]);
    //$descricao = $origemTipo[0];
    $cap = $origemTipo[1];
    $numOrigem = $origemTipo[2];
    $statusOrigem = "ativo";

    //VERIFICAR SE Origem EXITE
    $nomeTabela = "origem";         
    $origemDAO = new SistemaDAO();
	foreach ($origemDAO->origemPesquisa($descricao, $cap, $numOrigem) as $tipo)
        { 
            $idOrigem = $tipo->idOrigem;	
        }

    if($idOrigem != 0)
        {
            echo "<script type='text/javascript'>alert('TIPO DE ORIGEM JÁ CADASTRADA');</script>";
            echo "<script>location = '../views/origensCadastro.php';</script>"; 
        }

    else
        {
            $origem = new Origem($idOrigem, $descricao, $cap, $numOrigem, $statusOrigem);
            //echo "<br> Origems cadatro <br>";
            //$origem->exibir();                        
            $origemsDAO = new SistemaDAO();  
            $origemsDAO->OrigemTipoCadastrar($origem);    

            echo "<script type='text/javascript'>alert('TIPO DE ORIGEM CADASTRADA');</script>";
            echo "<script>location = '../views/origensCadastro.php';</script>";
        }
?>