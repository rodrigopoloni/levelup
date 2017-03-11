<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$idAluno=$_POST['idAluno'];
include_once('Data\Conexao.php');
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "update estudante set statusAluno=2 where idUsuario=?";
$q = $pdo->prepare($sql);
$q->execute(array($idAluno));
Database::disconnect();

header("Location:listaAlunos.php");



