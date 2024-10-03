<?php
session_start();
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $senha = $_POST['senha']; 

    $sql = "SELECT id, senha, nome FROM usuario WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $usuario = $result->fetch_assoc();
        if (password_verify($senha, $usuario['senha'])) {
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            header("Location: dashboard.php"); 
            exit();
        } else {
            $_SESSION['erro'] = "Senha incorreta.";
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION['erro'] = "Email não encontrado.";
        header("Location: login.php");
        exit();
    }
} else {
    header("Location: login.php");
}

