        <?php
        
        $title='Área do Quiz';
        $conteudo='
        <ol class="breadcrumb">
            <li><a href="StudentArea.php">Home</a></li>
        </ol>
        <div class="container">

            <center>
            <div class="row">
                
                    <div class="col-lg-8">
                    <div class="col-lg-6 col-lg-offset-3">
                        <div class="thumbnail">
                            <img src="imgs/level.png" alt=""/>
                            <div class="caption">';
                            if($_SESSION["nivel"]>=7){
                                $conteudo=$conteudo.'<h3 style="text-align: center">Parabéns!!!</h3>'
                                        . '<p style="text-align: center">Você passou em todos os níveis do QUIZ!</p>';
                                
                            }  else {
                                $conteudo=$conteudo.'<h3 style="text-align: center">Nivel '.$_SESSION["nivel"].'!</h3>
                                <p style="text-align: center">Continue jogando para subir de nível!</p>';   
                            }
                                
                            $conteudo=$conteudo.'</div>
                        </div>
                    </div>
                </div>
               

            </div>
           
            <div class="row">
                <div class="col-lg-8">
                    <hr>    
                    <br><br><br>
                    <center>
                        <div class="col-lg-4">
                            <a href="quizText.php"><img src="imgs/jogar.png" alt=""/></a>
                            <h4>Jogar</h4>
                        </div>
                        <div class="col-lg-4">
                            <a href="practiceArea.php"><img src="imgs/praticar.png" alt=""/></a>
                            <h4>Praticar</h4>
                        </div>
                        <div class="col-lg-4">
                            <a href="studentstatistics.php"><img src="imgs/estatisticas.png" alt=""/></a>
                            <h4>Estatísticas</h4>
                        </div>
                    </center>
                </div>

            </div>

            </center>
        </div>
                
                ';
        include_once('masterStudent.php');           
?>  