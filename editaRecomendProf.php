<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$idRecomend=$_GET['id'];
include_once('Data\Conexao.php');
$pdo = Database::connect();
$sql = 'SELECT * FROM levelup.recomendacoesprof where idRecomendProf='.$idRecomend;
$r= $pdo->query($sql)->fetch();

$title='Editar sugestão';
$conteudo='<div class="container">
        <ol class="breadcrumb">
            <li><a href="gerenciarArea.php">Gerenciar</a></li>
            <li><a href="listaSugestaoProfessor.php">Sugestão</a></li>
        </ol>
            <div class="col-lg-6 col-lg-offset-2" style="background: whitesmoke; border-radius: 20px; padding: 10px 20px 10px 20px">
                <h2 style="text-align:center">Editar recomendação</h2>
                <hr>
                <form action="edicaoRecomendProf.php" method="post">
                    <input type="hidden" name="idRecomend" value="'.$r['idRecomendProf'].'">
                    <div class="form-group">
                        <label>Link</label>
                        <input type="url" class="form-control"  name="link" value="'.$r['endLink'].'"  required>
                    </div>
                    
                    <div class="form-group">
                        <label>Descrição <small>(150 caracteres)</small> </label>
                        <textarea rows="3" class="form-control"  name="descricao" maxlength="150" required >'.$r['descRecomend'].'</textarea>
                    </div>    

                    <button class="btn btn-block btn-success" type="submit"> <span class="glyphicon glyphicon-check"></span> Atualizar </button><br>

                </form>
                
            </div>

        </div>';


include_once('masterProf.php');