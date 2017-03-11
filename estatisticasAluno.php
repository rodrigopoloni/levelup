<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$idAluno=$_GET['id'];

$title='Resultado Busca';    
include_once('Data\Conexao.php');
$pdo = Database::connect();
$sqlAluno = "SELECT nome,nivel FROM levelup.estudante where idUsuario=".$idAluno;
$usuario = $pdo->query($sqlAluno)->fetch();
$nivel=$usuario['nivel'];
$aluno=$usuario['nome'];


 $conteudo=$conteudo.'<div class="container">'
         . '<div class="col-lg-8 col-lg-offset-1" style="background-color: whitesmoke; border-radius: 10px; padding-bottom: 20px">'
         . '<h4><b>Aluno: </b>'.$aluno.'</h4></div>';
for($i=1;$i<=$nivel;$i=$i+1){
    $sql="select  distinct a.questCateg as idCat, c.descCategoria as Categoria 
        from levelup.respondidas as a,
        levelup.questoes as b,
        levelup.categorias as c
        where a.idQuestao=b.idQuest and
        a.questCateg=c.idCategoria and b.idNivel=".$i." and a.idAluno=".$idAluno;
    
    $categorias = $pdo->query($sql)->fetch();
    
    $conteudo=$conteudo.'<div class="col-lg-8 col-lg-offset-1" style="background-color: whitesmoke; border-radius: 10px; padding-bottom: 20px">'
            . '<h3 style="color:grey">Nivel '.$i.'</h3>';
    
    foreach($pdo->query($sql) as $row){
        $conteudo=$conteudo.'<h4><b>Categoria:</b> '.$row[1].'</h4>';
        $sqlCertas="select count(idResposta)as corretas from respondidas  a, questoes b where a.idQuestao=b.idQuest and statusResp=1 and idAluno=".$idAluno." and idnivel=".$i." and questCateg=".$row[0];
        
        $certas=$pdo->query($sqlCertas)->fetch();
        $conteudo=$conteudo.'<p style="text-indent:50px; color: green;"><b>Questões Corretas:</b> '.$certas['corretas'].'</p>';
        
        $sqlErradas="select count(idResposta)as incorretas from respondidas  a, questoes b where a.idQuestao=b.idQuest and statusResp=2 and idAluno=".$idAluno." and idnivel=".$i." and questCateg=".$row[0];
        $erradas=$pdo->query($sqlErradas)->fetch();
        $conteudo=$conteudo.'<p style="text-indent:50px; color: red;"><b>Questões Incorretas:</b> '.$erradas['incorretas'].'</p>';
        
    }
    $conteudo=$conteudo.'</div>';
;}
$conteudo=$conteudo.'</div>';
Database::disconnect();
include_once 'masterProf.php';