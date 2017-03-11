<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
include_once('Data\Conexao.php');


$idNotif=$_POST['idNotif'];
$idConvidante = $_SESSION['id'];
$idConvidado = $_POST['idConvidado'];
$data=$_POST['data'];
$hora=$_POST['hora'];
$local=$_POST['local'];



$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO chat (idConvidante,idConvidado,data,hora,local,statusChat) values(?,?,?,?,?,?)";
$q = $pdo->prepare($sql);
$q->execute(array($idConvidante, $idConvidado, $data, $hora, $local,2));

//busca o ultimo id Selecionado
$buscaID="select idChat from levelup.chat where idConvidante=".$idConvidante." order by idChat desc limit 1";
$idChat = $pdo->query($buscaID)->fetch();
$id=$idChat['idChat'];

//inclui na tabela de notificacao
$sql2 = "INSERT INTO notifalunos (idReceiver,idSender,sugestao,chat,tipoNotif,statusNotif,vista) values(?,?,?,?,?,?,?)";
$q2 = $pdo->prepare($sql2);
$q2->execute(array($idConvidado,$idConvidante,null,$id,3,2,0));

//atualiza notificacao para lida
$sql3 = "UPDATE notifalunos SET vista=1 WHERE idNotif=?";
$q3 = $pdo->prepare($sql3);
$q3->execute(array($idNotif));

Database::disconnect();
header("Location:notifStudent.php");