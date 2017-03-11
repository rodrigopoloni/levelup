<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Esqueci minha senha</title>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <style>
            body  {
                background-image: url('imgs/background.jpg');
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: 100% 100%;
            }
        </style>    
    </head>
    
    <body>
        
        <div class="container" style="padding-top: 10%">
            
                <div class="col-md-4 col-md-offset-4">
                    <div style="background-color: transparent;border-radius: 20px;box-shadow: inset 0px 11px 8px -10px black, inset 0px -11px 8px -10px black;">
                        <center>
                            <img src="imgs/logoLogin.png" alt="" style="padding-top: 15px"/>
                            <p> <b>Plataforma de Apoio ao Ensino de Inglês<br> da FATEC Rio Preto</b></p>
                        </center>
                        <form style="padding: 20px" action="enviaEmail.php" method="post">
                            <div class="form-group" style="align-content: center">
                                <label>Email</label>
                              <input type="email" class="form-control" name="email" placeholder="Digite seu email">
                            </div>
                            
                            <div class="form-group" style="align-content: center">
                                <button type="submit" class="btn btn-danger btn-block">Enviar Senha</button>
                            </div>

                        </form> 
                    </div>
                
                </div>  
            
        </div>
       
        <?php
            
        ?>
    </body>
</html>
