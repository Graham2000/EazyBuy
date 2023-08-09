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

        <div class="d-grid g-2">
            <button class="btn btn-primary mt-1 mb-2" type="submit">Sign in</button>
        </div>

        <a href="#">Forgot password</a><br>
        <a href="./register.php">Create an account</a><br>
    </form>
</div>

<?php
    include("./includes/footer.php");
?>