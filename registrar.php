
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Registrar - Autônomos em Busca</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="container">
        <h2>Registrar-se</h2>
        <form action="processa_registro.php" method="POST">
            <input type="text" name="nome" placeholder="Nome Completo" required><br>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="senha" placeholder="Senha" required><br>
            <input type="text" name="profissao" placeholder="Profissão/Área de Atuação" required><br>
            <textarea name="descricao" placeholder="Breve Descrição"></textarea><br>
            <button type="submit" class="btn">Registrar</button>
        </form>

        <form action="processa_registro.php" method="POST" enctype="multipart/form-data">
    
    <input type="file" name="avatar" accept="image/*"><br>
    <button type="submit" class="btn">Registrar</button>
</form>

        <p>Já tem uma conta? <a href="login.php">Login</a></p>
    </div>
</body>
</html>
