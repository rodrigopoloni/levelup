<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once('Data\Conexao.php');

$login = $_POST['usuario'];
$senha = $_POST['senha'];

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql1="SELECT * FROM levelup.estudante WHERE username = '$login' AND senha = '$senha' and statusAluno=1";
$sql2="SELECT * FROM levelup.professor WHERE username = '$login' AND senha = '$senha'";
$usuario = $pdo->query($sql1)->fetch();
$professor = $pdo->query($sql2)->fetch();


//
//
// 
//$sql = "SELECT * FROM levelup.estudante WHERE username = '$login' AND senha = '$senha'";
//$sql2= "SELECT * FROM levelup.professor WHERE username = '$login' AND senha = '$senha'";
//$resultado = mysql_query($sql) or die ("Erro na seleção da tabela.");
//$resultado2 = mysql_query($sql2) or die ("Erro na seleção da tabela.");
//
//$usuario = mysql_fetch_array($resultado);
//$professor = mysql_fetch_array($resultado2);
//carrega os dados para utilizar na sessao
$id=$usuario['idUsuario'];
$nome=$usuario['nome'];
$nivel=$usuario['nivel'];
$pontos=$usuario['pontos'];
$username=$usuario['username'];

$idprof=$professor['idProfessor'];
$nomeProf=$professor['nome'];




////Caso consiga logar cria a sessão
if ($pdo->query($sql1)->rowCount()> 0) {
    // session_start inicia a sessão
    session_start();
    
    $_SESSION['id']=$id;
    $_SESSION['nivel']=$nivel;
    $_SESSION['nome']=$nome;
    $_SESSION['usuario'] = $login;
    $_SESSION['senha'] = $senha;
    $_SESSION['pontos']=$pontos;
    $_SESSION['username']=$username;
    $_SESSION['questao']=1;
    $_SESSION['corretas']=0;
    $_SESSION['erradas']=0;
    $_SESSION['respondidas']=0;
    $_SESSION['aluno']=true;
    header('location:StudentArea.php');
}
else if($pdo->query($sql2)->rowCount()> 0){
    session_start();
    
    $_SESSION['id']=$idprof;
    $_SESSION['nome']=$nomeProf;
    $_SESSION['usuario'] = $login;
    $_SESSION['senha'] = $senha;
    $_SESSION['professor']=true;
    Database::disconnect();
    header('location:professorArea.php');
//Caso contrário redireciona para a página de autenticação
}else {
    
    //Destrói
    session_destroy();
 
    //Limpa
    unset ($_SESSION['login']);
    unset ($_SESSION['senha']);
    Database::disconnect();
    //Redireciona para a página de autenticação
    header('location:login.php?erro=1');
     
}