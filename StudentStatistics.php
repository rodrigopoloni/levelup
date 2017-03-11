<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once('Data\Conexao.php');
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$nivel=$_SESSION['nivel'];
$conteudo=$conteudo.'<div class="container"> <ol class="breadcrumb">
                            <li><a href="studentArea.php">Home</a></li>
                            <li><a href="quizArea.php">Quiz Area</a></li>
                        </ol>';
for($i=1;$i<=$nivel;$i=$i+1){
  
    $sql="select  distinct a.questCateg as idCat, c.descCategoria as Categoria 
        from levelup.respondidas as a,
        levelup.questoes as b,
        levelup.categorias as c
        where a.idQuestao=b.idQuest and
        a.questCateg=c.idCategoria and b.idNivel=".$i." and a.idAluno=".$_SESSION['id'];
    
    $categorias = $pdo->query($sql)->fetch();
    
    $conteudo=$conteudo.'
                <div class="col-lg-6 col-lg-offset-2" style="background: whitesmoke; border-radius: 20px; padding: 10px 20px 10px 20px">
                <h3>Nivel '.$i.'</h3>';
    
    foreach($pdo->query($sql) as $row){
        $conteudo=$conteudo.'</br><span style="font-size:17px"><b>Categoria:</b> '.$row[1].'</span></br>';
        $sqlCertas="select count(idResposta)as corretas from respondidas  a, questoes b where a.idQuestao=b.idQuest and statusResp=1 and idAluno=".$_SESSION['id']." and idnivel=".$i." and questCateg=".$row[0];
        
        $certas=$pdo->query($sqlCertas)->fetch();
        $conteudo=$conteudo.'<span style="color:blue"><b>Questões Corretas:</b> '.$certas['corretas'].'</span></br>';
        
        $sqlErradas="select count(idResposta)as incorretas from respondidas  a, questoes b where a.idQuestao=b.idQuest and statusResp=2 and idAluno=".$_SESSION['id']." and idnivel=".$i." and questCateg=".$row[0];
        $erradas=$pdo->query($sqlErradas)->fetch();
        $conteudo=$conteudo.'<span style="color:red"><b>Questões Incorretas:</b> '.$erradas['incorretas'].'</span></br>';
        
    }
    $conteudo=$conteudo.'</div>';
;}
$conteudo=$conteudo.'</div>';

$title='Estatísticas';    
//$conteudo='
//        <ol class="breadcrumb">
//            <li><a href="StudentArea.php">Home</a></li>
//            <li><a href="QuizArea.php">Quiz Area</a></li>
//        </ol>
//        <div class="container">
//            <div class="col-lg-8 col-lg-offset-1" style="background-color: #58D68D; border-radius: 10px">
//                <h2>Nivel 01</h2>
//                <table class="table table-hover table-inverse">
//                    <thead>
//                        <tr style="background-color: black; color: white">
//
//                            <th>Categoria</th>
//                            <th>Acertos</th>
//                            <th>Erros</th>
//                        </tr>
//                    </thead>
//                    <tbody>
//                        <tr>
//                            <th scope="row">Concordancia</th>
//                            <td>10</td>
//                            <td>2</td>
//                        </tr>
//                        <tr>
//                            <th scope="row">Tenses</th>
//                            <td>5</td>
//                            <td>4</td>
//                        </tr>
//                        <tr>
//                            <th scope="row">Part of Speech</th>
//                            <td>15</td>
//                            <td>2</td>
//                        </tr>
//                        <tr>
//                            <th scope="row">TOTAL</th>
//                            <td>30</td>
//                            <td>8</td>
//                        </tr>
//
//                    </tbody>
//                </table>
//            </div>
//        </div>
//        <br>
//        <div class="container">
//            <div class="col-lg-8 col-lg-offset-1" style="background-color: #58D68D; border-radius: 10px">
//                <h2>Nivel 02</h2>
//                <table class="table table-hover table-inverse">
//                    <thead>
//                        <tr style="background-color: black; color: white">
//
//                            <th>Categoria</th>
//                            <th>Acertos</th>
//                            <th>Erros</th>
//                        </tr>
//                    </thead>
//                    <tbody>
//                        <tr>
//                            <th scope="row">Concordancia</th>
//                            <td>10</td>
//                            <td>2</td>
//                        </tr>
//                        <tr>
//                            <th scope="row">Tenses</th>
//                            <td>5</td>
//                            <td>4</td>
//                        </tr>
//                        <tr>
//                            <th scope="row">Part of Speech</th>
//                            <td>15</td>
//                            <td>2</td>
//                        </tr>
//                        <tr>
//                            <th scope="row">TOTAL</th>
//                            <td>30</td>
//                            <td>8</td>
//                        </tr>
//
//                    </tbody>
//                </table>
//            </div>
//        </div>
//            
//            ';
  include_once 'masterStudent.php';