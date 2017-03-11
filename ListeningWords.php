<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include_once('Data\Conexao.php');
$pdo = Database::connect();
$sql = 'SELECT * FROM levelup.palavras where idAluno='.$_SESSION['id'].' ORDER BY idPalavra desc limit 3';

$title='Word Listening';  
$conteudo='
        <ol class="breadcrumb">
            <li><a href="StudentArea.php">Home</a></li>
            <li><a href="QuizArea.php">Quiz Area</a></li>
            <li><a href="practiceArea.php">Practice Area</a></li>
        </ol>
        <div class="container">
            <div class="col-lg-6 col-lg-offset-2" style="background: whitesmoke; border-radius: 20px; padding: 10px 20px 10px 20px">
                <h2 style="text-align:center">Praticar Listening</h2>
                
                <p style="text-align:center">Aqui você pode conferir a pronúncia de palavras e sentenças em inglês e salvá-las para ouvir depois</p>
                <form action="incluirPalavras.php" method="post">
                    <div class="form-group">
                        <label>Digite uma palavra ou sentença</label>
                        <input type="text" class="form-control"  id="palavra" name="palavra" style="height: 50px;text-align: center " required>
                    </div>
                    <div class="row">
                    <div class="col-xs-6">
                        <button class="btn btn-block btn-primary" type="submit"> <span class="glyphicon glyphicon-save-file"></span> Salvar </button>
                    </div>
                    <div class="col-xs-6">
                        <button class="btn btn-block btn-success" type="button" onclick="speak(document.getElementById(\'palavra\').value)"><span class="glyphicon glyphicon-volume-up"></span> Ouvir </button><br>
                    </div>
                    
                    </div>

                </form>
                <hr/>
                <h2 style="text-align:center">Adicionadas Recentemente</h2>
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
                            $conteudo=$conteudo.'<td><button class="btn btn-success btn-sm" type="button" onclick="speak(\''.$row['palavra'].'\')"><span class="glyphicon glyphicon-volume-up"></span> Ouvir </button><br></td>
                        </tr>';
                        }
                    $conteudo=$conteudo.'</tbody>
                    
                </table>
                <a href="listaPalavras.php" class="btn btn-block btn-default">Ver todas</a>
            </div>

        </div>';
include_once 'masterStudent.php';