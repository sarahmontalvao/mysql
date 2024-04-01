<?php


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu Dropdown</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>

<a href="index.php">HOME</a>

<div class="dropdown">
  <h2>Cadastrar</h2>
  <button onclick="toggleDropdown('dropdown1')" class="dropbtn">Empresas</button>
  <div id="dropdown1" class="dropdown-content">
    <a href="empresa.php">Empresa</a>
    <a href="treinamento.php">Treinamento</a>
  </div>
</div>

<div class="dropdown">
  <h2>Treinamentos</h2>
  <button onclick="toggleDropdown('dropdown2')" class="dropbtn">Alunos</button>
  <div id="dropdown2" class="dropdown-content">
    <a href="alunos.php">Alunos</a>
  </div>
</div>

<script src="script.js"></script>

</body>
</html>
