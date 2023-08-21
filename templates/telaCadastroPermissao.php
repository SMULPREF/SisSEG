<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
    <body>
        <div class="container card bg-glass busca-section">
            <form action="" class="card-body px-4 py-5 px-md-5">
                <label for="" class="form-label">RF/RG</label>
                <div class="div-busca">
                    <input type="text" placeholder="Digite o RF ou RG desejado..." class="form-control campo-busca">
                    <input type="submit" value="Buscar" class="btn btn-primary btn-block mb-4 botao-busca">
                </div>
            </form>
        </div>

        <div class="container">
            <form>
            <div class="row mb-4">
                <div class="col">
                    <div class="form-outline">
                        <input type="text" id="form6Example1" class="form-control" />
                        <label class="form-label" for="form6Example1">Nome Completo</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <input type="text" id="form6Example2" class="form-control" />
                        <label class="form-label" for="form6Example2">RF/RG</label>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                
                <div class="col">
                    <input type="text" id="form6Example3" class="form-control" />
                    <label class="form-label" for="form6Example3">Company name</label>
                </div>

                <div class="col">
                    <input type="text" id="form6Example4" class="form-control" />
                    <label class="form-label" for="form6Example4">Address</label>
                </div>

                <div class="col">
                    <input type="email" id="form6Example5" class="form-control" />
                    <label class="form-label" for="form6Example5">Email</label>
                </div>
            </div>

            <div class="form-outline mb-4">
                <input type="number" id="form6Example6" class="form-control" />
                <label class="form-label" for="form6Example6">Phone</label>
            </div>

            <div class="form-outline mb-4">
                <textarea class="form-control" id="form6Example7" rows="4"></textarea>
                <label class="form-label" for="form6Example7">Additional information</label>
            </div>

            <div class="form-check d-flex justify-content-center mb-4">
                <input class="form-check-input me-2" type="checkbox" value="" id="form6Example8" checked />
                <label class="form-check-label" for="form6Example8"> Create an account? </label>
            </div>

            <button type="submit" class="btn btn-primary btn-block mb-4">Enviar</button>

            </form>
        </div>
    </body>
</html>

<style>
    .container{
        max-width: 1400px;
        margin-top: 50px;
    }
    .div-busca{
        display: flex;
        height: 40px;
    }

    .busca-section{
        background-color: #cfcfcf;
        padding: -30px;
    }

    .botao-busca{
        height: 98%;
        margin-left: 10px;
    }

    .campo-busca{
        width: 50%;
    }
</style>