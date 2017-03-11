<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$idAluno=$_GET['id'];

include_once('Data\Conexao.php');

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql="SELECT * FROM levelup.estudante WHERE idUsuario=".$idAluno;
$aluno = $pdo->query($sql)->fetch();
$curso="";
$semestre="";
$periodo="";

switch($aluno['curso']){
    case 1: $curso="Informática para Negócios";break;
    case 2: $curso="Agronegócios";break;
    case 3: $curso="Análise e Desenvolvimento de Sistemas";break;
    case 4: $curso="Gestão Empresarial EAD";break;
}

switch($aluno['semestre']){
    case 1: $semestre="1º Semestre";break;
    case 2: $semestre="2º Semestre";break;
    case 3: $semestre="3º Semestre";break;
    case 4: $semestre="4º Semestre";break;
    case 5: $semestre="5º Semestre";break;
    case 6: $semestre="6º Semestre";break;
}

switch($aluno['turno']){
    case 1: $turno="Manhã";break;
    case 2: $turno="Tarde";break;
    case 3: $turno="Noite";break;
    case 4: $turno="EAD";break;
}



$title='Edita Cadastro de Aluno';    
    $conteudo='
        <div class="container">
        <ol class="breadcrumb">
            <li><a href="gerenciarArea.php">Gerenciar</a></li>
            <li><a href="listaAlunos.php">Alunos</a></li>
        </ol>
            <div class="col-lg-6 col-lg-offset-2" style="background: whitesmoke; border-radius: 20px; padding: 10px 20px 10px 20px">
                <h2 style="text-align:center">Cadastro de Alunos</h2>
                <hr>
                
                <form action="updateAluno.php" method="post">
                    <input type="hidden" name="idAluno" value="'.$idAluno.'">
                    <div class="form-group">
                      <label>Nome</label>
                      <input type="text" class="form-control"  name="nome" value="'.$aluno['nome'].'">
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control"  name="email" value="'.$aluno['email'].'">
                    </div>
                    <div class="form-group">
                      <label>Usuário</label>
                      <input type="text" class="form-control"  name="user" value="'.$aluno['username'].'">
                    </div>
                    <div class="form-group">
                      <label>Senha</label>
                      <input type="password" class="form-control"  name="senha" value="'.$aluno['senha'].'">
                    </div>
                    <div class="form-group">
                      <label>Curso</label>
                      <select class="form-control" name="curso">
                          <option selected value="'.$aluno['curso'].'">'.$curso.'</option>
                          <option value="1">Informática para Negócios</option>
                          <option value="2">Agronegócios</option>
                          <option value="3">Análise e Desenvolvimento de Sistemas</option>
                          <option value="4">Gestao Empresarial EAD</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Semestre</label>
                      <select class="form-control" name="semestre">
                          <option selected value="'.$aluno['semestre'].'">'.$semestre.'</option>
                          <option value="1">1º Semestre</option>
                          <option value="2">2º Semestre</option>
                          <option value="3">3º Semestre</option>
                          <option value="4">4º Semestre</option>
                          <option value="5">5º Semestre</option>
                          <option value="6">6º Semestre</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Período</label>
                      <select class="form-control" name="turno">
                          <option selected value="'.$aluno['turno'].'">'.$turno.'</option>
                          <option value="Manha">Manhã</option>
                          <option value="Tarde">Tarde</option>
                          <option value="Noite">Noite</option>
                      </select>
                    </div>
                    <button type="submit" class="btn btn-block btn-success"> <span class="glyphicon glyphicon-check"></span> Atualizar </button><br>
                    <a href="listaAlunos.php" class="btn btn-block btn-danger"> <span class="glyphicon glyphicon-arrow-left"></span> Voltar á Lista Alunos </a>
                </form>
            </div>
            ';
            include_once('masterProf.php');
    
