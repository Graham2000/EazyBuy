<?php
    $pageTitle = "Sign In";
    include("./includes/header.php");
    include("./includes/nav.php");
?>

<div class="d-flex mt-5 justify-content-center" style="height:100vh">
    <form class="form-signin p-3">
        <h1 class="h3 mb-3 font-weight-normal text-center">Sign In</h1>
        <input type="email" id="inputEmail" class="form-control mb-2" placeholder="Email address" required="" autofocus="">
        <input type="password" id="inputPassword" class="form-control mb-2" placeholder="Password" required="">
        <a href="#">Forgot password</a><br>
        <a href="#">Create an account</a><br>
        <button class="btn btn-primary mt-1" type="submit">Sign in</button>
    </form>
</div>

<?php
    include("./includes/footer.php");
?>