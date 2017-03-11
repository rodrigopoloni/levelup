<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$title="Sugestões de Professores";
include_once('Data\Conexao.php');
$pdo = Database::connect();
$sql="select * from recomendacoesprof as a, professor as b where a.idProf=b.idProfessor order by idRecomendProf desc";


$conteudo='<ol class="breadcrumb">
            <li><a href="homeSugestoes.php">Sugestões</a></li>
        </ol><div class="col-lg-8 col-lg-offset-2" style="background: whitesmoke; border-radius: 20px; padding: 10px 20px 10px 20px">
                <h3 style="text-align:center">Sugestões de Professores</h3>
                <hr>';
foreach ($pdo->query($sql) as $row){
                $conteudo=$conteudo.'<dl class="dl-horizontal">
                    <dt>Indicado por:</dt>
                    <dd><i class="glyphicon glyphicon-user"></i><b>'.$row['nome'].'</b></dd>
                    <dt>Descricao</dt>
                    <dd>'.$row['descRecomend'].'</dd>
                    <dt></dt>
                    <dd>
                        <a href="'.$row['endLink'].'" class="btn btn-sm btn-success" target="_blank" rel="tooltip" title="Acessar Link"><i class="glyphicon glyphicon-arrow-right"></i></a>  &nbsp;';                        
                        $recomendacao=$row['idRecomendProf'];
                        $id=$_SESSION['id'];
                        $sql2=("select count(*) as qtd from levelup.favoritos where idAluno=".$id." and recomendProf=".$recomendacao);
                        $resultado = $pdo->query($sql2)->fetch();
                        $qtd=$resultado['qtd'];
                        
                        if($qtd>=1){
                            $conteudo=$conteudo.'<a href="#" class="btn btn-sm btn-danger" rel="tooltip" title="Remover dos Favoritos" data-toggle="modal" data-target=".bs-example-modal-sm2_'.$row['idRecomendProf'].'"> <i class="glyphicon glyphicon-heart"></i></a>'
                            . '<div class="modal fade bs-example-modal-sm2_'.$row['idRecomendProf'].'" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">

                                    <div style="padding: 8px 8px 8px 8px">
                                        <hr>
                                        <p style="text-align:center"><b>Deseja realmente remover este item de seus Favoritos?</b></p>
                                        <form action="removeFavorito.php" method="post">
                                            <div class="form-group">

                                                <input type="hidden" name="idRecProf" value="'.$row['idRecomendProf'].'">
                                            </div>
                                            <button class="btn btn-block btn-danger" type="submit"><span class="glyphicon glyphicon-heart-empty"></span> Remover </button><br>

                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>';
                        }else{                        
                            $conteudo=$conteudo.'<a href="#" class="btn btn-sm btn-danger" rel="tooltip" title="Adicionar aos Favoritos" data-toggle="modal" data-target=".bs-example-modal-sm1_'.$row['idRecomendProf'].'"><i class="glyphicon glyphicon-heart-empty"></i></a>'
                        . '<div class="modal fade bs-example-modal-sm1_'.$row['idRecomendProf'].'" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">

                                    <div style="padding: 8px 8px 8px 8px">
                                        <hr>
                                        <p><b>Indicado por:</b> '.$row['nome'].'</p>
                                        <p><b>Link:</b> '.$row['endLink'].'</p>
                                        <form action="incluiFavorito.php" method="post">
                                            <div class="form-group">

                                                <input type="hidden" name="idRecProf" value="'.$row['idRecomendProf'].'">
                                                <input type="hidden" name="link" value="'.$row['endLink'].'">
                                            </div>
                                            <button class="btn btn-block btn-danger" type="submit"><span class="glyphicon glyphicon-heart"></span> Adicionar </button><br>

                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>';
                        }       
                        $conteudo=$conteudo.'
            
                    </dd>
                </dl>';}
$conteudo=$conteudo.'</div>';
Database::disconnect();
include_once ('masterStudent.php');
   