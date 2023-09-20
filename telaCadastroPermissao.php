<?php
session_start();
include_once 'unidades.php';
include_once 'conexao.php';
include_once 'getdadosusuario.php';
include_once 'addCadastro.php';

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
    <?php include_once 'sidebar.php' ?>

    
</head>

<body>
    <div class="container">

        <div class="container title-section">
            <h2 clAass="title">Pesquisa</h2>
        </div>
        <div class="container card bg-glass busca-section">
            <div class="row">
                <div class="col mb-4">
                    <form action="" method="post">
                        <label for="" class="form-label">Usuario</label>
                        <div class="div-busca">
                            <input type="text" name="busca" class="form-control campo-busca" required>
                            <input type="submit" value="Buscar" class="btn btn-primary mb-4 botao-busca"
                                value="<?php $tetse ?>">
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
                            <input type="text" maxlength="0" name="nome" id="nome"
                                value="<?php echo isset($nomes) ? $nomes : ''; ?>" class="form-control readonly"
                                required />
                            <label class="form-label" for="form6Example1">Nome completo</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <input type="text" maxlength="0" name="rfrg" id="rfrg"
                                value="<?php echo isset($rf) ? $rf : ''; ?>" class="form-control readonly" required />
                            <label class="form-label" for="form6Example1">RF/RG</label>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">

                    <div class="col">
                        <div class="form-outline">
                            <input type="text" maxlength="0" name="usuario" id="usuario"
                                value="<?php echo isset($user) ? $user : ''; ?>" class="form-control readonly"
                                required />
                            <label class="form-label" for="form6Example2">Usuario</label>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col">
                        <div class="form-outline">
                            <input type="email" maxlength="0" name="email" id="email"
                                value="<?php echo isset($email) ? $email : ''; ?>" class="form-control readonly" />
                            <label class="form-label" for="form6Example1">E-MAIL</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <input type="text" maxlength="0" name="sigla" id="sigla"
                                value="<?php echo isset($sigla) ? $sigla : ''; ?>" class="form-control readonly" />
                            <label class="form-label" for="form6Example1">Sigla Unidade</label>
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
                            <input type="text" name="responsalvepalteracao" id="responsalvepalteracao"
                                value="<?php echo $_SESSION['SesNome'];; ?>" class="form-control" required />
                            <label class="form-label" for="form6Example1">RESPONSÁVEL PELA ALTERAÇÃO</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline select-form">
                            <select class="" aria-label="Default select example" name="usuariosolicitante" id="usuariosolicitante" required>
                                <option value="" select>Escolha o usuario</option>
                                <?php usuarios(); ?>
                            </select>
                            <script>
                                $(function pesquisaSelect() {
                                    $("#usuariosolicitante").selectize();
                                });
                            </script>
                            <label class="form-label" for="form6Example1">Usuario Solicitante</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline select-form">
                            <select class="" name="solicitante" id="solicitante" required>
                                <option value="" select>Escolha o nome do solicitante</option>
                                <?php solicitantes(); ?>
                            </select>
                            <script>
                                $(function pesquisaSelect() {
                                    $("#solicitante").selectize();
                                });
                            </script>
                            <label class="form-label" for="form6Example1">SOLICITANTES</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline select-form">
                            <select class="" aria-label="Default select example" name="unidade"
                                id="unidade" multiple required>
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
                <div class="row mb-4">
                    <div class="col">
                        <div class="form-outline select-form">
                            <select class="form-select form-control select-form " name="ocorrencia" id="ocorrencia"
                                aria-label="Default select example" required>
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
                            <input type="datetime-local" name="dataalteracao" id="dataalteracao" step="1"
                                class="form-control" required />
                            <label class="form-label" for="form6Example1">DATA DA ALTERAÇÃO</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <select class="form-select form-control select-form" id="permissao" name="permissao" required>
                                <option value="">Selecione...</option>
                            </select>
                            <label class="form-label" for="form6Example1">NIVEL DE PERMISSIONAMENTO ATRIBUÍDO</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline select-form">
                            <select class="form-select form-control select-form" name="situacao" id="situacao"
                                aria-label="Default select example" required>
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
                        <select class="form-select form-control select-form" id="sistema" name="sistema" required>
                            <option selected>Escolha</option>
                            <?php sistemas(); ?>
                        </select>
                        <label class="form-label" for="form6Example1">Sistemas</label>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col">
                        <input type="text" name="obs" id="obs" class="form-control" />
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
    .permissao {
        display: none;
    }


    .bnt-licitante {
        background-color: #fff;
        border: #fff;
    }

    .btn.btn-primary:hover {
        background-color: #c5c5c5;
    }

    .red {
        margin-left: -63px;
        z-index: 1;
        margin-right: 15px;
    }

    .readonly {
        pointer-events: none;
        background-color: #f9f9f9;
        color: #727272;
    }

    .container {
        max-width: 1400px;
        margin: 10px auto;
    }

    .div-busca {
        display: flex;
        height: 40px;
    }

    .busca-section {
        background-color: #E7E7E7;
        padding: -30px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }


    .botao-busca {
        height: 98%;
        margin: 0 0 0 10px;
    }

    .campo-busca {
        width: 50%;
        margin: 0;
    }

    .ajusta-div {
        margin: 0;
        padding: 0;
    }

    .form-section {
        background-color: #e6e6e6;
        padding-top: 20px;
        border-radius: 5px;
        border: 0.2px solid #c9c9c9;
        padding-bottom: -220px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }

    .title-section {
        background-color: #FAFAFA;
        border: 1px #B7B7B7 solid;
        border-bottom: 0;
        margin-bottom: -11px;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }

    .title {
        font-size: 28px;
    }

    .select-form {
        height: 40px;
        margin-top: 4px;
        width: 100%;
        margin: 2px 0;
    }

    .selectize-control.single .selectize-input:after {
        display: none;
    }

    .selectize-dropdown, .selectize-input, .selectize-input input {
    }

    .selectize-input {
    border: 0px solid #d0d0d0;
    }

    .selectize-control.single .selectize-input {
        box-shadow: none;
        background-color: white;
        background-image: none;
        background-repeat: none;
    }   

    .selectize-control.single .selectize-input, .selectize-dropdown.single {
    border-color: white;
    }
