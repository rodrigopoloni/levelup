<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$title='Favoritos';    
    include_once('Data\Conexao.php');
    $pdo = Database::connect();
    $sql = 'SELECT * FROM levelup.favoritos where idAluno='.$_SESSION['id'].' order by idFav desc';
    
    $conteudo='
        <div class="container">
            <div class="col-lg-8 col-lg-offset-1" style="background-color: whitesmoke; border-radius: 10px; padding-bottom: 20px">
                <h2>Meus links Favoritos</h2>
                <table class="table table-hover table-inverse">
                    <thead>
                        <tr style="background-color: black; color: white">

                            <th>Link</th>
                        </tr>
                    </thead>
                    <tbody>';
                            
                            foreach ($pdo->query($sql) as $row){
                                $conteudo=$conteudo.'<tr>';
                                $conteudo=$conteudo.'<td>'.$row['endereco'].' <a href="'.$row['endereco'].'" target="_blank"><i class="glyphicon glyphicon-share"></i></a></td>';
                                $conteudo=$conteudo.'</tr>';
                                
                            };
                        $conteudo=$conteudo.'</tbody>
                    
                </table>
                
            </div>
        </div>';
Database::disconnect();
include_once ('masterStudent.php');
