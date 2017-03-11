<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
            include_once('Data\Conexao.php');
            
            $categoria=$_POST['categoria'];
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO categorias (descCategoria) values(?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($categoria));
            Database::disconnect();
            header("Location:cadastraQuestoes.php");