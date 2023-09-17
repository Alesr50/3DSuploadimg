<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="upload.php" method="post" enctype="multipart/form-data">
    <div>
            <label>Nome:<input type="text" name="nome" /><label>
                    
        </div>
        <div>
            <label>Img: <label>
                    <input type="file" name="foto" />
        </div>
        <div>
            <label for="tipoF"> Escolha o tipo</label>
            <select name="tipoF" id="tipoF">
                <option value="ter">terror</option>
                <option value="cmd">comedia</option>
                <option value="ac">acao</option>
                <option value="inf">infantil</option>
            </select>
        </div>
        <div>
            <input type="submit" value="enviar" />
        </div>
    </form>
</body>

</html>