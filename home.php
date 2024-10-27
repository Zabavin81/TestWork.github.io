<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<p>This is the HOME page</p>
<?php
$hash = password_hash($_SESSION['password'], PASSWORD_DEFAULT);
echo "Hello " . $_SESSION['username'] . '!';
echo '<br>This is your hashed password: <br>' . $hash;
if (isset($_POST['LogOut'])) {
    session_destroy();
    header('Location: index.php');
}
?>
<form action="home.php" method="post">
    <input type="submit" name="LogOut" value="LogOut">
</form>
<form action="home.php" method="post">
    <input type="password" name="passwordverify">
    <input type="submit" name="verify" value="verify">
</form>
<?php
if (isset($_POST['verify'] )) {
    $verify = $_POST["passwordverify"];
    if (password_verify($verify, $hash)) {
        echo "Password is verified!";
    }else {
        echo "Wrong password!";
    }
}
?>
<br>
</body>
</html>
