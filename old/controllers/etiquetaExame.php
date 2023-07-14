<?php
    session_start();
    include_once "../dao/DAO-sistemaCihiv.php";
    include "../models/class-tipoExame.php";	
    include "../models/class-exameSolicitado.php";	
    include "../funcao/funcao.php";

    $idTipoExames = 0;	
    $totalEtiquetas = 0;
    $total = 0;
    $numAmostraCega = 0;
    $numAmostra = 0;
    $quantidade = 0;
    $imprimir = 0;
    $idExamesSolicitados = 0;

    $quantidade = $_POST['quantidade'];   
    $numOrigem = trim($_POST['numOrigem']); 
    $numAmostra = trim($_POST['numAmostra']);  
    $numAmostraCega = trim($_POST['numAmostraCega']);   
    $nomeP = trim($_POST['nomePaciente']);  
	$idTipoExames = $_GET['idE'];     

    $tamanho = strlen($nomeP);
    if($tamanho > 25)
        { 
           $nome = substr($nomeP,0,24);
        }

    else
        {
            $nome = $nomeP;
        }

    $t = sizeof($quantidade);
    for ($i = 0; $i < $t; $i++) 
        {
            $total += $quantidade[$i];
        }

    $q1 = intdiv($total,3);
    $q2 = $total % 3;

    if($q2 != 0)
        {
            $totalEtiquetas = $q1 + 1;
        }
    else
        {
            $totalEtiquetas = $q1;
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

    $_SESSION['etiqueta'] = $etiqueta;

    //echo "<br>etiqueta 2 => " . $_SESSION['etiqueta'];


    //
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
    //

    //update exames Solicitados coloncar imprimir = 1
    $imprimir = 1;
    $idExamesSolicitados = $idTipoExames;
    $exameSolic = new ExameSolicitado($idExamesSolicitados,$numAmostra, $numAmostraCega, $dataCadastroE, $horaCadastro, $dataAmostra, $tiposExames, 
    $idFuncionario, $idPaciente, $idOrigem, $imprimir);
    //echo "<br>etiquetas exames<br>";
    //$exameSolic->exibir();
            
    $exameSolicDAO = new SistemaDAO();  
    $exameSolicDAO->ExameSolicUpdate2($exameSolic);

    header("Location: ../views/etiquetasImprimindoP.php");   

?>