<?php
    session_start();
    $dataInicio = filter_input(INPUT_POST, 'dataInicio');
    $dataFinal = filter_input(INPUT_POST, 'dataFinal');
    $tipoPesquisa = $_POST['pesquisa'];
    $dataAtual = date('Y-m-d');

    if($dataInicio > $dataAtual || $dataFinal > $dataAtual)
        {
            echo "<script type='text/javascript'>alert('A DATA INICIAL OU DATA FINAL NÃO PODEM SER MAIOR QUE A DATA ATUAL');</script>";
            echo "<script>location = '../views/relatorioData.php';</script>"; 
        }

    elseif($dataInicio != "" && $dataFinal != "")
        {
            if($dataInicio > $dataFinal)
            {
                echo "<script type='text/javascript'>alert('A DATA INICIAL NÃO PODE SER MAIOR QUE A DATA FINAL');</script>";
                echo "<script>location = '../views/relatorioData.php';</script>";
            }
        else
            {
                $_SESSION['dataInicio'] = $dataInicio;
                $_SESSION['dataFinal'] = $dataFinal;
                $_SESSION['tipoPesquisa'] = $tipoPesquisa;
                 
                header("Location:../views/relatorioDataVer.php");
            }
        }

    else
        {
            header("Location:../template/menuPrincipal.php");
        }
?>