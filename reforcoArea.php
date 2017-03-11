<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
$title='Praticar';  
$conteudo='
        <ol class="breadcrumb">
            <li><a href="StudentArea.php">Home</a></li>
            <li><a href="QuizArea.php">Quiz Area</a></li>
            <li><a href="practiceArea.php">Practice Area</a></li>
        </ol>
            <div class="container">
            
            <h4 style="text-align:center">Aqui você pode treinar com as questões que já respondeu durante o quiz</h4><hr>
            <div class="col-lg-8 col-lg-offset-2" style="background-color: whitesmoke; border-radius: 10px; padding-top: 20px">
                <table class="table" style="background-color: whitesmoke ;border-radius: 20px;border: none">
                    <tr >
                        <td style="text-align: center"><button class="btn btn-success" onclick="location.href=\'reforcoQuiz.php?id=1\'" style="width:300px;height: 60px" onclick="location.href=\'reforcoQuiz.php\'"><img src="imgs/symbol.png" alt=""/> Nivel 01</button></td>

                        <td style="text-align: center"><button class="btn btn-success" onclick="location.href=\'reforcoQuiz.php?id=2\'" style="width:300px;height: 60px"'; if($_SESSION['nivel']<2){$conteudo=$conteudo.' disabled';}$conteudo=$conteudo.' ><img src="imgs/symbol.png" alt=""/> Nivel 02</button></td>
                   </tr>
                   <tr>
                       <td style="text-align: center"><button class="btn btn-success" onclick="location.href=\'reforcoQuiz.php?id=3\'" style="width:300px;height: 60px"'; if($_SESSION['nivel']<3){$conteudo=$conteudo.' disabled';}$conteudo=$conteudo.'  ><img src="imgs/symbol.png" alt=""/> Nivel 03</button></td>
                       <td style="text-align: center"><button class="btn btn-success" onclick="location.href=\'reforcoQuiz.php?id=4\'" style="width:300px;height: 60px"'; if($_SESSION['nivel']<4){$conteudo=$conteudo.' disabled';}$conteudo=$conteudo.' ><img src="imgs/symbol.png" alt=""/> Nivel 04</button></td>
                   </tr>
                   <tr>
                       <td style="text-align: center"><button class="btn btn-success" onclick="location.href=\'reforcoQuiz.php?id=5\'" style="width:300px;height: 60px"'; if($_SESSION['nivel']<5){$conteudo=$conteudo.' disabled';}$conteudo=$conteudo.'  ><img src="imgs/symbol.png" alt=""/> Nivel 05</button></td>
                       <td style="text-align: center"><button class="btn btn-success" onclick="location.href=\'reforcoQuiz.php?id=6\'" style="width:300px;height: 60px" '; if($_SESSION['nivel']<6){$conteudo=$conteudo.' disabled';}$conteudo=$conteudo.' ><img src="imgs/symbol.png" alt=""/> Nivel 06</button></td>
                   </tr>

                </table>
            </div>
            
            </div>';
include_once 'masterStudent.php';
