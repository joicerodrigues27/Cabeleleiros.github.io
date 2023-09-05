<?php
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexão com o banco de dados (substitua essas informações pelas suas)
    $servername = "seu_servidor";
    $username = "seu_usuario";
    $password = "sua_senha";
    $dbname = "seu_banco_de_dados";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão com o banco de dados
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Recebe os dados do formulário
    $nome = $_POST["nome"];
    $comentario = $_POST["comentario"];
    $avaliacao = $_POST["avaliacao"];

    // Insere os dados no banco de dados
    $sql = "INSERT INTO comentarios (nome, comentario, avaliacao) VALUES ('$nome', '$comentario', $avaliacao)";

    if ($conn->query($sql) === TRUE) {
        echo "Comentário enviado com sucesso!";
    } else {
        echo "Erro ao enviar o comentário: " . $conn->error;
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulário de Contato</title>
</head>
<body>
    <h1>Deixe seu comentário e avaliação</h1>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br><br>

        <label for="comentario">Comentário:</label>
        <textarea name="comentario" required></textarea><br><br>

        <label for="avaliacao">Avaliação:</label>
        <select name="avaliacao" required>
            <option value="1">1 - Péssimo</option>
            <option value="2">2 - Ruim</option>
            <option value="3">3 - Regular</option>
            <option value="4">4 - Bom</option>
            <option value="5">5 - Excelente</option>
        </select><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
