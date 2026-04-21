<?php 
    // Esse é o valida.php
    include("../config.php");
    require_once(DBAPI);

    //Verifica se houve POST e se o usuário ou a senha é(são) vazios(s)
    if (!empty($_POST) and (empty($_POST['login']) or empty($_POST['senha']))) {
        header("Location:" . BASEURL . "index.php");
        exit;
    }

    // Tenta se conectar a um banco de dados MySQL
    $bd = open_database();
    try {
        // pegando o login e senha digitado no form
        $usuario = $_POST['login'];
        $senha = $_POST['senha'];
        // testando para ver  se o login e senha digitado no form não estão vazios
        if (!empty($usuario) && !empty($senha)) {
            // pegando a senha digitada no form e criptografando ela para poder comparar
            // a função de criptografia FOI MOVIDA para o arquivo database.php (DBAPI)

            // Validação do usuário/senha digitados com Prepared Statement
            $sql = "SELECT id, nome, user, password, foto, role FROM usuarios WHERE user = ? LIMIT 1";
            $stmt = $bd->prepare($sql);
            $stmt->execute([$usuario]);
            $dados = $stmt->fetch();
            
            if ($dados) {
                    // coletando os Dados
                    $id = $dados['id'];
                    $nome = $dados['nome'];
                    $user = $dados['user'];
                    $password = $dados['password'];
                    $foto = isset($dados['foto']) ? $dados['foto'] : '';
                    
                // verifica  se $user não está vazio
                if (password_verify($senha, $password)) {
                    if (!isset($_SESSION)) session_start();
                    $_SESSION['message'] = "Bem vindo " . $nome . "!";
                    $_SESSION['type'] = 'info';
                    $_SESSION['id'] = $id;
                    $_SESSION['nome'] = $nome;
                    $_SESSION['user'] = $user;
                    $_SESSION['foto'] = $foto; // pode ser vazio
                    // definir role: se existir coluna 'role' no DB use-a, senão trate 'admin1' como admin
                    if (!empty($dados['role'])) {
                        $_SESSION['role'] = $dados['role'];
                    } else {
                        $_SESSION['role'] = ($user === 'admin1') ? 'admin' : 'user';
                    }
                } else {
                    // mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
                    throw new Exception("Não foi possível se conectar!<br>Verifiqu seu usuário e senha.", 1);
                }

                // direciona para o index do site
                header("Location:" . BASEURL . "index.php");
                exit;
            } else {
                // mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
                throw new Exception("Não foi possível se conectar!<br>Verifique seu usuário e senha.", 1);
            }
        } else {
            // mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
            throw new Exception("Não foi possível se conectar!<br>Verifique seu usuário e senha.", 1);
        }
    } catch (Exception $e) {
        $_SESSION['message'] = "Ocorreu um erro: " . $e -> getMessage();
        $_SESSION['type'] = 'danger';
    }

    // Agora inclui o header depois do processamento de login/redirects
    include(HEADER_TEMPLATE);
?>

    <?php if (!empty($_SESSION['message'])) : ?>
        <div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert" id="actions">
            <?php echo $_SESSION['message']; ?>
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php clear_messages(); ?>
    <?php endif; ?>
    <header>
        <a href="<?php echo BASEURL; ?>index.php" class="btn btn-light"><i class="fa-solid fa-rotate-left"></i> Voltar</a>
    </header>
<?php include(FOOTER_TEMPLATE); ?>