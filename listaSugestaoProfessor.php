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
$sql = 'SELECT * FROM levelup.recomendacoesprof where idProf='.$_SESSION['id'];
    


$conteudo='<div class="container">
            <ol class="breadcrumb">
                <li><a href="gerenciarArea.php">Gerenciar</a></li>
            </ol>
            <div class="col-lg-8 col-lg-offset-1" style="background-color: whitesmoke; border-radius: 10px; padding-bottom: 20px">
                <h2>Minhas Sugestões</h2>
                <table class="table table-hover table-inverse">
                    <thead>
                        <tr style="background-color: black; color: white">

                            <th>ID</th>
                            <th>Link</th>
                            <th>Descrição</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>';
                            
                            foreach ($pdo->query($sql) as $row){
                                $conteudo=$conteudo.'<tr>';
                                $conteudo=$conteudo.'<td>'.$row['idRecomendProf'].'</td>';
                                $conteudo=$conteudo.'<td> <a href="'.$row['endLink'].'" target="_blank"> Ver</a></td>';
                                $conteudo=$conteudo.'<td>'.$row['descRecomend'].'</td>';
                                $conteudo=$conteudo.'<td> <a href="editaRecomendProf.php?id='.$row['idRecomendProf'].'"> <span class="glyphicon glyphicon-edit"></span> Editar</a> &nbsp; &nbsp;'
                                        . '<a href="excluiRecomendProf.php?id='.$row['idRecomendProf'].'" ><span class="glyphicon glyphicon-trash"></span> Excluir</a>'
                                        . '</td>';
                                $conteudo=$conteudo.'</tr>';
                                
                            };
                        $conteudo=$conteudo.'</tbody>
                    
                </table>
                <a href="cadastraSugestaoProf.php" class="btn btn-block btn-success"><span class="glyphicon glyphicon-plus"></span>Adicionar</a> 
              
            </div>
        </div>';
Database::disconnect();
include_once ('masterProf.php');