<?php 
    include "functions.php"; 
    if (!isset($_SESSION)) session_start();

 

    // Carrega o usuário
    view($_GET['id']);
    include(HEADER_TEMPLATE);
?>

<h2>Usuário <?php echo $usuario['id']; ?></h2>

<?php if (!empty($_SESSION['message'])) : ?>
    <div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert" id="actions">
        <?php echo $_SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<dl class="dl-horizontal">
    <dt>Nome:</dt>
    <dd><?php echo $usuario['nome']; ?></dd>

    <dt>Usuário:</dt>
    <dd><?php echo $usuario['user']; ?></dd>

    <dt>Foto:</dt>
    <dd>
        <?php
            if (!empty($usuario['foto']) && file_exists("fotos/" . $usuario['foto'])) {
                echo "<img src='fotos/" . $usuario['foto'] . "' class='shadow p-1 mb-1 bg-body rounded' width='300px'>";
            } else {
                echo "<img src='fotos/semimagem.jpg' class='shadow p-1 mb-1 bg-body rounded' width='300px'>";
            }
        ?>
    </dd>
</dl>

<div id="actions" class="row mt-3">
    <div class="col-md-12">
        <?php if (empty($_SESSION['message'])) : ?>
            <a href="editar.php?id=<?php echo $usuario['id']; ?>" class="btn btn-secondary">
                <i class="fa-solid fa-pen-to-square"></i> Editar
            </a>
        <?php endif; ?>
        <a href="index.php" class="btn btn-light">
            <i class="fa-solid fa-rotate-left"></i> Voltar
        </a>
    </div>
</div>

<?php 
    clear_messages(); 
    include(FOOTER_TEMPLATE); 
?>