</style>

<script>

    function getDataHoraAtual() {
        const agora = new Date();
        const ano = agora.getFullYear();
        const mes = String(agora.getMonth() + 1).padStart(2, '0');
        const dia = String(agora.getDate()).padStart(2, '0');
        const hora = String(agora.getHours()).padStart(2, '0');
        const minuto = String(agora.getMinutes()).padStart(2, '0');
        const segundos = String(agora.getSeconds()).padStart(2, '0');
        const dataHora = `${ano}-${mes}-${dia}T${hora}:${minuto}:${segundos}`;
        return dataHora;
    }

    const campoDataHora = document.getElementById('dataalteracao');
    campoDataHora.value = getDataHoraAtual();

    document.getElementById("sistema").addEventListener("change", function () {
        var select1Value = this.value;

        var xhr = new XMLHttpRequest();
        xhr.open("GET", "getDados.php?select1Value=" + select1Value, true);

        xhr.onload = function () {
            if (xhr.status === 200) {
                var data = JSON.parse(xhr.responseText);
                var select2 = document.getElementById("permissao");
                
                select2.innerHTML = '<option value="">Selecione...</option>';
                data.forEach(function (item) {
                    var option = document.createElement("option");
                    var value = document.createElement("value");
                    if (select1Value == 1) {
                        option.textContent = item.sei;
                        option.value = item.sei;
                    } else if (select1Value == 2) {
                        option.value = item.simproc;
                        option.textContent = item.simproc;
                    } else if (select1Value == 3) {
                        option.textContent = item.sissel;
                        option.value = item.sissel;
                    } else if (select1Value == 4) {
                        option.textContent = item.aprova_digital;
                        option.value = item.aprova_digital;
                    } else if (select1Value == 5) {
                        option.textContent = item.slce;
                        option.value = item.slce;
                    } else if (select1Value == 6) {
                        option.textContent = item.slcii;
                        option.value = item.slcii;
                    } else if (select1Value == 7) {
                        option.textContent = item.portal_licenciamento;
                        option.value = item.portal_licenciamento;
                    } else if (select1Value == 8) {
                        option.textContent = item.sisacoe;
                        option.value = item.sisacoe;
                    }

                    select2.appendChild(option);
                });
            } else {
                window.alert("Falha na conexão ao resgatar as premissões");
            }
        };

        xhr.send();
    });

    $(".readonly").keydown(function (e) {
        e.preventDefault();
    });


</script>