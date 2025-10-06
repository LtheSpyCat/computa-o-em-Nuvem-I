<?php
    if ($_SERVER ['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
        $file_name = $_FILES['file']['name'] ;
        $file_tmp = $_FILES['file']['tmp_name'] ;

        $cloud_directory = 'cloud_storage/';

        if (!file_exists($cloud_directory)) {
            mkdir($cloud_directory, 0777, true);
        }

        if (move_uploaded_file($file_tmp, $cloud_directory . $file_name)) {
            echo "Arquivo enviado com sucesso para a nuvem";
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
    <form action="" method="post" enctype="multipart/form-data">
        <label for="file">Escolha um arquivo</label>
        <input type="file" name="file" id="file" required>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>