<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include_once('Data\Conexao.php');
$pdo = Database::connect();
$sql = 'SELECT * FROM levelup.recomendacoes as a, levelup.estudante as b where (statusRecomend=2) and (idProfResp='.$_SESSION['id'].') and (a.idAluno=b.idUsuario)';


$title='Notificacoes';    
$conteudo='<div class="container">
            <div class="col-lg-8 col-lg-offset-1" style="background-color: whitesmoke; border-radius: 10px; padding-bottom: 20px">
                <h2>Notificações</h2>
                <table class="table table-striped">
                    <thead>
                        <tr style="background-color: black; color: white">

                            <th>ID</th>
                            <th>Aluno</th>
                            <th>Curso</th>
                            <th>Semestre</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>';
                            
                            foreach ($pdo->query($sql) as $row){
                                $conteudo=$conteudo.'<tr>';
                                $conteudo=$conteudo.'<td>'.$row['idRecomend'].'</td>';
                                $conteudo=$conteudo.'<td>'.$row['nome'].'</td>';
                                $curso=0;
                                if($row['curso']==1) $curso="Info";
                                if($row['curso']==2) $curso="Agro";
                                if($row['curso']==3) $curso="ADS";
                                $conteudo=$conteudo.'<td>'.$curso.'</td>';
                                $conteudo=$conteudo.'<td>'.$row['semestre'].'º </td>';
                                $conteudo=$conteudo.'<td><button class="btn btn-sm btn-danger btn-block" data-toggle="modal" data-target="#myEditar_'.$row[idRecomend].'" >Ver</button></td>
                                <div class="modal fade" id="myEditar_'.$row[idRecomend].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">  
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">Aprovação</h4>
                                    </div>
                                    <div class="modal-body">
                                        <dl class="dl-horizontal">
                                            <dt>#Recomendação</dt>
                                            <dd>'.$row[idRecomend].'</dd>
                                            <dt>Aluno</dt>
                                            <dd>'.$row[nome].'</dd>
                                            <dt>Descrição</dt>
                                            <dd>'.$row[descRecomend].'  <a href="#" data-toggle="modal" data-target=".bs-example-modal-sm1_'.$row[idRecomend].'"><i class="glyphicon glyphicon-edit"></i> Editar</a>
                                                
                                            <div class="modal fade bs-example-modal-sm1_'.$row[idRecomend].'" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                            <div class="modal-dialog modal-sm" role="document">
                                                <div class="modal-content">

                                                    <div style="padding: 8px 8px 8px 8px">
                                                        <form action="alteraDescRecomendacao.php" method="post">
                                                        <p style="text-align:center"><small>Alterar Descricão</small></p>
                                                            <div class="form-group">
                                                                <label>Descição</label>
                                                                <input type="hidden" name="idRecomend" value="'.$row[idRecomend].'">
                                                                <textarea class="form-control"  name="descricao">'.$row[descRecomend].'</textarea>
                                                            </div>
                                                            <button class="btn btn-block btn-danger" type="submit"><span class="glyphicon glyphicon-plus-sign"></span> Alterar </button><br>

                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>    

                                            </dd>
                                            <dt>Link Recomendado</dt>
                                            <dd> <a href="'.$row[endLink].'" target="_blank">Acessar</a></dd>
                                          </dl>
                                          <center>
                                        <form action="aprova_reprovaSugestao.php" method="post">
                                             <div class="btn-group btn-group-sml">
                                                <input type="hidden" name="idRecomend" value="'.$row[idRecomend].'">
                                                <input type="hidden" name="idAluno" value="'.$row[idAluno].'">
                                                <button type="submit" class="btn btn btn-success" style="width:200px" name="aprovar">Aprovar</button>
                                                <button type="submit" class="btn btn-danger" style="width:200px" name="reprovar">Recusar</button>
                                                
                                              </div>
                                        </form> 
                                        </center>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    </div>
                                </div>
                                </div>';
                                $conteudo=$conteudo.'</tr>';
                                
                            };
                        $conteudo=$conteudo.'</tbody>

                </table>
                <a href="histNotifProf.php" class="btn btn-block btn-default"><span class="glyphicon glyphicon-folder-open"></span>&nbsp; Ver Todas</a> 
                
                
            </div>    
            </div>
        </div>';
Database::disconnect();
include_once ('masterProf.php');