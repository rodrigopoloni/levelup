<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$title='Alunos';    
    include_once('Data\Conexao.php');
    $pdo = Database::connect();
    $sql = 'SELECT * FROM levelup.estudante where statusAluno=1 ORDER BY nome ASC';
    


$conteudo='
        <ol class="breadcrumb">
            <li><a href="gerenciarArea.php">Gerenciar</a></li>
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
                                $conteudo=$conteudo.'<td>'
                                        . '<a href="editaAluno.php?id='.$row['idUsuario'].'"><span class="glyphicon glyphicon-edit"></span> Editar</a> &nbsp; &nbsp;'
                                        . '<a href="#" data-toggle="modal" data-target="#Inativar_'.$row['idUsuario'].'"><span class="glyphicon glyphicon-trash"></span> Inativar</a></td>'
                                        . '<div class="modal fade" id="Inativar_'.$row[idUsuario].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">  
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title" id="myModalLabel">Inativar Usuário</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p style="text-align:center"><b>Realmente deseja inativar o(a) usuário(a) '.$row['nome'].' ?</p><p style="text-align:center"> Se inativado o mesmo não poderá mais acessar a aplicação.</b></p>
                                                    </div>
                                                <div class="modal-footer">
                                                    <form action="inativaAluno.php" method="post">
                                                        <input type="hidden" name="idAluno" value="'.$row[idUsuario].'">
                                                        <button type="submit" class="btn btn-primary">Inativar</button>    
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                    </form>
                                                </div>
                                                </div>
                                            </div>
                                        </div>';
                                $conteudo=$conteudo.'</tr>';
                                
                            };
                        $conteudo=$conteudo.'</tbody>
                    
                </table>
                <a href="CadastroUser.php" class="btn btn-block btn-success"><span class="glyphicon glyphicon-plus"></span>Adicionar</a><p></p>
                <p style="text-align:right"> <a href="listaInativos.php"> >> Listar alunos inativos</a></p> 

            </div>
        </div>';
Database::disconnect();
include_once ('masterProf.php');