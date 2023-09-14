<?php
include_once 'conexao.php';

// Consulta SQL para buscar dados (ajuste de acordo com sua tabela)
$sql = "SELECT id, aprova_digital, portal_licenciamento, sei, simproc, sisacoe, sissel, slce, slcii FROM permissoes";
$result = $conn->query($sql);

// Array para armazenar os dados
$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Feche a conexão com o banco de dados
$conn->close();

// Retorne os dados como JSON
header('Content-Type: application/json');
echo json_encode($data);
?>