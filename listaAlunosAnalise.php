<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$semestre=$_GET['semestre'];
$curso=$_GET['curso'];
$turno=$_GET['periodo'];



$title='Resultado Busca';    
include_once('Data\Conexao.php');
$pdo = Database::connect();
$sql = "SELECT * FROM levelup.estudante where semestre=".$semestre." and turno='".$turno."' and curso=".$curso;


if($curso==1) $curso="Informática para Negócios";
if($curso==2) $curso="Agronegócios";
if($curso==3) $curso="Análise e Desenvolvimento de Sistemas";
if($curso==4) $curso="Gestão Empresarial";


if($turno==1) $turno="Manhã";
if($turno==2) $turno="Tarde";
if($turno==3) $turno="Noite";
if($turno==4) $turno="EAD";


$conteudo='
        <ol class="breadcrumb">
            <li><a href="buscaAlunos.php">Busca</a></li>
        </ol>
        <div class="container">
            <div class="col-lg-8 col-lg-offset-1" style="background-color: whitesmoke; border-radius: 10px; padding-bottom: 20px">
                <h4><b>Resultados para:</b>  '.$curso.' - '.$semestre.'º Semestre - '.$turno.'</h4>
                <table class="table table-hover table-inverse">
                    <thead>
                        <tr style="background-color: black; color: white">

                            <th>Nome</th>
                            <th>Nivel</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>';
                            
                            foreach ($pdo->query($sql) as $row){
                                $sqlData='select data from respondidas where idAluno='.$row[idUsuario].' order by data desc limit 1';
                                $resultado = $pdo->query($sqlData)->fetch()['data'];
                                if(isset($resultado)){
                                $data=date('d/m/Y H:i:s',  strtotime($resultado));
                                }else{$data='Nenhum acesso ao QUIZ';}
                                $conteudo=$conteudo.'<tr>';
                                $conteudo=$conteudo.'<td>'.$row['nome'].'</td>';
                                $conteudo=$conteudo.'<td>'.$row['nivel'].'</td>';
                                $conteudo=$conteudo.'<td style="text-align:right">'
                                        . '<a href="estatisticasAluno.php?id='.$row['idUsuario'].'"><span class="glyphicon glyphicon-edit"></span> Estatísticas</a> &nbsp; &nbsp; &nbsp;'
                                        . '<a href="#" data-toggle="modal" data-target=".bs-example-modal-sm_'.$row[idUsuario].'"><span class="glyphicon glyphicon-time"></span> Último Acesso Quiz</a>
                                            <div class="modal fade bs-example-modal-sm_'.$row[idUsuario].'" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                                <div class="modal-dialog modal-sm" role="document">
                                                    <div class="modal-content">
                                                        <div style="padding: 8px 8px 8px 8px">        
                                                            <p style="text-align:left"><b>Último acesso ao QUIZ em:</b></p> 
                                                            <p style="text-align:right">'.$data.' </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>'
                                        . '</td> ';
                                $conteudo=$conteudo.'</tr>';
                                
                            };
                        $conteudo=$conteudo.'</tbody>
                    
                </table>
            </div>
        </div>';
Database::disconnect();
include_once ('masterProf.php');

