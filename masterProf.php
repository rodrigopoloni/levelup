<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
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

        </style>

    </head>
    <body>


        <div id="wrapper">

            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li class="sidebar-brand">
                        <a href="professorArea.php">
                            <?php echo $_SESSION["nome"]; ?>
                        </a>
                    </li>
                    <li>
                        <a href="gerenciarArea.php">Gerenciar</a>
                    </li>
                    <li>
                        <?php
                        $id=$_SESSION['id'];
                        include_once('Data\Conexao.php');
                        $pdo = Database::connect();
                        
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $sql = 'SELECT count(idRecomend) as qtd FROM levelup.recomendacoes where statusRecomend=2 and idProfResp='.$id;
                        $resultado = $pdo->query($sql)->fetch();
                        $qtd=$resultado['qtd'];
                        if($qtd==0){
                            echo '<a href="notifProfessor.php">Notificações &nbsp;</a>';
                        }else
                        {
                            echo '<a href="notifProfessor.php">Notificações &nbsp;<span style="" class="badge">'.$qtd.'</span></a>';
                        }
                        ?>
                    </li>
                    <li>
                        <a href="analiseArea.php">Análises</a>
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
                    <h3 style="text-align:right"> <strong>Área do Professor </strong></h3>
                    <hr/>

                </div>
                <div style="position: fixed; top: 0; right: 0; border: 0; z-index: 999; display: block;padding: 10px 10px 10px 10px">
                    <img src="imgs/logoCorner.png" alt=""/>   
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                <?php
                                if(isset($_SESSION['id'])and $_SESSION['professor']){
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
