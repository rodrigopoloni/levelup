<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$title='Cadastro de Sugestao';
$conteudo='<div class="container">
        <ol class="breadcrumb">
            <li><a href="gerenciarArea.php">Gerenciar</a></li>
            <li><a href="listaSugestaoProfessor.php">Sugestão</a></li>
        </ol>
            <div class="col-lg-6 col-lg-offset-2" style="background: whitesmoke; border-radius: 20px; padding: 10px 20px 10px 20px">
                <h2 style="text-align:center">Indicar Link</h2>
                <hr>
                <p style="text-align:center">Compartilhe com os alunos links para que possam expandir seus conhecimentos da língua inglesa. *</p>
                <form action="incluirSugestaoProf.php" method="post">
                    <div class="form-group">
                        <label>Link</label>
                        <input type="url" class="form-control"  name="link" placeholder="Cole o link do site aqui"  required>
                    </div>
                    
                    <div class="form-group">
                        <label>Descrição <small>(150 caracteres)</small> </label>
                        <textarea rows="3" class="form-control"  name="descricao" maxlength="150" required ></textarea>
                    </div>    

                    <button class="btn btn-block btn-success" type="submit"> <span class="glyphicon glyphicon-check"></span> Indicar </button><br>

                </form>
                
                <a href="listaSugestaoProfessor.php"><button class="btn btn-block btn-danger"> Ver minhas Sugestões </button></a><br>
            </div>

        </div>';


include_once('masterProf.php');