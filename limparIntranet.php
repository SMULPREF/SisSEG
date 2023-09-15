<?php

include 'head.php';

// Configurações do banco de dados
$host_telefones = "10.75.32.129";
$banco_telefones = "telefones";
$usuario_telefones = "root";
$senha_telefones = "root";

// Configurações do banco de dados
$host_servidores = "localhost";
$banco_servidores = "sisseg";
$usuario_servidores = "root";
$senha_servidores = "";

// Conecta ao banco de dados telefones
$conexao_telefones = mysqli_connect($host_telefones, $usuario_telefones, $senha_telefones, $banco_telefones);
if ($conexao_telefones === false) {
    die("Não foi possível conectar ao banco de dados telefones.");
}

// Conecta ao banco de dados servidores
$conexao_servidores = mysqli_connect($host_servidores, $usuario_servidores, $senha_servidores, $banco_servidores);
if ($conexao_servidores === false) {
    die("Não foi possível conectar ao banco de dados servidores.");
}

// Seleciona todos os registros da tabela telefones
$sql_telefones = "SELECT * FROM tbl_telefones";
$resultado_telefones = mysqli_query($conexao_telefones, $sql_telefones);

// Percorre os registros da tabela telefones
while ($registro_telefones = mysqli_fetch_assoc($resultado_telefones)) {

    // Obtém o usuário da rede do registro da tabela telefones
    $cp_usuario_rede = $registro_telefones["cp_usuario_rede"];

    // Verifica se o usuário da rede do registro da tabela telefones existe na tabela servidores
    $sql_servidores = "SELECT * FROM servidores WHERE usuario = '$cp_usuario_rede'";
    $resultado_servidores = mysqli_query($conexao_servidores, $sql_servidores);

    // Se o usuário da rede do registro da tabela telefones não existir na tabela servidores, adiciona o registro à lista de registros a serem removidos
    if (mysqli_num_rows($resultado_servidores) === 0) {
        $registros_a_remover[] = $registro_telefones;
    }
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

