        <?php
            include "functions.php";
            index();
            include HEADER_TEMPLATE;
        ?>
        
        <header>
            <div class="d-flex justify-content-between mt-3">
                <div >
                    <h2>Clientes</h2>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-secondary me-md-2 text-center" href="add.php"><i class="fa-solid fa-user-plus"></i>  Novo Cliente</a>
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
                    <th width="15%">CPF/CNPJ</th>
                    <th width="15%">Telefone</th>
                    <th width="15%">Atualizado em</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($customers) : ?>
                <?php foreach ($customers as $customer) : ?>
                    <tr style="text-align: center;">
                        <td><?php echo $customer['id']; ?></td>
                        <td><?php echo $customer['name']; ?></td>
                        <td><?php echo $customer['cpf_cnpj']; ?></td>
                        <td><?php echo formataTel($customer['mobile']) ; ?></td>
                        <td><?php echo date('d-m-Y H:i:s', strtotime($customer['modified'])); ?></td>
                        <td class="actions text-center">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="view.php?id=<?php echo $customer['id']; ?>" class="btn btn-sm btn-light me-md-2"><i class="fa fa-eye"></i> Visualizar</a>
                                <a href="editar.php?id=<?php echo $customer['id']; ?>" class="btn btn-sm btn-secondary me-md-2"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
                                <a href="#" class="btn btn-sm btn-dark me-md-2" data-bs-toggle="modal" data-bs-target="#delete-modal" data-customer="<?php echo $customer['id']; ?>">
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