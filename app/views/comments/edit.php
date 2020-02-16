<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row">
    <div class="col-md-8 col-sm-12 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2 class="text-center mb-2" style="color: #2c3e50;">Approve/Disapprove Comments Admin</h2>
            <hr>
            <?php flash('comment_message'); ?>
            <form action="<?php echo URLROOT?>/comments/edit/<?php echo $data['id']; ?>" method="post">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Select</label>
                <select class="form-control" name="status">
                    <option>Approved</option>
                    <option>Disapproved</option>
                </select>
            </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" class="btn btn-block text-white" style="background-color: #2c3e50;" value="Update">
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>