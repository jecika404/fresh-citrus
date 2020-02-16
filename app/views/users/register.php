<?php require APPROOT . '/views/inc/header.php'; ?>

    <div class="row">
    <div class="col-md-6 col-sm-12 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2 class="text-center" style="color: #2c3e50;">Create Admin</h2>
            <hr>
            <form action="<?php echo URLROOT?>/users/register" method="post">
                <div class="form-group">
                    <label for="username">Username: <sup style="color: #e74c3c;">*</sup></label>
                    <input type="text" name="username" class="form-control form-control-lg <?php echo (!empty($data['username_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['username']; ?>">
                    <span class="invalid-feedback"><?php echo $data['username_err']; ?></span>
                </div>
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
                <div class="form-group">
                    <label for="confirm_password">Confirm Password: <sup style="color: #e74c3c;">*</sup></label>
                    <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>">
                    <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" class="btn btn-info btn-block" value="Register">
                    </div>
                    <div class="col">
                        <a href="<?php echo URLROOT?>/users/login" class="btn btn-outline-info">LogIn Form</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>