<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$idQuest=$_GET['id'];
include_once('Data\Conexao.php');

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql="SELECT * FROM levelup.questoes as a,  levelup.niveis as b, levelup.categorias as c  WHERE a.idNivel=b.nivel and a.idCat=c.idCategoria and idQuest=".$idQuest;
$q = $pdo->query($sql)->fetch();

$query ="SELECT nivel,nivelDesc FROM levelup.niveis";
$query2="SELECT idCategoria,descCategoria FROM levelup.categorias";

$conteudo='
        <div class="container">
        <ol class="breadcrumb">
            <li><a href="gerenciarArea.php">Gerenciar</a></li>
            <li><a href="gerenciaQuiz.php">Quiz</a></li>
            <li><a href="listaQuestoes.php">Questoes</a></li>
        </ol>
            <div class="col-lg-6 col-lg-offset-2" style="background: whitesmoke; border-radius: 20px; padding: 10px 20px 10px 20px">
                <h2 style="text-align:center">Cadastro de Questões</h2>
                <hr>

                <form action="updateQuestao.php" method="post">
                    <input type="hidden"  name="questao" value="'.$q['idQuest'].'">
                    <div class="form-group">
                        <label>Enunciado</label>
                        <input type="text" class="form-control"  name="enunciado" value="'.$q['enunciado'].'"  required>
                    </div>

                    <div class="form-group">
                        <label>Alternativa 1</label>
                        <input type="text" class="form-control"  name="alt1" value="'.$q['alt1'].'" required>';
                        if($q['alt1']==$q['resposta']){
                            $conteudo=$conteudo.'<input type="radio" name="alternativa" value="1" checked /> &nbsp; Correta';
                        }else{
                            $conteudo=$conteudo.'<input type="radio" name="alternativa" value="1"  /> &nbsp; Correta';
                        }
                    $conteudo=$conteudo.'</div>

                    <div class="form-group">
                        <label>Alternativa 2</label>
                        <input type="text" class="form-control"  name="alt2" value="'.$q['alt2'].'" required>';
                        if($q['alt2']==$q['resposta']){
                            $conteudo=$conteudo.'<input type="radio" name="alternativa" value="2" checked /> &nbsp; Correta';
                        }else{
                            $conteudo=$conteudo.'<input type="radio" name="alternativa" value="2"  /> &nbsp; Correta';
                        }
                    $conteudo=$conteudo.'
                    </div>

                    <div class="form-group">
                        <label>Alternativa 3</label>
                        <input type="text" class="form-control"  name="alt3" value="'.$q['alt3'].'" required>';
                        if($q['alt3']==$q['resposta']){
                            $conteudo=$conteudo.'<input type="radio" name="alternativa" value="2" checked /> &nbsp; Correta';
                        }else{
                            $conteudo=$conteudo.'<input type="radio" name="alternativa" value="3"  /> &nbsp; Correta';
                        }
                    $conteudo=$conteudo.'
                    </div>

                    <div class="form-group">
                        <label>Alternativa 4</label>
                        <input type="text" class="form-control"  name="alt4" value="'.$q['alt4'].'" required>';
                        if($q['alt4']==$q['resposta']){
                            $conteudo=$conteudo.'<input type="radio" name="alternativa" value="4" checked /> &nbsp; Correta';
                        }else{
                            $conteudo=$conteudo.'<input type="radio" name="alternativa" value="4"  /> &nbsp; Correta';
                        }
                    $conteudo=$conteudo.'
                    </div>

                    <div class="form-group">
                        <label>Nível</label>
                        <select class="form-control" name="nivel" required>
                            <option selected value="'.$q['idNivel'].'">'.$q['nivelDesc'].'</option>';
                           foreach($pdo->query($query) as $row){
                            $conteudo=$conteudo.'<option value="'.$row['nivel'].'">'.$row['nivelDesc'].'</option>';      
                            };
    $conteudo=$conteudo.'
                </select>
                    </div>
                    <div class="form-group">
                        <label>Categoria</label>
                        <select class="form-control" name="categoria" required>
                            <option selected value="'.$q['idCat'].'">'.$q['descCategoria'].'</option>';
                            foreach($pdo->query($query2) as $row){
                            $conteudo=$conteudo.'<option value="'.$row['idCategoria'].'">'.$row['descCategoria'].'</option>';      
                            };
    $conteudo=$conteudo.'
                        </select>
                        <p style="text-align: right"><a href="#" class="btn btn-sm" data-toggle="modal" data-target=".bs-example-modal-sm"><span class="glyphicon glyphicon-plus-sign"> Adicionar</span></a></p>
                    </div>
                    <div class="form-group">
                        <label>Tipo de questão</label>&nbsp; &nbsp; &nbsp; &nbsp;';
                        if($q['tipo']==1){
                            $conteudo=$conteudo.'<input type="radio" name="tipoqst" value="2" />&nbsp; Audio &nbsp;
                                                 <input type="radio" name="tipoqst" value="1" checked />&nbsp; Texto';
                        }else{
                        
                            $conteudo=$conteudo.'<input type="radio" name="tipoqst" value="2" checked />&nbsp; Audio &nbsp;
                                                <input type="radio" name="tipoqst" value="1" />&nbsp; Texto';
                        }
                    $conteudo=$conteudo.'</div>
                    <div class="form-group">
                        <label>Peso da Questão (pontos)</label>
                        <input type="number" class="form-control"  name="peso" value="'.$q['pesoPts'].'">
                    </div>

                    <button class="btn btn-block btn-success" type="submit"> <span class="glyphicon glyphicon-check"></span> Atualizar </button><br>

                </form>

                <a href="listaQuestoes.php" class="btn btn-block btn-default">Voltar as Questões</a>
            </div>

            <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">

                        <div style="padding: 8px 8px 8px 8px">
                            <form action="incluirCategoria.php" method="post">
                                <div class="form-group">
                                    <label>Descrição Categoria</label>
                                    <input type="text" class="form-control"  name="categoria" placeholder="Descrição">
                                </div>
                                <button class="btn btn-block btn-success" type="submit"><span class="glyphicon glyphicon-plus-sign"></span> Incluir </button><br>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            ';
      include_once('masterProf.php');


