<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once('Data\Conexao.php');
$idAluno=$_SESSION['id'];
$idRecAluno=null;
$idRecProf=null;
$link=$_POST['link'];

if(isset($_POST['idRecAluno'])){
    $idRecAluno=$_POST['idRecAluno'];
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO favoritos (idAluno,endereco,recomendAluno,recomendProf) values(?, ?, ?,?)";
    $q = $pdo->prepare($sql);
    $q->execute(array($idAluno, $link, $idRecAluno, null));
    Database::disconnect();
    header("Location:todasSugAlunos.php");
}

if(isset($_POST['idRecProf'])){
    $idRecProf=$_POST['idRecProf'];
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO favoritos (idAluno,endereco,recomendAluno,recomendProf) values(?, ?, ?,?)";
    $q = $pdo->prepare($sql);
    $q->execute(array($idAluno, $link, null, $idRecProf));
    Database::disconnect();
    header("Location:todasSugProfessores.php");
}

