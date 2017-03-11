<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once('Data\Conexao.php');
            
            $notificacao=$_POST['idNotif'];
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE notifalunos SET vista=1 WHERE idNotif=?";
            $q = $pdo->prepare($sql);
            $q->execute(array($notificacao));
            Database::disconnect();
            header("Location:notifStudent.php");