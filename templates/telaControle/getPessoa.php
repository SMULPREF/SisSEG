<?php

include_once '../../unidades.php';
include '../../conexao.php';


$query = "SELECT nome, user, email, rf FROM servidores";

$result = mysqli_query($conn, $query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['nome'] . "</td>";
        echo "<td>" . $row['rf'] . "</td>";
        echo "<td>" . $row['user'] . "</td>";
        echo "<td>" . "null" . "</td>";
        echo "<td>" . "null" . "</td>";
        echo "<td>" . "null" . "</td>";
        echo "<td>" . "null" . "</td>";
        echo "<td>" . "null" . "</td>";
        echo "<td>" . "null" . "</td>";
        echo "<td>" . "null" . "</td>";
        echo "<td>" . "null" . "</td>";
        echo "<td>" . "null" . "</td>";
        echo "<td>" . "null" . "</td>";
        echo "<td>" . "null" . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "</tr>";
    }

    mysqli_free_result($result);
} else {
    echo "Erro na consulta: " . mysqli_error($conn);
}



mysqli_close($conn);

?>