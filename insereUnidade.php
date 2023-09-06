<?php
// Configurações do banco de dados Sisseg
$sisseg_host = 'localhost';
$sisseg_usuario = 'root';
$sisseg_senha = '';
$sisseg_banco = 'sisseg';

// Configurações do banco de dados SGU
$sgu_host = '10.75.32.125';
$sgu_usuario = 'root';
$sgu_senha = 'Hta123P';
$sgu_banco = 'SGU';

// Conectando ao banco de dados Sisseg
$sisseg_conn = new mysqli($sisseg_host, $sisseg_usuario, $sisseg_senha, $sisseg_banco);

// Verificando a conexão com o banco de dados Sisseg
if ($sisseg_conn->connect_error) {
    die("Erro na conexão com o banco de dados Sisseg: " . $sisseg_conn->connect_error);
}

// Obtendo o nome da tabela do mês atual
$mes_atual = date("Y_m");

// Consulta para obter todos os registros da tabela "servidores" no banco de dados Sisseg
$sql = "SELECT * FROM servidores";
$resultado = $sisseg_conn->query($sql);

if ($resultado->num_rows > 0) {
    // Conectando ao banco de dados SGU
    $sgu_conn = new mysqli($sgu_host, $sgu_usuario, $sgu_senha, $sgu_banco);

    // Verificando a conexão com o banco de dados SGU
    if ($sgu_conn->connect_error) {
        die("Erro na conexão com o banco de dados SGU: " . $sgu_conn->connect_error);
    }

    // Iterando pelos registros da tabela "servidores" no banco de dados Sisseg
    while ($row = $resultado->fetch_assoc()) {
        $cpRF = $row["rf"];

        // Consulta para obter o valor de "cpnomesetor2" na tabela do mês atual do SGU
        $sql_sgu = "SELECT cpnomesetor2 FROM " . $mes_atual . " WHERE cpRF = '$cpRF'";
        $resultado_sgu = $sgu_conn->query($sql_sgu);

        if ($resultado_sgu->num_rows > 0) {
            $row_sgu = $resultado_sgu->fetch_assoc();
            $cpnomesetor2 = $row_sgu["cpnomesetor2"];

            $sigla_unidade = '';

            switch ($cpnomesetor2) {

                    //Unidades do Gabinete e Assessorias

                case 'SECRETARIA MUNICIPAL DE URBANISMO E LICENCIAMENTO':
                    $sigla_unidade = "Servidor ainda não alocado";
                    break;
                case 'ASSESSORIA DE COMUNICACAO':
                    $sigla_unidade = "ASCOM";
                    break;
                case 'ASSESSORIA DE GABINETE E GESTAO ESTRATEGICA':
                    $sigla_unidade = "GAB";
                    break;
                case 'ASSESSORIA DE TECNOLOGIA DA INFORMACAO E COMUNICAC':
                    $sigla_unidade = "ATIC";
                    break;
                case 'ASSESSORIA TECNICA DE COLEGIADOS E COMISSOES':
                    $sigla_unidade = "ATECC";
                    break;
                case 'ASSESSORIA TECNICA E JURIDICA':
                    $sigla_unidade = "ATAJ";
                    break;
                case 'GABINETE DO SECRETARIO':
                    $sigla_unidade = "GAB";
                    break;
                case 'SUPERVISAO DE LICENCIAMENTO ELETRONICO E ANALISE D':
                    $sigla_unidade = "STEL";
                    break;

                    //Unidades da GTEC

                case 'UNIDADE DE GESTAO TECNICA DE ANALISE DE REGULARIZA':
                    $sigla_unidade = "GTEC";
                    break;

                    //Unidades da CAF

                case 'COORDENADORIA DE ADMINISTRACAO E FINANCAS':
                    $sigla_unidade = "CAF";
                    break;

                case 'DIVISAO DE GESTAO DE PESSOAS':
                    $sigla_unidade = "CAF/DGP";
                    break;

                case 'DIVISAO DE GESTAO DE RECURSOS VINCULADOS':
                    $sigla_unidade = "CAF/DRV";
                    break;

                case 'DIVISAO DE LICITACOES E CONTRATOS':
                    $sigla_unidade = "CAF/DLC";
                    break;

                case 'DIVISAO DE ORCAMENTO E FINANCAS':
                    $sigla_unidade = "CAF/DOF";
                    break;

                case 'DIVISAO DE SERVICOS DE SUPORTE':
                    $sigla_unidade = "CAF/DSUP";
                    break;

                    //Unidades da CAP

                case 'COORDENADORIA DE ATENDIMENTO AO PUBLICO':
                    $sigla_unidade = "CAP";
                    break;

                case 'DIVISAO DE PROCESSOS COMUNICADOS E INDEFERIDOS':
                    $sigla_unidade = "CAP/DPCI";
                    break;

                case 'DIVISAO DE PROCESSOS COMUNICADOS E INDEFERIDOS':
                    $sigla_unidade = "CAP/DPD";
                    break;

                case 'DIVISAO DE PROTOCOLO':
                    $sigla_unidade = "CAP/DEPROT";
                    break;

                    //Unidades da CASE

                case 'COORDENADORIA DE CADASTRO, ANALISE DE DADOS E SIST':
                    $sigla_unidade = "CASE";
                    break;

                case 'DIVISAO DE CADASTRO':
                    $sigla_unidade = "CASE/DCAD";
                    break;

                case 'DIVISAO DE DADOS URBANISTICOS':
                    $sigla_unidade = "CASE/DDU";
                    break;

                case 'DIVISAO DE LOGRADOUROS E EDIFICACOES':
                    $sigla_unidade = "CASE/DLE";
                    break;

                    //Unidades da CEPEUC

                case 'COORDENADORIA DE CONTROLE DA FUNCAO SOCIAL DA PROP':
                    $sigla_unidade = "CEPEUC";
                    break;

                case 'DIVISAO DE CADASTRO E INFORMACOES TERRITORIAIS':
                    $sigla_unidade = "CEPEUC/DCIT";
                    break;

                case 'DIVISAO DE VISTORIA E FISCALIZACAO':
                    $sigla_unidade = "CEPEUC/DVF";
                    break;

                    //Unidades da SERVIN

                case 'COORDENADORIA DE EDIFICACAO DE SERVICOS E USO INST':
                    $sigla_unidade = "SERVIN";
                    break;

                case 'DIVISAO DE SERVICOS E USO INSTITUCIONAL DE GRANDE':
                    $sigla_unidade = "SERVIN/DSIGP";
                    break;

                case 'DIVISAO DE SERVICOS E USO INSTITUCIONAL DE PEQUENO':
                    $sigla_unidade = "SERVIN/DSIMP";
                    break;

                    //Unidades da COMIN

                case 'COORDENADORIA DE EDIFICACAO DE USO COMERCIAL E IND':
                    $sigla_unidade = "COMIN";
                    break;

                case 'DIVISAO DE USO COMERCIAL E INDUSTRIAL DE GRANDE PO':
                    $sigla_unidade = "COMIN/DCIGP";
                    break;

                case 'DIVISAO DE USO COMERCIAL E INDUSTRIAL DE PEQUENO E':
                    $sigla_unidade = "COMIN/DCIMP";
                    break;

                    //Unidades da CONTRU

                case 'COORDENADORIA DE CONTROLE E USO DE IMOVEIS':
                    $sigla_unidade = "CONTRU";
                    break;

                case 'DIVISAO DE ADAPTACAO A ACESSIBILIDADE':
                    $sigla_unidade = "CONTRU/DACESS";
                    break;

                case 'DIVISAO DE EQUIPAMENTOS E INSTALACOES':
                    $sigla_unidade = "CONTRU/DINS";
                    break;

                case 'DIVISAO DE LOCAL DE REUNIAO':
                    $sigla_unidade = "CONTRU/DLR";
                    break;

                case 'DIVISAO DE SEGURANCA DE USO':
                    $sigla_unidade = "CONTRU/DSUS";
                    break;

                    //Unidades da RESID

                case 'COORDENADORIA DE EDIFICACAO DE USO RESIDENCIAL':
                    $sigla_unidade = "RESID";
                    break;

                case 'DIVISAO DE USO RESIDENCIAL DE GRANDE PORTE':
                    $sigla_unidade = "RESID";
                    break;

                case 'DIVISAO DE USO RESIDENCIAL DE PEQUENO E MEDIO PORT':
                    $sigla_unidade = "RESID";
                    break;

                case 'DIVISAO DE USO RESIDENCIAL UNIFAMILIAR':
                    $sigla_unidade = "RESID";
                    break;

                    //Unidades da ILUME

                case 'COORDENADORIA DE GESTAO DA REDE MUNICIPAL DE ILUMI':
                    $sigla_unidade = "ILUME";
                    break;

                case 'DIVISAO DE MANUTENCAO E CONTROLE':
                    $sigla_unidade = "ILUME";
                    break;

                case 'DIVISAO DE PLANEJAMENTO':
                    $sigla_unidade = "ILUME";
                    break;

                case 'DIVISAO DE PROJETOS E FISCALIZACAO':
                    $sigla_unidade = "ILUME";
                    break;

                    //Unidades da DEUSO

                case 'COORDENADORIA DE LEGISLACAO DE USO E OCUPACAO DO S':
                    $sigla_unidade = "DEUSO";
                    break;

                case 'DIVISAO DE MONITORAMENTO DO USO DO SOLO':
                    $sigla_unidade = "DEUSO/DMUS";
                    break;

                case 'DIVISAO DE NORMATIZACAO DO USO DO SOLO':
                    $sigla_unidade = "DEUSO/DNUS";
                    break;

                case 'DIVISAO DE SISTEMA DE INFORMACOES SOBRE ZONEAMENTO':
                    $sigla_unidade = "DEUSO/DSIZ";
                    break;

                    //Unidades da PARHIS

                case 'COORDENADORIA DE PARCELAMENTO DO SOLO E DE HABITAC':
                    $sigla_unidade = "PARHIS";
                    break;

                case 'DIVISAO DE HABITACAO DE INTERESSE SOCIAL':
                    $sigla_unidade = "PARHIS/DHGP";
                    break;

                case 'DIVISAO DE HABITACAO DE MERCADO POPULAR':
                    $sigla_unidade = "PARHIS/DHMP";
                    break;

                case 'DIVISAO DE PARCELAMENTO DO SOLO':
                    $sigla_unidade = "PARHIS/DPS";
                    break;

                    //Unidades da PLANURB

                case 'COORDENADORIA DE PLANEJAMENTO URBANO':
                    $sigla_unidade = "PLANURB";
                    break;

                case 'DIVISAO DE ARTICULACAO INTERSETORIAL':
                    $sigla_unidade = "PLANURB/DART";
                    break;

                case 'DIVISAO DE MONITORAMENTO E AVALIACAO':
                    $sigla_unidade = "PLANURB/DMA";
                    break;

                case 'DIVISAO DE ORDENAMENTO TERRITORIAL':
                    $sigla_unidade = "PLANURB/DOT";
                    break;

                    //Unidades da GEOINFO

                case 'COORDENADORIA DE PRODUCAO E ANALISE DE INFORMACAO':
                    $sigla_unidade = "GEOINFO";
                    break;

                case 'DIVISAO DE ACERVO E GEOPROCESSAMENTO':
                    $sigla_unidade = "GEOINFO";
                    break;

                case 'DIVISAO DE ANALISE E DISSEMINACAO':
                    $sigla_unidade = "GEOINFO";
                    break;

                case 'DIVISAO DE SISTEMAS DE INFORMACOES GEOGRAFICAS':
                    $sigla_unidade = "GEOINFO";
                    break;
            }

            // Verificação e atualização do campo "unidade" e "sigpec" na tabela "servidores" no banco de dados Sisseg
            if ($row["unidade"] != $cpnomesetor2) {
                $unidade_antiga = $row["sigla_unidade"];
                $update_sql = "UPDATE servidores SET unidade = '$cpnomesetor2', sigpec = 2, sigla_unidade = '$sigla_unidade', unidade_antiga = '$unidade_antiga' WHERE rf = '$cpRF'";
            } else {
                $update_sql = "UPDATE servidores SET sigpec = 1 WHERE rf = '$cpRF'";
            }

            if ($sisseg_conn->query($update_sql) === TRUE) {
                echo "Atualização da tabela 'servidores' no banco de dados Sisseg foi bem-sucedida.";
            } else {
                echo "Erro ao atualizar a tabela 'servidores' no banco de dados Sisseg: " . $sisseg_conn->error;
            }
        } else {
            // Se não houver correspondência, definir "sigpec" como 3
            $update_sql = "UPDATE servidores SET sigpec = 3 WHERE rf = '$cpRF'";
            if ($sisseg_conn->query($update_sql) === TRUE) {
                echo "Atualização da tabela 'servidores' no banco de dados Sisseg foi bem-sucedida.";
            } else {
                echo "Erro ao atualizar a tabela 'servidores' no banco de dados Sisseg: " . $sisseg_conn->error;
            }
        }
    }

    // Fechando a conexão com o banco de dados SGU
    $sgu_conn->close();
} else {
    echo "Não foram encontrados registros na tabela 'servidores' no banco de dados Sisseg.";
}

// Fechando a conexão com o banco de dados Sisseg
$sisseg_conn->close();
