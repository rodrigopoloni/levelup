<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <?php
      session_start();
      ini_set('default_charset','UTF-8')
    ?>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title><?php echo $title ?></title>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="bootstrap/css/demo.css" rel="stylesheet" type="text/css"/>
        <link href="bootstrap/css/simple-sidebar.css" rel="stylesheet" type="text/css"/>
        <link href="bootstrap/css/style10.css" rel="stylesheet" type="text/css"/>
        <script src="bootstrap/js/jquery-1.9.0.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/jquery.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <style>
            body  {
                background-image: url('imgs/bkmaster.png');
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-position: bottom;
                background-size: 100%;
            }
            
            .color:hover
            {
                background:#58D68D;
            }
        
            
        </style>
        <script>    
        function speak(text, callback) {
            var u = new SpeechSynthesisUtterance();
            u.text = text;
            u.lang = 'en-US';

            u.onend = function () {
                if (callback) {
                    callback();
                }
            };

            u.onerror = function (e) {
                if (callback) {
                    callback(e);
                }
            };

            speechSynthesis.speak(u);
        }
        
        </script>

    </head>
    <body>
        
    
        <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="StudentArea.php">
                        <i class="glyphicon glyphicon-home "></i>  &nbsp;&nbsp; Início 
                    </a>
                </li>
                <li>
                    <a href="profile.php">Minha Conta</a>
                </li>
                <li>
                    <?php
                        include_once('Data\Conexao.php');
                        $pdo = Database::connect();
                        $sql = 'SELECT count(idNotif) FROM levelup.notifalunos where (vista=0)and(idReceiver='.$_SESSION['id'].')';
                        $qtd = $pdo->query($sql)->fetch();
                        if($qtd[0]==0){
                            echo '<a href="notifStudent.php">Notificações &nbsp;</a>';
                        }else
                        {
                            echo '<a href="notifStudent.php">Notificações &nbsp;<span style="" class="badge">'.$qtd[0].'</span></a>';
                        }
                        ?>
                </li>
                <li>
                    <a href="meusFavoritos.php">Meus Favoritos</a>
                </li>
                <li>
                    <?php
                        $hoje=date("Y-m-d");
                        $pdo = Database::connect();
                        $sql = 'SELECT count(idChat) FROM levelup.chat where (statusChat=1)and(idConvidado='.$_SESSION['id'].' or idConvidante='.$_SESSION['id'].') and (data="'.$hoje.'")';
                        $qtd = $pdo->query($sql)->fetch();
                        if($qtd[0]==0){
                            echo '<a href="meusChats.php">CHAT &nbsp;</a>';
                        }else
                        {
                            echo '<a href="meusChats.php">CHAT &nbsp;<span style="" class="badge">'.$qtd[0].'</span></a>';
                        }
                        ?>
                    
                </li>
                <li>
                    &nbsp;
                </li>
                <li>
                    <a href="exit.php">Sair &nbsp;</a>
                </li>
                
            </ul>
        </div>
        
        <div id="page-content-wrapper">
            <div class="col-lg-10">
                <h3 style="text-align:right"> <strong>Área do Aluno </strong>(<small><?php echo $_SESSION["nome"];?></small>)</h3>
                
                <hr/>
                
            </div>
            <div style="position: fixed; top: 0; right: 0; border: 0; z-index: 999; display: block; padding: 10px 10px 10px 10px">
                <img src="imgs/logoCorner.png" alt=""/>   
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div>
                            <?php
                            if(isset($_SESSION['id'])and $_SESSION['aluno']){
                                    echo $conteudo;
                                }else{
                                    header('location:login.php');
                                }
                            ?>       
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
                   
            </div>
        
         
    </body>
</html>
