<?php
// CREATE

// IMPORTAÇÃO DO ARQUIVO CONFIG_DB.PHP
require 'config_db.php';

// VERIFICO SE EXISTE "NAME" E "EMAIL" COM A FUNÇÃO "ISSET()"
if (isset($_POST['name'], $_POST['email'])) {
    // SE EXISTE
    $name = $_POST['name'];
    $email = $_POST['email'];

    // PREPARO A CONSULTA PARA INSERIR DADOS NA TABELA "USUÁRIOS" NAS COLUNAS "NOME" E "EMAIL"
    $sql = $pdo->prepare("INSERT INTO usuarios (nome, email) VALUES (:name, :email)");

    // ASSOCIO OS VALORES DAS VARIAVEIS "$NAME" E "$EMAIL" COM ":NAME" E ":EMAIL" NO PREPARE ACIMA
    $sql->bindValue(':name', $name);
    $sql->bindValue(':email', $email);

    // EXECUTO
    $sql->execute();

    // O USUÁRIO É DIRECIONADO PARA O ARQUIVO INDEX.PHP
    header('location: index.php');
    exit;
}

?>

<form method="POST">
    <h1>Cadastrar Usuario</h1>
    <input type="text" name="name">
    <input type="email" name="email">
    <input type="submit" value="Cadastrar">
</form>