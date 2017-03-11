<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once('Data\Conexao.php');


session_start();
$idChat=$_POST['idChat'];
$idNotif=$_POST['idNotif'];
$idSender = $_SESSION['id'];
$idReceiver=$_POST['idReceiver'];
//echo 'Chat '.$idChat.' notif '.$idNotif.' sender '.$idSender.' receiver'.$idReceiver;
if (isset($_POST['aprovar'])) {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE notifalunos SET vista=1, statusNotif=1 WHERE idNotif=?";
    $q = $pdo->prepare($sql);
    $q->execute(array($idNotif));
    
    //incluir na tebela de notificação do aluno
    $sql2 = "INSERT INTO notifalunos (idReceiver,idSender,sugestao,chat,tipoNotif,statusNotif,vista) values(?,?,?,?,?,?,?)";
    $q2 = $pdo->prepare($sql2);
    $q2->execute(array($idReceiver,$idSender,null,$idChat,3,1,0));
    
    //mudar Status do Chat
    $sql3 = "UPDATE chat SET statusChat=1 WHERE idChat=?";
    $q3 = $pdo->prepare($sql3);
    $q3->execute(array($idChat));
    Database::disconnect();
    header("Location:notifStudent.php");
    
} elseif (isset($_POST['reprovar'])) {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE notifalunos SET vista=1, statusNotif=3 WHERE idNotif=?";
    $q = $pdo->prepare($sql);
    $q->execute(array($idNotif));
    
    //incluir na tebela de notificação do aluno
    $sql2 = "INSERT INTO notifalunos (idReceiver,idSender,sugestao,chat,tipoNotif,statusNotif,vista) values(?,?,?,?,?,?,?)";
    $q2 = $pdo->prepare($sql2);
    $q2->execute(array($idReceiver,$idSender,null,$idChat,3,3,0));
    
    //atualizar Chat
    $sql3 = "UPDATE chat SET statusChat=3 WHERE idChat=?";
    $q3 = $pdo->prepare($sql3);
    $q3->execute(array($idChat));
    Database::disconnect();
    header("Location:notifStudent.php");
}


