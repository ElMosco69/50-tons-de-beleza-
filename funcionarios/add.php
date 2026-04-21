    <?php
        include '../config.php';
        include DBAPI;
        include ABSPATH . 'inc/auth.php';

        function add() {
            if (!can_access('funcionarios','add')) {
                deny_access_and_redirect('funcionarios','add', 'index.php');
            }
            if (!empty($_POST["funcionario"])) {
                
                    $today = new DateTime("now", new DateTimeZone("America/Sao_Paulo"));

                    $funcionario = $_POST["funcionario"];
                    $funcionario["modified"] = $funcionario["created"] = $today->format("Y-m-d H:i:s");

                    // Tratar upload da foto (input name='foto')
                    try {
                        if (!empty($_FILES['foto']['name'])) {
                            $pasta_destino = 'fotos/';
                            if (!is_dir($pasta_destino)) {
                                mkdir($pasta_destino, 0755, true);
                            }

                            $nomearquivo = basename($_FILES['foto']['name']);
                            $arquivo_destino = $pasta_destino . $nomearquivo;
                            $nome_temp = $_FILES['foto']['tmp_name'];
                            $tamanho_arquivo = $_FILES['foto']['size'];

                            // validações simples
                            $ext = strtolower(pathinfo($arquivo_destino, PATHINFO_EXTENSION));
                            $ext_permitidas = ['jpg','jpeg','png','gif'];
                            if (!in_array($ext, $ext_permitidas)) {
                                throw new Exception('Extensão não permitida.');
                            }
                            if ($tamanho_arquivo > 500000) {
                                throw new Exception('Arquivo muito grande. Máx 500KB.');
                            }

                            if (!move_uploaded_file($nome_temp, $arquivo_destino)) {
                                throw new Exception('Erro ao mover arquivo para a pasta de destino.');
                            }

                            $funcionario['Foto'] = $nomearquivo;
                        } else {
                            $funcionario['Foto'] = '';
                        }
                    } catch (Exception $e) {
                        if (!isset($_SESSION)) session_start();
                        $_SESSION['message'] = 'Erro no upload: ' . $e->getMessage();
                        $_SESSION['type'] = 'danger';
                    }

                    save("funcionarios", $funcionario);
                    header("location: index.php");
                }
        }
        add();

        include HEADER_TEMPLATE;
    ?>

    <h1>Novo funcionario</h1>
    <form action="add.php" method="post">
        <!-- area de campos do form -->
        <hr>
        <div class="row">
            <div class="form-group col-md-7">
                <label for="nom">Nome:</label>
                <input type="text" class="form-control" id="nom" name="funcionario[Nome]" maxlenght="50" value="">
            </div>

            <div class="form-group col-md-3">
                <label for="st">Setor:</label>
                <input type="text" class="form-control" id="st" name="funcionario[Setor]" maxlenght="20" value="">
            </div>

            <div class="form-group col-md-2">
                <label for="cg">Cargo:</label>
                <input type="text" class="form-control" id="cg" name="funcionario[Cargo]" maxlength="50" value="">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-5">
                <label for="dtn">Data de Nascimento:</label>
                <input type="date" class="form-control" id="dtn" name="funcionario[DataNasc]" value="">
            </div>

            <div class="form-group col-md-2">
                <label for="dtc">Data de Cadastro:</label>
                <input type="date" class="form-control" id="dtc" name="funcionario[created]" disabled value="">
            </div>

            <div class="form-group col-md-4">
                <label for="ft">Foto:</label>
                <input type="file" class="form-control" id="ft" name="foto" accept="image/*" value="">
            </div>
        </div>

        <div id="actions" class="row mt-2">
            <div class="col-md-12">
                <button type="submit" class="btn btn-secondary"><i class="fa-solid fa-sd-card"></i>Salvar</button>
                <a href="index.php" class="btn btn-light"><i class="fa-solid fa-arrow-rotate-left"></i>Cancelar</a>
            </div>
        </div>
    </form>
    <form action="add.php" method="post" enctype="multipart/form-data">
<?php include(FOOTER_TEMPLATE); ?>