<?php
    include('../dao/conecta.php');
    $idOrigem = $_GET['descricao'];

	//Criar a conexão
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

    $resultCodigo = "SELECT * FROM origem WHERE idOrigem = '$idOrigem'";
	$resultadoCodigo = mysqli_query($conn, $resultCodigo);
	if($resultadoCodigo->num_rows)
		{
			$rowCap = mysqli_fetch_assoc($resultadoCodigo);
			$valores['codigo'] = $rowCap['cap'];	
		}
        
    $codigo = $valores['codigo']; 
    echo $codigo;
?>