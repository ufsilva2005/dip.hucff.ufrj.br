<?php
    session_start();
	include "../funcao/funcao.php";	
    include "../dao/DAO-sistemaCihiv.php";
    include "../models/class-exameSolicitado.php";

    $idExamesAnt = $_GET['idE'];
    $idPaciente = $_GET['id'];
    $idExames = $_POST['tipoExames'];   

    if($idExames != "")
        {
            $tiposExames = serialize($idExames); 
        }
    else
        {
            $tiposExames = 0;
        }
        
    $numOrigem = filter_input(INPUT_POST, 'numOrigem');
    $numOrigemAnt = $_SESSION['numOrigemAnt'];

    if($numOrigem != "")
        {
            $numOrigemBd = $numOrigem; 
        }
    else
        {
            $numOrigemBd = $numOrigemAnt; 
        }

    if($tiposExames == 0 && $numOrigem == "")
        {
            echo "<script type='text/javascript'>alert('NENHUMA ALTERAÇÃO FOI EFETUADA');</script>";
            echo "<script>location = '../views/retificarExamesPacientes.php';</script>"; 
        }
    else
        {
            $exameDAO = new SistemaDAO();
            foreach($exameDAO->ListarExameRetificar($idPaciente,$idExamesAnt) as $resp)
                { 
                    $tiposExamesAnt =$resp->tiposExames;                             
                } 

            if($tiposExames != 0)
                {
                    //verifica tamanho dos arrays
                    $tamExamesAnt = sizeof(unserialize($tiposExamesAnt));
                    $resultExamesAnt = count(unserialize($tiposExamesAnt));
                    $tamExames = sizeof(unserialize($tiposExames));
                    $resultExames = count(unserialize($tiposExames));
                }

            if($resultExamesAnt == $resultExames && $tiposExames != 0)
                {
                    $tiposExames1 = unserialize($tiposExamesAnt);
                    $tiposExames2 = unserialize($tiposExames);

                    $result1=array_diff($tiposExames1,$tiposExames2);
                    $tam1 = count($result1);

                    $result2=array_diff($tiposExames2,$tiposExames1);
                    $tam2 = count($result2);

                    if($tam1 == 0 && $tam2 == 0 )
                        {
                            //echo "<br>nenhuma alteração"; 
                            $tiposExamesBd = $tiposExamesAnt;
                        }
                    else 
                        {
                            //echo "<br>alteração efetuada"; 
                            $tiposExamesBd = $tiposExames;
                        }
                }
            else
                {
                    if($tiposExames == 0)
                        {
                            $tiposExamesBd = $tiposExamesAnt;
                        }
                    else
                        {
                            $tiposExamesBd = $tiposExames;
                        }
                }

            $exameAltDAO = new SistemaDAO();
			$exameAltDAO->RetificarExamePaciente($idPaciente, $idExamesAnt, $tiposExamesBd, $numOrigemBd);       
            header("Location:../views/retificarExamesPacientes.php");  
        }     
?>