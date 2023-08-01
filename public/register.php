<?php
    $pageTitle = "Register";
    include("./includes/header.php");
    include("./includes/nav.php");
?>

<div class="d-flex mt-5 justify-content-center" style="height:100vh">
    <form class="form-signin p-3">
        <h1 class="h3 mb-3 font-weight-normal text-center">Create an Account</h1>
        <input type="text" class="form-control mb-3" placeholder="First name" required="" autofocus="">
        <input type="text" class="form-control mb-3" placeholder="Last name" required="" autofocus="">
        <input type="email" id="inputEmail" class="form-control mb-3" placeholder="Email address" required="">
        <input type="password" id="inputPassword" class="form-control mb-2" placeholder="Password" required="">

        <div class="d-grid gap-2">
            <button class="btn btn-primary mt-1 mb-2" type="submit">Create Account</button>
        </div>

        <a href="#">Forgot password</a><br>
        <a href="#">Sign in</a><br>
    </form>
</div>

<?php
    include("./includes/footer.php");
?>