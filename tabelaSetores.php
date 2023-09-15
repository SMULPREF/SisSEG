<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telefones por Setor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <?php
    $servername = "10.75.32.129"; // substitua pelo nome do servidor do seu banco de dados
    $username = "root"; // substitua pelo nome de usuário do banco de dados
    $password = "root"; // substitua pela senha do banco de dados
    $dbname = "telefones"; // substitua pelo nome do banco de dados

    // Criar a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    $conn->set_charset("utf8");

    $sql = "SELECT cp_nome, cp_cargo, cp_email, cp_telefone, cp_departamento FROM tbl_telefones ORDER BY cp_departamento, cp_nome";
    $result = $conn->query($sql);

    ?> 


    <div class="container">
        <?php
        $current_department = "";
        while ($row = $result->fetch_assoc()) {
            if ($row['cp_departamento'] !== $current_department) {
                // Inicia um novo setor
                $current_department = $row['cp_departamento'];
                echo '<h2>' . $current_department . '</h2>';
                echo '<table class="table">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Nome</th>';
                echo '<th>Cargo</th>';
                echo '<th>Email</th>';
                echo '<th>Telefone</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
            }

            // Exibe os detalhes do funcionário em um card
            echo '<tr>';
            echo '<td>' . $row['cp_nome'] . '</td>';
            echo '<td>' . $row['cp_cargo'] . '</td>';
            echo '<td>' . $row['cp_email'] . '</td>';
            echo '<td>' . $row['cp_telefone'] . '</td>';
            echo '</tr>';
        }

        // Fecha a tabela do último setor
        echo '</tbody>';
        echo '</table>';
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>