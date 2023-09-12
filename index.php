<?php
// READ
// IMPORTAÇÃO DO ARQUIVO CONFIG_DB.PHP
require 'config_db.php';

// DEFINO UMA ARRAY VAZIA
$usuarios = [];

// PREPARO A CONSULTA PARA SELECIONAR TODOS OS REGISTROS DA TABELA "USUÁRIOS"
$sql = $pdo->prepare("SELECT * FROM usuarios");

// EXECUTO O COMANDO
$sql->execute();

//VERIFICO SE OS USUÁRIOS FORAM ENCONTRADOS
if ($sql->rowCount() > 0) {
    // SE FORAM ENCONTRADOS, COLOCO OS USUÁRIOS ACHADOS DENTRO DA ARRAY "$USUÁRIOS"
    // USANDO A FUNÇÃO "FETCHALL()" PASSANDO COMO PARAMETRO "PDO::FETCH_ASSOC" (RETORNA O RESULTADO COMO UMA ARRAY)
    $usuarios = $sql->fetchAll(PDO::FETCH_ASSOC);
}

?>
<a href="create.php">Adicionar Usuario</a>
<table border="1" width="100%" style="max-width: 1280px; margin: auto;">
    <h1 style="text-align: center;">Usuarios</h1>
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>EMAIL</th>
        <th>AÇÃO</th>
    </tr>

    <!-- PERCORRO A ARRAY "$USUÁRIOS" SELECIONANDO CADA ITEM EXISTENTE NELA -->
    <?php foreach ($usuarios as $usuario) : ?>
        <tr>
            <!-- EXIBO O "ID", "NOME" E "EMAIL" NA TABELA HTML-->
            <td><?php echo $usuario['id']; ?></td>
            <td><?php echo $usuario['nome']; ?></td>
            <td><?php echo $usuario['email']; ?></td>
            <td>
                <!-- AÇÕES PARA EDITAR E EXCLUIR USUÁRIOS, DIRECIONAMENTO COM ID -->
                <a href="update.php?id=<?php echo $usuario['id']; ?>">Editar</a>
                <a href="delete.php?id=<?php echo $usuario['id']; ?>">Excluir</a>
            </td>
        </tr>
    <?php endforeach ?>
</table>