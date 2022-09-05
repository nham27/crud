<?php
include 'functions.php';

if(isset($_POST['signUp'])){
    if(signUp($_POST) > 0){
        echo "
        <script>
        alert('User berjaya didaftar! Sila login.');
        document.location.href = 'login.php';
        </script>
        ";
    }
    else {
        echo "pendaftaran gagal! ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
    <h1>Sign Up</h1>

    <form action="" method="POST">
        <ul>
            <li>
                <label for="username"> Username  :
                    <input type="text" name="username" autofocus autocomplete="off">
                </label>
            </li>
            <li>
                <label for="password"> Password :
                    <input type="password" name="password1" >
                </label>
            </li>
            <li>
                <label for="password">Repeat Password :
                    <input type="password" name="password2" >
                </label>
            </li>
            <li>
                <button name="signUp" type="submit">Sign Up</button>
            </li>
        </ul>
    </form>
</body>
</html>