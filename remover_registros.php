<?php
// Configurações do banco de dados telefones
$host_telefones = "10.75.32.129";
$banco_telefones = "telefones";
$usuario_telefones = "root";
$senha_telefones = "root";

$ids = $_POST['ids'];

// Conecta ao banco de dados telefones
$conexao_telefones = mysqli_connect($host_telefones, $usuario_telefones, $senha_telefones, $banco_telefones);
if ($conexao_telefones === false) {
    die("Não foi possível conectar ao banco de dados telefones.");
}

// Se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtém os IDs dos registros a serem removidos
    $ids = $_POST["ids"];

    // Remove os registros da tabela telefones
    foreach ($ids as $id) {
        $sql_remover_registro = "DELETE FROM tbl_telefones WHERE id_key = $id";
        mysqli_query($conexao_telefones, $sql_remover_registro);
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($conexao_telefones);
      
    header("Location: limparIntranet.php");
    exit();
}
?>
