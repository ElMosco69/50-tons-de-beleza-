<?php
include '../config.php';
include DBAPI;
include ABSPATH . 'inc/auth.php';

if (!can_access('funcionarios','delete')) {
    deny_access_and_redirect('funcionarios','delete', 'index.php');
}

if (isset($_GET['id'])) {
    try {
        // Consultando o funcionário para obter o nome do arquivo da foto
        $funcionario = find('funcionarios', $_GET['id']);

        // Apagando o funcionário do banco de dados
        remove('funcionarios', $_GET['id']);

        // Apagando o arquivo da foto, se existir
        if (!empty($funcionario['Foto']) && file_exists("fotos/" . $funcionario['Foto'])) {
            unlink("fotos/" . $funcionario['Foto']);
        }

        // Mensagem de sucesso
        if (!isset($_SESSION)) session_start();
        $_SESSION['message'] = "Funcionário excluído com sucesso.";
        $_SESSION['type'] = "success";

    } catch (Exception $e) {
        if (!isset($_SESSION)) session_start();
        $_SESSION['message'] = "Não foi possível realizar a operação: " . $e->getMessage();
        $_SESSION['type'] = "danger";
    }
}

// Redireciona de volta para a página inicial
header("Location: index.php");
exit;
