<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include_once('Data\Conexao.php');
$pdo = Database::connect();
$sql2 = 'SELECT * FROM levelup.recomendacoes a, levelup.estudante b where a.idAluno=b.idUsuario and idProfResp='.$_SESSION['id'];


$title='Historico Notificacoes';    
$conteudo='<div class="container">
            <ol class="breadcrumb">
                <li><a href="notifProfessor.php">Notificações</a></li>
            </ol>
            <div class="col-lg-8 col-lg-offset-1" style="background-color: whitesmoke; border-radius: 10px; padding-bottom: 20px">
                <h2>Sugestões de Alunos</h2>
                <table class="table table-hover table-inverse">
                    <thead>
                        <tr style="background-color: black; color: white">

                            <th>ID</th>
                            <th>Link</th>
                            <th>Aluno</th>
                            <th>Status</hr>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>';
                            
                            foreach ($pdo->query($sql2) as $row){
                                $conteudo=$conteudo.'<tr>';
                                $conteudo=$conteudo.'<td>'.$row['idRecomend'].'</td>';
                                $conteudo=$conteudo.'<td>'.$row['endLink'].'</td>';
                                $conteudo=$conteudo.'<td>'.$row['nome'].'</td>';
                                $status=0;
                                if($row['statusRecomend']==1) $status="Aprovada";
                                if($row['statusRecomend']==2) $status="Pendente";
                                if($row['statusRecomend']==3) $status="Reprovada";
                                $conteudo=$conteudo.'<td>'.$status.'</td>';
                                $conteudo=$conteudo.'</tr>';
                                
                            };
                        $conteudo=$conteudo.'</tbody>
                    
                </table>
            </div>
        </div>';
include_once 'masterProf.php';