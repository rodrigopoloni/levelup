<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include_once('Data\Conexao.php');
$pdo = Database::connect();
$sql = 'SELECT * FROM levelup.estudante where nivel='.$_SESSION['nivel'].' and statusAluno=1 and idUsuario!='.$_SESSION['id'];

$title="Chat Partner";

$conteudo='<div class="container">
            <div class="col-lg-8 col-lg-offset-1" style="background-color: whitesmoke; border-radius: 10px; padding-bottom: 20px">
                <h3 style="text-align:center">Convide alguém para um chat presencial em inglês!</h3>
                <h4 style="text-align:center; font-family: serif">Estudantes que estão no mesmo nível de proficiência que você.</h4>
                <table class="table table-striped">
                    <thead>
                        <tr style="background-color: black; color: white">
                            <th>Aluno</th>
                            <th>Curso</th>
                            <th>Semestre</th>
                            <th>Periodo</th>
                            <th></th>  
                        </tr>
                    </thead>
                    <tbody>
                        <tbody>';
                            
                            foreach ($pdo->query($sql) as $row){                           
                                $conteudo=$conteudo.'<tr>';
                                $conteudo=$conteudo.'<td>'.$row['nome'].'</td>';
                                $curso=0;
                                if($row['curso']==1) $curso="Info";
                                if($row['curso']==2) $curso="Agro";
                                if($row['curso']==3) $curso="ADS";
                                if($row['curso']==3) $curso="EAD";
                                $turno=0;
                                if($row['turno']==1){ $turno="Manhã";}
                                elseif($row['turno']==2){$turno="Tarde";}
                                elseif($row['turno']==3){$turno="Noite";}
                                else{$turno="EAD";}
                                $conteudo=$conteudo.'<td>'.$curso.'</td>';
                                $conteudo=$conteudo.'<td>'.$row['semestre'].'º Sem.</td>';
                                $conteudo=$conteudo.'<td>'.$turno.'</td>';
                                $conteudo=$conteudo.'<td><button class="btn btn-sm btn-danger btn-block" data-toggle="modal" data-target="#myEditar_'.$row[idUsuario].'">Convidar</button></td>
                                
                                <div class="modal fade" id="myEditar_'.$row[idUsuario].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">  
                                            <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Convite de Interação</h4>
                                            </div>
                                            <div class="modal-body">';
                                            
                                            $sqlContaNotif = 'select count(idNotif) as qtd from levelup.notifalunos where tipoNotif=2 and statusNotif=2 and idSender='.$_SESSION['id'].' and idReceiver='.$row[idUsuario].'';
                                            $temp = $pdo->query($sqlContaNotif)->fetch();
                                            $qtd=$temp['qtd'];
                                            
                                            if($qtd>=1){
                                              $conteudo=$conteudo.'Contato já tem solicitacao pendente de aprovação
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                </div>';
                                            }else{
                                             $conteudo=$conteudo.'Tem certeza que deseja convidar o contato selecionado para interagir?
                                                                                             
                                            </div>
                                            
                                            <div class="modal-footer">
                                                <form action="convidaChat.php" method="post">
                                                    <input type="hidden" name="idPartner" value="'.$row[idUsuario].'">
                                                    <button type="submit" class="btn btn-primary">Convidar</button>    
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                </form>
                                            </div>';}
                                $conteudo=$conteudo.'</div>
                                    </div>
                                </div>
                                </tr>';
                            }
                        $conteudo=$conteudo.'</tbody>

                </table>
               
            </div>
        </div>';
include_once 'masterStudent.php';