<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$title='Alunos';    
    include_once('Data\Conexao.php');
    $pdo = Database::connect();
    $sql = 'SELECT * FROM levelup.estudante where statusAluno=2 ORDER BY nome ASC';
    


$conteudo='
        <ol class="breadcrumb">
            <li><a href="gerenciarArea.php">Gerenciar</a></li>
            <li><a href="listaAlunos.php">Alunos</a></li>
        </ol>
        <div class="container">
            <div class="col-lg-8 col-lg-offset-1" style="background-color: whitesmoke; border-radius: 10px; padding-bottom: 20px">
                <h2>Alunos</h2>
                <table class="table table-hover table-inverse">
                    <thead>
                        <tr style="background-color: black; color: white">

                            <th>Nome</th>
                            <th>Usuario</th>
                            <th>Curso</th>
                            <th>Nivel</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>';
                            
                            foreach ($pdo->query($sql) as $row){
                                $conteudo=$conteudo.'<tr>';
                                $conteudo=$conteudo.'<td>'.$row['nome'].'</td>';
                                $conteudo=$conteudo.'<td>'.$row['username'].'</td>';
                                $curso=0;
                                if($row['curso']==1) $curso="Info";
                                if($row['curso']==2) $curso="Agro";
                                if($row['curso']==3) $curso="ADS";
                                if($row['curso']==4) $curso="EAD";
                                $conteudo=$conteudo.'<td>'.$curso.'</td>';
                                $conteudo=$conteudo.'<td>'.$row['nivel'].'</td>';
                                $conteudo=$conteudo.'<td style="color:red">INATIVO  &nbsp; <a href="reativaAluno.php?id='.$row['idUsuario'].'"><span class="glyphicon glyphicon-user"></span> Ativar</a></td></td>';
                                $conteudo=$conteudo.'</tr>';
                                
                            };
                        $conteudo=$conteudo.'</tbody>
                    
                </table>

            </div>
        </div>';
Database::disconnect();
include_once ('masterProf.php');