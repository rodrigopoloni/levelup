<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include_once('Data\Conexao.php');
$idAluno=$_SESSION['id'];
$idRecAluno=null;
$idRecProf=null;

if(isset($_POST['idRecAluno'])){
    $idRecAluno=$_POST['idRecAluno'];
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "delete from favoritos where idAluno=? and recomendAluno=?";
    $q = $pdo->prepare($sql);
    $q->execute(array($idAluno, $idRecAluno));
    Database::disconnect();
    header("Location:todasSugAlunos.php");
}

if(isset($_POST['idRecProf'])){
    $idRecProf=$_POST['idRecProf'];
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "delete from favoritos where idAluno=? and recomendProf=?";
    $q = $pdo->prepare($sql);
    $q->execute(array($idAluno,$idRecProf));
    Database::disconnect();
    header("Location:todasSugProfessores.php");
}