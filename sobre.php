 <?php 
    include "config.php"; 
    include DBAPI; 
	if (!isset($_SESSION)) session_start();
    include(HEADER_TEMPLATE); 
    $db = open_database(); 
?>
<br><br>
	

		<!--  aqui é a painel das notícias IRADAS feijoada -->
		<h1>SOBRE NÓS</h1>
		<div class="painel">
			<div class="container">
				<div class="row bora">
					<div class="col-8 calma a">
 						<div class="calabreso aviso-card">
							<div class="row align-items-center g-3">
								<div class="col-auto aviso-thumb">
									<img class="img-fluid rounded" src="<?php echo BASEURL; ?>img/aviso1.jpg" alt="Aviso">
								</div>
								<div class="col aviso-body">
									<h2>dia das pamonhas onhas</h2>
									<p class="aviso-text mb-0">
										A história começou
										quando um relógio esquisito
										Grudou no pulso dele vindo la do infinito
										Agora tem poderes e com eles faz bonito
										É o Ben 10
										Se acaso encontra-lo você vai se admirar
										Diante de seus olhos ele vai se transformar
										Em um ser alienígina
										Que bota pra quebrar
										É o Ben 10
										Com seus poderes vai combater
										Os inimigos e vai vencer
										Ele não foge de medo ou dor
										Moleque muito irado
									Seja onde for	É o Ben 10
															A história começou
										quando um relógio esquisito
										Grudou no pulso dele vindo la do infinito
										Agora tem poderes e com eles faz bonito
										É o Ben 10
										Se acaso encontra-lo você vai se admirar
										Diante de seus olhos ele vai se transformar
										Em um ser alienígina
										Que bota pra quebrar
										É o Ben 10
										Com seus poderes vai combater
										Os inimigos e vai vencer
										Ele não foge de medo ou dor
										Moleque muito irado
									Seja onde for	É o Ben 10
									</p>
								</div>
							</div>
						</div>
					
							
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
