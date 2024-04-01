<?php
include_once('menu.php');


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
    <style>
        #segundo,  #terceiro,  #quarto,  #quinto {
            display: none;
        }
    </style>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
   
        <button onclick="mostrarConteudo('primeiro')">Mostrar Primeiro</button>
        <button onclick="mostrarConteudo('segundo')">Mostrar Segundo</button>
        <button onclick="mostrarConteudo('terceiro')">Mostrar Terceiro</button>
        <button onclick="mostrarConteudo('quarto')">Mostrar Quarto</button>
        <button onclick="mostrarConteudo('quinto')">Mostrar Quinto</button>

    <div id="primeiro"  class="conteudo">


    <div class="container">
    <form action="sua_pagina.php" method="GET"> <!-- Substitua sua_pagina.php pela URL real -->
        <input type="search" name="pesquisa" placeholder="Pesquisar...">
        <button type="submit">Enviar</button>
    </form>
</div>


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
        }else {
            echo 'nada';
        }
        ?>
    </div>
     
    </div>

    <div id="segundo"  class="conteudo">
        <h2>SEGUNDA PAGINA</h2>

        <p>CONTEUDO DA SEGUNDA PÁGINA</p>

    </div>

    <div id="terceiro"  class="conteudo">
        <h2>terceiro PAGINA</h2>

        <p>CONTEUDO DA terceiro PÁGINA</p>

    </div>

    <div id="quarto"  class="conteudo">
        <h2>quarto PAGINA</h2>

        <p>CONTEUDO DA quarto PÁGINA</p>

    </div>

    <div id="quinto"  class="conteudo">
        <h2>quinto PAGINA</h2>

        <p>CONTEUDO DA quinto PÁGINA</p>

    </div>
    
    
    
   
    <script>
    function mostrarConteudo(id) {
        var conteudos = document.getElementsByClassName("conteudo");
        for (var i = 0; i < conteudos.length; i++) {
            if (conteudos[i].id === id) {
                conteudos[i].style.display = "block";
            } else {
                conteudos[i].style.display = "none";
            }
        }
    }
</script>
    
</body>
</html>