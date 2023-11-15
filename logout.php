<?php 
require_once('./auth.php');

if ($auth->isLoggedIn()) {
    $auth->logout();
} else {
    header('Location: index.php');
}
?>

<?php include './header.php' ?>
<div class='jumbotron'>
    <div class='container'>
        <h2>You're logged out.</h2>
        <a class='btn btn-primary btn-lg' href='/php/index.php' role='button'>Return to Home</a>
    </div>
</div>
<?php include './footer.php' ?>