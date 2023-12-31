<?php
  session_start();
  $loggedIn = false;
  $cc;
  if (isset($_SESSION['userID'])) {
    $loggedIn = true;
    $cc = $cart->getCart($_SESSION['userID']);
  }

  //include(__DIR__.'/../../src/bootstrap.php');
?>

<script defer>
  const cartNavigate = () => {
    window.location.href = './cart';
  }
</script>

<nav class="navbar navbar-expand-lg bg-body-tertiary p-3">
  <div class="container-fluid">
    <a class="navbar-brand" href="./">EazyBuy</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?= $pageTitle == "Smartphones" ? "active" : "" ?>" href="./smartphones">Smartphones</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $pageTitle == "Laptops" ? "active" : "" ?>" href="./laptops">Laptops</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            All Categories
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="./smartphones">Smartphones</a></li>
            <li><a class="dropdown-item" href="./laptops">Laptops</a></li>
            <li><a class="dropdown-item" href="./desktops">Desktop Computers</a></li>
            <!--
            <li><a class="dropdown-item" href="#">Audio and Headphones</a></li>
            <li><a class="dropdown-item" href="#">Gaming and Entertainment</a></li>
            <li><a class="dropdown-item" href="#">Wearable Technology</a></li>
            <li><a class="dropdown-item" href="#">Networking and Internet</a></li>
            -->
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $pageTitle == "Orders" ? "active" : "" ?>" href="./orders">My Orders</a>
        </li>
      </ul>

      <div class="secondaryNav">
        <a class='link-dark login' href=<?= $loggedIn ? './sign-out' : './sign-in'; ?>>
          <?= $loggedIn ? 'Sign Out' : 'Sign In'; ?>
        </a>
        <div class="d-flex navCart" <?= $loggedIn ? "onclick='cartNavigate()'" : ''; ?> >
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
          </svg>
          <div>
            <p id="itemCount"><?= isset($_SESSION['userID']) ? $cc['item_count'] : 0; ?> Items</p>
            <p id="totalPrice">$<?= isset($_SESSION['userID']) ? $cc['total_price'] : 0; ?></p>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</nav>