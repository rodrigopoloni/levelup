<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once('Data\Conexao.php');
session_start();

$idReceiver=$_POST['idPartner'];
$idSender= $_SESSION['id'];
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO notifalunos (idReceiver,idSender,sugestao,tipoNotif,statusNotif,vista) values(?, ?, null,2,2,0)";
$q = $pdo->prepare($sql);
$q->execute(array($idReceiver, $idSender));
Database::disconnect();
header("Location:chatPartner.php");