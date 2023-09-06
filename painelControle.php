<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once 'head.php' ?>
    <title>Home</title>
</head>

<body>
    <div class="container-lg">
        <div class="row">
            <div class="card" style="width: 18rem;">
                <img src="img/usuarios.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Banco de Dados de usuários</h5>
                    <p class="card-text">Esse script irá atualizar a lista de usuários de acordo com o Active Directory.</p>
                    <form action="insereUsuarios.php" method="post">
                        <button type="submit" class="btn btn-secondary" name='users'>Atualizar Usuários</button>
                    </form>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="img/unidades.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Unidades</h5>
                    <p class="card-text">Esse script irá atualizar as unidades de usuários de acordo com o SIGPEC. Executar no começo de cada mês</p>
                    <form action="insereUnidade.php" method="post">
                        <button type="submit" class="btn btn-secondary" name='unidades'>Atualizar Unidades</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>

</html>