<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Confirmacao de envio de senha</title>
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
        <?php
            $email=$_POST['email'];
                  
        ?>
        <div class="container" style="padding-top: 10%">
            
                <div class="col-md-4 col-md-offset-4">
                    <div style="background-color: transparent;border-radius: 20px;box-shadow: inset 0px 11px 8px -10px black, inset 0px -11px 8px -10px black;padding: 30px">
                        <center>
                            <img src="imgs/logoLogin.png" alt="" style="padding-top: 15px"/>
                            <p><b>Plataforma de Apoio ao Ensino de Inglês<br> da FATEC Rio Preto</b></p>
                        </center>
                        <hr>
                        <h5 style="text-align:center"> Dados para acesso foram enviados para <b><?php echo $email; ?></b></h5>
                        <hr>
                        <a href="Login.php" class="btn btn-danger btn-block">Voltar ao Login</a>
                    </div>
                
                </div>  
            
        </div>
       
        
    </body>
</html>