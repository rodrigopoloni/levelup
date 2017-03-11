<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$title='Cadastro de Sugestão';
$conteudo='<ol class="breadcrumb">
            <li><a href="homeSugestoes.php">Sugestões</a></li>
        </ol>
        <div class="container">
            <div class="col-lg-6 col-lg-offset-2" style="background: whitesmoke; border-radius: 20px; padding: 10px 20px 10px 20px">
                <h2 style="text-align:center">Enviar Sugestão</h2>
                <hr>
                <p style="text-align:center">Agora é sua vez de indicar conteúdos que lhe auxiliaram no aprendizado de Inglês.*</p>
                <form action="incluirSugestao.php" method="post">
                    <div class="form-group">
                        <label>Link</label>
                        <input type="url" class="form-control"  name="link" placeholder="Cole o link do site aqui"  required>
                    </div>
                    
                    <div class="form-group">
                        <label>Descrição <small style="color:grey">(150 caracteres)</small></label>
                        <textarea rows="3" class="form-control"  name="descricao" maxlength="150" required ></textarea>
                    </div>    

                    <button class="btn btn-block btn-success" type="submit"> <span class="glyphicon glyphicon-check"></span> Indicar </button><br>

                </form>
                
                <small>* Conteúdo será avaliado pelo professor antes da publicação</small>
            </div>

        </div>';


include_once('masterStudent.php');

