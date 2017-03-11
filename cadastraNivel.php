<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once('Data\Conexao.php');
$pdo = Database::connect();
$sql='SELECT * FROM levelup.professor';
$title='Cadastro de Nível';    
$conteudo='
        <div class="container">
        <ol class="breadcrumb">
            <li><a href="gerenciarArea.php">Gerenciar</a></li>
            <li><a href="gerenciaQuiz.php">Quiz</a></li>
            <li><a href="listaNiveis.php">Níveis</a></li>
        </ol>
            <div class="col-lg-6 col-lg-offset-2" style="background: whitesmoke; border-radius: 20px; padding: 10px 20px 10px 20px">
                <h2 style="text-align:center">Cadastro de Níveis</h2>
                <hr>

                <form action="incluirNivel.php" method="post">
                    <div class="form-group">
                        <label>Nome do Nível</label>
                        <input type="text" class="form-control"  name="descricao" placeholder="Digite o nome do nível" required>
                    </div>

                    <div class="form-group">
                        <label>Pontuação</label><br>
                        <div class="row">
                            <div class="col-xs-6">
                                <input type="number" class="form-control" name="ptosMin" placeholder="Pontuação Inicial" required>
                            </div>
                            <div class="col-xs-6">
                                <input type="number" class="form-control" name="ptosMax" placeholder="Pontuação Final" required>
                            </div>
                            
                        </div>
                       
                    </div>

                    <div class="form-group">
                        <label>Professor Responsável</label>
                        <select class="form-control" name="prof" required>
                            <option selected>Selecione o Professor</option>';
                          foreach($pdo->query($sql) as $row){
                            $conteudo=$conteudo.'<option value="'.$row['idProfessor'].'">'.$row['nome'].'</option>';      
                            };
    $conteudo=$conteudo.'</select>
                    </div>
                    <div class="form-group">
                        <label>Quantidade de Questões <small style="color:grey">(Indica quantas questões deste nível serão carregadas no quiz)</small></label>
                        <input type="number" class="form-control"  name="qtdQuest" placeholder="Digite a quanttidade de questões" required>
                    </div>


                    <button type="submit" class="btn btn-block btn-success"> <span class="glyphicon glyphicon-check"></span> Incluir </button><br>

                </form>

                <a href="listaNiveis.php" class="btn btn-block btn-default">Gerenciar Níveis</a>
            </div>
            ';

            include_once('masterProf.php');