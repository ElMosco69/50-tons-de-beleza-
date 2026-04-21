<?php
    include "../config.php";
    include DBAPI;
    include ABSPATH . 'inc/auth.php';

    $customers = null;
    $customer = null;

    /**
     *  Listagem de Clientes
     */
    function index() {
        global $customers;
        $customers = find_all("customers");
        
    }
    /**
     *  Cadastro de Clientes
    */
    function add() {
        if (!can_access('customers','add')) {
            deny_access_and_redirect('customers','add', 'index.php');
        }

        if (!empty($_POST["customer"])) {
            
            $today = new DateTime("now", new DateTimeZone("America/Sao_Paulo"));

            $customer = $_POST["customer"];
            $customer["modified"] = $customer["created"] = $today->format("Y-m-d H:i:s");
            
            save("customers", $customer);
            header("location: index.php");
        }
    }
    /**
     *  Exclusão de um Cliente
     */
    function view($id = null) {
        global $customer;
        $customer = find("customers", $id);
    }
    //exclusão de cliente
    function delete($id = null) {
        if (!can_access('customers','delete')) {
            deny_access_and_redirect('customers','delete', 'index.php');
        }

        global $customer;
        $customer = remove("customers", $id);

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

    function edit() {
        // $now = new DateTime("now");
        try {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                if (!can_access('customers','edit')) {
                    deny_access_and_redirect('customers','edit', 'index.php');
                }

                if (!empty($_POST['customer'])) {
                    $customer = $_POST['customer'];
                    // não sobrescrever foto se não houver upload
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

                        $customer['foto'] = $nomearquivo;
                    }

                    // garantir id e modified antes de atualizar
                    $customer['id'] = (int) $id;
                    $today = new DateTime("now", new DateTimeZone("America/Sao_Paulo"));
                    $customer['modified'] = $today->format("Y-m-d H:i:s");

                    $updated = update('customers', $id, $customer);
                    if ($updated) {
                        header("Location: index.php");
                        exit;
                    } else {
                        // manter na página para exibir $_SESSION['message']
                        error_log("Falha ao atualizar customer id={$id}");
                    }
                } else {
                    global $customer;
                    $customer = find("customers", $id);
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
