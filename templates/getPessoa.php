<?php

include_once 'unidades.php';
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $idfiltro = $_POST['filtro'];

    if (isset($idfiltro)) {
        $query = "SELECT * FROM historico_log WHERE data_ocorrencia >= NOW() - INTERVAL $idfiltro DAY ORDER BY data_ocorrencia DESC";
    } 

    $result = mysqli_query($conn, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            $sistema_id = [
                "SEI",
                "SIMPROC",
                "SISSEL",
                "APROVA DIGITAL",
                "SLCE",
                "SLC II",
                "PORTAL DE LICENCIAMENTO",
                "SISACOE"
            ];
            echo "<td>" . $sistema_id[$row['sistema_id']] . "</td>";
            echo "<td>" . $row['unidade'] . "</td>";
            echo "<td>" . $row['usuario'] . "</td>";
            echo "<td>" . $row['usario_solicitante'] . "</td>";
            echo "<td>" . $row['nivel_atribuido'] . "</td>";
            echo "<td>" . $row['sigla_unidade'] . "</td>";
            echo "<td>" . $row['nome_usuario'] . "</td>";
            echo "<td>" . $row['nome_solicitante'] . "</td>";
            $ocorrencia = [
                "Incluir",
                "Excluir",
                "Alteração"
            ];
            echo "<td>" . $ocorrencia[$row['ocorrencia']] . "</td>";
            $data_ocorrencia = $row['data_ocorrencia'];
            $dataHoraFormatada = date('d/m/Y H:i:s', strtotime($data_ocorrencia));
            echo "<td>" . $dataHoraFormatada . "</td>";
            echo "<td>" . $row['nome_responsavel'] . "</td>";
            echo "<td>" . $row['observacoes'] . "</td>";
            echo "</tr>";
        }

        mysqli_free_result($result);
    } else {
        echo "Erro na consulta: " . mysqli_error($conn);
    }

}

mysqli_close($conn);

?>