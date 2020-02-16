<?php require APPROOT . '/views/inc/header.php'; ?>
    
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="display-4 mt-5 text-center">Market / Our Offer</h1>
            </div>  
        </div>
        <div class="row">
            <?php foreach($data['items'] as $item) : ?>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-5 mt-5">
                <div class="card shadow rounded" style="width: 18rem;">
                    <img src="<?php echo URLROOT; ?>/public/img/<?php echo $item->img; ?>.jpg" class="card-img-top" alt="..."  style="height: 15rem;">
                    <div class="card-body">
                        <h1 class="display-5 text-center" style="color: #34495e;"><?php echo $item->name; ?></h1>
                        <hr>
                        <p class="card-text font-weight-light"><?php echo $item->content; ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>    
        </div>      
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>