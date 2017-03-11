<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$nivel=$_GET['nivel'];
include_once('Data\Conexao.php');
$pdo = Database::connect();
$sql = 'SELECT * FROM levelup.questoes as a, levelup.categorias as b where a.idCat=b.idCategoria and idNivel='.$nivel;

$title='Questões';    
$conteudo='<div class="container">
        <ol class="breadcrumb">
            <li><a href="gerenciarArea.php">Gerenciar</a></li>
            <li><a href="gerenciaQuiz.php">Quiz</a></li>
        </ol>
        <div class="col-lg-8 col-lg-offset-2" style="background-color: whitesmoke; border-radius: 10px; padding-bottom: 20px">
        <h2>Lista de Questões Nível: 0'.$nivel.'</h2>
                <table class="table table-hover table-inverse">
                    <thead>
                        <tr style="background-color: black; color: white">

                            <th>ID</th>
                            <th>Detalhes</th>
                            <th>Nível</th>
                            <th>Categoria</th>
                            <th>Tipo<th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>';
                    foreach ($pdo->query($sql) as $row){
                        $conteudo=$conteudo.'<tr>';
                            $conteudo=$conteudo.'<td>'.$row['idQuest'].'</td>';
                            $conteudo=$conteudo.'<td><a href="#" data-toggle="modal" data-target="#myEditar_'.$row['idQuest'].'">Ver</a></td>
                            
                            <div class="modal fade" id="myEditar_'.$row['idQuest'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">  
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Detalhes da Questão</h4>
                                            </div>
                                            <div class="modal-body">
                                                <dl class="dl-horizontal">
                                                <dt>Enunciado</dt>
                                                <dd>'.$row['enunciado'].'</dd>
                                                <dt>Alternativa 1</dt>
                                                <dd>'.$row['alt1'].'</dd>
                                                <dt>Alternativa 2</dt>
                                                <dd>'.$row['alt2'].'</dd>
                                                <dt>Alternativa 3</dt>
                                                <dd>'.$row['alt3'].'</dd>
                                                <dt>Alternativa 4</dt>
                                                <dd>'.$row['alt4'].'</dd>
                                                <dt>&nbsp;</dt><dd></dd>
                                                <dt>Correta</dt>
                                                <dd>'.$row['resposta'].'</dd>

                                              </dl>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                            </div>
                                        </div>
                                    </div>
                            </div>';
                        $conteudo=$conteudo.'<td>'.$row['idNivel'].'</td>';
                        $conteudo=$conteudo.'<td>'.$row['descCategoria'].'</td>';
                        $tipo='';
                        if($row['tipo']==1){$tipo='Texto';}else{$tipo='Audio';}
                        $conteudo=$conteudo.'<td>'.$tipo.'</td>';
                        $conteudo=$conteudo.'<td><a href="editaQuestao.php?id='.$row['idQuest'].'"><span class="glyphicon glyphicon-edit"></span> Editar</td></a>';
                    }
                    $conteudo=$conteudo.'</tbody>
                    
                </table>
                <a href="CadastraQuestoes.php" class="btn btn-block btn-success"><span class="glyphicon glyphicon-plus"></span>Adicionar</a>
        </div>
        </div>';
include_once ('masterProf.php');