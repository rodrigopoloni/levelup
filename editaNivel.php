<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once('Data\Conexao.php');
$pdo = Database::connect();
$idNivel=$_GET['id'];
$sql = 'SELECT * FROM levelup.professor';
$sql2='SELECT * FROM levelup.niveis a, levelup.professor b  where nivel='.$idNivel.' and a.idProfResp=b.idProfessor';

$nivel = $pdo->query($sql2)->fetch();

$title='Edição de Nível';    
$conteudo='
        <div class="container">
        <ol class="breadcrumb">
            <li><a href="gerenciarArea.php">Gerenciar</a></li>
            <li><a href="gerenciaQuiz.php">Quiz</a></li>
            <li><a href="listaNiveis.php">Niveis</a></li>
        </ol>
            <div class="col-lg-6 col-lg-offset-2" style="background: whitesmoke; border-radius: 20px; padding: 10px 20px 10px 20px">
                <h2 style="text-align:center">Editar Nível</h2>
                <hr>

                <form action="edicaoNivel.php" method="post">
                    <input type="hidden" name="nivel" value="'.$idNivel.'">
                    <div class="form-group">
                        <label>Nome do Nível</label>
                        <input type="text" class="form-control"  name="descricao" value="'.$nivel['nivelDesc'].'"  required>
                    </div>

                    <div class="form-group">
                        <label>Pontuação</label><br>
                        <div class="row">
                            <div class="col-xs-6">
                                <input type="number" class="form-control" name="ptosMin" value="'.$nivel['ptosMin'].'" required >
                            </div>
                            <div class="col-xs-6">
                                <input type="number" class="form-control" name="ptosMax" value="'.$nivel['ptosMax'].'"  required>
                            </div>
                            
                        </div>
                       
                    </div>

                    <div class="form-group">
                        <label>Professor Responsável</label>
                        <select class="form-control" name="prof">
                            <option selected value="'.$nivel['idProfResp'].'">'.$nivel['nome'].'</option>';
                           foreach($pdo->query($sql) as $row){
                            $conteudo=$conteudo.'<option value="'.$row['idProfessor'].'">'.$row['nome'].'</option>';      
                            };
    $conteudo=$conteudo.'</select>
                    </div>
                    <div class="form-group">
                        <label>Quantidade de Questões <small style="color:grey">(Indica quantas questões deste nível serão carregadas no quiz)</small></label>
                        <input type="number" class="form-control"  name="qtdQuest" value="'.$nivel['qtdQuestoes'].'">
                    </div>


                    <button type="submit" class="btn btn-block btn-success"> <span class="glyphicon glyphicon-ok"></span> Salvar Alterações </button><br>

                </form>

            </div>
            ';

            include_once('masterProf.php');