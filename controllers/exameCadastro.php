<?php
    include_once "../dao/DAO-sistemaCihiv.php";
    include "../models/class-tipoExame.php";	
    include "../funcao/funcao.php";

    $descExame = converteMaiuscula($_POST['descExame']);
    $statExame = $_POST['statExame'];
    $idTipoExames = 0;

    //VERIFICAR SE EXAME EXITE
    $nomeTabela = "tipoExames";
    $dado = "tipoExame";           
    $pacienteDAO = new SistemaDAO();
	foreach ($pacienteDAO->PesquisaDados($nomeTabela,$dado,$descExame) as $tipo)
        { 
            $idTipoExames = $tipo->idTipoExames;	
        }

    if($idTipoExames != 0)
        {
            echo "<script type='text/javascript'>alert('TIPO DE EXAME JÁ CADASTRADO');</script>";
            echo "<script>location = '../views/examesCadastro.php';</script>"; 
        }

    else
        {
            $exameTip = new Exame($idTipoExames, $descExame, $statExame);
            //echo "<br> exames cadatro <br>";
            //$exameTip->exibir();                        
            $examesDAO = new SistemaDAO();  
            $examesDAO->ExameTipoCadastrar($exameTip);    

            echo "<script type='text/javascript'>alert('TIPO DE EXAME CADASTRADO');</script>";
            echo "<script>location = '../views/examesCadastro.php';</script>";
        }
?>