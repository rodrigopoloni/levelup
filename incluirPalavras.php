<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include_once('Data\Conexao.php');
            
$palavra=$_POST['palavra'];
$aluno= $_SESSION['id'];
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO palavras (palavra,idAluno) values(?, ?)";
$q = $pdo->prepare($sql);
$q->execute(array($palavra, $aluno));
Database::disconnect();
header("Location:ListeningWords.php");