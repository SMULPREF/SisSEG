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
                case 2:
                    echo "<td> SISSEL </td>";
                    break;
                case 3:
                    echo "<td> APROVA DIGITAL </td>";
                    break;
                case 4:
                    echo "<td> SLCE </td>";
                    break;
                case 5:
                    echo "<td> SLC II </td>";
                    break;
                case 6:
                    echo "<td> PORTAL DE LICENCIAMENTO </td>";
                    break;
                case 7:
                    echo "<td> SISACOE </td>";
                    break;
            }
            echo "<td>" . $row['unidade'] . "</td>";
            echo "<td>" . $row['usuario'] . "</td>";
            echo "<td>" . $row['usario_solicitante'] . "</td>";
            echo "<td>" . $row['nivel_atribuido'] . "</td>";
            echo "<td>" . $row['sigla_unidade'] . "</td>";
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
            
            $data_ocorrencia = $row['data_ocorrencia'];
            $dataHoraFormatada = date('d/m/Y H:i:s', strtotime($data_ocorrencia));
            echo "<td>" . $dataHoraFormatada . "</td>";
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