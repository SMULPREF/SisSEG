<?php

include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    echo $id;
    
    // Execute a consulta SQL para atualizar o campo sigpec
    $atualizar_sigpec = "UPDATE servidores SET sigpec = 1 WHERE id = $id";
    
    if (mysqli_query($conn, $atualizar_sigpec)) {
        echo "success"; // Responda com "success" se a atualização for bem-sucedida
    } else {
        echo "error"; // Responda com "error" se houver um erro na atualização
    }
}
?>