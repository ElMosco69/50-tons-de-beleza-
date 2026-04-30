 <?php 
    include "config.php"; 
    include DBAPI; 
	if (!isset($_SESSION)) session_start();
    include(HEADER_TEMPLATE); 
    $db = open_database(); 
?>
		<br>
		<h2>Seja bem vindo, venha conhecer nossos serviços!</h2>
		<hr>
	
		<!-- é aqui que começa a parte do carrosel -->
		<div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<div class="cards-wrapper">
 						<div class="card" style="width: 18rem;">
							<img src="<?php echo BASEURL; ?>img/house.png" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title">Card title</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
								<a href="#" class="btn btn-primary">Go somewhere</a>
							</div>
						</div>
						<div class="card" style="width: 18rem;">
							<img src="<?php echo BASEURL; ?>img/house.png" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title">Card title</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
								<a href="#" class="btn btn-primary">Go somewhere</a>
							</div>
						</div>
						<div class="card" style="width: 18rem;">
							<img src="<?php echo BASEURL; ?>img/house.png" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title">Card title</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
								<a href="#" class="btn btn-primary">Go somewhere</a>
							</div>
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<div class="cards-wrapper">
 						<div class="card" style="width: 18rem;">
							<img src="<?php echo BASEURL; ?>img/house.png" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title">Card title</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
								<a href="#" class="btn btn-primary">Go somewhere</a>
							</div>
						</div>
						<div class="card" style="width: 18rem;">
							<img src="<?php echo BASEURL; ?>img/house.png" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title">Card title</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
								<a href="#" class="btn btn-primary">Go somewhere</a>
							</div>
						</div>
						<div class="card" style="width: 18rem;">
							<img src="<?php echo BASEURL; ?>img/house.png" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title">Card title</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
								<a href="#" class="btn btn-primary">Go somewhere</a>
							</div>
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<div class="cards-wrapper">
 						<div class="card" style="width: 18rem;">
							<img src="<?php echo BASEURL; ?>img/house.png" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title">Card title</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
								<a href="#" class="btn btn-primary">Go somewhere</a>
							</div>
						</div>
						<div class="card" style="width: 18rem;">
							<img src="<?php echo BASEURL; ?>img/house.png" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title">Card title</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
								<a href="#" class="btn btn-primary">Go somewhere</a>
							</div>
						</div>
						<div class="card" style="width: 18rem;">
							<img src="<?php echo BASEURL; ?>img/house.png" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title">Card title</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
								<a href="#" class="btn btn-primary">Go somewhere</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
				<span  class="carousel-control-prev-icon arrow" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
				<span class="carousel-control-next-icon arrow" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button>
		</div>

		<!--  aqui é a painel das notícias IRADAS feijoada -->
		<div class="painel">
			<div>
				
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