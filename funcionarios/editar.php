<?php
include('../config.php');
include(DBAPI);
include ABSPATH . 'inc/auth.php';

if (!can_access('funcionarios','edit')) {
    deny_access_and_redirect('funcionarios','edit', 'index.php');
}

include HEADER_TEMPLATE; 
if (isset($_GET['id'])) {
    $funcionario = find('funcionarios', $_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $today = new DateTime("now", new DateTimeZone("America/Sao_Paulo"));

    $nome = $_POST['Nome'] ?? '';
    $setor = $_POST['Setor'] ?? '';
    $cargo = $_POST['Cargo'] ?? '';
    $dtn = !empty($_POST['DataNasc']) ? date('Y-m-d H:i:s', strtotime($_POST['DataNasc'])) : null;
    // Preserve current foto unless a new one is uploaded
    $foto_atual = $_POST['Foto'] ?? ($funcionario['Foto'] ?? '');

    // tratar upload se houver
    if (!empty($_FILES['foto']['name'])) {
        $pasta = __DIR__ . '/fotos/';
        if (!is_dir($pasta)) mkdir($pasta, 0755, true);
        $orig_name = basename($_FILES['foto']['name']);
        $ext = strtolower(pathinfo($orig_name, PATHINFO_EXTENSION));
        $allowed = ['jpg','jpeg','png','gif'];
        if (!in_array($ext, $allowed)) {
            $_SESSION['message'] = 'Extensão de arquivo não permitida.';
            $_SESSION['type'] = 'danger';
        } else {
            $newname = time() . '_' . preg_replace('/[^A-Za-z0-9_.-]/', '_', $orig_name);
            $dest = $pasta . $newname;
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $dest)) {
                // excluir foto antiga se existir e for diferente
                if (!empty($foto_atual) && file_exists(__DIR__ . '/fotos/' . $foto_atual) && $foto_atual !== $newname) {
                    @unlink(__DIR__ . '/fotos/' . $foto_atual);
                }
                $foto_atual = $newname;
            } else {
                $_SESSION['message'] = 'Erro ao enviar a imagem.';
                $_SESSION['type'] = 'danger';
            }
        }
    }

    $funcionario_upd = [
        'Nome' => $nome,
        'Setor' => $setor,
        'Cargo' => $cargo,
        'DataNasc' => $dtn,
        'Foto' => $foto_atual,
        'modified' => $today->format('Y-m-d H:i:s')
    ];

    update('funcionarios', $_GET['id'], $funcionario_upd);
    header('Location: index.php');
    exit;
}
?>

<header>
    <div class="d-flex justify-content-between mt-3">
        <h2>Editar Funcionário</h2>
        <a href="index.php" class="btn btn-light"><i class="fa-solid fa-rotate-left"></i> Voltar</a>
    </div>
</header>

<form action="editar.php?id=<?php echo $funcionario['id']; ?>" method="post" enctype="multipart/form-data">
    <hr>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="Nome">Nome</label>
            <input type="text" class="form-control" id="Nome" name="Nome" maxlength="50" value="<?php echo htmlspecialchars($funcionario['Nome']); ?>" required>
        </div>
        <div class="form-group col-md-3">
            <label for="Setor">Setor</label>
            <input type="text" class="form-control" id="Setor" name="Setor" maxlength="50" value="<?php echo htmlspecialchars($funcionario['Setor']); ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="Cargo">Cargo</label>
            <input type="text" class="form-control" id="Cargo" name="Cargo" maxlength="50" value="<?php echo htmlspecialchars($funcionario['Cargo']); ?>">
        </div>
    </div>

    <div class="row mt-3">
        <div class="form-group col-md-4">
            <label for="DataNasc">Data de Nascimento</label>
            <input type="date" class="form-control" id="DataNasc" name="DataNasc" value="<?php echo date('Y-m-d', strtotime($funcionario['DataNasc'])); ?>">
        </div>

        <div class="form-group col-md-4">
            <label for="foto">Foto</label>
            <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
            <input type="hidden" name="Foto" value="<?php echo htmlspecialchars($funcionario['Foto']); ?>">
        </div>

        <div class="form-group col-md-4">
            <label>Pré-visualização</label>
            <?php $preview = !empty($funcionario['Foto']) && file_exists(__DIR__ . '/fotos/' . $funcionario['Foto']) ? 'fotos/' . $funcionario['Foto'] : 'fotos/semimagem.jpg'; ?>
            <div>
                <img id="imgPreview" src="<?php echo $preview; ?>" alt="Foto" style="width:150px; height:150px; object-fit:cover; border-radius:8px;" class="shadow p-1 bg-body rounded">
            </div>
        </div>
    </div>

    <div id="actions" class="row mt-3">
        <div class="col-md-12">
            <button type="submit" class="btn btn-secondary"><i class="fa-solid fa-sd-card"></i> Salvar</button>
            <a href="index.php" class="btn btn-light"><i class="fa-solid fa-rotate-left"></i> Cancelar</a>
        </div>
    </div>
</form>

<?php include FOOTER_TEMPLATE; ?>

<script>
document.getElementById('foto').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = function(e) {
        document.getElementById('imgPreview').src = e.target.result;
    }
    reader.readAsDataURL(file);
});
</script>
