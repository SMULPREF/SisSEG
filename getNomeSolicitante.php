<?php
include_once 'conexao.php';

// Consulta SQL para buscar dados (ajuste de acordo com sua tabela)
$sql = "SELECT nome FROM servidores";
$result = $conn->query($sql);



// Array para armazenar os dados
$datas = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $datas[] = $row;
    }
}

// Feche a conexão com o banco de dados
$conn->close();

// Retorne os dados como JSON
header('Content-Type: application/json');
echo json_encode($datas);
?>