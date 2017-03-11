<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include_once('Data\Conexao.php');
            
$idProf=$_SESSION['id'];
$url = $_POST['link'];
$descricao = $_POST['descricao'];

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO recomendacoesProf (endLink,descRecomend,idProf) values(?, ?, ?)";
$q = $pdo->prepare($sql);
$q->execute(array($url, $descricao, $idProf));
Database::disconnect();
header("Location:listaSugestaoProfessor.php");