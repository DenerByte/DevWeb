<?php

session_start();
require 'conexao.php';


function gerarToken($length = 50) {
    return bin2hex(random_bytes($length));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    
    $sql = "SELECT id FROM usuario WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $usuario = $result->fetch_assoc();
        $token = gerarToken();

       
        $sql = "UPDATE usuario SET token_recuperacao = '$token' WHERE id = ".$usuario['id'];
        if ($conn->query($sql) === TRUE) {
            
            $link = "http://localhost/projetofinal/resetar_senha.php?token=".$token;
            $assunto = "Recuperação de Senha - Autônomos em Busca";
            $mensagem = "Clique no link para resetar sua senha: <a href='$link'>$link</a>";

            
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            
            if (mail($email, $assunto, $mensagem, $headers)) {
                $_SESSION['sucesso'] = "Link de recuperação enviado para seu email.";
                header("Location: recuperar_senha.php");
                exit();
            } else {
                $_SESSION['erro'] = "Erro ao enviar email. Tente novamente.";
                header("Location: recuperar_senha.php");
                exit();
            }
        } else {
            $_SESSION['erro'] = "Erro ao gerar token de recuperação.";
            header("Location: recuperar_senha.php");
            exit();
        }
    } else {
        $_SESSION['erro'] = "Email não encontrado.";
        header("Location: recuperar_senha.php");
        exit();
    }
} else {
    header("Location: recuperar_senha.php");
}


