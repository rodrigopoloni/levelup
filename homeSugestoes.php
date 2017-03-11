<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$title='Sugestões';
session_start();
include_once('Data\Conexao.php');
$pdo = Database::connect();
$sql = 'SELECT * FROM levelup.recomendacoes a, levelup.estudante b where a.idAluno=b.idUsuario and a.statusRecomend=1 order by idRecomend desc limit 3';
$sql2 = 'SELECT * FROM levelup.recomendacoesprof a, levelup.professor b where a.idProf=b.idProfessor order by idRecomendProf desc limit 3';




$conteudo='<style>
            blockquote {
                font-family: Georgia, serif;
                font-size: 16px;
                font-style: italic;
                margin: 0.25em 0;
                padding: 0.25em 40px;
                line-height: 1.45;
                position: relative;
                color: #383838;
            }
            blockquote:before {
                display: block;
                content: "\201C";
                font-size: 80px;
                position: absolute;
                left: -20px;
                top: -20px;
                color: #7a7a7a;
            }
            blockquote cite {
                color: #999999;
                font-size: 14px;
                display: block;
                margin-top: 5px;
            }

            blockquote cite:before {
                content: "\2014 \2009";
            }
        </style>
        
        <div class="container">
        <div class="col-lg-10 col-lg-offset-1" style="background: whitesmoke; border-radius: 20px; padding: 10px 20px 10px 20px">
            <h3 style="text-align:center;font-family: Georgia, serif">Aqui você confere sites para aprender inglês indicados por alunos e professores</h3>
            <hr>
            <h4 style="text-align:center;">Últimas indicações adicionadas</h4>
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                
                    <div class="col-lg-6 " style="border-radius: 20px; padding: 10px 20px 10px 20px">
                        <h3>Sugestões de Alunos</h3>
                        <hr>';
                        foreach ($pdo->query($sql) as $row){
                            $conteudo=$conteudo.'<blockquote>';
                            $conteudo=$conteudo.''.$row['descRecomend'].'';
                            $conteudo=$conteudo.'<cite>'.$row['nome'].'</cite>';
                            $conteudo=$conteudo.'</blockquote> 
                            <p style="text-align:right"><a href="'.$row['endLink'].'" target="_blank"><small>Acessar</small></a></p>';                          
                        }
                    $conteudo=$conteudo.'</div>
                        
                    <div class="col-lg-6 " style="border-radius: 20px; padding: 10px 20px 10px 20px">
                        <h3>Sugestões de Professores</h3>
                        <hr>';
                        foreach ($pdo->query($sql2) as $row){
                            $conteudo=$conteudo.'<blockquote>';
                            $conteudo=$conteudo.''.$row['descRecomend'].'';
                            $conteudo=$conteudo.'<cite>'.$row['nome'].'</cite>';
                            $conteudo=$conteudo.'</blockquote> 
                            <p style="text-align:right"><a href="'.$row['endLink'].'" target="_blank"><small>Acessar</small> </a></p>';                          
                        }
                    $conteudo=$conteudo.'</div>
                </div>
                
                </div>
                
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">

                    <div class="col-lg-6 " style="border-radius: 20px; padding: 10px 20px 10px 20px">
                        <p style="text-align:center"><a href="todasSugAlunos.php"> Ver <i class="glyphicon glyphicon-plus-sign"></i> Sugestões</a></p> 
                    </div>
                    <div class="col-lg-6 " style="border-radius: 20px; padding: 10px 20px 10px 20px">
                        <p style="text-align:center"><a href="todasSugProfessores.php"> Ver <i class="glyphicon glyphicon-plus-sign"></i> Sugestões</a></p>
                    </div>

                </div>
                <br><br><br>
            </div>    
                <center>
                    <div class="row">
                    <div class="col-xs-6">
                        <button type="button" class="btn-block btn-primary" style="width:250px;height: 50px;border-radius: 5px" onclick="location.href=\'cadastraSugestao.php\'"><h4><i class="glyphicon glyphicon-copy"></i> Cadastrar Sugestão</h4></button>
                    </div>
                    <div class="col-xs-6">
                        <button class="btn-block btn-danger " style="width:250px;height: 50px;border-radius: 5px" onclick="location.href=\'listaSugestaoAluno.php\'"><h4><i class="glyphicon glyphicon-th-list"></i> Minhas Sugestões</h4></button>

                    </div>
                
                    </div>
                </center>
                
                


            </div>   
        </div>
    </div>';
                    
Database::disconnect();
include_once('masterStudent.php');
