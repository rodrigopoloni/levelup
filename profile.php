<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include_once('Data\Conexao.php');
$senhaSessao=$_SESSION['senha'];
$pdo = Database::connect();
$sql = 'SELECT * FROM levelup.estudante where idUsuario='.$_SESSION['id'];
$user=$pdo->query($sql)->fetch();
$curso='';
$SenhaBD=$user['senha'];
if($user['curso']==1){$curso='Informática para Negócios';}elseif($user['curso']==2){$curso='Análise e Desenv. de Sistemas';}elseif($user['curso']==3){$curso='Agronegócios';}else{$curso='Gestão Empresarial';};

if($user['facebook']=='null' or $user['facebook']==null){
    $result='--Não Informado-- <a href="#" data-toggle="modal" data-target=".bs-example-modal-sm1"><i class="glyphicon glyphicon-plus-sign">Add</i></a> ';
    
} else{
    $result='<a href="'.$user['facebook'].'" target="_blank">Ver Perfil </a> <a href="#" data-toggle="modal" data-target=".bs-example-modal-sm1_1"><i class="glyphicon glyphicon-edit">Edit</i></a>
                

            <div class="modal fade bs-example-modal-sm1_1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                    
                        <div style="padding: 8px 8px 8px 8px">
                            <form action="incluiDadosMidia.php" method="post">
                            <p style="text-align:center"><small>Insira a nova url do Facebook </small></p>
                                <div class="form-group">
                                    <label>Facebook URL</label>
                                    <input type="url" class="form-control"  name="facebook" placeholder="URL de seu Facebook" required>
                                </div>
                                <button class="btn btn-block btn-danger" type="submit"><span class="glyphicon glyphicon-plus-sign"></span> Update </button><br>
                                
                            </form>
                        </div>

                    </div>
                </div>
            </div>';
    
}

if($user['whats']=='null' or $user['whats']==null){
    $result1='--Não Informado-- <a href="#" data-toggle="modal" data-target=".bs-example-modal-sm2"><i class="glyphicon glyphicon-plus-sign">Add</i></a>  ';
    
} else{
    $result1=$user['whats'].' <a href="#" data-toggle="modal" data-target=".bs-example-modal-sm1_2"><i class="glyphicon glyphicon-edit">Edit</i></a>
                

            <div class="modal fade bs-example-modal-sm1_2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                    
                        <div style="padding: 8px 8px 8px 8px">
                            <form action="incluiDadosMidia.php" method="post">
                            <p style="text-align:center"><small>Insira seu novo número de celular </small></p>
                                <div class="form-group">
                                    <label>Celular</label>
                                    <input type="text" class="form-control"  name="whats" placeholder="Celular" required>
                                </div>
                                <button class="btn btn-block btn-danger" type="submit"><span class="glyphicon glyphicon-plus-sign"></span> Update </button><br>
                                
                            </form>
                        </div>

                    </div>
                </div>
            </div>';
    
}


if($user['instagram']=='null' or $user['instagram']==null){
    $result2='--Não Informado-- <a href="#" data-toggle="modal" data-target=".bs-example-modal-sm3"><i class="glyphicon glyphicon-plus-sign">Add</i></a>  ';
    
} else{
    $result2=$user['instagram'].' <a href="#" data-toggle="modal" data-target=".bs-example-modal-sm1_3"><i class="glyphicon glyphicon-edit">Edit</i></a>
                

            <div class="modal fade bs-example-modal-sm1_3" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                    
                        <div style="padding: 8px 8px 8px 8px">
                            <form action="incluiDadosMidia.php" method="post">
                            <p style="text-align:center"><small>Insira o novo nome do usuário do Instagram </small></p>
                                <div class="form-group">
                                    <label>Instagram</label>
                                    <input type="text" class="form-control"  name="instagram" placeholder="Usuário Instagram" required>
                                </div>
                                <button class="btn btn-block btn-danger" type="submit"><span class="glyphicon glyphicon-plus-sign"></span> Update </button><br>
                                
                            </form>
                        </div>

                    </div>
                </div>
            </div>';
    
}

