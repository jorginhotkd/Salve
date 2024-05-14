<?php
// Conectar ao banco de dados
$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "nome_do_banco_de_dados";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar os valores do formulário
    $faculdade = $_POST["faculdade"];
    $materia = $_POST["materia"];

    // Consulta SQL para selecionar os dados do banco de dados
    $sql = "SELECT * FROM materias WHERE faculdade = '$faculdade' AND materia = '$materia'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Exibir os resultados
        echo "<h2>Resultados:</h2>";
        echo "<ul>";
        while($row = $result->fetch_assoc()) {
            echo "<li>" . $row["nome_da_coluna"] . ": " . $row["outra_coluna"] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "Nenhum resultado encontrado.";
    }
}

// Fechar conexão com o banco de dados
$conn->close();
?>