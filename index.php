<?php
  session_start();
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
</head>
<body>
    <h2>INDEX</h2>
    <table>

    <?php
    if(isset ($_SESSION['resultado'])){
    foreach($_SESSION['resultado'] as $dado){
        echo "<tr>";
        echo "<td>" . $dado['id'] . "</td>";
        echo "<td><a href='editar-titulo.php?id=" . $dado['id'] . "'>" . $dado['titulo'] . "</a></td>";
        echo "<td>" . $dado['genero'] . "</td>";
        echo "</tr>";

       
    }}
    ?>
     
       
    </table>
</body>
</html>