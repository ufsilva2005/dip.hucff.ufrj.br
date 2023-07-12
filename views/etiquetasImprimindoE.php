<?php
    include "../template/menuPrincipal.php";
    $etiqueta = $_SESSION['etiqueta'];
?>

        <div class="container">
            <div id="page-content-wrapper">
				<div class="panel-header">
					<i class="icon-tasks icon-blue"></i>
					<h3 class="text-success">Imprimindo Etiquetas</h3>
				</div>

				<hr>

                <?php
                    if (isset($_GET["var1"])) 
                        {
                            echo '<!-- FROM PHP --><script>var var1 = "' . htmlspecialchars($_GET["var1"]) . '";</script>';
                        } 
                    else 
                        {
                            ?>
                            <form action="etiquetasImprimindoE.php" method="get"> 
                                <div class="row">
                                    <div class="col px-md-1 col-md-12">
                                        <!----> 
                                        <div class="card-body">
                                            <img width="450px" height="150px" src="../imgEtiqueta/label.png" class="img-thumbnail mb-3">
                                        </div>  
                                        
                                        <input type="text" class="form-control" name="var1" value = "<?php echo $etiqueta; ?>" hidden > <br>
                                        <input type="submit"  class="btn btn-outline-warning" value="Print">
                                    </div>
                                </div>                                        
                                <?php die();
                        }
                ?>
                
                    <div class="row">
                        <div class="col-md-2">	
                            <?php
                                if($_SESSION['acao'] == 1)	
                                    {
                                        $html = "<a href='./etiquetasImprimir.php'><button type='button' class='btn btn-outline-warning'>Voltar</button></a>";                                
                                    }	
                                else	
                                    {
                                        $html = "<a href='./etiquetasReImprimir.php'><button type='button' class='btn btn-outline-warning'>Voltar</button></a>";                                
                                    }
                                echo $html;
                            ?>	
                        </div>	
                    </div>
                </form>         

                <script type="text/javascript" src="../js/rsvp-3.1.0.min.js"></script>
                <script type="text/javascript" src="../js/sha-256.min.js"></script>
                <script type="text/javascript" src="../js/qz-tray.js"></script>

                <script>
                    var printer = "zebra";
                    qz.websocket.connect().then(function() {
                        return qz.printers.find(printer);
                    }).then(function(found) {
                        var config = qz.configs.create(found);
                        var data =var1 ;
                        return qz.print(config, [data]);
                    }).then(qz.websocket.disconnect).then(function() {
                        document.getElementById('status').innerHTML = 'Impressão Completa';
                    }).catch(function(err) {
                        document.getElementById('status').innerHTML = err + '<br><a href="qz:launch">Launch QZ</a>';
                        throw err;
                    });                   
                </script>
                <h1 id="status">Imprimindo...</h1>
            </div>
         </div>
    </body>
</html>
