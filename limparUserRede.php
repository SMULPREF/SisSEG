<?php

include 'head.php';

// Configurações do banco de dados
$host = "localhost";
$banco = "sisseg";
$usuario = "root";
$senha = "";

// Conecta ao banco de dados telefones
$conn = mysqli_connect($host, $usuario, $senha, $banco);
if ($conn === false) {
    die("Não foi possível conectar ao banco de dados telefones.");
}

// Seleciona todos os registros da tabela telefones
$sql = "SELECT * FROM servidores WHERE sigpec = 3 AND usuario NOT LIKE 'x%'; ";
$resultado = mysqli_query($conn, $sql);

// Percorre os registros da tabela telefones
while ($registro = mysqli_fetch_assoc($resultado)) {
    $id = $registro['id'];
    $nome = $registro['nome'];
    $usuario = $registro['usuario'];
    $nome = $registro['nome'];
    $sigla = $registro['sigla_unidade'];    
}

// Exibe uma lista dos registros a serem removidos
echo "<form action='remover_registros.php' method='post'>";
echo "<table class='table'>";
echo "<thead>";
echo "<tr>";
echo "<th scope='col'>Usuário da rede</th>";
echo "<th scope='col'>Nome</th>";
echo "<th scope='col'>Departamento</th>";
echo "</tr>";
foreach ($registros_a_remover as $registro_a_remover) {
    echo "<tr>";
    echo "<td>" . $registro_a_remover["cp_usuario_rede"] . "</td>";
    echo "<td>" . $registro_a_remover["cp_nome"] . "</td>";
    echo "<td>" . $registro_a_remover["cp_departamento"] . "</td>";
    echo "<td><input type='checkbox' name='ids[]". $registro_a_remover["id_key"]."' value='" . $registro_a_remover["id_key"] . "'></td>";
    echo "</tr>";
}
echo "</table>";
echo "<br>";
echo "<input type='submit' value='Remover registros'>";
echo "</form>";

?>

