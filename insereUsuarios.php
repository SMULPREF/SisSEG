<?php

if (isset($_POST['executar'])) {
    
$ldap_username = "usr_SMDU_Freenas"; // Nome de usuário com privilégios de leitura no AD
$ldap_password = "Prodam01"; // Senha do usuário com privilégios de leitura no AD
$base_dn = "ou=Users,ou=SMUL,dc=rede,dc=sp"; // DN da OU que contém os usuários no AD

// Conectar ao servidor LDAP
$ldap_connection = ldap_connect("ldap://10.10.68.49");

if ($ldap_connection) {
    // Autenticar no servidor LDAP
    $bind = ldap_bind($ldap_connection, $ldap_username, $ldap_password);

    if ($bind) {
        // Pesquisar todos os usuários na base DN especificada
        $ldap_filter = "(objectClass=user)";
        $ldap_attributes = array("samaccountname", "cn", "mail");
        $search = ldap_search($ldap_connection, $base_dn, $ldap_filter, $ldap_attributes);
        $entries = ldap_get_entries($ldap_connection, $search);

        // Conectar ao banco de dados sisseg
        $db_host = "localhost";
        $db_user = "root";
        $db_password = "";
        $db_name = "sisseg";
        
        $db_connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);

        if (!$db_connection) {
            die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
        }

        // Inserir registros encontrados no banco de dados
        
        if ($entries['count'] > 0) {
            for ($i = 0; $i < $entries['count']; $i++) {
                $login = $entries[$i]["samaccountname"][0];
                $nome = mysqli_real_escape_string($db_connection, $entries[$i]["cn"][0]);
                $email = isset($entries[$i]["mail"][0]) ? $entries[$i]["mail"][0] : "";

                // Verificar se o registro já existe
                $check_query = "SELECT * FROM servidores WHERE user = '$login'";
                $check_result = mysqli_query($db_connection, $check_query);

                if (mysqli_num_rows($check_result) == 0) {
                    // O registro não existe, então inserir
                    $insert_query = "INSERT INTO servidores (user, nome, email) VALUES ('$login', '$nome', '$email')";
                    $insert_result = mysqli_query($db_connection, $insert_query);

                    if (!$insert_result) {
                        echo "Erro ao inserir registro: " . mysqli_error($db_connection) . "<br>";
                    }
                }
            }
        } else {
            echo "Nenhum usuário encontrado.";
        }

        // Fechar a conexão com o banco de dados
        mysqli_close($db_connection);
    } else {
        echo "Falha na autenticação no servidor LDAP.";
    }

    // Fechar a conexão LDAP
    ldap_close($ldap_connection);
} else {
    echo "Falha na conexão com o servidor LDAP.";
}

    echo "O script foi executado com sucesso.";

    // Redirecionar de volta para principal.php após a execução do script
    header("Location: principal.php");
    exit; // Certifique-se de que o script não continue após o redirecionamento
}

?>