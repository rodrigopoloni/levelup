<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
$title="Meus Chats";
include_once('Data\Conexao.php');
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$hoje=date("Y-m-d");


$sql='select*from levelup.chat as a where a.statusChat=1 and a.data="'.$hoje.'"';
$sql2='select*from levelup.chat as a where a.statusChat=1 and a.data>"'.$hoje.'" order by a.data asc';


$conteudo='<div class="col-lg-6 col-lg-offset-3" style="background-color: whitesmoke; border-radius: 10px; padding-bottom: 20px">
            <h3 style="text-align:center">Chats marcados para hoje</h3>
            <hr>';
            foreach($pdo->query($sql) as $row){
                $convidante = $row['idConvidante'];
                $convidado = $row['idConvidado'];
                if($convidante==$_SESSION['id']){
                    $resultado="select*from chat as a, estudante as b where a.idConvidado=b.idUsuario and idChat=".$row['idChat'];
                    $dadosconvidado = $pdo->query($resultado)->fetch();
                    $conteudo=$conteudo.'<div class="row" style="background-color:whitesmoke">
                    <div class="col-md-2">
                    <i style="font-size: 6em;padding-top: 10%;padding-left: 10%" class="glyphicon glyphicon-calendar"></i>
                    </div>
                    <div class="col-md-8">
                    <h4><i class="glyphicon glyphicon-user"></i> '.$dadosconvidado['nome'].'</h4>
                    <h4><i class="glyphicon glyphicon-time"></i> '.$dadosconvidado['hora'].'</h4>
                    <h4><i class="glyphicon glyphicon-home"></i> '.$dadosconvidado['local'].' </h4>
                </div>
            </div> <hr>';
                }elseif($convidado==$_SESSION['id']){
                    {
                    $resultado="select*from chat as a, estudante as b where a.idConvidante=b.idUsuario and idChat=".$row['idChat'];
                    $dadosconvidante = $pdo->query($resultado)->fetch();
                    $conteudo=$conteudo.'<div class="row" style="background-color:whitesmoke">
                    <div class="col-md-2">
                    <i style="font-size: 6em;padding-top: 10%;padding-left: 10%" class="glyphicon glyphicon-calendar"></i>
                    </div>
                    <div class="col-md-8">
                    <h4><i class="glyphicon glyphicon-user"></i> '.$dadosconvidante['nome'].'</h4>
                    <h4><i class="glyphicon glyphicon-time"></i> '.$dadosconvidante['hora'].'</h4>
                    <h4><i class="glyphicon glyphicon-home"></i> '.$dadosconvidante['local'].' </h4>
                </div>
            </div> <hr>';
                }
                }
                
              
            }
        $conteudo=$conteudo.'</div>
            
        <div class="col-lg-6 col-lg-offset-3" style="background-color: whitesmoke; border-radius: 10px; padding-bottom: 20px">
        <h3 style="text-align:center">Próximos chats marcados</h3>
        <table class="table table-hover table-inverse">
                    <thead>
                        <tr style="background-color: black; color: white">

                            <th>Nome</th>
                            <th>Data</th>
                            <th>Hora</th>
                            <th>Local</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>';
                        foreach($pdo->query($sql2) as $row){
                            $convidante = $row['idConvidante'];
                            $convidado = $row['idConvidado'];
                            $conteudo=$conteudo.'<tr>';
                            if($convidante==$_SESSION['id']){
                                $result="select*from chat as a, estudante as b where a.idConvidado=b.idUsuario and idChat=".$row['idChat'];
                                $dadosconvidado = $pdo->query($result)->fetch();
                                $conteudo=$conteudo.'<td>'.$dadosconvidado['nome'].'</td>';
                                $conteudo=$conteudo.'<td>'.date('d/m/Y',  strtotime($row['data'])).'</td>';
                                $conteudo=$conteudo.'<td>'.$row['hora'].'</td>';
                                $conteudo=$conteudo.'<td>'.$row['local'].'</td>';
                                $conteudo=$conteudo.'</tr>';
                            }elseif($convidado==$_SESSION['id']){
                                $result="select*from chat as a, estudante as b where a.idConvidante=b.idUsuario and idChat=".$row['idChat'];
                                $dadosconvidante = $pdo->query($result)->fetch();
                                $conteudo=$conteudo.'<td>'.$dadosconvidante['nome'].'</td>';
                                $conteudo=$conteudo.'<td>'.date('d/m/Y',  strtotime($row['data'])).'</td>';
                                $conteudo=$conteudo.'<td>'.$row['hora'].'</td>';
                                $conteudo=$conteudo.'<td>'.$row['local'].'</td>';
                                $conteudo=$conteudo.'</tr>';
                            }
                        }
                    $conteudo=$conteudo.'</tbody>
                    
                </table> </div>';

include_once ('masterStudent.php');
Database::disconnect();

