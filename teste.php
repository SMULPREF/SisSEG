<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

</body>
</html>

<script>
        console.log("asdsa");
    addEventListener("change", function () {


    // Faça uma chamada AJAX para buscar os dados
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "getNomeSolicitante.php?select1Value=" + select1Value, true);

    xhr.onload = function () {
        if (xhr.status === 200) {
            var datas = JSON.parse(xhr.responseText);

            // Preencha o segundo select com os dados 
            datas.forEach(function (item) {

                option.value = item.id;



                select2.appendChild(option);

            });
        }else{
            window.alert("Falha na conexão ao resgatar as premissões");
        }
    };

    xhr.send();
    });
</script>