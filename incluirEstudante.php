<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

            include_once('Data\Conexao.php');
            
            $nome=$_POST['nome'];
            $username= $_POST['user'];
            $senha= $_POST['senha'];
            $email= $_POST['email'];
            $curso= $_POST['curso'];
            $semestre=$_POST['semestre'];
            $turno= $_POST['turno'];
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO estudante (nome,username,senha,email,curso,semestre,turno,pontos, nivel, img,facebook,whats,instagram,statusAluno) values(?, ?, ?,?,?,?,?,0,1,null,null,null,null,1)";
            $q = $pdo->prepare($sql);
            $q->execute(array($nome, $username, $senha, $email, $curso,$semestre, $turno));
            Database::disconnect();
            header("Location:listaAlunos.php");