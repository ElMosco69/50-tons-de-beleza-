 <?php 
    include "../config.php"; 
    include DBAPI; 
	if (!isset($_SESSION)) session_start();
    include(HEADER_TEMPLATE); 
    $db = open_database(); 
?>

<div class="container mt-5">
	<h1>Produtos</h1>
	<hr>

	<div class="row">
		<?php
		$products = find_all('produtos');
		if ($products) :
			foreach ($products as $product) :
		?>
				<div class="col-md-4 mb-4">
					<div class="card h-100">
						<img src="<?php echo BASEURL . 'img/' . $product['imagem']; ?>" class="card-img-top" alt="<?php echo $product['nome']; ?>">
						<div class="card-body">
							<h5 class="card-title"><?php echo $product['nome']; ?></h5>
							<p class="card-text"><?php echo $product['descricao']; ?></p>
							<p class="card-text"><strong>Preço:</strong> R$ <?php echo number_format($product['preco'], 2, ',', '.'); ?></p>
						</div>
					</div>
				</div>
		<?php
			endforeach;
		else :
			echo '<p>Nenhum produto encontrado.</p>';
		endif;
		?>
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
