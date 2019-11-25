<!-- HEADER -->
<?php require(APPROOT . '/views/inc/head.php'); ?>
    <!-- Title -->
    <h1 class="text-center my-5">
        <i class="<?php echo $data['icon'] ?>"></i>
        <?php echo $data['title']; ?>
        <!-- Patient type -->
        <?php echo $data['user']->patient_type ?>
    </h1>
    <?php if(isset($data['error_msg']) && !empty($data['error_msg'])): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $data['error_msg']; ?>
        </div>
    <?php endif; ?>
    <form method="POST" action="<?php echo URLROOT ?>users/register/<?php echo $data['user']->token ?>">
        <!-- First Name -->
        <div class="form-group">
            <label for="id_fn">First Name:</label>
            <input type="text" name="first_name" class="form-control"
                placeholder="Enter First Name">
        </div>
        <!-- Last Name -->
        <div class="form-group">
            <label for="id_ln">Last Name:</label>
            <input type="text" name="last_name" class="form-control" id="id_ln" placeholder="Enter Last Name">
        </div>
        <!-- Password -->
        <div class="form-group">
            <label for="id_p">Password:</label>
            <input type="password" name="password" class="form-control" id="id_p" placeholder="Enter Password">
        </div>
        <!-- Submit button -->
        <div class="form-group">
            <button type="submit" class="btn btn-primary form-control">Complete Registeration</button>
        </div>
    </form>

<!-- FOOTER -->
<?php require(APPROOT . '/views/inc/footer.php'); ?>