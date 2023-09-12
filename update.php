<?php
// UPDATE

// IMPORTAÇÃO DO ARQUIVO CONFIG_DB.PHP
require 'config_db.php';

// DEFINO UMA ARRAY VAZIA
$info = [];

// VERIFICO SE EXISTE "ID" COM A FUNÇÃO "ISSET()"
if (isset($_GET['id'])) {
    // SE EXISTE
    $id = $_GET['id'];

    // PREPARO A CONSULTA PARA ACESSAR TODOS OS USUÁRIOS DA TABELA "USUÁRIOS" ONDE O VALOR DA COLUNA "ID"
    // CORRESPONDE A UM PARAMETRO COM O NOME ":ID"
    $sql = $pdo->prepare('SELECT * FROM usuarios WHERE id = :id');

    // ASSOCIO O VALOR DAS VARIAVEL "$ID" COM ":ID" NO PREPARE ACIMA
    $sql->bindValue(':id', $id);

    //EXECUTO
    $sql->execute();

    // VERIFICO SE ENCONTROU O "ID"
    if ($sql->rowCount() > 0) {
        // SE O ID FOR ENCONTRADO, COLOCO O "ID" ACHADO DENTRO DA ARRAY "$INFO"
        // USANDO A FUNÇÃO "FETCHALL()" PASSANDO COMO PARAMETRO "PDO::FETCH_ASSOC" (RETORNA O RESULTADO COMO UMA ARRAY)
        $info = $sql->fetch(PDO::FETCH_ASSOC);
    }
}

if (isset($_POST['id'], $_POST['name'], $_POST['email'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = $pdo->prepare("UPDATE usuarios SET nome = :name, email = :email WHERE id = :id");

    // ASSOCIO OS VALORES DAS VARIAVEIS "$NAME", "$EMAIL" e "$ID" COM ":NAME", ":EMAIL" E ":ID" NO PREPARE ACIMA
    $sql->bindValue(':name', $name);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':id', $id);

    //EXECUTO
    $sql->execute();

    // O USUÁRIO É DIRECIONADO PARA O ARQUIVO INDEX.PHP
    header('location: index.php');
    exit;
}
?>

<form method="POST" action="">
    <input type="hidden" name="id" value="<?php echo $info['id']; ?>">
    <input type="text" name="name" value="<?php echo $info['nome']; ?>">
    <input type="email" name="email" value="<?php echo $info['email']; ?>">
    <input type="submit" value="Editar">
</form>