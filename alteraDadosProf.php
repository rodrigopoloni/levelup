<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

include_once('Data\Conexao.php');
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if(isset($_POST['senha'])){
    $senha=$_POST['senha'];
    $sql = "UPDATE professor SET senha=? WHERE idProfessor=?";
    $q3 = $pdo->prepare($sql);
    $q3->execute(array($senha,$_SESSION['id']));
}
if(isset($_POST['email'])){
    $email=$_POST['email'];
    $sql = "UPDATE professor SET email=? WHERE idProfessor=?";
    $q3 = $pdo->prepare($sql);
    $q3->execute(array($email,$_SESSION['id']));
}
    
Database::disconnect();
header("Location:professorProfile.php");


