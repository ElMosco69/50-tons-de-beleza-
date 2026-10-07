 <?php 
    include "../config.php"; 
    include DBAPI; 
	if (!isset($_SESSION)) session_start();
    include(HEADER_TEMPLATE); 
    $db = open_database(); 
?>

<?php include(FOOTER_TEMPLATE); ?>

