<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('content') ?>

<!-- Start of Product Detail Section -->
<div class="container">
    <h2 class="mt-5"><?= $product['name']; ?></h2>
    <div class="row">
        <div class="col-md-6">
            <img src="<?= base_url('assets/images/products/'.$product['image']); ?>" alt="<?= $product['name']; ?>" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h3>$<?= number_format($product['price'], 2); ?></h3>
            <p><?= $product['description']; ?></p>
            <button class="btn btn-primary">Add to Cart</button>
        </div>
    </div>
</div>
<!-- End of Product Detail Section -->

<?= $this->endSection() ?>
