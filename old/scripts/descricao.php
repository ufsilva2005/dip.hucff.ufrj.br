<?php include_once("../dao/conecta.php");

	$numOrigem = $_REQUEST['numOrigem'];
	
	$result_sub_cat = "SELECT * FROM origem WHERE idOrigem=$numOrigem ORDER BY descricao";
	$resultado_sub_cat = mysqli_query($conn, $result_sub_cat);
	
	while ($row_sub_cat = mysqli_fetch_assoc($resultado_sub_cat) ) {
		$sub_categorias_post[] = array(
			'idOrigem'	=> $row_sub_cat['idOrigem'],
			'descricao' => $row_sub_cat['descricao'],
		);
	}
	
	echo(json_encode($sub_categorias_post));
?>