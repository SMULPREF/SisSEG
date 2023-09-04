<?php

    session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

    
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <?php include('navbar.php');?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style_sidebar_.css">

    <title>tabela php comc banco</title>
</head>
    <body>
        <div class="container">
            <table class="table table-bordered">
                <thead class="">
                    <tr>
                        <th scope="col">SISTEMA</th>
                        <th scope="col">UNIDADE</th>
                        <th scope="col">USUARIO</th>
                        <th scope="col">USUARIO SOLICITANTE</th>
                        <th scope="col">SETOR</th>
                        <th scope="col">ATRIBUÍÇÃO</th>
                        <th scope="col">NOME USUARIO</th>
                        <th scope="col">SOLICITANTE</th>
                        <th scope="col">OCORRENCIA</th>
                        <th scope="col">data</th>
                        <th scope="col">responsavel</th>
                        <th scope="col">obs</th>
                    </tr>
                </thead>
                <?php include_once 'getPessoa.php';?>
            </table>
        </div>
    </body>
</html>

<style>
    .container{
        max-width: 1400px;
        margin-top: 50px;
    }
</style>