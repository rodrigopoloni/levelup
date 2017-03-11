<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    session_start();
    $title='Minhas Sugestões';    
    include_once('Data\Conexao.php');
    $pdo = Database::connect();
    $sql = 'SELECT * FROM levelup.recomendacoes where idAluno='.$_SESSION['id'];
    


$conteudo='<ol class="breadcrumb">
            <li><a href="homeSugestoes.php">Sugestões</a></li>
        </ol>
    <div class="container">
    
            <div class="col-lg-8 col-lg-offset-1" style="background-color: whitesmoke; border-radius: 10px; padding-bottom: 20px">
                <h2>Minhas Sugestões</h2>
                <table class="table table-hover table-inverse">
                    <thead>
                        <tr style="background-color: black; color: white">

                            <th>ID</th>
                            <th>Link</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>';
                            
                            foreach ($pdo->query($sql) as $row){
                                $conteudo=$conteudo.'<tr>';
                                $conteudo=$conteudo.'<td>'.$row['idRecomend'].'</td>';
                                $conteudo=$conteudo.'<td>'.$row['endLink'].'</td>';
                                $status=0;
                                if($row['statusRecomend']==1) $status="Aprovada";
                                if($row['statusRecomend']==2) $status="Pendente";
                                if($row['statusRecomend']==3) $status="Reprovada";
                                $conteudo=$conteudo.'<td>'.$status.'</td>';
                                $conteudo=$conteudo.'</tr>';
                                
                            };
                        $conteudo=$conteudo.'</tbody>
                    
                </table>
                <a href="cadastraSugestao.php" class="btn btn-block btn-success"><span class="glyphicon glyphicon-plus"></span>Adicionar</a> 
            </div>
        </div>';
Database::disconnect();
include_once ('masterStudent.php');

