<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
include_once('Data\Conexao.php');
            
$idRecomend=$_GET['id'];

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "delete from recomendacoesProf where idRecomendProf=?";
$q = $pdo->prepare($sql);
$q->execute(array($idRecomend));
Database::disconnect();
header("Location:listaSugestaoProfessor.php");