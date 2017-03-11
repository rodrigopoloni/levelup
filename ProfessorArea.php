        <?php
        if(isset($_SESSION['id'])){
        $title='Bem vindo!';
        $conteudo='
            <div class="container">
                <div class="col-lg-9 col-lg-offset-1" style="background: whitesmoke; border-radius: 20px; padding: 10px 20px 10px 20px">
                
                <h1 style="font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;">Bem vindo professor!</h1><hr>
                <p class="lead" style="font-family: Georgia, serif"> Aqui você encontra todas as opções para gerenciamento de alunos, do quiz e de sugestões. Além disso você conta com uma área de 
                estatísticas relacionadas aos resultados obtidos pelos alunos nos quizes que responderam.</p>
                <p class="lead" align="justify" style="font-family: Georgia, serif"> Esperamos que esta aplicação possa auxiliá-lo em sua jornada de ensino. :)</p>
                 <p class="lead" align="right" style="font-family:Georgia, serif"> <b> &mdash; Equipe LevelUp</b></p>
                

                <div class="row">
                    <div class="col-md-6">
                        <img src="imgs/prof1.png"  width="35%" height="35%" alt="...">
                    </div>
                    <div class="col-md-6">
                        <img src="imgs/prof2.png" align="right" width="50%" height="50%" class="" alt="...">
                    </div>
                </div>
                
                <hr>
                </div>
                </div>
                
                ';
                include_once('masterProf.php');}
        else{
            header('location:login.php');
        }
        ?>