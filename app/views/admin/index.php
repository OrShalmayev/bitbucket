<!-- HEADER -->
<?php require(APPROOT . '/views/inc/head.php'); ?>
<!-- Title -->
<h1 class="text-center my-5">
    <i class="<?php echo $data['icon'] ?>"></i>
    <?php echo $data['title']; ?>
</h1>
<div class="row">
    <div class="col-3">
        <nav class=" d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">

                    <!-- Dashboard -->
                    <li class="nav-item">
                        <a class="nav-link <?php echo  $_SESSION['current_url']==NULL ? 'text-primary' : 'text-dark'; ?>" href="<?php echo URLROOT; ?>admins">
                            <i class="fas fa-tachometer-alt"></i>
                            Dashboard
                        </a>
                    </li>
                    
                    <!-- Add Patient -->
                    <li class="nav-item">
                        <a class="nav-link <?php echo  $_SESSION['current_url']=='add_patient' ? 'text-primary' : 'text-dark'; ?>" href="<?php echo URLROOT; ?>admins/add_patient">
                            <i class="fas fa-user-plus"></i>
                            Add Patient
                        </a>
                    </li>

                    <!-- All Patients -->
                    <li class="nav-item">
                        <a class="nav-link <?php echo  $_SESSION['current_url']=='all_patients' ? 'text-primary' : 'text-dark'; ?>" href="<?php echo URLROOT; ?>admins/all_patients">
                            <i class="fas fa-users"></i>
                            All Patients
                        </a>
                    </li>
                </ul>

            </div>
        </nav>
    </div>

    <div class="col-6">
        <?php if(isset($_SESSION['current_url'])) : ?>
            <?php include(APPROOT . '/views/admin/' . $_SESSION['current_url'] . '.php'); ?>
        <?php else: ?>
            <?php echo "..."; ?>
        <?php endif; ?>
    </div>
    <!-- /col-6 -->
</div>
<!-- /row -->



<!-- FOOTER -->
<?php require(APPROOT . '/views/inc/footer.php'); ?>