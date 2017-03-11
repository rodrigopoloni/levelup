<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$title='Filtro Questões';
$conteudo='<div class="container">
    <ol class="breadcrumb">
            <li><a href="gerenciarArea.php">Gerenciar</a></li>
    </ol>
            <div class="col-lg-8 col-lg-offset-2" style="background: whitesmoke; border-radius: 20px; padding: 10px 20px 10px 20px">
                <h2 style="text-align:center">Filtro de busca de questões</h2>
                <hr>
                <div class="col-lg-6 col-lg-offset-3">
                    <form action="listaQuestoes.php" method="get">
                    <label>Nível</label>
                    <select class="form-control" name="nivel" required>
                        <option value="1">Nível 01</option>
                        <option value="2">Nível 02</option>
                        <option value="3">Nível 03</option>
                        <option value="4">Nível 04</option>
                        <option value="5">Nível 05</option>
                        <option value="6">Nível 06</option>
                    </select >
                    <br>
                    <button class="btn btn-danger btn-block" type="submit"><i class="glyphicon glyphicon-search"></i> Listar Questões</button>    
                    
                    </form>
                    <br><br>
                </div>
            </div>
            </div>';

include_once ('masterProf.php');