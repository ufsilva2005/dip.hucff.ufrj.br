<?php
    session_start();
    include_once "../dao/DAO-sistemaCihiv.php";
    include "../models/class-tipoExame.php";	
    include "../models/class-exameSolicitado.php";
    include "../funcao/funcao.php";

    
    $idExamesSolicitados = $_GET['id'];
    $quantidade = $_POST['quantidade'];
    $acao = $_GET['action'];    
   
    $q1 = intdiv($quantidade,3);
    $q2 = $quantidade % 3;

    if($q2 != 0)
        {
            $totalEtiquetas = $q1 + 1;
        }
    else
        {
            $totalEtiquetas = $q1;
        }

    $nomeTabela = "examesSolicitados";
    $dado = "idExamesSolicitados";
    $etiquetaDAO = new SistemaDAO();
    foreach($etiquetaDAO->EtiqutasDados($idExamesSolicitados)  as $resp)
        { 	
            $numAmostra = $resp->numAmostra;
            $numAmostraCega = $resp->numAmostraCega;
            $nomeP = $resp->nomePaciente;
            $numOrigem = $resp->numOrigem;
        }

    $tamanho = strlen($nomeP);
    if($tamanho > 25)
        { 
           $nome = substr($nomeP,0,24);
        }

    else
        {
            $nome = $nomeP;
        }


    if($numAmostra == 0)
        {
            $codigo = "Lab - " . $numAmostraCega;
            $qrcode = $numAmostraCega;
        }
    else
        {
            $codigo = "Lab - " . $numAmostra;
            $qrcode = $numAmostra;
        }

    $etiqueta="^XA
    ^PQ" . $totalEtiquetas .
    "^MD5
    ^CF0,20
    ^FO70,20^FD" . $codigo . "^FS
    ^CF0,16
    ^FO40,50^FD" . $nome . "^FS
    ^FO95,65^BQ,2,4^FDQA," . $qrcode . "^FS
    ^CF0,20
    ^FO80,170^FDOrigem - " . $numOrigem . "^FS

    ^CF0,20
    ^FO330,20^FD" . $codigo . "^FS
    ^CF0,16
    ^FO300,50^FD" . $nome . "^FS
    ^FO355,65^BQ,2,4^FDQA," . $qrcode . "^FS
    ^CF0,20
    ^FO340,170^FDOrigem - " . $numOrigem . "^FS

    ^CF0,20
    ^FO590,20^FD" . $codigo . "^FS
    ^CF0,16
    ^FO560,50^FD" . $nome . "^FS
    ^FO615,65^BQ,2,4^FDQA," . $qrcode . "^FS
    ^CF0,20
    ^FO600,170^FDOrigem - " . $numOrigem . "^FS
    ^XZ";
    
    $curl = curl_init();
    // adjust print density (8dpmm), label width (4 inches), label height (6 inches), and label index (0) as necessary
    curl_setopt($curl, CURLOPT_URL, "http://api.labelary.com/v1/printers/8dpmm/labels/4x1/0/");
    curl_setopt($curl, CURLOPT_POST, TRUE);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $etiqueta);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    //curl_setopt($curl, CURLOPT_HTTPHEADER, array("Accept: application/png")); // omit this line to get PNG images back
    $result = curl_exec($curl);

    if (curl_getinfo($curl, CURLINFO_HTTP_CODE) == 200) 
        {
            $file = fopen("../imgEtiqueta/label.png", "w"); // change file name for PNG images
            fwrite($file, $result);
            fclose($file);
        } 
    else
        {
            print_r("Error: $result");
        }

    curl_close($curl);

    $_SESSION['etiqueta'] = $etiqueta;
    $_SESSION['acao'] = $acao;
    //echo "<br>etiqueta 2 => " . $_SESSION['etiqueta'];
    
    //update exames Solicitados imprimir = 1
    $imprimir = 1;
    $exameSolic = new ExameSolicitado($idExamesSolicitados, $numAmostra, $numAmostraCega, $dataCadastroE, $horaCadastro, $dataAmostra, $tiposExames, 
    $idFuncionario, $idPaciente, $idOrigem, $imprimir);
    //echo "<br> inativar/ativar exames <br>";
    //$exameSolic->exibir();
            
    $exameSolicDAO = new SistemaDAO();  
    $exameSolicDAO->ExameSolicUpdate2($exameSolic);

    //if($acao == )
    header("Location: ../views/etiquetasImprimindoE.php");  
    
?>