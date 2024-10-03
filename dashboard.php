<?php

session_start();
require 'conexao.php';


if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}


$user_id = $_SESSION['usuario_id'];
$sql = "SELECT nome, email, profissao, descricao FROM usuario WHERE id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $usuario = $result->fetch_assoc();
} else {
    
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Autônomos em Busca</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
    html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
    .w3-sidebar {
        width: 250px;
    }
    
    </style>
</head>
<body class="w3-light-grey">

    
    <nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px;" id="mySidebar">
        <div class="w3-container w3-display-container w3-padding-16">
            <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
            <h3 class="w3-wide"><b>Autônomos em Busca</b></h3>
        </div>
        <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
            <a href="#" class="w3-bar-item w3-button">Dashboard</a>
            <a href="#" class="w3-bar-item w3-button">Perfil</a>
            <a href="#" class="w3-bar-item w3-button">Configurações</a>
            <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
        </div>
    </nav>

   
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" 
         style="cursor:pointer" title="Fechar Menu" id="myOverlay"></div>

    
    <div class="w3-main" style="margin-left:250px">

        
        <header class="w3-container w3-padding-32 w3-center w3-light-grey" id="home">
            <h1 class="w3-jumbo"><b>Bem-vindo, <?php echo htmlspecialchars($usuario['nome']); ?>!</b></h1>
            <p>Profissão: <?php echo htmlspecialchars($usuario['profissao']); ?></p>
            <p><a href="logout.php" class="w3-button w3-teal">Logout</a></p>
        </header>

       
        <div class="w3-content w3-margin-top" style="max-width:1400px;">

           
            <div class="w3-row-padding">

               
                <div class="w3-third">

                    <div class="w3-white w3-text-grey w3-card-4">
                        <div class="w3-display-container">
                            
                            <img src="https://www.w3schools.com/w3images/avatar2.png" style="width:100%" alt="Avatar">
                            <div class="w3-display-bottomleft w3-container w3-text-black">
                                <h2><?php echo htmlspecialchars($usuario['nome']); ?></h2>
                            </div>
                        </div>
                        <div class="w3-container">
                            <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo htmlspecialchars($usuario['profissao']); ?></p>
                            <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo htmlspecialchars($usuario['email']); ?></p>
                            <hr>

                            <p class="w3-large"><b><i class="fa fa-user fa-fw w3-margin-right w3-text-teal"></i>Descrição</b></p>
                            <p><?php echo nl2br(htmlspecialchars($usuario['descricao'])); ?></p>
                            <br>
                        </div>
                    </div><br>

                
                </div>

                
                <div class="w3-twothird">

                    <div class="w3-container w3-card w3-white w3-margin-bottom">
                        <h2 class="w3-text-grey w3-padding-16">
                            <i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>
                            Suas Experiências Profissionais
                        </h2>
                        <div class="w3-container">
                            <h5 class="w3-opacity"><b>Primeira Experiência</b></h5>
                            <h6 class="w3-text-teal">
                                <i class="fa fa-calendar fa-fw w3-margin-right"></i>
                                Jan 2015 - <span class="w3-tag w3-teal w3-round">Atualmente</span>
                            </h6>
                            <p>(Descreva como foi, o que você fez, argumente sua experiência)</p>
                            <hr>
                        </div>
                        <div class="w3-container">
                            <h5 class="w3-opacity"><b>Segunda Experiência</b></h5>
                            <h6 class="w3-text-teal">
                                <i class="fa fa-calendar fa-fw w3-margin-right"></i>
                                Mar 2012 - Dec 2014
                            </h6>
                            <p>(Descreva como foi, o que você fez, argumente sua experiência)</p>
                            <hr>
                        </div>
                        <div class="w3-container">
                            <h5 class="w3-opacity"><b>Terceira Experiência</b></h5>
                            <h6 class="w3-text-teal">
                                <i class="fa fa-calendar fa-fw w3-margin-right"></i>
                                Jun 2010 - Mar 2012
                            </h6>
                            <p>(Descreva como foi, o que você fez, argumente sua experiência)</p><br>
                        </div>
                    </div>

                    <div class="w3-container w3-card w3-white">
                        <h2 class="w3-text-grey w3-padding-16">
                            <i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>
                            Educação
                        </h2>
                        <div class="w3-container">
                            <h5 class="w3-opacity"><b>Formação 1</b></h5>
                            <h6 class="w3-text-teal">
                                <i class="fa fa-calendar fa-fw w3-margin-right"></i>2020
                            </h6>
                            <p>(Descreva como foi, o que você fez, argumente sua experiência)</p>
                            <hr>
                        </div>
                        <div class="w3-container">
                            <h5 class="w3-opacity"><b>Formação 2</b></h5>
                            <h6 class="w3-text-teal">
                                <i class="fa fa-calendar fa-fw w3-margin-right"></i>2013 - 2015
                            </h6>
                            <p>(Descreva como foi, o que você fez, argumente sua experiência)</p>
                            <hr>
                        </div>
                        <div class="w3-container">
                            <h5 class="w3-opacity"><b>Formação 3</b></h5>
                            <h6 class="w3-text-teal">
                                <i class="fa fa-calendar fa-fw w3-margin-right"></i>2010 - 2013
                            </h6>
                            <p>(Descreva como foi, o que você fez, argumente sua experiência)</p><br>
                        </div>
                    </div>

                
                </div>

            
            </div>

        
        </div>

   
    <footer class="w3-container w3-teal w3-center w3-margin-top">
        <p>Redes Sociais</p>
        <i class="fa fa-facebook-official w3-hover-opacity"></i>
        <i class="fa fa-instagram w3-hover-opacity"></i>
        <i class="fa fa-snapchat w3-hover-opacity"></i>
        <i class="fa fa-pinterest-p w3-hover-opacity"></i>
        <i class="fa fa-twitter w3-hover-opacity"></i>
        <i class="fa fa-linkedin w3-hover-opacity"></i>
        <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
    </footer>

   
    <script>
   
    function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
        document.getElementById("myOverlay").style.display = "block";
    }

    
    function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("myOverlay").style.display = "none";
    }
    </script>

</body>
</html>
