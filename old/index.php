<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>CIHIV</title>	
        <link href="./css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="./css/login.css" />    
    </head>

    <body>
        <div class="container">
            <div class="card card-container">
                <div id="remember">
                    <label>
                        <center>CIHIV - Sistema de Cadastro da DIP</center>
                    </label>
                </div>
                <div>
                    <img id="profile-img" class="profile-img-card" src="./img/images6-1.jpg" />
                    <span id="reauth-email" class="reauth-email"></span>
                </div>
                <div class="panel" id="tab-2">
                    <div class="panel" id="tab-1">
                        <form  method="post" action="./controllers/validarLogin.php" method="post">		
                            <div class="row">
                                <div class="col px-md-1 col-md-12">
                                    <label for="inputSuccess" class="control-label">login:</label>
                                    <input type="text" class="form-control" name="login" id = "login" >
                                </div>    
                            </div>  
                            <div class="row">
                                <div class="col px-md-1 col-md-12">
                                    <label for="inputSuccess" class="control-label">senha:</label>
                                    <input type="password" class="form-control" name="senha" id = "senha" >
                                </div>      
                            </div> 
                            <div class="row">                 
                                <div class="col px-md-1 py-md-4 col-md-3">
                                    <button type="submit" class="btn btn-ufs">Login</button>   
                                </div>      
                                &emsp;    
                                <div class="col px-md-2 py-md-4 col-md-8">
                                    <a class="btn btn-outline-warning" href="./views/esqueceSenha.php?action=1">Esqueci a Senha</a>  
                                </div>      
                            </div>
                        </form>
                        <hr>
                            <a href="#" class="forgot-password">
                                Desenvolvimento CIR
                            </a>
                        <hr>
                    </div>
                </div>
            </div>
        </div>   
    </body>
</html>
