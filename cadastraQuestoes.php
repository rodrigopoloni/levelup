<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$title='Cadastro de Questoes';    
include_once('Data\Conexao.php');
$pdo = Database::connect();
$sql = "SELECT nivel,nivelDesc FROM levelup.niveis";
$sql2= "SELECT idCategoria,descCategoria FROM levelup.categorias";

$conteudo='
        <div class="container">
        <ol class="breadcrumb">
            <li><a href="gerenciarArea.php">Gerenciar</a></li>
            <li><a href="gerenciaQuiz.php">Quiz</a></li>
            <li><a href="listaQuestoes.php">Questões</a></li>
        </ol>
            <div class="col-lg-6 col-lg-offset-2" style="background: whitesmoke; border-radius: 20px; padding: 10px 20px 10px 20px">
                <h2 style="text-align:center">Cadastro de Questões</h2>
                <hr>

                <form action="incluirQuestao.php" method="post">
                    <div class="form-group">
                        <label>Enunciado</label>
                        <input type="text" class="form-control"  name="enunciado" placeholder="Digite o enunciado da questão" required>
                    </div> 

                    <div class="form-group">
                        <label>Alternativa 1</label>
                        <input type="text" class="form-control"  name="alt1" placeholder="Alternativa 1" required>
                        <input type="radio" name="alternativa" value="1" required /> &nbsp; Correta
                    </div>

                    <div class="form-group">
                        <label>Alternativa 2</label>
                        <input type="text" class="form-control"  name="alt2" placeholder="Alternativa 2" required>
                        <input type="radio" name="alternativa" value="2" />&nbsp; Correta
                    </div>

                    <div class="form-group">
                        <label>Alternativa 3</label>
                        <input type="text" class="form-control"  name="alt3" placeholder="Alternativa 3" required>
                        <input type="radio" name="alternativa" value="3" />&nbsp; Correta
                    </div>

                    <div class="form-group">
                        <label>Alternativa 4</label>
                        <input type="text" class="form-control"  name="alt4" placeholder="Alternativa 4" required>
                        <input type="radio" name="alternativa" value="4" />&nbsp; Correta
                    </div>

                    <div class="form-group">
                        <label>Nível</label>
                        <select class="form-control" name="nivel" required>
                            <option selected>Selecione o Nivel</option>';
                           foreach($pdo->query($sql) as $row){
                            $conteudo=$conteudo.'<option value="'.$row['nivel'].'">'.$row['nivelDesc'].'</option>';      
                            };
    $conteudo=$conteudo.'
                </select>
                    </div>
                    <div class="form-group">
                        <label>Categoria</label>
                        <select class="form-control" name="categoria" required>
                            <option selected>Selecione a Categoria</option>';
                            foreach($pdo->query($sql2) as $row){
                            $conteudo=$conteudo.'<option value="'.$row['idCategoria'].'">'.$row['descCategoria'].'</option>';      
                            };
    $conteudo=$conteudo.'
                        </select>
                        <p style="text-align: right"><a href="#" class="btn btn-sm" data-toggle="modal" data-target=".bs-example-modal-sm"><span class="glyphicon glyphicon-plus-sign"> Adicionar</span></a></p>
                    </div>
                    <div class="form-group">
                        <label>Tipo de questão</label>&nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio" name="tipoqst" value="2"  required />&nbsp; Audio &nbsp;
                        <input type="radio" name="tipoqst" value="1"  required />&nbsp; Texto
                    </div>
                    <div class="form-group">
                        <label>Peso da Questão (pontos)</label>
                        <input type="number" class="form-control"  name="peso"  required>
                    </div>

                    <button class="btn btn-block btn-success" type="submit"> <span class="glyphicon glyphicon-check"></span> Incluir </button><br>

                </form>

                <a href="filtroquestoes.php" class="btn btn-block btn-default">Gerenciar Questões</a>
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

