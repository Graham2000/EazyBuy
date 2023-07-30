<nav class="navbar navbar-expand-lg bg-body-tertiary p-3">
  <div class="container-fluid">
    <a class="navbar-brand" href="./index.php">EazyBuy</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?= $pageTitle == "Home" ? "active" : "" ?>" href="./index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $pageTitle == "Products" ? "active" : "" ?>" href="./bestSellers.php">Best Sellers</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            All Categories
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="./mobile.php">Smartphones and Accessories</a></li>
            <li><a class="dropdown-item" href="./computers.php">Computers and Laptops</a></li>
            <!--
            <li><a class="dropdown-item" href="#">Audio and Headphones</a></li>
            <li><a class="dropdown-item" href="#">Gaming and Entertainment</a></li>
            <li><a class="dropdown-item" href="#">Wearable Technology</a></li>
            <li><a class="dropdown-item" href="#">Networking and Internet</a></li>
            -->
          </ul>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>