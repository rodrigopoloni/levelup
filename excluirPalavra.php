<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$idPalavra=$_GET['id'];
include_once('Data\Conexao.php');
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "delete from palavras where idPalavra=?";
$q = $pdo->prepare($sql);
$q->execute(array($idPalavra));
Database::disconnect();
header("Location:listaPalavras.php");

