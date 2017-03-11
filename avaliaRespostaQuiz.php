<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once('Data\Conexao.php');
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//aumentar o numero de questoes respondidas
$_SESSION['questao']=$_SESSION['questao']+1;
$qstResp=$_SESSION['questao'];


//buscar o numero de ptos maximos do nivel
$sql = 'SELECT * FROM levelup.niveis WHERE nivel='.$_SESSION['nivel'];
$r=$pdo->query($sql)->fetch();
$ptosMax=$r['ptosMax'];
$qtdQuestoes=$r['qtdQuestoes'];


//echo 'nivel '.$_SESSION['nivel'];
//echo 'ptos do usuario '.$_SESSION['pontos'];
//echo 'pts max nivel '.$ptosMax;
//echo 'questoes no quiz '.$qtdQuestoes;

//trazer dados da tela
$questao=$_POST['questao'];
$respondida=$_POST['resposta'];
$resposta=$_POST['alternativa'];
$categoria=$_POST['categoria'];

//verificar a qto vale a questao
$sql2="select*from levelup.questoes where idQuest=".$questao;
$r2=$pdo->query($sql2)->fetch();
$pesoQuest=$r2['pesoPts'];

//em caso de acerto
if($respondida==$resposta){
    //aumentar o numero de ptos
    $novaPont=$_SESSION['pontos']+$pesoQuest;
    
    $sql = "UPDATE estudante SET pontos=? WHERE idUsuario=?";
    $q = $pdo->prepare($sql);
    $q->execute(array($novaPont, $_SESSION['id']));
    
    $_SESSION['pontos']=$novaPont;
    
    //insere na tabela de respondidas
    $sql2 = "insert into levelup.respondidas (idQuestao,idAluno,data,questCateg,statusResp) values(?,?,?,?,?)";
    $q = $pdo->prepare($sql2);
    $q->execute(array($questao,$_SESSION['id'],date('Y-m-d H:i:s'),$categoria,1));
    
    if($_SESSION['pontos']>=$ptosMax){
        $novoNivel=$_SESSION['nivel']+1;
        $sql3 = "UPDATE estudante SET nivel=? WHERE idUsuario=?";
        $q = $pdo->prepare($sql3);
        $q->execute(array($novoNivel, $_SESSION['id']));
        $_SESSION['nivel']=$novoNivel;
        $_SESSION['questao']=1;
        header('location:quizArea.php');
    }else{
        if($qstResp>$qtdQuestoes){
            $_SESSION['questao']=1;
            header('location:quizArea.php');
            
        }else{
            header('location:quizText.php');
        }
        
    }
//erro     
}else{
    $sql2 = "insert into levelup.respondidas (idQuestao,idAluno,data,questCateg,statusResp) values(?,?,?,?,?)";
    $q = $pdo->prepare($sql2);
    $q->execute(array($questao,$_SESSION['id'],date('Y-m-d H:i:s'),$categoria,2));
     if($qstResp>$qtdQuestoes){
            $_SESSION['questao']=1;
            header('location:quizArea.php');
        }else{
            header('location:quizText.php');
        }
}

