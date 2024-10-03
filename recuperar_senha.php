
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Recuperar Senha - Autônomos em Busca</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="container">
        <h2>Recuperar Senha</h2>
        <?php
        session_start();
        if(isset($_SESSION['erro'])) {
            echo '<p class="erro">'.$_SESSION['erro'].'</p>';
            unset($_SESSION['erro']);
        }
        if(isset($_SESSION['sucesso'])) {
            echo '<p class="sucesso">'.$_SESSION['sucesso'].'</p>';
            unset($_SESSION['sucesso']);
        }
        ?>
        <form action="processa_recuperacao.php" method="POST">
            <input type="email" name="email" placeholder="Email" required><br>
            <button type="submit" class="btn">Enviar Link de Recuperação</button>
        </form>
        <p>Voltar para <a href="login.php">Login</a></p>
    </div>
</body>
</html>
