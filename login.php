<?php
// start session
session_start();

if (isset($_SESSION['login'])) {
  header('Location: index.php');
  exit;
}

include 'functions.php';

if(isset($_POST['login'])){
    $login = login($_POST);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <a href="signUp.php">Sign Up</a>

    <?php if(isset($login['error'])) : ?>
        <p style="color: red; font-style: italic;"><?= $login['mesej']; ?></p>
     <?php endif;?>

    <div class="login">
        <form action="" method="POST">
            <ul>
                <li>
                    <label for="" placeholder="username" >
                        Username : 
                        <input type="text" name="username" autocomplete="off" autofocus require>
                    </label>
                </li>
            </ul>
            <ul>
                <li>
                    <label for="" placeholder="password"  autocomplete="off">
                        Password : 
                        <input type="password" name="password" require>
                    </label>
                </li>
            </ul>
            <ul>
                <li>
                    <button name="login" type="submit">Login</button>
                </li>
            </ul>
        </form>
    </div>
</body>
</html>