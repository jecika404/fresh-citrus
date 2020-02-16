<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="<?php echo URLROOT; ?>"><?php echo SITENAME; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      
      <a class="nav-item nav-link" href="<?php echo URLROOT; ?>">Home</a>
      <a class="nav-item nav-link" href="<?php echo URLROOT; ?>/items/index">Market</a>
      <a class="nav-item nav-link" href="<?php echo URLROOT; ?>/comments/index">Comments</a>
      <a class="nav-item nav-link" href="<?php echo URLROOT; ?>/pages/about">About</a>
      <?php if(!isset($_SESSION['user_id'])) : ?>

      <?php else : ?>
        <a class="nav-item nav-link" href="<?php echo URLROOT; ?>/users/logout">Logout</a>
      <?php endif; ?>
    </div>
  </div>
</nav> 