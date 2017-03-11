<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


include_once('Data\Conexao.php');


    $idRecomend=$_POST['idRecomend'];
    $desc=$_POST['descricao'];
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql3 = "UPDATE recomendacoes SET descRecomend=? WHERE idRecomend=?";
    $q3 = $pdo->prepare($sql3);
    $q3->execute(array($desc,$idRecomend));
    Database::disconnect();
    header("Location:notifProfessor.php");
