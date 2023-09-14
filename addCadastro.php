<?php

include_once 'conexao.php';



if (isset($_POST['inserir'])) {
    $erroMessage = "";
    $successMessage = "";

    $sistema = $_POST['sistema'];
    $nome = $_POST['nome'];
    $usuario = $_POST['usuario'];
    $solicitante = $_POST['solicitante'];
    $usuariosolicitante = $_POST['usuariosolicitante'];
    $sigla = $_POST['sigla'];
    $ocorrencia = $_POST['ocorrencia'];
    $dataalteracao = $_POST['dataalteracao'];
    $nivelatribuido = $_POST['permissao'];
    $responsalvepalteracao = $_POST['responsalvepalteracao'];
    $obs = $_POST['obs'];
    $situacao = $_POST['situacao'];
    $unidade = $_POST['unidade'];


    $sql = "REPLACE INTO historico (usuario, sistema_id, unidade, usario_solicitante, sigla_unidade, nivel_atribuido, observacoes) 
        VALUES ('$usuario', '$sistema', '$unidade', '$usuariosolicitante', '$sigla', '$nivelatribuido', '$obs')";



    if ($conn->query($sql) === TRUE) {

        $sql_log = "INSERT INTO historico_log (sistema_id, unidade, usuario, usario_solicitante, sigla_unidade, nivel_atribuido, observacoes, nome_usuario, nome_solicitante, ocorrencia, data_ocorrencia, nome_responsavel) 
        VALUES ('$sistema', '$unidade', '$usuario', '$usuariosolicitante', '$sigla', '$nivelatribuido', '$obs', '$nome', '$solicitante', '$ocorrencia', '$dataalteracao', '$responsalvepalteracao')";

        if ($conn->query($sql_log) === true) {
            echo "<script>alert('Cadastrado com Sucesso!'); document.location.href='telaCadastroPermissao.php'</script>";
        }
    } else{
        if ($conn->query($sql_log) === true) {
            echo "<script>alert('Falha no cadastrado!'); document.location.href='telaCadastroPermissao.php'</script>";
        }
    }
}



?>