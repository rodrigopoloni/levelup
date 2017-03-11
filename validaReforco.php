<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$nivel=$_POST['niveljogado'];

$_SESSION['respondidas']=$_SESSION['respondidas']+1;

if($_POST['alternativa']==$_POST['resposta']){
    $_SESSION['corretas']=$_SESSION['corretas']+1;
}else if ($_POST['alternativa']!=$_POST['resposta']){
    $_SESSION['erradas']=$_SESSION['erradas']+1;
}

header("location:reforcoQuiz.php?id=$nivel");