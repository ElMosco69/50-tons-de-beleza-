 <?php 
    include "config.php"; 
    include DBAPI; 
	if (!isset($_SESSION)) session_start();
    include(HEADER_TEMPLATE); 
    $db = open_database(); 
?>
		<br>
		<br>
		<h2>Seja bem vindo, venha conhecer nossos serviços!</h2>
		<hr>
		<br>
	
		<!-- é aqui que começa a parte do carrosel -->
		<div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<div class="cards-wrapper">
 						<div class="card" style="width: 18rem;">
							<img src="<?php echo BASEURL; ?>img/manicure.jpg" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title">Manicure</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
								<a href="#" class="btn btn-primary">Agende já!</a>
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
			<br>
			<hr>
			<br>
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
					<div class="col-4 ben">
						<div class ="10">
							<h3> 
 								TODOS
							</h3>
							<div class="accordion" id="accordionExample">
								<div class="accordion-item">
									<h2 class="accordion-header">
									<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										HOJE 
									</button>
									</h2>
									<div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
									<div class="accordion-body">
										<div class="deiz">
											<p>OLAAA</p>
										</div>
									</div>
									</div>
								</div>
								<div class="accordion-item">
									<h2 class="accordion-header">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
										Accordion Item #2
									</button>
									</h2>
									<div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
									<div class="accordion-body">
										<strong>This is the second item’s accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It’s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
									</div>
									</div>
								</div>
								<div class="accordion-item">
									<h2 class="accordion-header">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
										Accordion Item #3
									</button>
									</h2>
									<div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
									<div class="accordion-body">
										<strong>This is the third item’s accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It’s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
									</div>
									</div>
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
