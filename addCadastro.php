<?php

include_once 'conexao.php';

if (isset($_POST['inserir'])) {
    $erroMessage = "";
    $successMessage = "";
    
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }
    
    $sistema = $_POST['sistema'];
    $nome = $_POST['nome'];
    $usuario = $_POST['usuario'];
    $solicitante = $_POST['solicitante'];
    $usuariosolicitante = $_POST['usuariosolicitante'];
    $setor = $_POST['setor'];
    $ocorrencia = $_POST['ocorrencia'];
    $dataalteracao = $_POST['dataalteracao'];
    $nivelatribuido = $_POST['nivelatribuido'];
    $responsalvepalteracao = $_POST['responsalvepalteracao'];
    $obs = $_POST['obs'];
    $situacao = $_POST['situacao'];
    $unidade = $_POST['unidade'];

    $sql = "REPLACE INTO historico (usuario, sistema_id, unidade, usario_solicitante, setor_id, nivel_atribuido, observacoes) 
    VALUES ('$usuario', '$sistema', '$unidade', '$usuariosolicitante', '$setor', '$nivelatribuido', '$obs')";
    
    if ($conn->query($sql) === TRUE) {
    
        $sql_log = "INSERT INTO historico_log (sistema_id, unidade, usuario, usario_solicitante, setor_id, nivel_atribuido, observacoes, nome_usuario, nome_solicitante, ocorrencia, data_ocorrencia, nome_responsavel) 
        VALUES ('$sistema', '$unidade', '$usuario', '$usuariosolicitante', '$setor', '$nivelatribuido', '$obs', '$nome', '$solicitante', '$ocorrencia', '$dataalteracao', '$responsalvepalteracao')";
    



        if ($conn->query($sql_log) === true) {
        header('Location: telaCadastroPermissao.php');
        $successMessage = '<script>alert("Cadastro feito com sucesso ' . $usuario . '");</script>';
        } else {
            $erroMessage = '<script>alert("Erro ao inserir dados: ' . $conn->error . '");</script>';
        }
    }

}





$conn->close();


?>