<?php
    
        include_once 'conexao.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $busca = $_POST["busca"];
    
            $query = "SELECT nome, user, email, rf, obs FROM servidores WHERE user = '$busca'";
            $result = $conn->query($query);
    
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $nomes = $row["nome"];
                    $user = $row["user"];
                    $email = $row["email"];
                    $rf = $row["rf"];
                    $obs = $row["obs"];
                }
            }
        }

    $conn->close();
?>