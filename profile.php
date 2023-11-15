<?php 
require_once('./auth.php');

// Check if user logged in
if (!$auth->isLoggedIn()) {
  header('Location: index.php');
}

$user = $auth->getUser();
?>
<?php include './header.php';  ?>
<div class='container'>
  <h3>Welcome <?php echo $user->name; ?>!</h3>
  <h4>User object:</h4>
  <pre> <?php echo print_r($user); ?></pre>
</div>
<?php include './footer.php' ?>