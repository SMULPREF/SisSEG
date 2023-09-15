<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Registro</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <style>
        input.idtext {
            width: 120px;
        }


        .material-symbols-outlined {
            font-variation-settings:
                'FILL' 0,
                'wght' 400,
                'GRAD' 0,
                'opsz' 24
        }
    </style>
    <?php
    include_once 'head.php';
    include_once 'conexao.php'; ?>
</head>


<body>
    <div class="container mt-5">
        <h2>Mudanças de Unidade</h2>
        <form action="" method="POST">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Usuário</th>
                        <th scope="col">RF</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Unidade Anterior</th>
                        <th scope="col">Unidade Nova</th>
                        <th scope="col">Conferir</th>
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

                    $buscar_cadastros = "SELECT * FROM servidores WHERE sigpec = 2 ORDER BY id DESC";

                    $query_cadastros = mysqli_query($conn, $buscar_cadastros);

                    //Paginação - Somar a quantidade de servidores

                    $result_pg = "SELECT COUNT(id) AS num_result FROM servidores";
                    $resultado_pg = mysqli_query($conn, $result_pg);
                    $row_pg = mysqli_fetch_assoc($resultado_pg);

                    $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

                    //Limitar a quantidade de Links antes e depois

                    $max_links = 3;

                    while ($receber_cadastros = mysqli_fetch_array($query_cadastros)) {
                        $id = $receber_cadastros['id'];
                        $nome = $receber_cadastros['nome'];
                        $user = $receber_cadastros['usuario'];
                        $rf = $receber_cadastros['rf'];
                        $sigla_unidade = $receber_cadastros['sigla_unidade'];
                        $unidade_antiga = $receber_cadastros['unidade_antiga'];

                    ?>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $user; ?></td>
                            <td><?php echo $rf; ?></td>
                            <td><?php echo $nome; ?></td>
                            <td><?php echo $unidade_antiga; ?></td>
                            <td><?php echo $sigla_unidade; ?></td>
                            <td>
                                <a href="#" class="atualizar" data-id="<?php echo $id; ?>">
                                    <i class="material-symbols-outlined">check</i>
                                </a>
                            </td>
                        </tr>
                    <?php }; ?>
                </tbody>
            </table>
        </form>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="unidadesDiferentes.php?pagina=1">Primeira</a></li>

                <?php for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
                    if ($pag_ant >= 1) {
                        echo "<li class='page-item'><a class='page-link' href='unidadesDiferentes.php?pagina=$pag_ant'>$pag_ant</a></li>";
                    }
                } ?>

                <li class="page-item"><a class='page-link'><?php echo $pagina ?></a></li>

                <?php for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
                    if ($pag_dep <= $quantidade_pg) {
                        echo "<li class='page-item'><a class='page-link' href='unidadesDiferentes.php?pagina=$pag_dep'>$pag_dep</a></li>";
                    }
                }

                echo "<li class='page-item'><a class='page-link' href='unidadesDiferentes.php?pagina=$quantidade_pg'>Última</a></li>";

                echo '</ul>';
                echo '</nav>';
                ?>
    </div>
</body>

<script>
    $(document).ready(function() {
        $(".atualizar").click(function(e) {
            e.preventDefault();
            
            var id = $(this).data("id");
            
            // Faça a solicitação AJAX para atualizar o campo sisseg
            $.ajax({
                type: "POST",
                url: "atualizarStatus.php", // URL do script php para atualizar a tabela
                data: { id: id },
                success: function(response) {
                    // Verifique se a atualização foi bem-sucedida e atualize a interface do usuário, se necessário
                    if (response === "success") {
                        // Atualize o campo ou faça outra ação desejada
                        alert("Campo Sisseg atualizado com sucesso!");
                    } else {
                        alert("Erro ao atualizar o campo Sisseg.");
                    }
                }
            });
        });
    });

    
</script>

</html>