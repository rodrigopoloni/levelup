<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$title='Níveis';    
include_once('Data\Conexao.php');
    $pdo = Database::connect();
    $sql = 'SELECT * FROM levelup.niveis as a, levelup.professor as b where a.idProfResp=b.idProfessor ORDER BY nivel asc';

$conteudo='<div class="container">
        <ol class="breadcrumb">
            <li><a href="gerenciarArea.php">Gerenciar</a></li>
            <li><a href="gerenciaQuiz.php">Quiz</a></li>
        </ol>
            <div class="col-lg-8 col-lg-offset-1" style="background-color: whitesmoke; border-radius: 10px; padding-bottom: 20px">
                <h2>Níveis</h2>
                <table class="table table-hover table-inverse">
                    <thead>
                        <tr style="background-color: black; color: white">

                            <th>Descrição</th>
                            <th>Professor</th>
                            <th>Pont. Mínima</th>
                            <th>Pont. Máxima</th>
                            <th>Qtd. Questões</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>';
                        foreach($pdo->query($sql) as $row){
                            $conteudo=$conteudo.'<tr><td>'.$row['nivelDesc'].'</td>';
                            $conteudo=$conteudo.'<td>'.$row['nome'].'</td>';
                            $conteudo=$conteudo.'<td>'.$row['ptosMin'].'</td>';
                            $conteudo=$conteudo.'<td>'.$row['ptosMax'].'</td>';
                            $conteudo=$conteudo.'<td>'.$row['qtdQuestoes'].'</td>';
                            $conteudo=$conteudo.'<td><a href="editaNivel.php?id='.$row['nivel'].'" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-edit"></span> Editar</a></td>
                        
                        </tr>';
                        }
                    $conteudo=$conteudo.'</tbody>
                    
                </table>
                <a href="cadastraNivel.php" class="btn btn-block btn-success"><span class="glyphicon glyphicon-plus"></span>Adicionar</a> 
            </div>
        </div>';
                    Database::disconnect();
include_once ('masterProf.php');