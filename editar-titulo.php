<?php
include_once('conecta.php');


if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $novoTitulo = $_POST['novo_titulo'];
    
    $updateQuery = "UPDATE filmes SET titulo='$novoTitulo' WHERE id=$id";
    if ($conn->query($updateQuery) === TRUE) {
        echo "Título atualizado com sucesso.";
    } else {
        echo "Erro ao atualizar título: " . $conn->error;
    }
}

if (isset($_GET['id'])) {


   // $novoGenero = $_POST['novo_genero'];
    
   // $updateQuery = "UPDATE filmes SET titulo='$novoTitulo', genero='$novoGenero' WHERE id=$id";
    $id = $_GET['id'];
    
    $consulta = "SELECT * FROM filmes WHERE id=$id";
    $result = $conn->query($consulta);
    
    if ($result->num_rows > 0) {
        $filme = $result->fetch_assoc();
    } else {
        echo "Filme não encontrado.";
        exit;
    }
} else {
    echo "ID do filme não fornecido.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Título</title>
</head>
<body>
    <h2>Editar Título</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="hidden" name="id" value="<?php echo $filme['id']; ?>">
        Novo Título: <input type="text" name="novo_titulo" value="<?php echo $filme['titulo']; ?>"><br><br>
       <!-- Novo Gênero: <input type="text" name="novo_genero" value="<?php //echo $filme['genero']; ?>"><br><br>-->
        <input type="submit" value="Atualizar Título">
    </form>
</body>
</html>

<?php
$conn->close();
?>
