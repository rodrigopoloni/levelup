<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once('Data\Conexao.php');
$idNivel=$_POST['nivel'];            
$descricao=$_POST['descricao'];
$ptosMin= $_POST['ptosMin'];
$ptosMax= $_POST['ptosMax'];
$prof= $_POST['prof'];
$qtdQuestoes= $_POST['qtdQuest'];
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "update levelup.niveis set nivelDesc=?, ptosMin=?, ptosMax=?, idProfResp=?, qtdQuestoes=? where nivel=?";
$q = $pdo->prepare($sql);
$q->execute(array($descricao, $ptosMin, $ptosMax, $prof, $qtdQuestoes,$idNivel));
Database::disconnect();
header("Location:listaNiveis.php");