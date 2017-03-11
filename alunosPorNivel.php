<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$title='Alunos por Níveis';
include_once('Data\Conexao.php');
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$idNivel=$_GET['id'];
$nivel=1;
$conteudo='<div class="container">
    <ol class="breadcrumb">
            <li><a href="analiseArea.php">Análises</a></li>
    </ol>
                <div class="col-lg-8 col-lg-offset-1" style="background-color: whitesmoke; border-radius: 10px; padding-bottom: 20px">';
for($nivel;$nivel<=6;$nivel++){
    $sql = 'SELECT count(*) as qtd FROM levelup.estudante where statusAluno=1 and nivel='.$nivel;
    $qtd=$pdo->query($sql)->fetch()['qtd'];
        $conteudo=$conteudo.'<h3> Nível 0'.$nivel.': <small>'.$qtd.' alunos <a href="alunosPorNivel.php?id='.$nivel.'"> <i class="glyphicon glyphicon-list"></i> Detalhar</a></small></h3>';
                
}
$sql = 'SELECT count(*) as qtd FROM levelup.estudante where nivel='.$nivel;
$qtd=$pdo->query($sql)->fetch()['qtd'];
        $conteudo=$conteudo.'<h3>Alunos que finalizaram o Quiz: <small>'.$qtd.' alunos <a href="alunosPorNivel.php?id='.$nivel.'"> <i class="glyphicon glyphicon-list"></i> Detalhar</a></small></h3>';
 $conteudo=$conteudo.'</div>

             <hr> ';
 
 if(isset($idNivel)){
     $sql2 = 'SELECT * FROM levelup.estudante where statusAluno=1 and nivel='.$idNivel;
      $conteudo=$conteudo.'<div class="col-lg-8 col-lg-offset-1" style="background-color: whitesmoke; border-radius: 10px; padding-bottom: 20px">
                <h3>Alunos </h3>
                <table class="table table-hover table-inverse">
                    <thead>
                        <tr style="background-color: black; color: white">

                            <th>Nome</th>
                            <th>Semestre</th>
                            <th>Turno</th>
                            <th>Curso</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>';
                            
                            foreach ($pdo->query($sql2) as $row){
                                $conteudo=$conteudo.'<tr>';
                                $conteudo=$conteudo.'<td>'.$row['nome'].'</td>';
                                $conteudo=$conteudo.'<td>'.$row['semestre'].'</td>';
                                $turno=0;
                                if($row['turno']==1) $turno="Manhã";
                                if($row['turno']==2) $turno="Tarde";
                                if($row['turno']==3) $turno="Noite";
                                if($row['turno']==4) $turno="EAD";
                                $conteudo=$conteudo.'<td>'.$turno.'</td>';
                                $curso=0;
                                if($row['curso']==1) $curso="Info";
                                if($row['curso']==2) $curso="Agro";
                                if($row['curso']==3) $curso="ADS";
                                if($row['curso']==4) $curso="EAD";
                                $conteudo=$conteudo.'<td>'.$curso.'</td>';
                                $conteudo=$conteudo.'<td><a href="estatisticasAluno.php?id='.$row['idUsuario'].'">Ver desempenho</a></td>';
                                $conteudo=$conteudo.'</tr>';
                                
                            };
                        $conteudo=$conteudo.'</tbody>
                    
                </table>

            </div>
            </div>';
     
 }
 

Database::disconnect();
include_once('masterProf.php');