$title='Perfil';    
$conteudo='<div class="container">
            <div class="col-lg-6 col-lg-offset-2" style="background-color: whitesmoke; padding-bottom:10px; border-radius:20px">
                <h2 style="text-align: center"><i class="glyphicon glyphicon-info-sign"></i> Meu Perfil</h2>';
                if($senhaSessao!=$SenhaBD){$conteudo=$conteudo.'<p style="color: green;text-align:center">Sua senha foi alterada nesta sessão!</p>';}
                $conteudo=$conteudo.'<h4 style="margin-bottom: 0px"><b>Nome</b></h4>
                <hr style="margin-top: 0px">
                <h5>&emsp;'.$user['nome'].'</h5>
                <h4 style="margin-bottom: 0px"><b>Email</b></h4>
                <hr style="margin-top: 0px">
                <h5>&emsp; '.$user['email'].' <a href="#" data-toggle="modal" data-target=".bs-example-modal-sm1_edit"> <i class="glyphicon glyphicon-edit">Alterar</i></a></h5>
                <h4 style="margin-bottom: 0px"><b>Curso</b></h4>
                <hr style="margin-top: 0px">
                <h5>&emsp;'.$curso.'</h5>
                <h4 style="margin-bottom: 0px"><b>Semestre</b></h4>
                <hr style="margin-top: 0px">
                <h5>&emsp; '.$user['semestre'].'º Semestre</h5>
                <h4 style="margin-bottom: 0px"><b>Nível</b></h4>
                <hr style="margin-top: 0px">
                <h5>&emsp; Nível 0'.$user['nivel'].'</h5>
                <h4 style="margin-bottom: 0px"><b>Informações de mídias sociais*</b></h3>
                <hr style="margin-top: 0px">
                <dl class="dl-horizontal">
                    <dt>Facebook</dt>
                    <dd>'.$result.'</dd>
                    <dt>WhatsApp</dt>
                    <dd>'.$result1.'</dd>
                    <dt>Instagram</dt>
                    <dd>'.$result2.'</dd>
                </dl>
                <hr>
                <buttom class="btn btn-block btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm4"> Trocar minha Senha</buttom>
                <br>
                (*) <small>Estas informações serão vistas pelos usuários que receberem seu convite de interação (Chat Partner)</small>
            </div>
          
            <div class="modal fade bs-example-modal-sm1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">

                        <div style="padding: 8px 8px 8px 8px">
                            <form action="incluiDadosMidia.php" method="post">
                                <div class="form-group">
                                    <label>Facebook URL</label>
                                    <input type="url" class="form-control"  name="facebook" placeholder="URL de seu Facebook" required>
                                </div>
                                <button class="btn btn-block btn-success" type="submit"><span class="glyphicon glyphicon-plus-sign"></span> Incluir </button><br>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            
            <div class="modal fade bs-example-modal-sm2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">

                        <div style="padding: 8px 8px 8px 8px">
                            <form action="incluiDadosMidia.php" method="post">
                                <div class="form-group">
                                    <label>Telefone</label>
                                    <input type="text" class="form-control"  name="whats" placeholder="Celular com DDD" required>
                                </div>
                                <button class="btn btn-block btn-success" type="submit"><span class="glyphicon glyphicon-plus-sign"></span> Incluir </button><br>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal fade bs-example-modal-sm3" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">

                        <div style="padding: 8px 8px 8px 8px">
                            <form action="incluiDadosMidia.php" method="post">
                                <div class="form-group">
                                    <label>Inserir Usuario Instagram</label>
                                    <input type="text" class="form-control"  name="instagram" placeholder="Usuario Instagram" required>
                                </div>
                                <button class="btn btn-block btn-success" type="submit"><span class="glyphicon glyphicon-plus-sign"></span> Incluir </button><br>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            
            <div class="modal fade bs-example-modal-sm4" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">

                        <div style="padding: 8px 8px 8px 8px">
                            <form action="alteraSenha.php" method="post">
                                <div class="form-group">
                                    <label>Alterar Senha</label>
                                    <input type="password" class="form-control"  name="senha" placeholder="Nova Senha" required>
                                </div>
                                <button class="btn btn-block btn-danger" type="submit"><span class="glyphicon glyphicon-ok"></span> Alterar </button><br>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal fade bs-example-modal-sm1_edit" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                    
                        <div style="padding: 8px 8px 8px 8px">
                            <form action="incluiDadosMidia.php" method="post">
                            <p style="text-align:center"><small>Insira seu novo email </small></p>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control"  name="email" placeholder="Seu email" required>
                                </div>
                                <button class="btn btn-block btn-danger" type="submit"><span class="glyphicon glyphicon-plus"></span> Salvar </button><br>
                                
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            
            
            
        </div>
        
';
Database::disconnect();
include_once ('masterStudent.php');

