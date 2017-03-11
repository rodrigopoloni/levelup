<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 *///1
session_start();
include_once('Data\Conexao.php');
$pdo = Database::connect();

//$sql = 'SELECT * FROM levelup.questoes where idNivel='.$_SESSION['nivel'].' ORDER BY RAND() limit 1';
//$questao=$pdo->query($sql)->fetch();
//$qstSelecionada=$questao['idQuest'];

$sql2 = 'SELECT * FROM levelup.niveis where nivel='.$_SESSION['nivel'];
$nivel=$pdo->query($sql2)->fetch();
$qtdQuestNivel=$nivel['qtdQuestoes'];

//if($qstSelecionada==null){
//    $qstSelecionada=0;
//}
    


//$sql2= 'SELECT count(*) as qtd FROM levelup.respondidas where idAluno='.$_SESSION['id'].' and idQuestao='.$qstSelecionada.' and statusResp=1';
//$respondida=$pdo->query($sql2)->fetch();
//$qtd=$respondida['qtd'];

$sqlQuestao='select * from questoes as t1
            where t1.idNivel='.$_SESSION['nivel'].' and t1.idQuest not in( 
                select t2.idQuestao from respondidas as t2 where t2.idAluno='.$_SESSION['id'].' and statusResp=1
            ) 
            ORDER BY RAND() limit 1
            ';

$title='QUIZ';
    $conteudo='<div class="container">
            <div class="col-lg-8 col-lg-offset-1" style="background-color: whitesmoke; border-radius: 10px; padding-bottom: 10px">
            <br>
            <p style="text-align:right"><b>Pontuação:</b> '.$_SESSION['pontos'].'</p>
            <p style="text-align:right"><b>Nível:</b> '.$_SESSION['nivel'].' </p>
            <p style="text-align:right"><b>Questão Atual:</b> '.$_SESSION['questao'].' de '.$qtdQuestNivel.' </p>';
                foreach($pdo->query($sqlQuestao) as $row){
                if($row['tipo']==1){    
                    $conteudo=$conteudo.'<form action="avaliaRespostaQuiz.php" method="post">
                        <hr>
                        <input type="hidden" name="questao" value="'.$row['idQuest'].'"/>
                        <input type="hidden" name="resposta" value="'.$row['resposta'].'"/>
                        <input type="hidden" name="categoria" value="'.$row['idCat'].'"/>
                        <div class="form-group">
                            <h4>'.$row['enunciado'].'</h4>
                        </div>

                        <div class="form-group">
                          <input type="radio" name="alternativa" value="'.$row['alt1'].'" required /> &nbsp; '.$row['alt1'].'
                        </div>

                        <div class="form-group">
                          <input type="radio" name="alternativa" value="'.$row['alt2'].'" required />&nbsp; '.$row['alt2'].'
                        </div>

                        <div class="form-group">
                          <input type="radio" name="alternativa" value="'.$row['alt3'].'" required/>&nbsp; '.$row['alt3'].'
                        </div>

                        <div class="form-group">
                          <input type="radio" name="alternativa" value="'.$row['alt4'].'" required/>&nbsp; '.$row['alt4'].'
                        </div>

                        <button class="btn btn-block btn-success"> <span class="glyphicon glyphicon-send"></span> Enviar </button><br>

                </form>';}else{
                    $conteudo=$conteudo.'<form action="avaliaRespostaQuiz.php" method="post">
                        <hr>
                        <input type="hidden" name="questao" value="'.$row['idQuest'].'"/>
                        <input type="hidden" name="resposta" value="'.$row['resposta'].'"/>
                        <input type="hidden" name="categoria" value="'.$row['idCat'].'"/>
                        <div class="form-group">
                          
                           <center> <button type="button" class="btn btn-md btn-primary" style="width:200px" onclick="speak(\''.$row['enunciado'].'\')"><i class="glyphicon glyphicon-volume-up"></i> Ouvir Enunciado</button></center>
                        </div>

                        <div class="form-group">
                          <input type="radio" name="alternativa" value="'.$row['alt1'].'" required />&nbsp; <button type="button" class="btn btn-sm btn-danger" onclick="speak(\''.$row['alt1'].'\')"><i class="glyphicon glyphicon-volume-up"></i> Ouvir Alternativa 1</button>
                        </div>

                        <div class="form-group">
                          <input type="radio" name="alternativa" value="'.$row['alt2'].'" required />&nbsp; <button type="button" class="btn btn-sm btn-danger" onclick="speak(\''.$row['alt2'].'\')"><i class="glyphicon glyphicon-volume-up"></i> Ouvir Alternativa 2</button>
                        </div>

                        <div class="form-group">
                          <input type="radio" name="alternativa" value="'.$row['alt3'].'" required />&nbsp; <button type="button" class="btn btn-sm btn-danger" onclick="speak(\''.$row['alt3'].'\')"><i class="glyphicon glyphicon-volume-up"></i> Ouvir Alternativa 3</button>
                        </div>

                        <div class="form-group">
                          <input type="radio" name="alternativa" value="'.$row['alt4'].'"required />&nbsp; <button type="button" class="btn btn-sm btn-danger" onclick="speak(\''.$row['alt4'].'\')"><i class="glyphicon glyphicon-volume-up"></i> Ouvir Alternativa 4</button>
                        </div>

                        <button class="btn btn-block btn-success"> <span class="glyphicon glyphicon-send"></span> Enviar </button><br>

                </form>';}
                }
            $conteudo=$conteudo.'</div>
</div>';



include_once ('masterStudent.php');