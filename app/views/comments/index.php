<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="display-4 text-center mt-5">Comments</h1>
            </div>
        </div>

        <!--Admin -->
        <?php if(!isset($_SESSION['user_id'])) : ?>

        <?php else : ?>
        <div class="row">
        <div class="col-12">
        <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">Title</th>
            <th scope="col">Date</th>
            <th scope="col">Comments</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($data['commentsForAdmin'] as $adminComment) : ?>
            <tr>
                <th scope="row"><?php echo $adminComment->id; ?></th>
                <td><?php echo $adminComment->username; ?></td>
                <td><?php echo $adminComment->title; ?></td>
                <td><?php echo $adminComment->created_at; ?></td>
                <td>
                    <a href="<?php echo URLROOT; ?>/comments/edit/<?php echo $adminComment->id; ?>" class="btn btn-warning">Edit</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        </table>
        </div>
        </div>
        <?php endif; ?>
        <!--End Admin -->

        <div class="row">
        <?php foreach($data['comments'] as $comment) : ?>
            <div class="col-md-6 col-sm-12 mt-5 mb-2">
                <div class="card text-white mb-1" style="background-color: #2c3e50; ">
                    <div class="card-header"><?php echo $comment->username; ?></div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $comment->title; ?></h5>
                        <p class="lead"><?php echo $comment->message; ?></p>
                        <p class="text-muted"><small><?php echo $comment->created_at; ?></small></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <hr>

    <div class="row">
    <div class="col-md-8 col-sm-12 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2 class="text-center mb-2" style="color: #2c3e50;">Comment our market and comapany</h2>
            <hr>
            <?php flash('comment_message'); ?>
            <form action="<?php echo URLROOT?>/comments/index" method="post">
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
                    <label for="title">Title: <sup style="color: #e74c3c;">*</sup></label>
                    <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
                    <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="message">Message: <sup style="color: #e74c3c;">*</sup></label>
                    <textarea type="text" name="message" class="form-control form-control-lg <?php echo (!empty($data['message_err'])) ? 'is-invalid' : ''; ?>" cols="30" rows="3"><?php echo $data['message']; ?></textarea>
                    <span class="invalid-feedback"><?php echo $data['message_err']; ?></span>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" class="btn btn-block text-white" style="background-color: #2c3e50;" value="Add Comment">
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
