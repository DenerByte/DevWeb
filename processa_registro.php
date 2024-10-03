<?php
session_start();
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);
    $profissao = mysqli_real_escape_string($conn, $_POST['profissao']);
    $descricao = mysqli_real_escape_string($conn, $_POST['descricao']);

    $sql = "SELECT id FROM usuario WHERE email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $_SESSION['erro'] = "Email já está registrado.";
        header("Location: registrar.php");
        exit();
    }

    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuario (nome, email, senha, profissao, descricao) VALUES ('$nome', '$email', '$senha_hash', '$profissao', '$descricao')";
    
    if ($conn->query($sql) === TRUE) {
        $_SESSION['sucesso'] = "Registro realizado com sucesso. Faça login.";
        header("Location: login.php");
    } else {
        $_SESSION['erro'] = "Erro: " . $sql . "<br>" . $conn->error;
        header("Location: registrar.php");
    }
} else {
    header("Location: registrar.php");
}

if(isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0){
    $allowed = ['jpg', 'jpeg', 'png', 'gif'];
    $filename = $_FILES['avatar']['name'];
    $filetype = $_FILES['avatar']['type'];
    $filesize = $_FILES['avatar']['size'];

    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if(!in_array(strtolower($ext), $allowed)){
        $_SESSION['erro'] = "Formato de imagem não permitido.";
        header("Location: registrar.php");
        exit();
    }

    $new_filename = uniqid() . "." . $ext;
    $upload_dir = 'uploads/avatars/';
    if(!is_dir($upload_dir)){
        mkdir($upload_dir, 0755, true);
    }
    $upload_path = $upload_dir . $new_filename;

    if(move_uploaded_file($_FILES['avatar']['tmp_name'], $upload_path)){
        $avatar = $upload_path;
    } else {
        $_SESSION['erro'] = "Erro ao fazer upload da imagem.";
        header("Location: registrar.php");
        exit();
    }
} else {
    $avatar = 'https://www.w3schools.com/w3images/avatar2.png';
}

$sql = "INSERT INTO usuario (nome, email, senha, profissao, descricao, avatar) VALUES ('$nome', '$email', '$senha_hash', '$profissao', '$descricao', '$avatar')";

