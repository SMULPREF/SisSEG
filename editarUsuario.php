<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Registro</title>

    <style>
        input.idtext {
            width: 120px;
        }
    </style>

    <?php
    include_once 'head.php';
    include_once 'conexao.php'; ?>
</head>

<body>
    <div class="container mt-5">
        <div class="form-row">
            <div class="d-flex align-items-center">
                <div>
                    <input class="form-control form-control-sm" type="search" placeholder="Pesquisar com o usuário" name="pesquisar" id="pesquisar">
                </div>
                <div class="ml-2">
                    <button class="btnpesquisa btn-outline-success" onclick="searchData()" type="submit">Pesquisar</button>
                </div>
            </div>
        </div>
        <h2>Editar Dados</h2>
        <form action="atualizarUsuario.php" method="POST">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuário</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>RF</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    // Receber o número da página
                    $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
                    $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
                    //Setar a quantidade de itens por página
                    $qnt_result_pg = 15;
                    //Calcular o início da visualização
                    $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
                    if (!empty($_GET['search'])) {
                        $data = $_GET['search'];
                        $buscar_cadastros = "SELECT * FROM servidores WHERE user LIKE '%$data%' ORDER BY id DESC";
                    } else {
                        $buscar_cadastros = "SELECT * FROM servidores ORDER BY id DESC LIMIT $inicio, $qnt_result_pg";
                    }

                    $query_cadastros = mysqli_query($conn, $buscar_cadastros);

                    //Paginação - Somar a quantidade de processos      

                    $result_pg = "SELECT COUNT(id) AS num_result FROM servidores";
                    $resultado_pg = mysqli_query($conn, $result_pg);
                    $row_pg = mysqli_fetch_assoc($resultado_pg);

                    //echo $row_pg['num_result'];

                    $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

                    //Limitar a quantidade de Links antes e depois

                    $max_links = 3;

                    while ($receber_cadastros = mysqli_fetch_array($query_cadastros)) {
                        $id = $receber_cadastros['id'];
                        $nome = $receber_cadastros['nome'];
                        $user = $receber_cadastros['user'];
                        $email = $receber_cadastros['email'];
                        $rf = $receber_cadastros['rf'];
                    ?>
                        <tr>
                            <td><a><?php echo $id; ?></a></td>
                            <td><input class="form-control" type="text" name="nome" value="<?php echo $user; ?>"></td>
                            <td><input class="form-control" type="text" name="usuario" value="<?php echo $nome; ?>"></td>
                            <td><input class="form-control" type="text" name="email" value="<?php echo $email; ?>"></td>
                            <td><input class="form-control" type="text" name="rf" value="<?php echo $rf; ?>"></td>
                            <td><button type="submit" class="btn btn-primary">Atualizar</button></td>
                        </tr>
                    <?php }; ?>
                </tbody>
            </table>
        </form>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="editarUsuario.php?pagina=1">Primeira</a></li>

                <?php for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
                    if ($pag_ant >= 1) {
                        echo "<li class='page-item'><a class='page-link' href='editarUsuario.php?pagina=$pag_ant'>$pag_ant</a></li>";
                    }
                } ?>

                <li class="page-item"><a class='page-link'><?php echo $pagina ?></a></li>

                <?php for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
                    if ($pag_dep <= $quantidade_pg) {
                        echo "<li class='page-item'><a class='page-link' href='editarUsuario.php?pagina=$pag_dep'>$pag_dep</a></li>";
                    }
                }

                echo "<li class='page-item'><a class='page-link' href='editarUsuario.php?pagina=$quantidade_pg'>Última</a></li>";

                echo '</ul>';
                echo '</nav>';
                ?>
    </div>
</body>
<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") {
            searchData();
        }
    });

    function searchData() {
        window.location = 'editarUsuario.php?search=' + search.value;
    }
</script>

</html>