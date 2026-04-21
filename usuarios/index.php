<?php
    include "functions.php";
    index();
    include HEADER_TEMPLATE;
?>

<header style="margin-top: 10px;">
    <div class="row">
        <div class="col-sm-6">
            <h2>Usuários</h2>
        </div>
        <div class="col-sm-6 text-end h2">
            <a class="btn btn-secondary" href="add.php"><i class="fa fa-plus"></i> Novo Usuário</a>
            <a class="btn btn-light" href="index.php"><i class="fas fa-sync-alt"></i> Atualizar</a>
        </div>
    </div>
    <div class="row mb-2 ">
        <form name="filtro" action="index.php" method="post">                  
            <div class="form-group col-md-6">
                <div class="input-group ">
                    <input type="search" class="form-control" name="users"
                    maxlength="80" required>
                    <button class="btn btn-secondary" type="submit"><i class="fa-solid fa-magnifying-glass"></i> Consultar</button>
                </div>
            </div>        
        </form>
    </div>
</header>

<?php if (!empty($_SESSION['message'])) : ?>
    <div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <?php echo $_SESSION['message']; ?>
    </div>
    <?php clear_messages(); ?>
<?php endif; ?>

<hr>

<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th width="30%">Nome</th>
            <th>Login</th>
            <th>Foto</th>
            <th>Opções</th>
        </tr>
    </thead>
    <tbody>
    <?php if ($usuarios) : ?>
    <?php foreach ($usuarios as $usuario) : ?>
        <tr>
            <td align='center'><?php echo $usuario['id']; ?></td>
            <td><?php echo $usuario['nome']; ?></td>
            <td><?php echo $usuario['user']; ?></td>
            <td>
                <?php 
                    if (!empty($usuario['foto']) && file_exists(__DIR__ . '/fotos/' . $usuario['foto'])) {
                        echo "<img src='fotos/" . htmlspecialchars($usuario['foto']) . "' class='shadow p-1 mb-1 bg-body rounded' width='100px'>";
                    } else {
                        echo "<img src='fotos/semimagem.jpg' class='shadow p-1 mb-1 bg-body rounded' width='100px'>";
                    }
                ?>
            </td>
            <td class="actions text-right">
                <a href="view.php?id=<?php echo $usuario['id']; ?>" class="btn btn-sm btn-light"><i class="fa fa-eye"></i> Visualizar</a>
                <a href="editar.php?id=<?php echo $usuario['id']; ?>" class="btn btn-sm btn-secondary"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
                <a href="#" class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#delete-usuario" data-customer="<?php echo $usuario['id']; ?>">
                    <i class="fa-solid fa-trash-can"></i> Excluir
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    <?php else : ?>
        <tr>
            <td colspan="6">Nenhum registro encontrado.</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>

<?php 
    include "modal.php"; 
    include FOOTER_TEMPLATE;
?>
