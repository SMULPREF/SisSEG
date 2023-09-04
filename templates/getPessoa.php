<?php

    include_once '../unidades.php';
    include_once '../conexao.php';

    // Consulta para selecionar os dados
    $query = "SELECT * FROM historico_log";
    $result = mysqli_query($conn, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            switch ($row['sistema_id']) {
                case 0:
                    echo "<td> SEI </td>";
                    break;
                case 1:
                    echo "<td> SIMPROC </td>";
                    break;
            }
            echo "<td>" . $row['unidade'] . "</td>";
            echo "<td>" . $row['usuario'] . "</td>";
            echo "<td>" . $row['usario_solicitante'] . "</td>";
            echo "<td>" . $row['setor_id'] . "</td>";
            echo "<td>" . $row['nivel_atribuido'] . "</td>";
            echo "<td>" . $row['nome_usuario'] . "</td>";
            echo "<td>" . $row['nome_solicitante'] . "</td>";

            switch ($row['ocorrencia']) {
                case 0:
                    echo "<td> Incluir </td>";
                    break;
                case 1:
                    echo "<td> Excluir </td>";
                    break;
                case 2:
                    echo "<td> Alteração </td>";
                    break;
            }

            echo "<td>" . $row['data_ocorrencia'] . "</td>";
            echo "<td>" . $row['nome_responsavel'] . "</td>";
            echo "<td>" . $row['observacoes'] . "</td>";

            echo "</tr>";
        }

        // Liberar resultado
        mysqli_free_result($result);
    } else {
        echo "Erro na consulta: " . mysqli_error($conn);
    }

    // Fechar conexão
    mysqli_close($conn);
    

?>