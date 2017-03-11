<?php
    $title='Cadastro de Aluno';    
    $conteudo='
        <div class="container">
        <ol class="breadcrumb">
            <li><a href="gerenciarArea.php">Gerenciar</a></li>
            <li><a href="listaAlunos.php">Alunos</a></li>
        </ol>
            <div class="col-lg-6 col-lg-offset-2" style="background: whitesmoke; border-radius: 20px; padding: 10px 20px 10px 20px">
                <h2 style="text-align:center">Cadastro de Alunos</h2>
                <hr>
                
                <form action="incluirEstudante.php" method="post">
                    <div class="form-group">
                      <label>Nome</label>
                      <input type="text" class="form-control"  name="nome" placeholder="Digite o nome do aluno" required>
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control"  name="email" placeholder="Digite o email do aluno" required>
                    </div>
                    <div class="form-group">
                      <label>Usuário</label>
                      <input type="text" class="form-control"  name="user" placeholder="Escolha um usuário" required>
                    </div>
                    <div class="form-group">
                      <label>Senha</label>
                      <input type="password" class="form-control"  name="senha" placeholder="Escolha uma senha" required>
                    </div>
                    <div class="form-group">
                      <label>Curso</label>
                      <select class="form-control" name="curso" required>
                          <option selected>Selecione o Curso</option>
                          <option value="1">Informática para Negócios</option>
                          <option value="2">Agronegócios</option>
                          <option value="3">Análise e Desenvolvimento de Sistemas</option>
                          <option value="4">Gestão Empresarial - EAD</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Semestre</label>
                      <select class="form-control" name="semestre" required>
                          <option selected>Selecione o semestre</option>
                          <option value="1">1º Semestre</option>
                          <option value="2">2º Semestre</option>
                          <option value="3">3º Semestre</option>
                          <option value="4">4º Semestre</option>
                          <option value="5">5º Semestre</option>
                          <option value="6">6º Semestre</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Período</label>
                      <select class="form-control" name="turno" required>
                          <option selected>Selecione o Período</option>
                          <option value="1">Manhã</option>
                          <option value="2">Tarde</option>
                          <option value="3">Noite</option>
                          <option value="4">EAD</option>
                      </select>
                    </div>
                    <button type="submit" class="btn btn-block btn-success"> <span class="glyphicon glyphicon-check"></span> Cadastrar </button><br>
                    <a href="listaAlunos.php" class="btn btn-block btn-danger"> <span class="glyphicon glyphicon-user"></span> Gerenciar Alunos </a>
                </form>
            </div>
            ';
            include_once('masterProf.php');
            
    
