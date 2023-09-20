<?php

    function unidades(){

        include ('conexao.php');

        $query = "SELECT id, registros_unidades FROM unidades";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row["id"];
                $uni = $row["registros_unidades"];
                echo '<option value="' . $uni . '">' . $uni . '</option>';
            }
        }
    }

    function solicitantes(){

        include ('conexao.php');

        $query = "SELECT id, nome FROM servidores";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row["id"];
                $solicitante = $row["nome"];
                echo '<option value="' . $id . '">' . $solicitante . '</option>';
            }
        }
    }

    function sistemas(){

        include('conexao.php');

        $query = "SELECT id, sistemas FROM sistemas";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row["id"];
                $sistemas = $row["sistemas"];
                echo '<option value="' . $id . '">' . $sistemas . '</option>';
            }
        }
    }

    function usuarios(){

        include('conexao.php');

        $query = "SELECT id, user FROM servidores";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row["id"];
                $sistemas = $row["user"];
                echo '<option value="' . $id . '">' . $sistemas . '</option>';
            }
        }
    }

    function permissao(){

        include('conexao.php');


        $query = "SELECT id, aprova_digital, portal_licenciamento, sei, simproc, sisacoe, sissel, slce, slcii  FROM permissoes";
        $result = $conn->query($query);
        

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row["id"];
                $permissao = $row["sei"];
                echo '<option value="' . $id . '" class="permissao" >' . $permissao . '</option>';
            }
        }
        
    }


    function filtroUnidade($id){
        
        include('conexao.php');

        $sql = "SELECT registros_unidades FROM unidades WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $uni = $row["registros_unidades"];
                return $uni;
            }
        }
    }



?>