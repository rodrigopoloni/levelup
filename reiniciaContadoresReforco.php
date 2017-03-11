<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$nivel=$_GET['id'];
$_SESSION['corretas']=0;
$_SESSION['erradas']=0;
$_SESSION['respondidas']=0;

header("location:reforcoQuiz.php?id=$nivel");
