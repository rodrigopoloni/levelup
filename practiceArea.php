<?php
session_start();
$title='Praticar';    
$conteudo='
        <ol class="breadcrumb">
            <li><a href="StudentArea.php">Home</a></li>
            <li><a href="QuizArea.php">Quiz Area</a></li>
        </ol>
        <div class="container">
        
        <div class="row">
                <div class="col-lg-8">
                    <hr>    
                    <br><br><br>
                    <center>
                        <div class="col-lg-6">
                            <a href="ListeningWords.php"><img src="imgs/wordlistening.png" alt=""/></a>
                            <h4>Word Listening</h4>
                        </div>
                        <div class="col-lg-6">
                            <a href="reforcoArea.php"><img src="imgs/reforco.png" alt=""/></a>
                            <h4>Reforço</h4>
                        </div>
                        
                    </center>
                </div>

            </div>
        
            
        </div>
            
            ';
    include_once 'masterStudent.php';
    
    /*
     * 
     */