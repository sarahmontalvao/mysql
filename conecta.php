<?php
$host="localhost";
$user="root";
$password="";
$db="tickets";

$conn = new mysqli ($host,$user,$password,$db);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

$alunosQuery = 'select * FROM filmes ';
$result = $conn->query($alunosQuery);

if ($result) {
    $resultado = [];
    while ($row = $result->fetch_assoc()) {
        $resultado[] = $row;
    } 
     session_start();
    $_SESSION['resultado'] = $resultado;
    echo'conexão executada';
    
} else {
    echo "Erro ao executar a consulta: " . $conn->error;
}
?>