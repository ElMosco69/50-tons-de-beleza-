


<?php
    include "../config.php";
    include DBAPI;

    if (!isset($_SESSION)) session_start();
    include ABSPATH . 'inc/auth.php';

    $usuarios = null;
    $usuario = null;

    /**
     *  Listagem de Clientes
     */
    function index() {
        global $usuarios;
        if (!can_access('usuarios','index')) {
            deny_access_and_redirect('usuarios','index', BASEURL);
        }

        if (!empty($_POST["users"])) {
            $usuarios = filter("usuarios", "nome like '%{$_POST["users"]}%';");
        } else {
            $usuarios = find_all("usuarios");
        }   
    }
    
    function view($id = null) {
        if (!can_access('usuarios','view')) {
            deny_access_and_redirect('usuarios','view', BASEURL);
        }
        global $usuario;
        $usuario = find("usuarios", $id);
    }

    //exclusão de cliente
    function delete($id = null) {
        if (!can_access('usuarios','delete')) {
            deny_access_and_redirect('usuarios','delete', BASEURL);
        }

        global $usuario;
        $usuario = remove("usuarios", $id);

        header("location: index.php");
    }

    //Formatando as datas do projeto
    function formataData($data, $formato) {
        $dt = new DateTime($data, new DateTimeZone("America/Sao_Paulo"));
        return $dt->format($formato);
    }

    //Formatar os telefones do projeto
    function formataTel($telefone) {
        $fone =  "(". substr($telefone, 0, 2) .")" . substr($telefone, 3, 5)
        . "-" .substr($telefone, 7, 4) ;
        return $fone;
    }

    //Upload de Imagens
    function upload($pasta_destino, $arquivo_destino, $tipo_arquivo, $nome_temp, $tamanho_arquivo) {
        /*
            ==> Upload de arquivos no PHP
            https://www.w3schools.com/php/php_file_upload.asp
        */

        //Upload da foto (versão corrigida)
        try {
            $nome_arquivo = basename($arquivo_destino);

            // garante que a pasta exista
            if (!is_dir($pasta_destino)) {
                if (!mkdir($pasta_destino, 0755, true)) {
                    throw new Exception("Não foi possível criar a pasta de destino.");
                }
            }

            // verifica se o arquivo temporário existe e é imagem
            if (empty($nome_temp) || !file_exists($nome_temp)) {
                throw new Exception("Arquivo temporário não encontrado.");
            }

            $check = @getimagesize($nome_temp);
            if ($check === false) {
                throw new Exception("O arquivo não é uma imagem válida.");
            }

            // Verifica se o arquivo já existe na pasta
            if (file_exists($arquivo_destino)) {
                throw new Exception("Desculpe, o arquivo já existe.");
            }

            // Verifica o tamanho do arquivo (limite de 500KB)
            if ($tamanho_arquivo > 500000) {
                throw new Exception("O arquivo é muito grande. O tamanho máximo permitido é 500KB.");
            }

            // Permitir certos formatos de arquivo
            $ext = strtolower(pathinfo($arquivo_destino, PATHINFO_EXTENSION));
            $ext_permitidas = ['jpg', 'jpeg', 'png', 'gif'];
            if (!in_array($ext, $ext_permitidas)) {
                throw new Exception("Apenas arquivos JPG, JPEG, PNG e GIF são permitidos.");
            }

            // Move o arquivo temporário para a pasta destino
            if (!move_uploaded_file($nome_temp, $arquivo_destino)) {
                throw new Exception("Desculpe, houve um erro ao mover o arquivo para a pasta de destino.");
            }

            $_SESSION['message'] = "O arquivo " . htmlspecialchars($nome_arquivo) . " foi enviado com sucesso.";
            $_SESSION['type'] = 'success';
        } catch (Exception $e) {
            $_SESSION['message'] = "Aconteceu um erro: " . $e->getMessage();
            $_SESSION['type'] = 'danger';
        }
    }

    // Cadastro de Usuários
    function add() {
        if (!can_access('usuarios','add')) {
            deny_access_and_redirect('usuarios','add', BASEURL);
        }

        if (!empty($_POST['usuario'])) {
            try{
                $usuario = $_POST['usuario'];
                $password2 =  $_POST['password2'];

                 $options = [
                    // Aumenta o custo bcrypt de 12 para 13.
                    'cost' => 13,
                ];
                if (!empty($_FILES['foto']['name'])) {
                    // Upload da foto
                    $pasta_destino = 'fotos/'; // Pasta onde a foto será salva
                    $arquivo_destino = $pasta_destino . basename($_FILES['foto']['name']); //Caminho completo do arquivo
                    $nomearquivo = basename($_FILES['foto']['name']); // Nome do arquivo
                    $resolucao_arquivo = getimagesize($_FILES['foto']['tmp_name']); //
                    $tamanho_arquivo = $_FILES['foto']['size']; // Tamanho do arquivo em bytes
                    $nome_temp = $_FILES['foto']['tmp_name']; // Nome temporário do arquivo no servidor
                    $tipo_arquivo = strtolower(pathinfo($arquivo_destino, PATHINFO_EXTENSION)); // Extensão do arquivo em letras minúsculas

                    // Chamada da função upload para gravar a imagem
                    upload($pasta_destino, $arquivo_destino, $tipo_arquivo, $nome_temp, $tamanho_arquivo);

                    $usuario['foto'] = $nomearquivo;
                }

                // criptografar a senha e validar confirmação
                if (!empty($usuario['password']) && $usuario['password'] == $password2) {
                    $usuario['password'] = password_hash($usuario['password'], PASSWORD_BCRYPT, $options);
                    save('usuarios', $usuario);
                } else {
                    // se a senha estiver vazia ou não bater com a confirmação, não salvar e mostrar erro
                    if (!isset($_SESSION)) session_start();
                    $_SESSION['message'] = 'Senha vazia ou não confere com a confirmação.';
                    $_SESSION['type'] = 'danger';
                }

               
                header("location: index.php");

            }catch (Exception $e) {
                $_SESSION['message'] = "Aconteceu um erro" . $e->getMessage();
                $_SESSION['type'] = 'danger';
            }
        }
    }
    // Atualização de Usuários
    function edit() {
        // $now = new DateTime("now");
        try {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                if (!empty($_POST['usuario'])) {
                    $usuario = $_POST['usuario'];
                        // não sobrescrever foto aqui; se houver upload, será atualizado abaixo

                    // criptografando senha
                    if (!empty($usuario['password'])) {
                        $options = [
                            // Aumenta o custo bcrypt de 12 para 13.
                            'cost' => 13,
                        ];
                        $senha = password_hash($usuario['password'], PASSWORD_BCRYPT, $options);
                        $usuario['password'] = $senha;
                    }

                    if (!empty($_FILES['foto']['name'])) {
                        // Upload da foto
                        $pasta_destino = 'fotos/'; // Pasta onde ficam as fotos
                        $arquivo_destino = $pasta_destino . basename($_FILES['foto']['name']); //Caminho completo até o arquivo que será gravado 
                        $nomearquivo = basename($_FILES['foto']['name']); // Nome do arquivo
                        $resolucao_arquivo = getimagesize($_FILES['foto']['tmp_name']);
                        $tamanho_arquivo = $_FILES['foto']['size']; // Tamanho do arquivo em bytes
                        $nome_temp = $_FILES['foto']['tmp_name']; // Nome temporário do arquivo no servidor
                        $tipo_arquivo = strtolower(pathinfo($arquivo_destino,PATHINFO_EXTENSION)); // Extensão do arquivo em letras minúsculas

                        // Chamada da função upload para gravar a imagem
                        upload($pasta_destino, $arquivo_destino, $tipo_arquivo, $nome_temp, $tamanho_arquivo);

                        $usuario['foto'] = $nomearquivo;
                    }
                    
                    update('usuarios', $id, $usuario);
                    // If the logged-in user updated their own profile, refresh session foto
                    if (!isset($_SESSION)) session_start();
                    if (isset($_SESSION['id']) && $_SESSION['id'] == $id && !empty($usuario['foto'])) {
                        $_SESSION['foto'] = $usuario['foto'];
                    }
                    header("location: index.php");
                } else {
                    global $usuario;
                    $usuario = find("usuarios", $id);
                }
            } else {
                header("location: index.php");
            } 
        }catch (Exception $e) {
            $_SESSION['message'] = "Aconteceu um erro: " . $e->getMessage();
            $_SESSION['type'] = 'danger';
        }
    }
?>
