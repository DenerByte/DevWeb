<?php

session_start();
require 'conexao.php';

if (isset($_GET['token'])) {
    $token = mysqli_real_escape_string($conn, $_GET['token']);

    
    $sql = "SELECT id FROM usuario WHERE token_recuperacao = '$token'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nova_senha = $_POST['senha'];
            $confirmar_senha = $_POST['confirmar_senha'];

            if ($nova_senha === $confirmar_senha) {
                $senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);
                $user_id = $result->fetch_assoc()['id'];

               
                $sql = "UPDATE usuario SET senha = '$senha_hash', token_recuperacao = NULL WHERE id = $user_id";
                if ($conn->query($sql) === TRUE) {
                    $_SESSION['sucesso'] = "Senha resetada com sucesso. Faça login.";
                    header("Location: login.php");
                    exit();
                } else {
                    $_SESSION['erro'] = "Erro ao atualizar a senha.";
                }
            } else {
                $_SESSION['erro'] = "As senhas não coincidem.";
            }
        }
    } else {
        $_SESSION['erro'] = "Token inválido ou expirado.";
        header("Location: recuperar_senha.php");
        exit();
    }
} else {
    $_SESSION['erro'] = "Nenhum token fornecido.";
    header("Location: recuperar_senha.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Resetar Senha - Autônomos em Busca</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="container">
        <h2>Resetar Senha</h2>
        <?php
        if(isset($_SESSION['erro'])) {
            echo '<p class="erro">'.$_SESSION['erro'].'</p>';
            unset($_SESSION['erro']);
        }
        ?>
        <form action="" method="POST">
            <input type="password" name="senha" placeholder="Nova Senha" required><br>
            <input type="password" name="confirmar_senha" placeholder="Confirmar Nova Senha" required><br>
            <button type="submit" class="btn">Resetar Senha</button>
        </form>
    </div>
</body>
</html>
