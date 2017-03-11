<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$title='Buscar Alunos';
$conteudo='<div class="container">
    <ol class="breadcrumb">
            <li><a href="analiseArea.php">Análises</a></li>
    </ol>
            <div class="col-lg-8 col-lg-offset-2" style="background: whitesmoke; border-radius: 20px; padding: 10px 20px 10px 20px">
                <h2 style="text-align:center">Filtro de busca de alunos</h2>
                
                <div class="col-lg-6 col-lg-offset-3">
                    <form action="listaAlunosAnalise.php" method="get">
                    <label>Curso</label>
                    <select class="form-control" name="curso">
                        <option value="1">Informática para Negócios</option>
                        <option value="2">Agronegócios</option>
                        <option value="3">Análise e Desenvolvimento de Sistemas</option>
                        <option value="4">Gestão Empresarial</option>
                    </select >
                    <br>
                    <label>Período</label>
                    <select class="form-control" name="periodo">
                        <option value="1">Manhã</option>
                        <option value="2">Tarde</option>
                        <option value="3">Noite</option>
                        <option value="4">EAD</option>
                    </select>
                    <br>
                    <label>Semestre</label>
                    <select class="form-control" name="semestre">
                        <option value="1">1º Semestre</option>
                        <option value="2">2º Semestre</option>
                        <option value="3">3º Semestre</option>
                        <option value="4">4º Semestre</option>
                        <option value="5">5º Semestre</option>
                        <option value="6">6º Semestre</option>
                    </select>
                    <br>
                    <button class="btn btn-danger btn-block" type="submit"><i class="glyphicon glyphicon-search"></i> Buscar</button>    
                    
                    </form>
                    <br>
                    <hr>
                    <h2 style="text-align:center">Busca por Nome</h2>
                    <form action="listaAlunosNome.php" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="nome" placeholder="Digite um nome ou parte dele" style="border-radius:50px">
                        <span class="input-group-btn">
                            &nbsp;<button href="" class=" btn btn-danger btn-sm go inline" type="submit" style="border-radius:35px"><i class="glyphicon glyphicon-search"></i></button>
                        </span>    
                    </div>
                    </form>
                    <br><br>
                </div>
            </div>
            </div>';

include_once ('masterProf.php');