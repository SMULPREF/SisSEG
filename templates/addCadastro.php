<?php

include_once '../conexao.php';

$erroMessage = "";
$successMessage = "";

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$nome = $_POST['nome'];
$email = $_POST['email'];
$unidadeDT = $_POST['unidadeDT'];
$usuario = $_POST['usuario'];
$aprova = $_POST['aprova'];
$portal = $_POST['portal'];
$sei = $_POST['sei'];
$simproc = $_POST['simproc'];
$sisacoe = $_POST['sisacoe'];
$sissel = $_POST['sissel'];
$slce = $_POST['slce'];
$slcii = $_POST['slcii'];
$situacao = $_POST['situacao'];
$observacao = $_POST['observacao'];
$rfrg = $_POST['rfrg'];

$sql = "INSERT INTO cadastro (nome, email, unidadeDT, usuario, aprova, portal, sei, simproc, sisacoe, sissel, slce, slcii, situacao, observacao, rfrg) 
VALUES ('$nome', '$email', '$unidadeDT', '$usuario', '$aprova', '$portal', '$sei', '$simproc', '$sisacoe', '$sissel', '$slce', '$slcii', '$situacao', '$observacao', '$rfrg')";


if ($conn->query($sql) === true) {
    header('Location: telaCadastroPermissao.php');
    $successMessage = '<script>alert("Cadastro feito com sucesso ' . $usuario . '");</script>';
} else {
    $erroMessage = '<script>alert("Erro ao inserir dados: ' . $conn->error . '");</script>';
}

$conn->close();


?>