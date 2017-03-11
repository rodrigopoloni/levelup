<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once('Data\Conexao.php');
$idAluno=$_POST['idAluno'];          
$nome=$_POST['nome'];
$username= $_POST['user'];
$senha= $_POST['senha'];
$email= $_POST['email'];
$curso= $_POST['curso'];
$semestre=$_POST['semestre'];
$turno= $_POST['turno'];
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "UPDATE estudante  set nome=?,username=?,senha=?,email=?,curso=?,semestre=?,turno=? where idUsuario=?";
$q = $pdo->prepare($sql);
$q->execute(array($nome, $username, $senha, $email, $curso,$semestre, $turno,$idAluno));
Database::disconnect();
header("Location:listaAlunos.php");
