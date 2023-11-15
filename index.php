<?php 
require_once('./auth.php');
?>

<?php include './header.php' ?>
<div class='jumbotron'>
  <div class='container'>
    <?php if ($auth->isLoggedIn()) { ?>
    <h1 class='display-3'>Hey <?php echo $auth->getUser()->given_name ?? strstr($auth->getUser()->name, ' ', true); ?>!</h1>
    <p>
      Checkout your OIDC user profile by clicking the button below.
    </p>
    <a class='btn btn-success btn-lg' href='/php/profile.php' role='button'>View Profile &raquo;</a>
    <br>
    <br>
    <p>See also: <a href="https://www.youtube.com/watch?v=SSbBvKaM6sk" target="_blank">jumbo jet</a>.</p>
    <?php } else { ?>
    <h1 class='display-3'>Hello stranger!</h1>
    <p>
      Login with one of the providers to access the profile page at /php/profile.php.
    </p>
    <a class='btn btn-primary btn-lg' href='/php/mslogin.php' role='button'>Microsoft Login &raquo;</a>
    <br>
    <br>
    <a class='btn btn-primary btn-lg' href='/php/glogin.php' role='button'>Google Login &raquo;</a>
    <?php } ?>
  </div>
</div>
<?php include './footer.php' ?>