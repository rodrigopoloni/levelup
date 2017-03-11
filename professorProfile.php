<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
$title="Minha Conta";

include_once('Data\Conexao.php');
$senhaSessao=$_SESSION['senha'];
$pdo = Database::connect();
$sql = 'SELECT * FROM levelup.professor where idProfessor='.$_SESSION['id'];
$prof=$pdo->query($sql)->fetch();

$SenhaBD=$prof['senha'];


$conteudo='<ol class="breadcrumb">
            <li><a href="gerenciarArea.php">Gerenciar</a></li>
        </ol>
        
        <div class="container">
            <div class="col-lg-6 col-lg-offset-2" style="background-color: whitesmoke; padding-bottom:10px; border-radius:20px">
                <h2 style="text-align: center"><i class="glyphicon glyphicon-info-sign"></i> Meu Perfil</h2>';
                if($senhaSessao!=$SenhaBD){$conteudo=$conteudo.'<p style="color: green;text-align:center">Sua senha foi alterada nesta sessão!</p>';}
                $conteudo=$conteudo.'<h4 style="margin-bottom: 0px"><b>Nome</b></h4>
                <hr style="margin-top: 0px">
                <h5>&emsp;'.$prof['nome'].'</h5>
                <h4 style="margin-bottom: 0px"><b>Usuário</b></h4>
                <hr style="margin-top: 0px">
                <h5>&emsp;'.$prof['username'].'</h5>
                <h4 style="margin-bottom: 0px"><b>Email</b></h4>
                <hr style="margin-top: 0px">
                <h5>&emsp; '.$prof['email'].' <a href="#" data-toggle="modal" data-target=".bs-example-modal-sm1_edit"> <i class="glyphicon glyphicon-edit">Alterar</i></a></h5>
                <hr>
                <buttom class="btn btn-block btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm4"> Trocar minha Senha</buttom>
                <br>
            </div>
        </div>
        

            <div class="modal fade bs-example-modal-sm1_edit" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                    
                        <div style="padding: 8px 8px 8px 8px">
                            <form action="alteraDadosProf.php" method="post">
                            <p style="text-align:center"><small>Insira seu novo email </small></p>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control"  name="email" placeholder="Novo email" required>
                                </div>
                                <button class="btn btn-block btn-danger" type="submit"><span class="glyphicon glyphicon-plus"></span> Salvar </button><br>
                                
                            </form>
                        </div>

                    </div>
                </div>
            </div>        



        <div class="modal fade bs-example-modal-sm4" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">

                        <div style="padding: 8px 8px 8px 8px">
                            <form action="alteraDadosProf.php" method="post">
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

        ';
                
Database::disconnect();
include_once('masterProf.php');
