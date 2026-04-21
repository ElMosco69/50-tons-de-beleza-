<?php
include('../config.php');
include(DBAPI);
include HEADER_TEMPLATE; 

if (isset($_GET['id'])) {
    $funcionario = find('funcionarios', $_GET['id']);
}
?>

<?php if ($funcionario): ?>
    <h1>Detalhes do Funcionário</h1>
    <p><b>Nome:</b> <?php echo $funcionario['Nome']; ?></p>
    <p><b>Setor:</b> <?php echo $funcionario['Setor']; ?></p>
    <p><b>Cargo:</b> <?php echo $funcionario['Cargo']; ?></p>
    <p><b>Data de Nascimento:</b> <?php echo date('d/m/Y', strtotime($funcionario['DataNasc'])); ?></p>
    <p><b>Foto:</b>
        <?php if (!empty($funcionario['Foto']) && file_exists('fotos/' . $funcionario['Foto'])): ?>
            <img src="fotos/<?php echo htmlspecialchars($funcionario['Foto']); ?>" alt="Foto do Funcionário" style="width:200px; height:200px; object-fit:cover; border-radius:8px;">
        <?php else: ?>
            <img src="fotos/semimagem.jpg" alt="Sem foto" style="width:200px; height:200px; object-fit:cover; border-radius:8px;">
        <?php endif; ?>
    </p>
    <a href="index.php">Voltar</a>
<?php else: ?>
    <p>Funcionário não encontrado.</p>
<?php endif; ?>
