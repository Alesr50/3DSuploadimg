
<?php
//recebe os dados do formulario
//$img= $_POST['img'];
$nome = $_POST['nome'];
$foto = $_FILES['foto'];

//define o caminho 
//$destino = "fotos/";

$dir = 'img/' . $_POST['tipoF'];

//armazena na variavel o novo nome
$arquivo = basename($foto['name']);


if (!file_exists($dir)) {
    mkdir("$dir", 0700);
    //concatena a variavel do caminho com o nome do arquivo 
    $dir = $_SERVER["DOCUMENT_ROOT"] . '/' . '3DSuploadimg/' . $dir . '/' . $arquivo;

    include("conexao/conexao.php");
    $pdo = conectar();


    //testa se a funçao de upload rodar
    if (move_uploaded_file($foto['tmp_name'], $dir)) {

        //pode colocar o sql de insert na sua tabela para gravar o caminho do arquivo alem do resto dos dados.
        $query = "insert into tblupload (nome,img)  values (?,?)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(1, $nome);
        $stmt->bindParam(2, $dir);
        $stmt->execute();
        echo "O arquivo $arquivo foi enviado.";
    } else {
        echo "Ocorreu um erro. Tente novamente";
    }
} else {

    $dir = $_SERVER["DOCUMENT_ROOT"] . '/' . '3DSuploadimg/' . $dir . '/' . $arquivo;
    include("conexao/conexao.php");
    $pdo = conectar();
    echo $dir;

    //testa se a funçao de upload rodar
    if (move_uploaded_file($foto['tmp_name'], $dir)) {
        //pode colocar o sql de insert na sua tabela para gravar o caminho do arquivo alem do resto dos dados.
        $query = "insert into tblupload (nome,img)
        values (?,?)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(1, $nome);
        $stmt->bindParam(2, $dir);
        $stmt->execute();
    }
}
