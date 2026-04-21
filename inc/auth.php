<?php
// Proteção contra múltiplas inclusões
if (defined('AUTH_INCLUDED')) {
    return;
}
define('AUTH_INCLUDED', true);

// Autorização simples baseada em sessão
if (!isset($_SESSION)) session_start();

if (!function_exists('current_role')) {
function current_role() {
    // Retorna 'admin', 'user' ou 'guest'
    if (!empty($_SESSION['role'])) return $_SESSION['role'];
    if (!empty($_SESSION['user'])) return 'user';
    return 'guest';
}
}

if (!function_exists('is_admin')) {
function is_admin() {
    return current_role() === 'admin';
}
}

if (!function_exists('is_logged')) {
function is_logged() {
    return current_role() === 'admin' || current_role() === 'user';
}
}

if (!function_exists('can_access')) {
function can_access($section, $action) {
    // $section: 'customers','funcionarios','usuarios'
    // $action: 'index','view','add','edit','delete'
    $role = current_role();

    // Admin can do everything
    if ($role === 'admin') return true;

    // Usuarios section: only admin can access
    if ($section === 'usuarios') {
        return false; // only admin allowed (already handled above)
    }

    // For customers and funcionarios
    if ($section === 'customers' || $section === 'funcionarios') {
        if ($role === 'guest') {
            // guests can only index and view
            return in_array($action, ['index','view']);
        }
        if ($role === 'user') {
            // logged-in normal users can do everything
            return true;
        }
    }

    return false;
}

}

if (!function_exists('deny_access_and_redirect')) {
function deny_access_and_redirect($section, $action, $redirect = null) {
    if ($redirect === null) $redirect = BASEURL;
    if (!isset($_SESSION)) session_start();
    header('Location: ' . $redirect);
    exit;
}
}
