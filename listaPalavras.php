<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once('Data\Conexao.php');
$pdo = Database::connect();
$sql = 'SELECT * FROM levelup.palavras where idAluno='.$_SESSION['id'].' ORDER BY idPalavra desc';

$title='Minhas Palvras';

$conteudo='<ol class="breadcrumb">
            <li><a href="StudentArea.php">Home</a></li>
            <li><a href="QuizArea.php">Quiz Area</a></li>
            <li><a href="practiceArea.php">Practice Area</a></li>
            <li><a href="ListeningWords.php">Word Listening</a></li>
        </ol>
        <div class="container">
            <div class="col-lg-6 col-lg-offset-2" style="background: whitesmoke; border-radius: 20px; padding: 10px 20px 10px 20px">
                <h2 style="text-align:center">Praticar Listening</h2>
                <table class="table table-hover table-inverse">
                    <thead>
                        <tr style="background-color: black; color: white">

                            <th>Palavra / Expressão</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>';
                    foreach($pdo->query($sql) as $row){
                            $conteudo=$conteudo.'<tr><td>'.$row['palavra'].'</td>';
                            $conteudo=$conteudo.'<td style="text-align:right"><button class="btn btn-success btn-sm" type="button" onclick="speak(\''.$row['palavra'].'\')"><span class="glyphicon glyphicon-volume-up"></span> Ouvir </button>&nbsp; <a class="btn btn-sm btn-danger" href="excluirPalavra.php?id='.$row['idPalavra'].'"><i class="glyphicon glyphicon-remove"></i> Remover</a></td>
                                
                        </tr>';
                        }
                    $conteudo=$conteudo.'</tbody>
                    
                </table>
                
            </div>

        </div>';

include_once 'masterStudent.php';