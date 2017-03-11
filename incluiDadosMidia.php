<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include_once('Data\Conexao.php');

if(!empty($_POST['facebook'])){
    $face=$_POST['facebook'];
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql3 = "UPDATE estudante SET facebook=? WHERE idUsuario=?";
    $q3 = $pdo->prepare($sql3);
    $q3->execute(array($face,$_SESSION['id']));
    Database::disconnect();
    header("Location:profile.php");
}

if(!empty($_POST['whats'])){
    $whats=$_POST['whats'];
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql3 = "UPDATE estudante SET whats=? WHERE idUsuario=?";
    $q3 = $pdo->prepare($sql3);
    $q3->execute(array($whats,$_SESSION['id']));
    Database::disconnect();
    header("Location:profile.php");
}

if(!empty($_POST['instagram'])){
    $insta=$_POST['instagram'];
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql3 = "UPDATE estudante SET instagram=? WHERE idUsuario=?";
    $q3 = $pdo->prepare($sql3);
    $q3->execute(array($insta,$_SESSION['id']));
    Database::disconnect();
    header("Location:profile.php");
}

if(!empty($_POST['email'])){
    $email=$_POST['email'];
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql4 = "UPDATE estudante SET email=? WHERE idUsuario=?";
    $q3 = $pdo->prepare($sql4);
    $q3->execute(array($email,$_SESSION['id']));
    Database::disconnect();
    header("Location:profile.php");
}