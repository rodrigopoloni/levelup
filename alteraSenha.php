<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
include_once('Data\Conexao.php');


    $senha=$_POST['senha'];
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql3 = "UPDATE estudante SET senha=? WHERE idUsuario=?";
    $q3 = $pdo->prepare($sql3);
    $q3->execute(array($senha,$_SESSION['id']));
    Database::disconnect();
    header("Location:profile.php");
