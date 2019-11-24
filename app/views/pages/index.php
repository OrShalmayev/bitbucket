<?php require(APPROOT . '/views/inc/head.php'); ?>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h1 class="display-4">
    <?php echo $data['title']; ?>
    <?php if(isset($_SESSION['isAdmin'])): ?>
        Admin
    <?php else: ?>
        Customer
    <?php endif; ?>
  </h1>
  <p class="lead">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It’s built with default Bootstrap components and utilities with little customization.</p>
</div>

<?php require(APPROOT . '/views/inc/footer.php'); ?>

