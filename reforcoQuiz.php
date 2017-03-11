<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
include_once('Data\Conexao.php');
$pdo = Database::connect();
$nivelQuiz=$_GET['id'];

$sql = 'SELECT * FROM levelup.respondidas a, levelup.questoes b where b.idQuest=a.idQuestao and idAluno='.$_SESSION['id'].' and idNivel='.$nivelQuiz.' ORDER BY RAND() limit 1';
   
$title='QUIZ Reforco';

if($nivelQuiz>$_SESSION['nivel']){
    $conteudo="<h2>Ops!</h2><h5>Parece que voce nao tem acesso a este nivel ainda. Continue jogando para chegar aqui! :)</h5>";
}else{

    $conteudo='<div class="container">
            <div class="col-lg-8 col-lg-offset-1" style="background-color: whitesmoke; border-radius: 10px; padding-bottom: 10px">
            <br>
            <h4>Dados da Sessão</h4>
            <p style="text-align: right"><b>Questões Respondidas:</b> '.$_SESSION['respondidas'].'</p>
            <p style="text-align: right"><b>Acertos:</b> '.$_SESSION['corretas'].'</p>
            <p style="text-align: right"><b>Erros:</b> '.$_SESSION['erradas'].'</p>
            <p style="text-align: right"><a class="btn btn-primary btn-sm" href="reiniciaContadoresReforco.php?id='.$nivelQuiz.'">Reiniciar Contagem</a></p>';
                foreach($pdo->query($sql) as $row){
                if($row['tipo']==1){    
                    $conteudo=$conteudo.'
                                                
                        <form action="validaReforco.php" method="post">
                        <hr>
                        <input type="hidden" name="niveljogado" value="'.$nivelQuiz.'"/>
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
                          <input type="radio" name="alternativa" value="'.$row['alt2'].'" />&nbsp; '.$row['alt2'].'
                        </div>

                        <div class="form-group">
                          <input type="radio" name="alternativa" value="'.$row['alt3'].'" />&nbsp; '.$row['alt3'].'
                        </div>

                        <div class="form-group">
                          <input type="radio" name="alternativa" value="'.$row['alt4'].'" />&nbsp; '.$row['alt4'].'
                        </div>

                        <button class="btn btn-block btn-success"> <span class="glyphicon glyphicon-send"></span> Enviar </button><br>

                </form>';}else{
                    $conteudo=$conteudo.'<form action="validaReforco.php" method="post">
                        <hr>
                         <input type="hidden" name="niveljogado" value="'.$nivelQuiz.'"/>
                        <input type="hidden" name="questao" value="'.$row['idQuest'].'"/>
                        <input type="hidden" name="resposta" value="'.$row['resposta'].'"/>
                        <input type="hidden" name="categoria" value="'.$row['idCat'].'"/>
                        <div class="form-group">
                           <center> <button type="button" class="btn btn-md btn-primary" style="width:200px" onclick="speak(\''.$row['enunciado'].'\')"><i class="glyphicon glyphicon-volume-up"></i> Ouvir Enunciado</button></center>
                        </div>

                        <div class="form-group">
                          <input type="radio" name="alternativa" value="'.$row['alt1'].'" />&nbsp; <button type="button" class="btn btn-sm btn-danger" onclick="speak(\''.$row['alt1'].'\')" required >Alternativa 1</button>
                        </div>

                        <div class="form-group">
                          <input type="radio" name="alternativa" value="'.$row['alt2'].'" />&nbsp; <button type="button" class="btn btn-sm btn-danger" onclick="speak(\''.$row['alt2'].'\')">Alternativa 2</button>
                        </div>

                        <div class="form-group">
                          <input type="radio" name="alternativa" value="'.$row['alt3'].'" />&nbsp; <button type="button" class="btn btn-sm btn-danger" onclick="speak(\''.$row['alt3'].'\')">Alternativa 3</button>
                        </div>

                        <div class="form-group">
                          <input type="radio" name="alternativa" value="'.$row['alt4'].'" />&nbsp; <button type="button" class="btn btn-sm btn-danger" onclick="speak(\''.$row['alt4'].'\')">Alternativa 4</button>
                        </div>

                        <button class="btn btn-block btn-success"> <span class="glyphicon glyphicon-send"></span> Enviar </button><br>

                </form>';}
                }
            $conteudo=$conteudo.'</div>
</div>';
}

include_once ('masterStudent.php');