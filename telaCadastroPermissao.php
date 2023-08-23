<?php
    session_start();
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
    <?php include 'navbar.php'; ?>
</head>
    <body>
        <div class="container">
        <div class="container card bg-glass busca-section">
            <form action="" class="card-body px-4 py-5 px-md-5">
                <label for="" class="form-label">RF/RG</label>
                <div class="div-busca">
                    <input type="text" placeholder="Digite o RF ou RG desejado..." value="<?php echo $_SESSION['SesNome'];?>" class=" campo-busca">
                    <input type="submit" value="Buscar" class="btn btn-primary mb-4 botao-busca">
                </div>
            </form>
        </div>

        <div class="container form-section">
            <form action="addCadastro.php" method="post">
            <div class="row mb-4">
                <div class="col">
                    <div class="form-outline">
                        <input type="text" name="nome" id="nome" class="form-control" />
                        <label class="form-label" for="form6Example1">Nome Completo</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <input type="text" name="rfrg" id="rfrg" class="form-control" />
                        <label class="form-label" for="form6Example1">RF/RG</label>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                
                <div class="col">
                    <div class="form-outline">
                    <input type="text" name="usuario" id="usuario" class="form-control" required/>

                        <label class="form-label" for="form6Example2">Usuario</label>
                    </div>
                </div>

                <div class="col">
                    <select class="form-select" name="aprova" id="aprova" aria-label="Default select example">
                        <option selected></option>
                        <option value="1">Sim</option>
                        <option value="2">Não</option>
                    </select>
                    <label>Aprova Digital</label>
                </div>

            <div class="row mb-4 ajusta-div">

                <div class="col">
                    <select class="form-select" name="portal" id="portal" aria-label="Default select example">
                        <option selected></option>
                        <option value="1">Sim</option>
                        <option value="2">Não</option>
                    </select>
                    <label>Portal de Licenciamento/Anistia</label>
                </div>
                
                <div class="col">
                    <select class="form-select" name="sei" id="sei" aria-label="Default select example">
                        <option selected></option>
                        <option value="1">Sim</option>
                        <option value="2">Não</option>
                    </select>
                    <label>SEI</label>
                </div>

                <div class="col">
                    <select class="form-select" name="simproc" id="simproc" aria-label="Default select example">
                        <option selected></option>
                        <option value="1">Sim</option>
                        <option value="2">Não</option>
                    </select>
                    <label>SIMPROC</label>
                </div>

                <div class="col">
                    <select class="form-select" name="sisacoe" id="sisacoe" aria-label="Default select example">
                        <option selected></option>
                        <option value="1">Sim</option>
                        <option value="2">Não</option>
                    </select>
                    <label>SISACOE</label>
                </div>

            </div>

            <div class="row mb-4 ajusta-div">

                <div class="col">
                    <select class="form-select" name="sissel" id="sissel" aria-label="Default select example">
                        <option selected></option>
                        <option value="1">Sim</option>
                        <option value="2">Não</option>
                    </select>
                    <label>SisSEL</label>
                </div>
                
                <div class="col">
                    <select class="form-select" name="slce" id="slce" aria-label="Default select example">
                        <option selected></option>
                        <option value="1">Sim</option>
                        <option value="2">Não</option>
                    </select>
                    <label>SLCE</label>
                </div>

                <div class="col">
                    <select class="form-select" name="slcii" id="sclii"aria-label="Default select example">
                        <option selected></option>
                        <option value="1">Sim</option>
                        <option value="2">Não</option>
                    </select>
                    <label>SLCII</label>
                </div>

                <div class="col">
                    <select class="form-select" name="situacao" id="situacao" aria-label="Default select example">
                        <option selected></option>
                        <option value="1">Ativo</option>
                        <option value="2">Inativo</option>
                    </select>
                    <label>SITUAÇÃO (Ativo/Inativo/Suspenso)</label>
                </div>
            </div>

            <div class="row mb-4 ajusta-div">
                <div class="col">
                    <div class="form-outline">
                        <input type="email" name="email" id="email" class="form-control" />
                        <label class="form-label" for="form6Example1">E-MAIL</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <input type="text" name="unidadeDT" id="unidadeDT" class="form-control" />
                        <label class="form-label" for="form6Example2">UNIDADE DE TRABALHO</label>
                    </div>
                </div>
            </div>

            <div class="form-outline mb-4">
                <textarea class="form-control" id="observacao" name="observacao" rows="2"></textarea>
                <label class="form-label" for="form6Example7">Observações</label>
            </div>
            <div class="form-outline">
                <button type="submit" value="Enviar" class="btn btn-primary btn-block mb-4 bnt-enviar">Enviar</button>
                <button type="submit" value="Enviar" class="btn btn-primary btn-block mb-4 bnt-enviar">Atualizar</button>
            </div>
            </form>
        </div>
        </div>

    </body>
</html>

<style>



    .container{
        max-width: 1400px;
        margin: 10px 30px 0;
    }
    .div-busca{
        display: flex;
        height: 40px;
    }

    .busca-section{
        background-color: #b7b7b7;
        padding: -30px;
    }

    .botao-busca{
        height: 98%;
        margin: 0 0 0 10px;
    }

    .campo-busca{
        width: 50%;
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
    }

</style>