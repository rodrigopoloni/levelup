<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once('Data\Conexao.php');


session_start();
$idProf = $_SESSION['id'];
$nr_recomend = $_POST['idRecomend'];
$idAluno=$_POST['idAluno'];
if (isset($_POST['aprovar'])) {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE recomendacoes SET statusRecomend=1 WHERE idRecomend=?";
    $q = $pdo->prepare($sql);
    $q->execute(array($nr_recomend));
    
    //incluir na tebela de notificação do aluno
    $sql2 = "INSERT INTO notifalunos (idReceiver,idSender,sugestao,chat,tipoNotif,statusNotif,vista) values(?,?,?,?,?,?,?)";
    $q2 = $pdo->prepare($sql2);
    $q2->execute(array($idAluno,$idProf,$nr_recomend,null,1,1,0));
    Database::disconnect();
    header("Location:notifProfessor.php");
    
} elseif (isset($_POST['reprovar'])) {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE recomendacoes SET statusRecomend=3 WHERE idRecomend=?";
    $q = $pdo->prepare($sql);
    $q->execute(array($nr_recomend));
    
    //incluir na tebela de notificação do aluno
    $sql2 = "INSERT INTO notifalunos (idReceiver,idSender,sugestao,chat,tipoNotif,statusNotif,vista) values(?,?,?,?,?,?,?)";
    $q2 = $pdo->prepare($sql2);
    $q2->execute(array($idAluno,$idProf,$nr_recomend,null,1,3,0));
    Database::disconnect();
    header("Location:notifProfessor.php");
}


