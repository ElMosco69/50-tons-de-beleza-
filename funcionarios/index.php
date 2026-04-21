		<?php
			include('../config.php');
			include(DBAPI);
			include HEADER_TEMPLATE; 

			$funcionarios = find_all('funcionarios');
		?>

		<header>
            <div class="d-flex justify-content-between mt-3">
                <div >
                    <h2>Funcionários</h2>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-secondary me-md-2 text-center" href="add.php"><i class="fa-solid fa-user-plus"></i>  Novo Funcionario</a>
                    <a class="btn btn-light me-md-2 text-center" href="index.php"><i class="fa-solid fa-refresh"></i> Atualizar</a>
                </div>
            </div>
        </header>

        <?php if (!empty($_SESSION['message'])) : ?>
            <div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo $_SESSION['message']; ?>
            </div>
            <?php clear_messages(); ?>
        <?php endif; ?>

        <hr>

        <table class="table table-hover">
            <thead>
                <tr class="table-active" style="text-align: center;">
                    <th>ID</th>
                    <th width="15%">Nome</th>
                    <th width="10%">Cargo</th>
                    <th width="10%">Setor</th>
                    <th width="15%">Data de Nascimento</th>
                    <th width="15%">Atualizado em</th>
                    <th width="12%">Foto</th>
                    <th width="10%">Opções</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($funcionarios) : ?>
                <?php foreach ($funcionarios as $funcionario) : ?>
                    <tr style="text-align: center;">
                        <td><?php echo $funcionario['id']; ?></td>
                        <td><?php echo $funcionario['Nome']; ?></td>
                        <td><?php echo $funcionario['Cargo']; ?></td>
                        <td><?php echo $funcionario['Setor']; ?></td>
                        <td><?php echo date('d/m/Y', strtotime($funcionario['DataNasc']));?></td>
                        <td><?php echo date('d-m-Y H:i:s', strtotime($funcionario['modified'])); ?></td>
                        <td>
                            <?php if (!empty($funcionario['Foto'])): ?>
                                <img src="fotos/<?php echo htmlspecialchars($funcionario['Foto']); ?>" alt="Foto do Funcionário" style="width:60px; height:60px; object-fit:cover; border-radius:8px;">
                            <?php else: ?>
                                <img src="fotos/semimagem.jpg" alt="Sem foto" style="width:60px; height:60px; object-fit:cover; border-radius:8px;">
                            <?php endif; ?>
                        </td>
                        <td class="actions text-center">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="view.php?id=<?php echo $funcionario['id']; ?>" class="btn btn-sm btn-light me-md-2"><i class="fa fa-eye"></i> Visualizar</a>
                                <a href="editar.php?id=<?php echo $funcionario['id']; ?>" class="btn btn-sm btn-secondary me-md-2"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
                                <a href="#" class="btn btn-sm btn-dark me-md-2" data-bs-toggle="modal" data-bs-target="#delete-modal" data-customer="<?php echo $funcionario['id']; ?>">
                                    <i class="fa-solid fa-trash-can"></i> Excluir
                                </a>
                            </div>                                          
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
