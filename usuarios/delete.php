<?php
    include "functions.php";

    if (isset($_GET['id'])) {
        delete($_GET['id']);
    }
?>
