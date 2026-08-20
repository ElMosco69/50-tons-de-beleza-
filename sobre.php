 <?php 
    include "config.php"; 
    include DBAPI; 
	if (!isset($_SESSION)) session_start();
    include(HEADER_TEMPLATE); 
    $db = open_database(); 
?>
<br><br>
	

		<!--  aqui é a painel das notícias IRADAS feijoada -->
		<h1>Sobre nós</h1>
		<div class="painel">
			<div class="container">
				<div class="row bora">
					<div>
 						<br>
						<h1>texto</h1>
						<br>
						<img src="img/cintiabiscaia.png" width="25%" height="auto" alt="cintia">
					</div>
					<div>
						<h1>História</h1>
						<br>
						<h3>Cintia Biscaia iniciou sua trajetória como cabeleireira após já ter feito cursos na área de beleza. Em 2017, uma amiga a incentivou a abrir um salão e fez a proposta para que começassem o negócio, o que motivou Cintia a aceitar e dar início ao seu próprio salão.

 Desde então, ela trabalha oferecendo serviços de cabelo e unhas, enquanto sua colaboradora, que também é sua filha, Ariane atua no salão como esteticista.</h3>
					</div>
				</div>
			</div>
		</div>
<?php if ($db) : ?>
	<?php if (function_exists('is_admin') && is_admin()) : ?>

	<?php endif; ?>

<?php else : ?>
    <!--
	<div class="alert alert-danger" role="alert">
		<p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
	</div> -->
	<?php if (!empty($_SESSION['message'])) : ?>
		<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
			<p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!<br>
			<?php echo $_SESSION['message']; ?></p>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		<?php clear_messages(); ?>
		<?php endif; ?>
	<?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>
