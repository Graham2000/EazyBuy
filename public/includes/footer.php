<footer class="py-3 my-4">
  <ul class="nav justify-content-center border-bottom pb-3 mb-3">
    <li class="nav-item"><a href="./smartphones" class="nav-link px-2 text-muted">Smartphones</a></li>
    <li class="nav-item"><a href="./laptops" class="nav-link px-2 text-muted">Laptops</a></li>
    <li class="nav-item"><a href="./orders" class="nav-link px-2 text-muted">My Orders</a></li>
  </ul>
  <p class="text-center text-muted">
    © <span id="currentYear"></span> 
    EazyBuy, Inc
  </p>
</footer>

<script>
  let yrContainer = document.getElementById("currentYear");
  let currentYear = new Date().getFullYear();
  yrContainer.textContent = currentYear;
</script>

</body>
</html>