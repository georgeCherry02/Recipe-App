<?php
    include_once "../common/base.php";
    $pageTitle = "Login";
    include_once "../common/basicHeader.php";

    if (isset($_SESSION['LoggedIn']) && $_SESSION['LoggedIn'] == 1) {
        echo "<meta http-equiv='refresh' content=0;main.php'>";
        exit;
    } else if (isset($_POST['username']) && isset($_POST['password'])) {
        include_once "inc/class.users.inc.php";
        $users = new User($db);
        if ($users->accountLogin() === True) {
            echo "<meta http-equiv='refresh' content='0;main.php'/>";
            exit;
        } else {
?>
<div class='msgWrapper'>
    <h1>Login Failed</h1>
    <br>
    <h3>Try again?</h3>
</div>
<?php
            include_once "../pageComponents/loginForm.php";
        }    
    } else {
        include_once "../pageComponents/loginForm.php";
?>
<h3>Don't have an account yet?</h3>
<?php
    }
    include_once "../common/footer.php"
?>

