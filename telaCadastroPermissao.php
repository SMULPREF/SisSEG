<?php
    session_start();
    include_once 'unidades.php';
    include_once 'conexao.php';
    include_once 'getdadosusuario.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <script src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"
        integrity="sha256-xLD7nhI62fcsEZK2/v8LsBcb4lG7dgULkuXoXB/j91c=" crossorigin="anonymous"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"
        integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
        integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
</head>
    <body>
        <?php include_once 'templates/navbar.php'; ?>
        <div class="container">

            <div class="container title-section">
                <h2 class="title">Pesquisa</h2>
            </div>
            <div class="container card bg-glass busca-section">
                <div class="row">
                    <div class="col mb-4">
                        <form action="" method="post">
                            <label for="" class="form-label">Usuario</label>
                            <div class="div-busca">
                                <input type="text" placeholder="Digite o RF ou RG desejado..." name="busca" class="form-control campo-busca">
                                <input type="submit" value="Buscar" class="btn btn-primary mb-4 botao-busca">
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="container title-section">
                <h2 class="title">Dados do usuario</h2>
            </div>
            <form action="addCadastro.php" method="post">
                <div class="container form-section zera-borda">
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" name="nome" id="nome" value="<?php echo isset($nomes) ? $nomes : ''; ?>" class="form-control read" readonly/>
                                <label class="form-label" for="form6Example1">Setor</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" name="rfrg" id="rfrg" value="<?php echo isset($rf) ? $rf : ''; ?>" class="form-control read" readonly/>
                                <label class="form-label" for="form6Example1">RF/RG</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">

                        <div class="col">
                            <div class="form-outline">
                                <input type="text" name="usuario" id="usuario" value="<?php echo isset($user) ? $user : ''; ?>" class="form-control read" readonly/>
                                <label class="form-label" for="form6Example2">Usuario</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="email" name="email" id="email" value="<?php echo isset($email) ? $email : ''; ?>" class="form-control read" readonly/>
                                <label class="form-label" for="form6Example1">E-MAIL</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline select-form">
                                <select class="form-select select-form" aria-label="Default select example"  name="unidade" id="unidade" multiple>
                                    <?php unidades(); ?>
                                </select>
                                <script>
                                    $(function pesquisaSelect() {
                                        $("#unidade").selectize();
                                    });
                                </script>
                                <label class="form-label" for="form6Example1">UNIDADE DE TRABALHO</label>
                            </div>
                        </div>
                    </div>

            </div>


        <div class="container title-section">
            <h2 class="title">Cadastro Permissão</h2>
        </div>
        <div class="container form-section zera-borda">

                <div class="row mb-4">
                    <div class="col-md-3 col-sm-12">
                        <div class="form-outline">
                            <input type="text" name="responsalvepalteracao" id="responsalvepalteracao" value="<?php echo $_SESSION['SesNome']?>" class="form-control" />
                            <label class="form-label" for="form6Example1">RESPONSÁVEL PELA ALTERAÇÃO</label>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="form-outline">
                            <input type="text" name="usuariosolicitante" id="usuariosolicitante" class="form-control" />
                            <label class="form-label" for="form6Example1">Usuario Solicitante</label>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="form-outline">
                            <input type="text" name="solicitante" id="solicitante" class="form-control" value="<?php $nomeUser; ?>"/>
                            <label class="form-label" for="form6Example1">Solicitante</label>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="form-outline">
                            <input type="text" name="setor" id="setor" class="form-control" />
                            <label class="form-label" for="form6Example1">Setor</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col">
                        <div class="form-outline select-form">
                        <select class="form-select select-form" name="ocorrencia" id="ocorrencia" aria-label="Default select example">
                            <option selected></option>
                            <option value="0">Incluir</option>
                            <option value="1">Excluir</option>
                            <option value="2">Alteração</option>
                        </select>
                        </div>
                        <label class="form-label" for="form6Example1">Ocorrência (incluir/excluir/alteração)</label>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <input type="datetime-local" name="dataalteracao" id="dataalteracao" class="form-control" />
                            <label class="form-label" for="form6Example1">DATA DA ALTERAÇÃO</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <input type="text" name="nivelatribuido" id="nivelatribuido" class="form-control" />
                            <label class="form-label" for="form6Example1">NIVEL DE PERMISSIONAMENTO ATRIBUÍDO</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline select-form">
                        <select class="form-select select-form" name="situacao" id="situacao" aria-label="Default select example">
                            <option selected></option>
                            <option value="0">Ativo</option>
                            <option value="1">Inativo</option>
                            <option value="2">Suspenso</option>
                        </select>
                        </div>
                        <label class="form-label" for="form6Example1">Situação (Ativo/Inativo/Suspenso)</label>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-3">
                        <select class="form-select select-form" name="sistema" id="sistema" aria-label="Default select example">
                            <option selected></option>
                            <option value="SEI">SEI</option>
                            <option value="SIMPROC">SIMPROC</option>
                        </select>
                        <label class="form-label" for="form6Example1">Sistemas</label>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col">
                        <input type="text" name="obs" id="obs" class="form-control"/>
                        <label class="form-label" for="form6Example1">Observações</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <input type="submit" value="Inserir" name="inserir" class="btn btn-primary mb-4 botao-busca">
                    </div>
                </div>
            </div>
         </form>
    </body>
</html>

<style>

    .read:read-only{
        background-color: #f9f9f9;
        color: #727272;
    }

    /* selectBox */


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
        margin: 10px auto;
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
        width: 100%;
        margin: 2px 0;
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

function getDataHoraAtual() {
            const agora = new Date();
            const ano = agora.getFullYear();
            const mes = String(agora.getMonth() + 1).padStart(2, '0'); // Adiciona zero à esquerda, se necessário
            const dia = String(agora.getDate()).padStart(2, '0');
            const hora = String(agora.getHours()).padStart(2, '0');
            const minuto = String(agora.getMinutes()).padStart(2, '0');
            const dataHora = `${ano}-${mes}-${dia}T${hora}:${minuto}`;
            return dataHora;
        }

        const campoDataHora = document.getElementById('dataalteracao');
        campoDataHora.value = getDataHoraAtual();

</script>