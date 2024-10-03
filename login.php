<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login - Autônomos em Busca</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
    html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
    </style>
</head>
<body class="w3-light-grey">

    <div class="w3-content w3-margin-top" style="max-width:1400px;">

        <div class="w3-row-padding">

            <div class="w3-third">
                
            </div>

            <div class="w3-twothird">
                <div class="w3-container w3-card w3-white w3-margin-bottom">
                    <h2 class="w3-text-grey w3-padding-16">
                        <i class="fa fa-sign-in fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Login
                    </h2>
                    <?php
                    session_start();
                    if(isset($_SESSION['erro'])) {
                        echo '<p class="w3-text-red">'.$_SESSION['erro'].'</p>';
                        unset($_SESSION['erro']);
                    }
                    if(isset($_SESSION['sucesso'])) {
                        echo '<p class="w3-text-green">'.$_SESSION['sucesso'].'</p>';
                        unset($_SESSION['sucesso']);
                    }
                    ?>
                    <form action="processa_login.php" method="POST">
                        <div class="w3-section">
                            <label>Email</label>
                            <input class="w3-input w3-border" type="email" name="email" required>
                        </div>
                        <div class="w3-section">
                            <label>Senha</label>
                            <input class="w3-input w3-border" type="password" name="senha" required>
                        </div>
                        <button type="submit" class="w3-button w3-teal w3-margin-bottom">Login</button>
                    </form>
                    <p>Esqueceu a senha? <a href="recuperar_senha.php">Recuperar</a></p>
                    <p>Não tem uma conta? <a href="registrar.php">Registrar</a></p>
                </div>
            </div>

        </div>

    </div>

</body>
</html>
