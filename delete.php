<?php

// DELETE

// IMPORTAÇÃO DO ARQUIVO CONFIG_DB.PHP
require 'config_db.php';

// VERIFICO SE EXISTE ID
if ($_GET['id']) {
    // SE EXISTE
    $id = $_GET['id'];

    // PREPARO A CONSULTA PARA EXCLUIR REGISTROS DA TABELA "USUÁRIOS" ONDE O VALOR DA COLUNA
    // "ID" CORRESPONDE A UM PARAMETRO ":ID"
    $sql = $pdo->prepare('DELETE FROM usuarios WHERE id = :id');

    // ASSOCIO O VALOR DA VARIAVEL "$ID" COM ":ID" NO PREPARE ACIMA
    $sql->bindValue(':id', $id);

    // EXECUTO
    $sql->execute();

    // O USUÁRIO É DIRECIONADO PARA O ARQUIVO INDEX.PHP
    header('location: index.php');
    exit;
}
