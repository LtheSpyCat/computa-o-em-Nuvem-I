<?php
    //as linhas abaixos servem expecificamente para garantir que o arquivo seja enviado
    if ($_SERVER ['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
        //a linha que nomeia a variavel
        $file_name = $_FILES['file']['name'] ;
        //a linha que coloca um nome temporario no arquivo
        $file_tmp = $_FILES['file']['tmp_name'] ;

        //definindo o dirétorio para o armazenamento simulando em "nuvem"
        $cloud_directory = 'cloud_storage/';

        //verificando se o diretório existe caso o contrario, criando
        if (!file_exists($cloud_directory)) {
            mkdir($cloud_directory, 0777, true);
        }

        //Movendo o arquivo para o diretório de "nuvem"
        if (move_uploaded_file($file_tmp, $cloud_directory . $file_name)) {
            echo "Arquivo enviado com sucesso para a nuvem";
        //caso o arquivo estaja com problemas a mensagem abaixo será enviada
        } else {
            echo "ErRoR FaTaL ErRoR: ArQuiVo CoRrOmPiDo.";
        }
    }
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <title>Simulação de armazenamento</title>
</head>
<body>
    <h2>UPLOAD DE ARQUIVO PARA NUVENS</h2>
    <!--a linha abaixo é como as informações aparecem na página web-->
    <form action="" method="post" enctype="multipart/form-data">
        <!--a linha abaixo é para escolher o arquivo por via de um botão-->
        <label for="file">Escolha um arquivo</label>
        <input type="file" name="file" id="file" required>
        <!--a linha abaixo é para escolher o arquivo por via de um botão-->
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
