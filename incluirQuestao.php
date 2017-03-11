<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once('Data\Conexao.php');
            
            $enunciado=$_POST['enunciado'];
            $alt1= $_POST['alt1'];
            $alt2= $_POST['alt2'];
            $alt3= $_POST['alt3'];
            $alt4= $_POST['alt4'];
            $resposta=0;
            $nivel= $_POST['nivel'];
            $categoria= $_POST['categoria'];
            $tipo= $_POST['tipoqst'];
            $pontos= $_POST['peso'];
            switch ($_POST['alternativa']){
                case 1:
                    $resposta=$alt1;
                    break;
                case 2:
                    $resposta=$alt2;
                    break;
                case 3:
                    $resposta=$alt3;
                    break;
                case 4:
                    $resposta=$alt4;
                    break;
                default :
                    echo 'Seleciona uma das alternativas com Verdadeira';
            };
            
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO questoes (enunciado,alt1,alt2,alt3,alt4,resposta,idNivel,idCat,pesoPts,tipo) values(?,?,?,?,?,?,?,?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($enunciado,$alt1,$alt2,$alt3,$alt4,$resposta,$nivel,$categoria,$pontos,$tipo));
            Database::disconnect();
            
            header("Location:listaQuestoes.php");