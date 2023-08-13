<?php declare(strict_types=1);
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    $pageTitle = "Sign In";
    //include("./includes/header.php");
    //include("./includes/nav.php");
    include(__DIR__."/../src/bootstrap.php");

    $errMsg = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $pwdHash = $user->getPassword($email);
 
        // Valid password
        if ($pwdHash && password_verify($password, $pwdHash['password'])) {

            // Start session
            $_SESSION["userID"] = $pwdHash['user_id'];

            header("Location: ./index.php");

        } else {
            // Invalid password
            $errMsg = "Invalid email or password";
        }

    }
?>

<div class="d-flex mt-5 justify-content-center" style="height:100vh">
    <form class="form-signin p-3" action="./sign-in.php" method="POST">
        <h1 class="h3 mb-3 font-weight-normal text-center">Sign In</h1>
        <input type="email" name="email" id="inputEmail" class="form-control mb-2" placeholder="Email address" required="" autofocus="">
        <input type="password" name="password" id="inputPassword" class="form-control mb-2" placeholder="Password" required="">
        <label class="text-danger"><?= $errMsg; ?></label>

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