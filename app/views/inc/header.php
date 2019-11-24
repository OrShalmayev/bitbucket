<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-primary text-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal">
      <a href="<?php echo URLROOT; ?>" class="text-white text-decoration-none"><?php echo DOCTOR ?></a>
    <?php if(isset($_SESSION['isAdmin'])): ?>
      <a class="admin_links" href="<?php echo URLROOT; ?>admins">
        <i class="fas fa-tachometer-alt"></i>
        Admin Control Panel
      </a>
    <?php endif; ?>
  </h5>
  <nav class="my-2 my-md-0 mr-md-3 ">
    <a class="p-2 text-white " href="#">Features</a>
    <a class="p-2 text-white " href="#">Enterprise</a>
    <a class="p-2 text-white " href="#">Support</a>
    <a class="p-2 text-white " href="#">Pricing</a>
  </nav>
  <?php if(isset($_SESSION['isAdmin'])): ?>
    <a class="btn btn-outline-danger text-white" href="<?php echo URLROOT; ?>admins/logout">
      <i class="fas fa-sign-out-alt"></i>
      Log Out
    </a>
  <?php else: ?>
    <a class="btn btn-outline-info text-white" href="<?php echo URLROOT; ?>admins/login">Login</a>
  <?php endif; ?>
</div>
