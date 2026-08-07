<?php if (!isset($_SESSION)) session_start(); ?>
<?php include ABSPATH . 'inc/auth.php'; ?>
<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <title></title>
      <meta name="description" content="">
      <meta name="keywords" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
      <link rel="stylesheet" href="<?php echo BASEURL; ?>css/awesome/all.min.css">
      <link rel="stylesheet" href="<?php echo BASEURL; ?>css/bootstrap/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo BASEURL; ?>css/style.css">
      <link rel="icon" href="<?php echo BASEURL; ?>img/house.png">
  </head>
<body>
  <nav class="navbar navbar-expand-md fixed-top" data-bs-theme="dark" id="topo">
    <div class="container position-relative">

      <!-- Espaço fantasma mobile para equilibrar o toggler -->
      <span class="d-md-none" style="width: 40px;"></span>

      <!-- LOGO (fora do collapse) -->
      <a class="navbar-brand mx-auto" href="<?php echo BASEURL; ?>">
        <img src="<?php echo IMAGE_TEMPLATE; ?>" alt="Logo" width="150" height="auto">
      </a>

      <!-- Toggler -->
      <button
        class="navbar-toggler d-md-none"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarScroll"
        aria-controls="navbarScroll"
        aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarScroll">

        <!-- ── Links ESQUERDA (desktop) ── -->
        <ul class="navbar-nav nav-left">
          <li class="nav-item">
            <a class="nav-link" href="#">Agendamento</a>
          </li>
 
           <li class="nav-item">
            <a class="nav-link" href="#">Sobre</a>
          </li>

        </ul>

        <!-- ── Links DIREITA (desktop) ── -->
        <ul class="navbar-nav nav-right">
          
        <div class="dropdown">
            <a class=" nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              Produtos
            </a>
            
            <ul class="dropdown-menu">
              <!-- você esqueceu de colocar o BASEURL no link, ora bolas-->
              <li><a class="dropdown-item" href="<?php echo BASEURL; ?>produtos/index.php">Produtos</a></li>
              <li><a class="dropdown-item" href="<?php echo BASEURL; ?>#">Carrinho  <i class="fa-solid fa-cart-shopping"></i></a></li>
            </ul>
          </div>

            
            <?php if(isset($_SESSION['user'])) : ?>
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2 justify-content-center"
                  href="<?php echo BASEURL; ?>inc/logout.php">
                  <img src="<?php echo $avatar_url; ?>" alt="avatar" class="nav-avatar">
                  <span><?php echo htmlspecialchars($_SESSION['nome'] ?? $_SESSION['user']); ?></span>
                  <i class="fa-solid fa-arrow-right-from-bracket"></i>
                </a>
              </li>
            <?php else : ?>
              <li class="nav-item">
                <a class="btn btn-outline-light" href="<?php echo BASEURL; ?>inc/cadastro.php" type="submit">Cadastro</a>
              </li>
              <li class="nav-item">
                <a class="btn btn-danger" href="<?php echo BASEURL; ?>inc/login.php"type="submit" >Login</a>
              </li>
            <?php endif; ?>
        </ul>

<!-- ── Mobile: lista vertical completa ── -->
        <ul class="navbar-nav nav-mobile align-items-center gap-2 text-center w-100">
          <li class="nav-item"><a class="nav-link" href="<?php echo BASEURL; ?>produtos/index.php">Agendamento</a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo BASEURL; ?>#">Produtos</a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo BASEURL; ?>#">Sobre</a></li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fa-solid fa-cart-shopping"></i> Carrinho
            </a>
          </li>
          <li class="nav-item"> <button class="btn btn-outline-light" type="submit">Cadastro</button>
          <?php if(isset($_SESSION['user'])) : ?>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center justify-content-center gap-2"
                href="<?php echo BASEURL; ?>inc/cadastro.php">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
              </a>
            </li>
          <?php else : ?>
            <li class="nav-item">
              <button class="btn btn-danger" href="<?php echo BASEURL; ?>inc/login.php" type="submit" >Login</button>
            </li>
          <?php endif; ?>
        </ul>

      </div>
    </div>
  </nav>
<main class="container">