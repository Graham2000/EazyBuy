<?php declare(strict_types=1);
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    $pageTitle = "Register";
    //include("./includes/header.php");
    //include("./includes/nav.php");
    include(__DIR__."/../src/bootstrap.php");

    $errMsg = "";

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Validate user input

        //$user = new User();
        $isUnique = $user->emailUnique($email);

        // Email is unique
        if ($isUnique) {
            // Hash password
            $password = password_hash($password, PASSWORD_DEFAULT);
            
            // Insert cart
            $cart->setCart(0, 0);

            // Get cart ID
            $cartID = $cart->getCartID();

            // Insert user
            $user->setUser($fName, $lName, $email, $password, $cartID);

            // Set session
            $_SESSION['userID'] = $user->getUserID();

            // Change header
            header("Location: ./index.php");
        } else {
            $errMsg = "This email is already in use";
        }
    }
?>

<div class="d-flex mt-5 justify-content-center" style="height:100vh">
    <form class="form-signin p-3" method="POST" action="./register.php">
        <h1 class="h3 mb-3 font-weight-normal text-center">Create an Account</h1>
        <input type="text" class="form-control mb-3" name="fName" placeholder="First name" minlength="2" maxlength="50" required="" autofocus="">
        <input type="text" class="form-control mb-3" name="lName" placeholder="Last name" minlength="2" maxlength="50" required="" autofocus="">
        <input type="email" id="inputEmail" class="form-control mb-3" name="email" placeholder="Email address" minlength="2" maxlength="50" required="">
        <input type="password" id="inputPassword" class="form-control mb-2" name="password" placeholder="Password" minlength="8" maxlength="50" required="">
        <label class="text-danger"><?= $errMsg; ?></label>

        <div class="d-grid gap-2">
            <button class="btn btn-primary mt-1 mb-2" type="submit">Create Account</button>
        </div>

        <a href="#">Forgot password</a><br>
        <a href="./sign-in.php">Sign in</a><br>
    </form>
</div>

<?php
    include("./includes/footer.php");
?>