<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include_once('Data\Conexao.php');
$pdo = Database::connect();


$idAluno = $_SESSION['id'];
$nivelAluno = $_SESSION['nivel'];
echo $nivelAluno;
$url = $_POST['link'];
$descricao = $_POST['descricao'];
//selecionando o id do prof conforme o nivel do aluno
$query = "SELECT idProfResp FROM levelup.niveis where nivel=".$nivelAluno;
$result = $pdo->query($query)->fetch();
$idProfessorResp = $result['idProfResp'];


$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO recomendacoes (endLink,descRecomend,statusRecomend,idAluno,idProfResp) values(?, ?, ?,?,?)";
$q = $pdo->prepare($sql);
$q->execute(array($url, $descricao, 2, $idAluno, $idProfessorResp));
Database::disconnect();
header("Location:listaSugestaoAluno.php");
