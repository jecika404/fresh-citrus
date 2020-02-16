<?php require APPROOT . '/views/inc/header.php'; ?>

    <div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <?php flash('register-success'); ?>
            <h2 class="text-center">Log In</h2>
            <hr>
            <form action="<?php echo URLROOT?>/users/login" method="post">
    
                <div class="form-group">
                    <label for="email">Email: <sup style="color: #e74c3c;">*</sup></label>
                    <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
                    <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Password: <sup style="color: #e74c3c;">*</sup></label>
                    <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
                    <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                </div>

                <div class="row">
                    <div class="col">
                        <input type="submit" class="btn btn-info btn-block" value="Log In">
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>