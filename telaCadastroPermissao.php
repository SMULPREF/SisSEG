<?php
    session_start();
    include_once 'unidades.php';
    include_once 'conexao.php';
    include_once 'getdadosusuario.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/style_sidebar_.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>
    <body>
        <?php include_once 'navbar.php'; ?>
        <div class="container">

            <div class="container title-section">
                <h2 class="title">Pesquisa</h2>
            </div>
        <div class="container card bg-glass busca-section">
            <form action="" class="card-body px-md-5" method="post">
                <label for="" class="form-label">Usuario</label>
                <div class="div-busca">
                    <input type="text" placeholder="Digite o RF ou RG desejado..." name="busca" class="form-control campo-busca">
                    <input type="submit" value="Buscar" class="btn btn-primary mb-4 botao-busca">
                </div>
            </form>
        </div>

        <div class="container title-section">
            <h2 class="title">Dados do usuario</h2>
        </div>
        <div class="container form-section zera-borda">
            <form action="addCadastro.php" method="post">
            <div class="row mb-4">
                    <div class="col">
                        <div class="form-outline">
                            <input type="text" name="nome" id="nome" class="form-control" value="<?php echo $nomes;?>" />
                            <label class="form-label" for="form6Example1">Nome Completo</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <input type="text" name="rfrg" id="rfrg" value="<?php echo $rf;?>" class="form-control" />
                            <label class="form-label" for="form6Example1">RF/RG</label>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    
                    <div class="col">
                        <div class="form-outline">
                        <input type="text" name="usuario" id="usuario" value="<?php echo $user;?>" class="form-control" required/>

                            <label class="form-label" for="form6Example2">Usuario</label>
                        </div>
                    </div>

                </div>

                <div class="row mb-4">
                    <div class="col">
                        <div class="form-outline">
                            <input type="email" name="nome" id="nome" value="<?php echo $email;?>" class="form-control" />
                            <label class="form-label" for="form6Example1">E-MAIL</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <select class="form-select select-form" aria-label="Default select example">
                                <option value="0"></option>
                                <?php teste(); ?>
                            </select>
                            <label class="form-label" for="form6Example1">UNIDADE DE TRABALHO</label>
                        </div>
                    </div>
                </div>
                </div>
                <div class="container title-section">
            <h2 class="title">Cadastro Permissão</h2>
        </div>
        <div class="container form-section zera-borda">
            <form action="addCadastro.php" method="post">
            <div class="row mb-4">
                    <div class="col">
                        <div class="form-outline">
                            <input type="text" name="nome" id="nome" value="<?php echo $_SESSION['SesNome']?>" class="form-control" />
                            <label class="form-label" for="form6Example1">RESPONSÁVEL PELA ALTERAÇÃO</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <input type="text" name="rfrg" id="rfrg" class="form-control" />
                            <label class="form-label" for="form6Example1">Solicitante</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <input type="text" name="rfrg" id="rfrg" class="form-control" />
                            <label class="form-label" for="form6Example1">Usuario Solicitante</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <input type="text" name="rfrg" id="rfrg" class="form-control" />
                            <label class="form-label" for="form6Example1">Setor</label>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col">
                        <div class="form-outline">
                            <select class="form-select select-form" aria-label="Default select example">
                                <option selected></option>
                                <option value="1">Incluir</option>
                                <option value="2">Excluir</option>
                                <option value="3">Alteração</option>
                            </select>
                            <label class="form-label" for="form6Example1">Ocorrência(incluir/excluir/alteração)</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <input type="text" name="rfrg" id="rfrg" class="form-control" />
                            <label class="form-label" for="form6Example1">DATA DA ALTERAÇÃO</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <input type="text" name="rfrg" id="rfrg" class="form-control" />
                            <label class="form-label" for="form6Example1">NIVEL DE
                            PERMISSIONAMENTO<br>
                            ATRIBUÍDO</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                        <select class="form-select select-form" aria-label="Default select example">
                            <option selected></option>
                            <option value="1">Ativo</option>
                            <option value="2">Inativo</option>
                            <option value="3">Alteração</option>
                        </select>
                            <label class="form-label" for="form6Example1">SITUAÇÃO (Ativo/Inativo/Suspenso)</label>
                        </div>
                    </div>
                </div>

                    <div class="row mb-4">

                    
                    <div class="col">
                    </div>
                    <div class="col">
                        <div class="form-outline">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    
                    <div class="col">
                        <div class="form-outline">
                        <input type="text" name="usuario" id="usuario" class="form-control" required/>

                            <label class="form-label" for="form6Example2">Observações</label>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </body>
</html>

<style>

    /* selectBox */

    .multiselect {
    width: 200px;
    }

    .selectBox {
    position: relative;
    }

    .selectBox select {
    width: 100%;
    font-weight: bold;
    }

    .overSelect {
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    }

    #checkboxes {
    display: none;
    border: 1px #dadada solid;
    }

    #checkboxes label {
    display: block;
    }

    #checkboxes label:hover {
    background-color: #1e90ff;
    }

    /* termino */

    .container{
        max-width: 1400px;
        margin: 10px 30px 0;
    }
    .div-busca{
        display: flex;
        height: 40px;
    }

    .busca-section{
        background-color: #E7E7E7;
        padding: -30px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }


    .botao-busca{
        height: 98%;
        margin: 0 0 0 10px;
    }

    .campo-busca{
        width: 50%;
        margin: 0;
    }

    .ajusta-div{
        margin: 0;
        padding: 0;
    }

    .form-section{
        background-color: #e6e6e6;
        padding-top: 20px;
        border-radius: 5px;
        border: 0.2px solid #c9c9c9;
        padding-bottom: -220px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }

    .title-section{
        background-color: #FAFAFA;
        border: 1px #B7B7B7 solid;
        border-bottom: 0;
        margin-bottom: -11px;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }

    .title{
        font-size: 28px;
    }

    .select-form{
        height: 40px;
        margin-top: 4px;
    }
</style>

<script>
    var expanded = false;

function showCheckboxes() {
  var checkboxes = document.getElementById("checkboxes");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}
</script>