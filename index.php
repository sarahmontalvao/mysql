<?php
  session_start();
  //dados para mudança de paginas
  if(isset ($_SESSION['resultado'])){
  $resultadosPg = array_chunk($_SESSION['resultado'], 4);
  }

  //recuperação de pagina clicada e exibição de dados
  $arrayCorrespondente = isset($resultadosPg[0]) ? $resultadosPg[0] : [];
  if (isset($_POST['submit'])) {
    $indice = $_POST['indice'];
    $arrayCorrespondente = $resultadosPg[$indice];
    
}
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
    //exibir tabela com dados
if(isset($arrayCorrespondente)) {
    foreach ($arrayCorrespondente as $dado) {
        echo "<tr>";
        echo "<td>" . $dado['id'] . "</td>";
        echo "<td><a href='editar-titulo.php?id=" . $dado['id'] . "'>" . $dado['titulo'] . "</a></td>";
        echo "<td>" . $dado['genero'] . "</td>";
        echo "<td>" . $dado['descricao'] . "</td>";
        echo "</tr>";
    }
}
        
    ?>   
    </table>
    <div>
        <?php
        //mudar paginas de exibição
        if(isset($resultadosPg)){
            foreach ($resultadosPg as $i => $array) {
                echo '<form method="post">';
                echo '<input type="hidden" name="indice" value="' . $i . '">';
                echo '<input type="submit" name="submit" value="P">';
                echo '</form>';
               
            }
        }
        ?>
    </div>
     

    
</body>
</html>