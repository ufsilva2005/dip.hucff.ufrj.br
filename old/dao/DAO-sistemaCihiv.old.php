<?php
    include('Database.php');
    class SistemaDAO 
        {
            //INÍCIO DAS FUNÇÕES COMUNS AO SISTEMA       

            public function VerificarLoginSenha($nomeTabela, $login) 
                {					
                    $conn = Database::connect();
                    
                    $conn->exec('SET CHARACTER SET utf8');
                    
                    $sql = "SELECT * FROM $nomeTabela WHERE login = '$login' AND status = 'ativo'";
                    
                    try 
                        {
                            $listar = $conn->query($sql);
                            $buscar = $listar->fetchAll(PDO::FETCH_OBJ);
                            $numRows = $listar->rowCount();
                        } 
                    catch (PDOException $exc)
                        {
                            $buscar = $exc->getTraceAsString();
                        }
                        
                    $_SESSION['numUser'] = $numRows;
                    return $buscar;
                    $conn = null;	
                }
              
            public function VerificarDados($nomeTabela, $idPermissoes) 
                {					
                    $conn = Database::connect();
                    
                    $conn->exec('SET CHARACTER SET utf8');
                    
                    $sql = "SELECT * FROM $nomeTabela WHERE idPermissoes = '$idPermissoes' ";
                    
                    try 
                        {
                            $listar = $conn->query($sql);
                            $buscar = $listar->fetchAll(PDO::FETCH_OBJ);
                            $numRows = $listar->rowCount();
                        } 
                    catch (PDOException $exc)
                        {
                            $buscar = $exc->getTraceAsString();
                        }
                                          
                    $_SESSION['numUser'] = $numRows;
                    return $buscar;
                    $conn = null;	
                }

            public function PesquisaDados($nomeTabela,$dado,$valor)
                {					
                    $conn = Database::connect();                                
                    $conn->exec('SET CHARACTER SET utf8');                                
                    $sql = "SELECT * FROM $nomeTabela WHERE $dado = '$valor'";
                                        
                    try 
                        {
                            $listar = $conn->query($sql);
                            $buscar = $listar->fetchAll(PDO::FETCH_OBJ);                            
                            $numRows = $listar->rowCount();
                        } 
                    catch (PDOException $exc)
                        {
                            $buscar = $exc->getTraceAsString();
                        }            
                    
                    $_SESSION['numResult'] = $numRows;
                    return $buscar;
                    $conn = null;	
                }	           

            public function PesquisaNomes($nomeTabela,$dado,$valor)
                {					
                    $conn = Database::connect();                                
                    $conn->exec('SET CHARACTER SET utf8');                                
                    $sql = "SELECT * FROM $nomeTabela WHERE $dado LIKE '$valor%'";
                                        
                    try 
                        {
                            $listar = $conn->query($sql);
                            $buscar = $listar->fetchAll(PDO::FETCH_OBJ);                            
                            $numRows = $listar->rowCount();
                        } 
                    catch (PDOException $exc)
                        {
                            $buscar = $exc->getTraceAsString();
                        }            
                    
                    $_SESSION['numResult'] = $numRows;
                    return $buscar;
                    $conn = null;	
                }	           
            public function Pesquisa2Dados($nomeTabela,$dado1,$valor1,$dado2,$valor2)
                {					
                    $conn = Database::connect();                                
                    $conn->exec('SET CHARACTER SET utf8');                                
                    $sql = "SELECT * FROM $nomeTabela 
                    WHERE $dado1 = '$valor1' 
                    AND $dado2 = '$valor2'";
                                        
                    try 
                        {
                            $listar = $conn->query($sql);
                            $buscar = $listar->fetchAll(PDO::FETCH_OBJ);                            
                            $numRows = $listar->rowCount();
                        } 
                    catch (PDOException $exc)
                        {
                            $buscar = $exc->getTraceAsString();
                        }            
                    
                    $_SESSION['numResult'] = $numRows;
                    return $buscar;
                    $conn = null;	
                }	           

            public function PesquisaTodosDados($nomeTabela)
                {					
                    $conn = Database::connect();                                
                    $conn->exec('SET CHARACTER SET utf8');                                
                    $sql = "SELECT * FROM $nomeTabela";
                                        
                    try 
                        {
                            $listar = $conn->query($sql);
                            $buscar = $listar->fetchAll(PDO::FETCH_OBJ);                            
                            $numRows = $listar->rowCount();
                        } 
                    catch (PDOException $exc)
                        {
                            $buscar = $exc->getTraceAsString();
                        }            
                    
                    $_SESSION['numResult'] = $numRows;
                    return $buscar;
                    $conn = null;	
                }
          
            //FIM DAS FUNÇÕES COMUNS AO SISTEMA   
             
            //INÍCIO DAS FUNÇÕES COMUNS AOS EXAMES
            //ativar/desativar exames
            public function ExameUpdate($exame) 
                {	
                    $BdidTipoExames = $exame->getIdTipoExames();
                    //$BdtipoExame    = $exame->getTipoExame();
                    $BdstatusExame  = $exame->getStatusExame();

                    $conn = Database::connect();                    
                    $conn->exec('SET CHARACTER SET utf8');
                    
                    $prepara = $conn->prepare("UPDATE  tipoExames SET  statusExame=:statusExameBd WHERE idTipoExames=:idTipoExamesBd");
                    
                    $prepara->bindParam(":idTipoExamesBd",$BdidTipoExames);
                    //$prepara->bindParam(":tipoExameBd",$BdtipoExame);
                    $prepara->bindParam(":statusExameBd",$BdstatusExame);

                    $prepara->execute();	
                    $conn = null;
                }

            public function ExameTipoUpdate($exame) 
                {	
                    $BdidTipoExames = $exame->getIdTipoExames();
                    $BdtipoExame    = $exame->getTipoExame();
                    $BdstatusExame  = $exame->getStatusExame();

                    $conn = Database::connect();                    
                    $conn->exec('SET CHARACTER SET utf8');
                    
                    $prepara = $conn->prepare("UPDATE  tipoExames SET  tipoExame=:tipoExameBd, statusExame=:statusExameBd  WHERE idTipoExames=:idTipoExamesBd");
                    
                    $prepara->bindParam(":idTipoExamesBd",$BdidTipoExames);
                    $prepara->bindParam(":tipoExameBd",$BdtipoExame);
                    $prepara->bindParam(":statusExameBd",$BdstatusExame);

                    $prepara->execute();	
                    $conn = null;
                }

            public function ExameTipoCadastrar($exameTip) 
                {
                    $conn = Database::connect();					
                    $conn->exec('SET CHARACTER SET utf8');
                    $prepara = $conn->prepare("INSERT INTO tipoExames (tipoExame, statusExame)
                    VALUES(:BdtipoExame, :BdstatusExame)");   
            
                    //$BdidTipoExames = $exameTip->getIdTipoExames();
                    $BdtipoExame      = $exameTip->getTipoExame();
                    $BdstatusExame    = $exameTip->getStatusExame();
            
                    //$prepara->bindParam(":BdidTipoExames",$BdidTipoExames);
                    $prepara->bindParam(":BdtipoExame",$BdtipoExame);
                    $prepara->bindParam(":BdstatusExame",$BdstatusExame);
            
                    $prepara->execute();                       
                    $conn = null;
                }	

            //FIM DAS FUNÇÕES COMUNS AOS EXAMES
            
            //INÍCIO DAS FUNÇÕES COMUNS A ORIGEM
            //ativar/desativar origem
            public function OrigemUpdate($origem) 
                {	
                    $BdidOrigem = $origem->getIdOrigem();
                    $BdstatusOrigem = $origem->getStatusOrigem();

                    $conn = Database::connect();                    
                    $conn->exec('SET CHARACTER SET utf8');
                    
                    $prepara = $conn->prepare("UPDATE  origem SET  statusOrigem=:BdstatusOrigem WHERE idOrigem=:BdidOrigem");
                    
                    $prepara->bindParam(":BdidOrigem",$BdidOrigem);
                    $prepara->bindParam(":BdstatusOrigem",$BdstatusOrigem);

                    $prepara->execute();	
                    $conn = null;
                }

            public function OrigemUpdate2($origem) 
                {
                    $BdidOrigem     = $origem->getIdOrigem();
                    $Bddescricao    = $origem->getDescricao();
                    $Bdcap          = $origem->getCap();
                    $BdnumOrigem    = $origem->getNumOrigem();                    
                    $BdstatusOrigem = $origem->getStatusOrigem();

                    $conn = Database::connect();					
                    $conn->exec('SET CHARACTER SET utf8');
                    $prepara = $conn->prepare("UPDATE origem SET descricao=:Bddescricao, cap=:Bdcap, numOrigem=:BdnumOrigem, 
                    statusOrigem=:BdstatusOrigem WHERE idOrigem=:BdidOrigem");

                    $prepara->bindParam(":BdidOrigem",$BdidOrigem);
                    $prepara->bindParam(":Bddescricao",$Bddescricao);
                    $prepara->bindParam(":Bdcap",$Bdcap);
                    $prepara->bindParam(":BdnumOrigem",$BdnumOrigem);                    
                    $prepara->bindParam(":BdstatusOrigem",$BdstatusOrigem);

                    $prepara->execute();                     
                    $conn = null;
                }	

            public function origemPesquisa($descricao, $cap, $numOrigem)
                {					
                    $conn = Database::connect();                                
                    $conn->exec('SET CHARACTER SET utf8');                                
                    $sql = "SELECT * FROM origem 
                    WHERE descricao = '$descricao'
                    AND cap = '$cap' 
                    AND numOrigem = '$numOrigem'";
                                        
                    try 
                        {
                            $listar = $conn->query($sql);
                            $buscar = $listar->fetchAll(PDO::FETCH_OBJ);                            
                            $numRows = $listar->rowCount();
                        } 
                    catch (PDOException $exc)
                        {
                            $buscar = $exc->getTraceAsString();
                        }            
                    
                    $_SESSION['numResult'] = $numRows;
                    return $buscar;
                    $conn = null;	
                }	

            public function OrigemTipoCadastrar($origem) 
                {
                    $conn = Database::connect();					
                    $conn->exec('SET CHARACTER SET utf8');
                    $prepara = $conn->prepare("INSERT INTO origem (descricao, cap, numOrigem, statusOrigem)
                    VALUES(:Bddescricao, :Bdcap, :BdnumOrigem, :BdstatusOrigem)");   

                    //$BdidOrigem   = $origem->getidOrigem();
                    $Bddescricao    = $origem->getDescricao();
                    $Bdcap          = $origem->getCap();
                    $BdnumOrigem    = $origem->getNumOrigem();                    
                    $BdstatusOrigem = $origem->getStatusOrigem();

                    //$prepara->bindParam(":BdidOrigem",$BdidOrigem);
                    $prepara->bindParam(":Bddescricao",$Bddescricao);
                    $prepara->bindParam(":Bdcap",$Bdcap);
                    $prepara->bindParam(":BdnumOrigem",$BdnumOrigem);                    
                    $prepara->bindParam(":BdstatusOrigem",$BdstatusOrigem);

                    $prepara->execute();                     
                    $conn = null;
                }	
            //FIM DAS FUNÇÕES COMUNS A ORIGEM

            //INÍCIO DAS FUNÇÕES COMUNS AOS EXAMES SOLICITADOS       

            public function PesquisaNumAmostra($dataAmostra) 
                {					
                    $conn = Database::connect();
                    
                    $conn->exec('SET CHARACTER SET utf8');
                    
                    //$sql = "SELECT MAX(idExamesSolicitados) FROM examesSolicitados WHERE dataAmostra = '$dataExame'";
                    $sql = "SELECT * FROM examesSolicitados WHERE dataAmostra = '$dataAmostra' ORDER BY idExamesSolicitados DESC limit 1";
                    
                    try 
                        {
                            $listar = $conn->query($sql);
                            $buscar = $listar->fetchAll(PDO::FETCH_OBJ);
                            //$numRows = $listar->rowCount();
                        } 
                    catch (PDOException $exc)
                        {
                            $buscar = $exc->getTraceAsString();
                        }
                        
                    //$_SESSION['numUser'] = $numRows;
                    return $buscar;
                    $conn = null;	
                }

            public function PesquisaNumAmCega($dataAmostra) 
                {					
                    $conn = Database::connect();
                    
                    $conn->exec('SET CHARACTER SET utf8');
                    
                    //$sql = "SELECT MAX(idExamesSolicitados) FROM examesSolicitados WHERE dataAmostra = '$dataExame'";
                    //$sql = "SELECT * FROM examesSolicitados  ORDER BY numAmostraCega DESC limit 1";
                    $sql = "SELECT * FROM examesSolicitados WHERE dataAmostra = '$dataAmostra' ORDER BY idExamesSolicitados DESC limit 1";
                    try 
                        {
                            $listar = $conn->query($sql);
                            $buscar = $listar->fetchAll(PDO::FETCH_OBJ);
                            //$numRows = $listar->rowCount();
                        } 
                    catch (PDOException $exc)
                        {
                            $buscar = $exc->getTraceAsString();
                        }
                        
                    //$_SESSION['numUser'] = $numRows;
                    return $buscar;
                    $conn = null;	
                }
          
            public function ExaSolicitaCadastrar($exaSolicita) 
                {
                    $conn = Database::connect();					
                    $conn->exec('SET CHARACTER SET utf8');
                    $prepara = $conn->prepare("INSERT INTO examesSolicitados (numAmostra, numAmostraCega, dataCadastroE, horaCadastro, 
                    dataAmostra, tiposExames, idFuncionario, idPaciente, idOrigem, imprimir) 
                    VALUES(:BdnumAmostra, :BdnumAmostraCega, :BddataCadastroE, :BdhoraCadastro, :BddataAmostra, :BdtiposExames, 
                    :BdidFuncionario, :BdidPaciente, :BdidOrigem, :Bdimprimir)");   

                    //$BdidExamesSolicitados = $exaSolicita->getIdExamesSolicitados();
                    $BdnumAmostra     = $exaSolicita->getNumAmostra();
                    $BdnumAmostraCega = $exaSolicita->getNumAmostraCega();
                    $BddataCadastroE  = $exaSolicita->getDataCadastroE();
                    $BdhoraCadastro   = $exaSolicita->getHoraCadastro();
                    $BddataAmostra    = $exaSolicita->getDataAmostra();
                    $BdtiposExames    = $exaSolicita->getTiposExames();   
                    $BdidFuncionario  = $exaSolicita->getIdFuncionario();                 
                    $BdidPaciente     = $exaSolicita->getIdPaciente();
                    $BdidOrigem       = $exaSolicita->getIdOrigem();  
                    $Bdimprimir       = $exaSolicita->getImprimir();  


                    //$prepara->bindParam(":BdidExamesSolicitados",$BdidExamesSolicitados);
                    $prepara->bindParam(":BdnumAmostra",$BdnumAmostra);
                    $prepara->bindParam(":BdnumAmostraCega",$BdnumAmostraCega);
                    $prepara->bindParam(":BddataCadastroE",$BddataCadastroE);
                    $prepara->bindParam(":BdhoraCadastro",$BdhoraCadastro);
                    $prepara->bindParam(":BddataAmostra",$BddataAmostra);
                    $prepara->bindParam(":BdtiposExames",$BdtiposExames); 
                    $prepara->bindParam(":BdidFuncionario",$BdidFuncionario);                   
                    $prepara->bindParam(":BdidPaciente",$BdidPaciente);
                    $prepara->bindParam(":BdidOrigem",$BdidOrigem);
                    $prepara->bindParam(":Bdimprimir",$Bdimprimir);

                    $prepara->execute();                     
                    $idExamesSolic = $conn->lastInsertId();
                    $_SESSION['idExamesSolic'] = $idExamesSolic;                    
                    $conn = null;

                }	

            public function ExameSolicUpdate($exameSolic) 
                {	
                    $BdidExamesSolicitados = $exameSolic->getIdExamesSolicitados();
                    $BddataAmostra         = $exameSolic->getDataAmostra();
                    $BdidOrigem            = $exameSolic->getIdOrigem();
                    $BdidPaciente          = $exameSolic->getIdPaciente();
                    $BdtiposExames         = $exameSolic->getTiposExames();

                    $conn = Database::connect();                    
                    $conn->exec('SET CHARACTER SET utf8');
                    
                    $prepara = $conn->prepare("UPDATE  examesSolicitados SET  dataAmostra=:BddataAmostra, tiposExames=:BdtiposExames, idOrigem=:BdidOrigem 
                    WHERE idExamesSolicitados=:BdidExamesSolicitados AND idPaciente=:BdidPaciente");
                    
                    $prepara->bindParam(":BdidExamesSolicitados",$BdidExamesSolicitados);
                    $prepara->bindParam(":BddataAmostra",$BddataAmostra);
                    $prepara->bindParam(":BdtiposExames",$BdtiposExames);
                    $prepara->bindParam(":BdidPaciente",$BdidPaciente);
                    $prepara->bindParam(":BdtiposExames",$BdtiposExames);
                    $prepara->bindParam(":BdidOrigem",$BdidOrigem);

                    $prepara->execute();	
                    $conn = null;
                }

            public function ExameSolicUpdate2($exameSolic) 
                {	
                    $BdidExamesSolicitados = $exameSolic->getIdExamesSolicitados();
                    $Bdimprimir         = $exameSolic->getImprimir();

                    $conn = Database::connect();                    
                    $conn->exec('SET CHARACTER SET utf8');
                    
                    $prepara = $conn->prepare("UPDATE  examesSolicitados SET  imprimir=:Bdimprimir
                    WHERE idExamesSolicitados=:BdidExamesSolicitados");
                    
                    $prepara->bindParam(":BdidExamesSolicitados",$BdidExamesSolicitados);
                    $prepara->bindParam(":Bdimprimir",$Bdimprimir);
                    $prepara->execute();	
                    $conn = null;
                }
            public function PesquisaExamesData($idPaciente,$dataInicio,$dataFim)
                {					
                    $conn = Database::connect();                                
                    $conn->exec('SET CHARACTER SET utf8');                                
                    $sql = "SELECT * FROM examesSolicitados 
                    WHERE idPaciente = '$idPaciente' 
                    AND dataAmostra BETWEEN '$dataInicio' AND '$dataFim'";
                                        
                    try 
                        {
                            $listar = $conn->query($sql);
                            $buscar = $listar->fetchAll(PDO::FETCH_OBJ);     
                        } 
                    catch (PDOException $exc)
                        {
                            $buscar = $exc->getTraceAsString();
                        } 
                    return $buscar;
                    $conn = null;	
                }
                
            public function PesquisaTipoExamesData($dataInicio,$dataFim)
                {					
                    $conn = Database::connect();                                
                    $conn->exec('SET CHARACTER SET utf8');                                
                    $sql = "SELECT * FROM examesSolicitados 
                    WHERE dataAmostra BETWEEN '$dataInicio' AND '$dataFim'";
                                        
                    try 
                        {
                            $listar = $conn->query($sql);
                            $buscar = $listar->fetchAll(PDO::FETCH_OBJ);     
                        } 
                    catch (PDOException $exc)
                        {
                            $buscar = $exc->getTraceAsString();
                        } 
                    return $buscar;
                    $conn = null;	
                }	


            public function EtiqutasDados($idExamesSolicitados) 
                {					
                    $conn = Database::connect();    
                    $conn->exec('SET CHARACTER SET utf8');    
                    $sql = "SELECT * FROM examesSolicitados e, paciente p, origem o
                    WHERE e.idExamesSolicitados = '$idExamesSolicitados'
                    AND p.idPaciente = e.idPaciente
                    AND o.idOrigem = e.idOrigem
                    GROUP BY e.idExamesSolicitados";
                    
                    try 
                        {
                            $listar = $conn->query($sql);
                            $buscar = $listar->fetchAll(PDO::FETCH_OBJ);
                            $numRows = $listar->rowCount();
                        } 
                    catch (PDOException $exc)
                        {
                            $buscar = $exc->getTraceAsString();
                        }
                                        
                    $_SESSION['numUser'] = $numRows;
                    return $buscar;
                    $conn = null;	
                }

            public function ReimprimirEtiquetas() 
                {					
                    $conn = Database::connect();    
                    $conn->exec('SET CHARACTER SET utf8');    
                    $sql = "SELECT * FROM examesSolicitados e, paciente p, origem o
                    WHERE e.imprimir = 1
                    AND p.idPaciente = e.idPaciente
                    AND o.idOrigem = e.idOrigem
                    GROUP BY e.idExamesSolicitados";
                    
                    try 
                        {
                            $listar = $conn->query($sql);
                            $buscar = $listar->fetchAll(PDO::FETCH_OBJ);
                            $numRows = $listar->rowCount();
                        } 
                    catch (PDOException $exc)
                        {
                            $buscar = $exc->getTraceAsString();
                        }
                                        
                    $_SESSION['numUser'] = $numRows;
                    return $buscar;
                    $conn = null;	
                }

            public function ImprimirEtiquetas() 
                {					
                    $conn = Database::connect();    
                    $conn->exec('SET CHARACTER SET utf8');    
                    $sql = "SELECT * FROM examesSolicitados e, paciente p, origem o
                    WHERE e.imprimir = 0
                    AND p.idPaciente = e.idPaciente
                    AND o.idOrigem = e.idOrigem
                    GROUP BY e.idExamesSolicitados";
                    
                    try 
                        {
                            $listar = $conn->query($sql);
                            $buscar = $listar->fetchAll(PDO::FETCH_OBJ);
                            $numRows = $listar->rowCount();
                        } 
                    catch (PDOException $exc)
                        {
                            $buscar = $exc->getTraceAsString();
                        }
                                        
                    $_SESSION['numUser'] = $numRows;
                    return $buscar;
                    $conn = null;	
                }

            public function PesqTipoExame($idExamesSolicitados) 
                {					
                    $conn = Database::connect();    
                    $conn->exec('SET CHARACTER SET utf8');    
                    $sql = "SELECT * FROM examesSolicitados e, paciente p, origem o, funcionario f
                    WHERE e.idExamesSolicitados = '$idExamesSolicitados'
                    AND p.idPaciente = e.idPaciente
                    AND o.idOrigem = e.idOrigem
                    AND f.idFuncionario = e.idFuncionario
                    GROUP BY e.idExamesSolicitados";
                    
                    try 
                        {
                            $listar = $conn->query($sql);
                            $buscar = $listar->fetchAll(PDO::FETCH_OBJ);
                            $numRows = $listar->rowCount();
                        } 
                    catch (PDOException $exc)
                        {
                            $buscar = $exc->getTraceAsString();
                        }
                                        
                    $_SESSION['numUser'] = $numRows;
                    return $buscar;
                    $conn = null;	
                }


            public function RelatorioTodos() 
                {					
                    $conn = Database::connect();    
                    $conn->exec('SET CHARACTER SET utf8');    
                    $sql = "SELECT * FROM examesSolicitados e, paciente p, origem o, funcionario f
                    WHERE p.idPaciente = e.idPaciente
                    AND o.idOrigem = e.idOrigem
                    AND f.idFuncionario = e.idFuncionario
                    GROUP BY e.idExamesSolicitados ASC";
                    
                    try 
                        {
                            $listar = $conn->query($sql);
                            $buscar = $listar->fetchAll(PDO::FETCH_OBJ);
                            $numRows = $listar->rowCount();
                        } 
                    catch (PDOException $exc)
                        {
                            $buscar = $exc->getTraceAsString();
                        }
                                        
                    $_SESSION['numUser'] = $numRows;
                    return $buscar;
                    $conn = null;	
                }

            public function RelatorioTipoPeriodo($tipoPesquisa, $dataInicio, $dataFinal)
                {					
                    $conn = Database::connect();    
                    $conn->exec('SET CHARACTER SET utf8');    
                    $sql = "SELECT * FROM examesSolicitados e, paciente p, origem o, funcionario f
                    WHERE $tipoPesquisa BETWEEN '$dataInicio' AND '$dataFinal'
                    AND p.idPaciente = e.idPaciente
                    AND o.idOrigem = e.idOrigem
                    AND f.idFuncionario = e.idFuncionario
                    GROUP BY e.idExamesSolicitados ASC";
                    
                    try 
                        {
                            $listar = $conn->query($sql);
                            $buscar = $listar->fetchAll(PDO::FETCH_OBJ);
                            $numRows = $listar->rowCount();
                        } 
                    catch (PDOException $exc)
                        {
                            $buscar = $exc->getTraceAsString();
                        }
                                        
                    $_SESSION['numUser'] = $numRows;
                    return $buscar;
                    $conn = null;	
                }
                
            public function RelatorioPacientePeriodo($idPaciente,  $dataInicio, $dataFinal)
                {					
                    $conn = Database::connect();    
                    $conn->exec('SET CHARACTER SET utf8');    
                    $sql = "SELECT * FROM examesSolicitados e, paciente p, origem o, funcionario f
                    WHERE  e.idPaciente = '$idPaciente'
                    AND dataCadastroE BETWEEN '$dataInicio' AND '$dataFinal'
                    AND p.idPaciente = e.idPaciente
                    AND o.idOrigem = e.idOrigem
                    AND f.idFuncionario = e.idFuncionario
                    GROUP BY e.idExamesSolicitados DESC";
                    
                    try 
                        {
                            $listar = $conn->query($sql);
                            $buscar = $listar->fetchAll(PDO::FETCH_OBJ);
                            $numRows = $listar->rowCount();
                        } 
                    catch (PDOException $exc)
                        {
                            $buscar = $exc->getTraceAsString();
                        }
                                        
                    $_SESSION['numUser'] = $numRows;
                    return $buscar;
                    $conn = null;	
                }

            public function RelatorioPacienteTodos($idPaciente)
                {					
                    $conn = Database::connect();    
                    $conn->exec('SET CHARACTER SET utf8');    
                    $sql = "SELECT * FROM examesSolicitados e, paciente p, origem o, funcionario f
                    WHERE  e.idPaciente = '$idPaciente'
                    AND p.idPaciente = e.idPaciente
                    AND o.idOrigem = e.idOrigem
                    AND f.idFuncionario = e.idFuncionario
                    GROUP BY e.idExamesSolicitados DESC";
                    
                    try 
                        {
                            $listar = $conn->query($sql);
                            $buscar = $listar->fetchAll(PDO::FETCH_OBJ);
                            $numRows = $listar->rowCount();
                        } 
                    catch (PDOException $exc)
                        {
                            $buscar = $exc->getTraceAsString();
                        }
                                        
                    $_SESSION['numUser'] = $numRows;
                    return $buscar;
                    $conn = null;	
                }
            //FIM DAS FUNÇÕES COMUNS AOS EXAMES SOLICITADOS 
                
            //INICIO DAS FUNCOES RELACIONADAS AOS PACIENTES
            public function PacienteCadastrar($paciente) 
                {
                    $conn = Database::connect();					
                    $conn->exec('SET CHARACTER SET utf8');
                    $prepara = $conn->prepare("INSERT INTO paciente (nomePaciente, dataNasce, prontuario, gestante, numSus, cpf, sexo, identidade, 
                    orgaoEmissor, naturalidade, nacionalidade, dataCadastroP, idFuncionario, dataAltCad, idFuncionarioAlt)
                    VALUES(:BdnomePaciente, :BddataNasce, :Bdprontuario, :Bdgestante, :BdnumSus, :Bdcpf, :Bdsexo, :Bdidentidade, :BdorgaoEmissor, 
                    :Bdnaturalidade, :Bdnacionalidade, :BddataCadastroP, :BdidFuncionario, :BddataAltCad, :BdidFuncionarioAlt)");   

                    //$BdidPaciente     = $paciente->getIdPaciente();
                    $BdnomePaciente     = $paciente->getNomePaciente();
                    $BddataNasce        = $paciente->getDataNasce();
                    $Bdprontuario       = $paciente->getProntuario();
                    $Bdgestante         = $paciente->getGestante();
                    $BdnumSus           = $paciente->getNumSus();  
                    $Bdcpf              = $paciente->getCpf();
                    $Bdsexo             = $paciente->getSexo();    
                    $Bdidentidade       = $paciente->getIdentidade();
                    $BdorgaoEmissor     = $paciente->getOrgaoEmissor();
                    $Bdnaturalidade     = $paciente->getNaturalidade();
                    $Bdnacionalidade    = $paciente->getNacionalidade();
                    $BddataCadastroP    = $paciente->getDataCadastroP();
                    $BdidFuncionario    = $paciente->getIdFuncionario();
                    $BddataAltCad       = $paciente->getDataAltCad();
                    $BdidFuncionarioAlt = $paciente->getIdFuncionarioAlt();


                    //$prepara->bindParam(":BdidPaciente",$BdidPaciente);
                    $prepara->bindParam(":BdnomePaciente",$BdnomePaciente);
                    $prepara->bindParam(":BddataNasce",$BddataNasce);
                    $prepara->bindParam(":Bdprontuario",$Bdprontuario);
                    $prepara->bindParam(":Bdgestante",$Bdgestante);
                    $prepara->bindParam(":BdnumSus",$BdnumSus);
                    $prepara->bindParam(":Bdcpf",$Bdcpf);
                    $prepara->bindParam(":Bdsexo",$Bdsexo);
                    $prepara->bindParam(":Bdidentidade",$Bdidentidade);
                    $prepara->bindParam(":BdorgaoEmissor",$BdorgaoEmissor);
                    $prepara->bindParam(":Bdnaturalidade",$Bdnaturalidade);
                    $prepara->bindParam(":Bdnacionalidade",$Bdnacionalidade);
                    $prepara->bindParam(":BddataCadastroP",$BddataCadastroP);
                    $prepara->bindParam(":BdidFuncionario",$BdidFuncionario);
                    $prepara->bindParam(":BddataAltCad",$BddataAltCad);
                    $prepara->bindParam(":BdidFuncionarioAlt",$BdidFuncionarioAlt);

                    $prepara->execute();                            
                    $idPaciente = $conn->lastInsertId();
                    $_SESSION['idPaciente'] = $idPaciente;
                    $conn = null;
                }	

            public function PacienteUpdate($paciente) 
                {
                    $BdidPaciente       = $paciente->getIdPaciente();
                    $BdnomePaciente     = $paciente->getNomePaciente();
                    $BddataNasce        = $paciente->getDataNasce();
                    $Bdprontuario       = $paciente->getProntuario();
                    $Bdgestante         = $paciente->getGestante();
                    $BdnumSus           = $paciente->getNumSus();  
                    $Bdcpf              = $paciente->getCpf();
                    $Bdsexo             = $paciente->getSexo();    
                    $Bdidentidade       = $paciente->getIdentidade();
                    $BdorgaoEmissor     = $paciente->getOrgaoEmissor();
                    $Bdnaturalidade     = $paciente->getNaturalidade();
                    $Bdnacionalidade    = $paciente->getNacionalidade();
                    $BddataCadastroP    = $paciente->getDataCadastroP();
                    $BdidFuncionario    = $paciente->getIdFuncionario();
                    $BddataAltCad       = $paciente->getDataAltCad();
                    $BdidFuncionarioAlt = $paciente->getIdFuncionarioAlt();

                    $conn = Database::connect();                    
                    $conn->exec('SET CHARACTER SET utf8');
                    
                    $prepara = $conn->prepare("UPDATE paciente SET  nomePaciente=:BdnomePaciente, dataNasce=:BddataNasce,
                    prontuario=:Bdprontuario, gestante=:Bdgestante, numSus=:BdnumSus, cpf=:Bdcpf, sexo=:Bdsexo, identidade=:Bdidentidade, 
                    orgaoEmissor=:BdorgaoEmissor, naturalidade=:Bdnaturalidade, nacionalidade=:Bdnacionalidade, 
                    dataCadastroP=:BddataCadastroP, idFuncionario=:BdidFuncionario, dataAltCad=:BddataAltCad, 
                    idFuncionarioAlt=:BdidFuncionarioAlt WHERE idPaciente =:BdidPaciente");

                    $prepara->bindParam(":BdidPaciente",$BdidPaciente);
                    $prepara->bindParam(":BdnomePaciente",$BdnomePaciente);
                    $prepara->bindParam(":BddataNasce",$BddataNasce);
                    $prepara->bindParam(":Bdprontuario",$Bdprontuario);
                    $prepara->bindParam(":Bdgestante",$Bdgestante);
                    $prepara->bindParam(":BdnumSus",$BdnumSus);
                    $prepara->bindParam(":Bdcpf",$Bdcpf);
                    $prepara->bindParam(":Bdsexo",$Bdsexo);
                    $prepara->bindParam(":Bdidentidade",$Bdidentidade);
                    $prepara->bindParam(":BdorgaoEmissor",$BdorgaoEmissor);
                    $prepara->bindParam(":Bdnaturalidade",$Bdnaturalidade);
                    $prepara->bindParam(":Bdnacionalidade",$Bdnacionalidade);
                    $prepara->bindParam(":BddataCadastroP",$BddataCadastroP);
                    $prepara->bindParam(":BdidFuncionario",$BdidFuncionario);
                    $prepara->bindParam(":BddataAltCad",$BddataAltCad);
                    $prepara->bindParam(":BdidFuncionarioAlt",$BdidFuncionarioAlt);

                    $prepara->execute();	
                    $conn = null;
                }

            public function PacienteUpdate2($paciente)
                {
                    $BdidPaciente       = $paciente->getIdPaciente();   
                    $BddataAltCad       = $paciente->getDataAltCad();
                    $BdidFuncionarioAlt = $paciente->getIdFuncionarioAlt();

                    $conn = Database::connect();                    
                    $conn->exec('SET CHARACTER SET utf8');
                    
                    $prepara = $conn->prepare("UPDATE paciente SET  dataAltCad=:BddataAltCad, 
                    idFuncionarioAlt=:BdidFuncionarioAlt WHERE idPaciente =:BdidPaciente");

                    $prepara->bindParam(":BdidPaciente",$BdidPaciente);
                    $prepara->bindParam(":BddataAltCad",$BddataAltCad);
                    $prepara->bindParam(":BdidFuncionarioAlt",$BdidFuncionarioAlt);

                    $prepara->execute();	
                    $conn = null;
                }
            public function ContatoCadastrar($contato) 
                {
                    $conn = Database::connect();					
                    $conn->exec('SET CHARACTER SET utf8');
                    $prepara = $conn->prepare("INSERT INTO contato (telefone, celular, possuiWhatsApp, email, idPaciente)
                    VALUES(:Bdtelefone, :Bdcelular, :BdpossuiWhatsApp, :Bdemail, :BdidPaciente)");   

                    //$BdidContato     = $contato->getIdContato();
                    $Bdtelefone       = $contato->getTelefone();
                    $Bdcelular        = $contato->getCelular();
                    $BdpossuiWhatsApp = $contato->getPossuiWhatsApp();
                    $Bdemail          = $contato->getEmail();  
                    $BdidPaciente     = $contato->getIdPaciente();

                    //$prepara->bindParam(":BdidContato",$BdidContato);
                    $prepara->bindParam(":Bdtelefone",$Bdtelefone);
                    $prepara->bindParam(":Bdcelular",$Bdcelular);
                    $prepara->bindParam(":BdpossuiWhatsApp",$BdpossuiWhatsApp);
                    $prepara->bindParam(":Bdemail",$Bdemail);
                    $prepara->bindParam(":BdidPaciente",$BdidPaciente);

                    $prepara->execute();   
                    $conn = null;
                }	

            public function ContatoUpdate($contato) 
                {
                    $BdidContato      = $contato->getIdContato();
                    $Bdtelefone       = $contato->getTelefone();
                    $Bdcelular        = $contato->getCelular();
                    $BdpossuiWhatsApp = $contato->getPossuiWhatsApp();
                    $Bdemail          = $contato->getEmail();  
                    $BdidPaciente     = $contato->getIdPaciente();

                    $conn = Database::connect();                    
                    $conn->exec('SET CHARACTER SET utf8');

                    $prepara = $conn->prepare("UPDATE contato SET  telefone=:Bdtelefone, celular=:Bdcelular, 
                    possuiWhatsApp=:BdpossuiWhatsApp, email=:Bdemail, idPaciente=:BdidPaciente WHERE idContato =:BdidContato");

                    $prepara->bindParam(":BdidContato",$BdidContato);
                    $prepara->bindParam(":Bdtelefone",$Bdtelefone);
                    $prepara->bindParam(":Bdcelular",$Bdcelular);
                    $prepara->bindParam(":BdpossuiWhatsApp",$BdpossuiWhatsApp);
                    $prepara->bindParam(":Bdemail",$Bdemail);
                    $prepara->bindParam(":BdidPaciente",$BdidPaciente);

                    $prepara->execute();   
                    $conn = null;
                }

            public function EnderecoCadastrar($endereco) 
                {
                    $conn = Database::connect();					
                    $conn->exec('SET CHARACTER SET utf8');
                    $prepara = $conn->prepare("INSERT INTO endereco (logradouro, numero, complemento, bairro, cidade, cep, uf, idPaciente)
                    VALUES(:Bdlogradouro, :Bdnumero, :Bdcomplemento, :Bdbairro, :Bdcidade, :Bdcep, :Bduf, :BdidPaciente)");   

                    //$BdidEndereco  = $endereco->getIdEndereco();
                    $Bdlogradouro  = $endereco->getLogradouro();
                    $Bdnumero      = $endereco->getNumero();
                    $Bdcomplemento = $endereco->getComplemento();
                    $Bdbairro      = $endereco->getBairro();  
                    $Bdcidade      = $endereco->getCidade();
                    $Bdcep         = $endereco->getCep();    
                    $Bduf          = $endereco->getUf();
                    $BdidPaciente  = $endereco->getIdPaciente();

                    //$prepara->bindParam(":BdidEndereco",$BdidEndereco);
                    $prepara->bindParam(":Bdlogradouro",$Bdlogradouro);
                    $prepara->bindParam(":Bdnumero",$Bdnumero);
                    $prepara->bindParam(":Bdcomplemento",$Bdcomplemento);
                    $prepara->bindParam(":Bdbairro",$Bdbairro);
                    $prepara->bindParam(":Bdcidade",$Bdcidade);
                    $prepara->bindParam(":Bdcep",$Bdcep);
                    $prepara->bindParam(":Bduf",$Bduf);
                    $prepara->bindParam(":BdidPaciente",$BdidPaciente);
                    
                    $prepara->execute();       
                    $conn = null;
                }	

            public function EnderecoUpdate($endereco) 
                {
                    $BdidEndereco  = $endereco->getIdEndereco();
                    $Bdlogradouro  = $endereco->getLogradouro();
                    $Bdnumero      = $endereco->getNumero();
                    $Bdcomplemento = $endereco->getComplemento();
                    $Bdbairro      = $endereco->getBairro();  
                    $Bdcidade      = $endereco->getCidade();
                    $Bdcep         = $endereco->getCep();    
                    $Bduf          = $endereco->getUf();
                    $BdidPaciente  = $endereco->getIdPaciente();

                    $conn = Database::connect();                    
                    $conn->exec('SET CHARACTER SET utf8');

                    $prepara = $conn->prepare("UPDATE endereco SET  logradouro=:Bdlogradouro, numero=:Bdnumero, complemento=:Bdcomplemento,
                    bairro=:Bdbairro, cidade=:Bdcidade, cep=:Bdcep, uf=:Bduf, idPaciente=:BdidPaciente WHERE idEndereco =:BdidEndereco");
                    

                    $prepara->bindParam(":BdidEndereco",$BdidEndereco);
                    $prepara->bindParam(":Bdlogradouro",$Bdlogradouro);
                    $prepara->bindParam(":Bdnumero",$Bdnumero);
                    $prepara->bindParam(":Bdcomplemento",$Bdcomplemento);
                    $prepara->bindParam(":Bdbairro",$Bdbairro);
                    $prepara->bindParam(":Bdcidade",$Bdcidade);
                    $prepara->bindParam(":Bdcep",$Bdcep);
                    $prepara->bindParam(":Bduf",$Bduf);
                    $prepara->bindParam(":BdidPaciente",$BdidPaciente);
                    
                    $prepara->execute();       
                    $conn = null;   
                }
            //FIM DAS FUNCOES RELACIONADAS AOS PACIENTES

            //INÍCIO- DAS FUNCOES RELACIONADAS AS PERMISSÕES            
            public function PermissoesPesquisa($gerenExames, $verDadosPaciente, $editarPaciente, $cadPaciente, $cadFucionario, $administrador) 
                {
                    $conn = Database::connect();                    
                    $conn->exec('SET CHARACTER SET utf8');
                    
                    $sql = "SELECT * FROM permissoes
                    WHERE gerenExames = '$gerenExames'
                    AND verDadosPaciente = '$verDadosPaciente' 
                    AND editarPaciente = '$editarPaciente'
                    AND cadPaciente = '$cadPaciente'  
                    AND cadFucionario = '$cadFucionario'
                    AND administrador = '$administrador'";

                     try 
                        {
                            $listar = $conn->query($sql);
                            $buscar = $listar->fetchAll(PDO::FETCH_OBJ);                            
                            $numRows = $listar->rowCount();
                        } 
                    catch (PDOException $exc)
                        {
                            $buscar = $exc->getTraceAsString();
                        }            
                    
                    $conn = null; $_SESSION['numRows'] = $numRows;
                    return $buscar;
                    $conn = null;	
                }

            public function PermissoesCadastrar($permissoes) 
                {
                    $conn = Database::connect();					
                    $conn->exec('SET CHARACTER SET utf8');
                    $prepara = $conn->prepare("INSERT INTO permissoes (gerenExames, verDadosPaciente, editarPaciente, cadPaciente, 
                    cadFucionario, administrador)
                    VALUES(:BdgerenExames, :BdverDadosPaciente, :BdeditarPaciente, :BdcadPaciente, :BdcadFucionario, :Bdadministrador)");   

                    //$BdidPermissoes   = $permissoes->getIdPermissoes();
                    $BdgerenExames      = $permissoes->getGerenExames();
                    $BdverDadosPaciente = $permissoes->getVerDadosPaciente();
                    $BdeditarPaciente   = $permissoes->getEditarPaciente();
                    $BdcadPaciente      = $permissoes->getCadPaciente();  
                    $BdcadFucionario    = $permissoes->getCadFucionario();
                    $Bdadministrador    = $permissoes->getAdministrador();

                    //$prepara->bindParam(":BdidPermissoes",$BdidPermissoes);
                    $prepara->bindParam(":BdgerenExames",$BdgerenExames);
                    $prepara->bindParam(":BdverDadosPaciente",$BdverDadosPaciente);
                    $prepara->bindParam(":BdeditarPaciente",$BdeditarPaciente);
                    $prepara->bindParam(":BdcadPaciente",$BdcadPaciente);
                    $prepara->bindParam(":BdcadFucionario",$BdcadFucionario);
                    $prepara->bindParam(":Bdadministrador",$Bdadministrador);
                    
                    $prepara->execute();   
                    $idPermissoes = $conn->lastInsertId();
                    $_SESSION['idPermissoes'] = $idPermissoes;      
                    $conn = null;
                }

             //FIM DAS FUNCOES RELACIONADAS AS PERMISSÕES
                 
            //FIM DAS FUNCOES RELACIONADAS AOS FUNCIONÁRIOS
            public function FuncionarioCadastrar($funcionario) 
                {
                    $conn = Database::connect();					
                    $conn->exec('SET CHARACTER SET utf8');
                    $prepara = $conn->prepare("INSERT INTO funcionario (login, senha, nomeFuncionario, cpf, status, dataCadastroF, idPermissoes)
                    VALUES(:Bdlogin, :Bdsenha, :BdnomeFuncionario, :Bdcpf, :Bdstatus, :BddataCadastroF, :BdidPermissoes)");   

                    //$BdidFuncionario = $funcionario->getIdFuncionario();
                    $Bdlogin           = $funcionario->getLogin();
                    $Bdsenha           = $funcionario->getSenha();
                    $BdnomeFuncionario = $funcionario->getNomeFuncionario();
                    $Bdcpf             = $funcionario->getCpf();  
                    $Bdstatus          = $funcionario->getStatus();
                    $BddataCadastroF   = $funcionario->getDataCadastroF();  
                    $BdidPermissoes    = $funcionario->getIdPermissoes();


                    //$prepara->bindParam(":BdidFuncionario",$BdidFuncionario);
                    $prepara->bindParam(":Bdlogin",$Bdlogin);
                    $prepara->bindParam(":Bdsenha",$Bdsenha);
                    $prepara->bindParam(":BdnomeFuncionario",$BdnomeFuncionario);
                    $prepara->bindParam(":Bdcpf",$Bdcpf);
                    $prepara->bindParam(":Bdstatus",$Bdstatus);
                    $prepara->bindParam(":BddataCadastroF",$BddataCadastroF);
                    $prepara->bindParam(":BdidPermissoes",$BdidPermissoes);

                    $prepara->execute();   
                    $conn = null;
                }

            public function PesquisaTodosFuncionarios($nomeTabela)
                {					
                    $conn = Database::connect();                                
                    $conn->exec('SET CHARACTER SET utf8');                                
                    $sql = "SELECT * FROM $nomeTabela WHERE idFuncionario > 1";
                                        
                    try 
                        {
                            $listar = $conn->query($sql);
                            $buscar = $listar->fetchAll(PDO::FETCH_OBJ);                            
                            $numRows = $listar->rowCount();
                        } 
                    catch (PDOException $exc)
                        {
                            $buscar = $exc->getTraceAsString();
                        }            
                    
                    $_SESSION['numResult'] = $numRows;
                    return $buscar;
                    $conn = null;	
                }

            public function PesquisaNomeFuncionarios($nomeFuncPesq)
                {					
                    $conn = Database::connect();                                
                    $conn->exec('SET CHARACTER SET utf8');                                
                    $sql = "SELECT * FROM funcionario WHERE nomeFuncionario LIKE '$nomeFuncPesq%'";
                                        
                    try 
                        {
                            $listar = $conn->query($sql);
                            $buscar = $listar->fetchAll(PDO::FETCH_OBJ);                            
                            $numRows = $listar->rowCount();
                        } 
                    catch (PDOException $exc)
                        {
                            $buscar = $exc->getTraceAsString();
                        }            
                    
                    $_SESSION['numResult'] = $numRows;
                    return $buscar;
                    $conn = null;	
                }

            public function funcionarioStatusUpdate($funcionario) 
                {	
                    $idFuncionario = $funcionario->getIdFuncionario();
                    $Bdstatus  = $funcionario->getStatus();
                
                    $conn = Database::connect();                    
                    $conn->exec('SET CHARACTER SET utf8');
                    
                    $prepara = $conn->prepare("UPDATE  funcionario SET  status=:statusBd WHERE idFuncionario=:idFuncionarioBd");
                    
                    $prepara->bindParam(":idFuncionarioBd",$idFuncionario);
                    $prepara->bindParam(":statusBd",$Bdstatus);
                
                    $prepara->execute();	
                    $conn = null;
                }

            public function funcionarioSenhaUpdate($funcionario) 
                {	
                    $idFuncionario = $funcionario->getIdFuncionario();
                    $Bdsenha  = $funcionario->getSenha();
                
                    $conn = Database::connect();                    
                    $conn->exec('SET CHARACTER SET utf8');
                    
                    $prepara = $conn->prepare("UPDATE  funcionario SET  senha=:senhaBd WHERE idFuncionario=:idFuncionarioBd");
                    
                    $prepara->bindParam(":idFuncionarioBd",$idFuncionario);
                    $prepara->bindParam(":senhaBd",$Bdsenha);
                
                    $prepara->execute();	
                    $conn = null;
                }

            public function funcionarioLoginUpdate($funcionario) 
                {	
                    $idFuncionario = $funcionario->getIdFuncionario();
                    $Bdlogin  = $funcionario->getLogin();
                
                    $conn = Database::connect();                    
                    $conn->exec('SET CHARACTER SET utf8');
                    
                    $prepara = $conn->prepare("UPDATE  funcionario SET  login=:loginBd WHERE idFuncionario=:idFuncionarioBd");
                    
                    $prepara->bindParam(":idFuncionarioBd",$idFuncionario);
                    $prepara->bindParam(":loginBd",$Bdlogin);
                
                    $prepara->execute();	
                    $conn = null;
                }
            
            public function funcionarioLoginSenhaUpdate($funcionario) 
                {	
                    $idFuncionario = $funcionario->getIdFuncionario();
                    $Bdsenha  = $funcionario->getSenha();
                    $Bdlogin  = $funcionario->getLogin();
                
                    $conn = Database::connect();                    
                    $conn->exec('SET CHARACTER SET utf8');
                    
                    $prepara = $conn->prepare("UPDATE  funcionario SET  senha=:senhaBd, login=:loginBd WHERE idFuncionario=:idFuncionarioBd");
                    
                    $prepara->bindParam(":idFuncionarioBd",$idFuncionario);
                    $prepara->bindParam(":senhaBd",$Bdsenha);
                    $prepara->bindParam(":loginBd",$Bdlogin);
                
                    $prepara->execute();	
                    $conn = null;
                }

            public function FuncionarioTipoUpdate($funcionario) 
                {	
                    $idFuncionario = $funcionario->getIdFuncionario();
                    $Bdnome  = $funcionario->getNomeFuncionario();
                    $Bdlogin  = $funcionario->getLogin();
                    $Bdcpf = $funcionario->getCpf();
                    $Bdstatus  = $funcionario->getStatus();
                    $BdidPermissoes  = $funcionario->getIdPermissoes();

                    $conn = Database::connect();                    
                    $conn->exec('SET CHARACTER SET utf8');
                    
                    $prepara = $conn->prepare("UPDATE  funcionario SET  nomeFuncionario=:nomeBd, login=:loginBd, cpf=:cpfBd, status=:statusBd, 
                    idPermissoes=:idPermissoesBd WHERE idFuncionario=:idFuncionarioBd");
                    
                    $prepara->bindParam(":idFuncionarioBd",$idFuncionario);
                    $prepara->bindParam(":nomeBd",$Bdnome);
                    $prepara->bindParam(":loginBd",$Bdlogin);
                    $prepara->bindParam(":cpfBd",$Bdcpf);
                    $prepara->bindParam(":statusBd",$Bdstatus);
                    $prepara->bindParam(":idPermissoesBd",$BdidPermissoes);

                    $prepara->execute();	
                    $conn = null;
                }
            //FIM DAS FUNCOES RELACIONADAS AOS FUNCIONÁRIOS
        } 
?>
