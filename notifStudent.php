<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include_once('Data\Conexao.php');
$pdo = Database::connect();
$sql = 'SELECT * FROM levelup.notifalunos as a, levelup.estudante as b, levelup.recomendacoes as c where (c.idRecomend=a.sugestao) and (idReceiver='.$_SESSION['id'].') and (a.idReceiver=b.idUsuario) and (vista=0) and (tipoNotif=1)';
$sql2 = 'SELECT * FROM levelup.notifalunos as a, levelup.estudante as b where (idReceiver='.$_SESSION['id'].') and (a.idSender=b.idUsuario) and (vista=0) and (tipoNotif=2)';
$sql3 = 'SELECT * FROM levelup.notifalunos as a, levelup.estudante as b, levelup.chat as c where (c.idChat=a.chat) and (idReceiver='.$_SESSION['id'].') and (a.idSender=b.idUsuario) and (vista=0) and (tipoNotif=3)';
$hoje=date("Y-m-d");


$title='Notificações';    
$conteudo='<div class="container">
            
            <h5><span class="glyphicon glyphicon-bookmark"></span> Notificação de Sugestões</h5>
            <hr>';

            foreach ($pdo->query($sql) as $row){
                $conteudo=$conteudo.'<p><form class="form-inline" action="marcaLida.php" method="post"> Sua indicação <b><a rel="tooltip" title="'.$row['descRecomend'].'">#'.$row['sugestao'].'</a></b> para o link sugerido <small><a href="'.$row['endLink'].'" target="_blank">[ver]</a></small> foi ';
                
                if($row['statusNotif']==1){
                   $conteudo=$conteudo.'APROVADA'; 
                }else{
                   $conteudo=$conteudo.'REPROVADA';
                }
                
                $conteudo=$conteudo.' pelo professor. <input type="hidden" name="idNotif" value="'.$row['idNotif'].'"><button class="btn btn-sm btn-default" >Marcar como lida</button></form> </p>';
                
                
            }
            
            $conteudo=$conteudo.'<br><br>
                <h5><span class="glyphicon glyphicon-user"></span> Convites de Interação </h5>
            <hr>';

            foreach ($pdo->query($sql2) as $row){
                
                if($row['statusNotif']==2){
                   $conteudo=$conteudo.'<p><b>'.$row['nome'].'</b> lhe convidou para interação. <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myEditar_'.$row[idNotif].'" >Ver Perfil</button>
                            <div class="modal fade" id="myEditar_'.$row[idNotif].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">  
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">Convite de Interação</h4>
                                    </div>';
                                   
                                    $curso=0;
                                    if($row['curso']==1){ $curso="Informática para Negócios";}
                                    elseif($row['curso']==2){$curso="Análise e Desenvolvimento de Sistemas";}
                                    elseif($row['curso']==3){$curso="Agronegócios";}
                                    else{$curso="Gestão Empresarial EAD";}
                                    
                                    $turno=0;
                                    if($row['turno']==1){ $turno="Manhã";}
                                    elseif($row['turno']==2){$turno="Tarde";}
                                    elseif($row['turno']==3){$turno="Noite";}
                                    else{$turno="EAD";}
                                    
                                    $conteudo=$conteudo.'<div class="modal-body">
                                        <dl class="dl-horizontal">
                                            <dt>Nome Aluno</dt>
                                            <dd>'.$row['nome'].'</dd>
                                            <dt>Curso</dt>
                                            <dd>'.$curso.'</dd>
                                            <dt>Semestre</dt>
                                            <dd>'.$row['semestre'].'º Semestre</dd>
                                            <dt>Período</dt>
                                            <dd> '.$turno.'</dd>
                                            <dt>Facebook</dt>
                                            <dd>';
                                            if($row['facebook']==null or $row['facebook']=='null'){
                                                $conteudo=$conteudo.'-- Não informado --';
                                            }else{
                                               $conteudo=$conteudo.'<a href="'.$row['facebook'].'" target="_blank">Ver</a>'; 
                                            }
                                            $conteudo=$conteudo.'</dd>
                                            <dt>WhatsApp</dt>
                                            <dd>';
                                            if($row['whats']==null or $row['whats']=='null'){
                                                $conteudo=$conteudo.'-- Não informado --';
                                            }else{
                                               $conteudo=$conteudo.''.$row['whats'].''; 
                                            }
                                            $conteudo=$conteudo.'</dd>
                                            <dt>Instagram</dt>
                                            <dd>';
                                            if($row['instagram']==null or $row['instagram']=='null'){
                                                $conteudo=$conteudo.'-- Não informado --';
                                            }else{
                                               $conteudo=$conteudo.'<a href="http://www.instagram.com/'.$row['instagram'].'" target="_blank">Ver Perfil</a>'; 
                                            }
                                            $conteudo=$conteudo.'</dd>
                                          </dl>
                                          <center>
                                        <form action="aprova_reprovaInteracao.php" method="post">
                                             <div class="btn-group btn-group-sml">
                                                <input type="hidden" name="idNotif" value="'.$row[idNotif].'">
                                                <input type="hidden" name="idReceiver" value="'.$row[idSender].'">
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
                                </div></div>'; 
                }elseif($row['statusNotif']==1){
                   $conteudo=$conteudo.'<p><b>'.$row['nome'].'</b> APROVOU seu pedido de interação. <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#myEditar_'.$row[idNotif].'" >Marcar Chat</button></p>
                            <div class="modal fade" id="myEditar_'.$row[idNotif].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">  
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Marcar Chat</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="incluirChat.php" method="post">
                                                        <input type="hidden" name="idNotif" value="'.$row[idNotif].'">
                                                        <div class="form-group">
                                                            <label>Nome do Convidado</label>
                                                            <input type="hidden" name="idConvidado" value="'.$row[idSender].'">
                                                            <input type="text" class="form-control"  name="Convidado" value="'.$row[nome].'" readonly>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Data</label>
                                                            <input type="date" class="form-control" name="data" min="'.$hoje.'" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Hora</label>
                                                            <input type="time" class="form-control" name="hora" required>
                                                        </div> 

                                                        <div class="form-group">
                                                            <label>Local</label>
                                                            <input type="text" class="form-control" name="local" placeholder="Digite um local para o CHAT" required>
                                                        </div> 

                                                        <button class="btn btn-block btn-success" type="submit"> <span class="glyphicon glyphicon-check"></span> Marcar </button><br>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                }else{
                   $conteudo=$conteudo.'<p><form class="form-inline" action="marcaLida.php" method="post"><b>'.$row['nome'].'</b> REPROVOU seu pedido de interação. <input type="hidden" name="idNotif" value="'.$row['idNotif'].'"><button class="btn btn-sm btn-default" >Marcar como lida</button></form> </p>'; 
                }
                
                
                
            }
            
            $conteudo=$conteudo.'<br><br>
            <h5><span class="glyphicon glyphicon-comment"></span> Convites de Chat</h5>
            <hr>';

            foreach ($pdo->query($sql3) as $row){
                
                if($row['statusNotif']==2){
                   $conteudo=$conteudo.'<p><b>'.$row['nome'].'</b> lhe convidou para um Chat. <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myEditar_'.$row[idChat].'" >Ver Detalhes</button></p>
                           <div class="modal fade" id="myEditar_'.$row[idChat].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">  
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">Convite para Chat</h4>
                                    </div>
                                    <div class="modal-body">
                                        <dl class="dl-horizontal">
                                            <dt>Nome Aluno</dt>
                                            <dd>'.$row['nome'].'</dd>
                                            <dt>Local</dt>
                                            <dd>'.$row['local'].'</dd>
                                            <dt>Data</dt>
                                            <dd>'.date('d/m/Y',  strtotime($row['data'])).'</dd>
                                            <dt>Hora</dt>
                                            <dd> '.$row['hora'].'</dd>
                                          </dl>
                                          <center>
                                        <form action="aprova_reprovaChat.php" method="post">
                                             <div class="btn-group btn-group-sml">
                                                <input type="hidden" name="idChat" value="'.$row[idChat].'">
                                                <input type="hidden" name="idNotif" value="'.$row[idNotif].'">
                                                <input type="hidden" name="idReceiver" value="'.$row[idSender].'">
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
                                </div></div>'; 
                }elseif($row['statusNotif']==1){
                   $conteudo=$conteudo.'<p><form class="form-inline" action="marcaLida.php" method="post"><input type="hidden" name="idNotif" value="'.$row['idNotif'].'"><b>'.$row['nome'].'</b> APROVOU seu pedido de Chat. <button class="btn btn-sm btn-default" >Marcar como lida</button></form></p>';
                }else{
                   $conteudo=$conteudo.'<p><form class="form-inline" action="marcaLida.php" method="post"><input type="hidden" name="idNotif" value="'.$row['idNotif'].'"><b>'.$row['nome'].'</b> REPROVOU seu pedido de Chat. <button class="btn btn-sm btn-default" >Marcar como lida</button></form></p>'; 
                }       
                
            }
            
            $conteudo=$conteudo.'</div>
';
Database::disconnect();
include_once ('masterStudent.php');