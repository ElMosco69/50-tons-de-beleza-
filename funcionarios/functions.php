<?php
require_once('../config.php');
require_once(DBAPI);
include ABSPATH . 'inc/auth.php';

/**
 * Lista todos os registros de uma tabela
 */
function find_all($table) {
    return find($table, null);
<?php
// Thin wrapper for funcionarios module: use central DBAPI functions
require_once('../config.php');
require_once(DBAPI);
include_once ABSPATH . 'inc/auth.php';

// Helper wrappers (do not redeclare core DB functions)
function get_all_funcionarios() {
    return find_all('funcionarios');
}

function get_funcionario($id) {
    return find('funcionarios', $id);
}

function save_funcionario($data) {
    return save('funcionarios', $data);
}

function update_funcionario($id, $data) {
    return update('funcionarios', $id, $data);
}

function remove_funcionario($id) {
    return remove('funcionarios', $id);
}
    } catch (Exception $e) {
