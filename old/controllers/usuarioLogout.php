<?php
	session_destroy();
	//Limpa a sessao
	unset ($_SESSION['exames']);	
	unset ($_SESSION['visualizar']);
	unset ($_SESSION['editar']);
	unset ($_SESSION['cadPaciente']);
    unset ($_SESSION['cadFucionario']);
    unset ($_SESSION['administrador']);
    unset ($_SESSION['idFuncionario']);
    unset ($_SESSION['nomeFuncionario']); 
	
	$exames = "";
    $visualizar = "";
    $editar = "";
    $cadPaciente = ""; 
    $cadFucionario = "";   
    $administrador = "";   
    $idFuncionario = "";  
    $nomeFuncionario = "";   

	header("Location: ../index.php");
?>
