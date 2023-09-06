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
        <h2>Mudanças de Unidade</h2>
        <form action="atualizarUsuario.php" method="POST">
            <table class="table">
                
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
                        $user = $receber_cadastros['usuario'];
                        $sigla_unidade = $receber_cadastros['sigla_unidade'];
                        $unidade_antiga = $receber_cadastros['unidade_antiga'];
                      
                    ?>
                        <tr>
                            <td><a>O(a) usuário(a) <?php echo $user . ' - ' . $nome;?> estava alocado(a) em <strong> <?php echo $unidade_antiga;?> </strong> e agora está alocado(a) em <strong><?php echo $sigla_unidade;?></strong></a></td>
                          
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