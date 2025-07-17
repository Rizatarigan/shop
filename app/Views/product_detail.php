<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('content') ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<!-- Start of Product Detail Section -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="product-details">
                <h1 class="product-title"><?= $product['name']; ?></h1><!-- End .product-title -->

                <div class="ratings-container">
                    <div class="ratings">
                        <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                    </div><!-- End .ratings -->
                    <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Reviews )</a>
                </div><!-- End .rating-container -->

                <div class="product-price">
                    $<?= number_format($product['price'], 2); ?>
                </div><!-- End .product-price -->

                <div class="product-content">
                    <p><?= $product['description']; ?></p>
                </div><!-- End .product-content -->

                <div class="details-filter-row details-row-size">
                    <label>Color:</label>

                    <div class="product-nav product-nav-thumbs">
                        <a href="#" class="active">
                            <img src="<?= base_url('assets/images/products/'.$product['image']); ?>" alt="product desc">
                        </a>
                    </div><!-- End .product-nav -->
                </div><!-- End .details-filter-row -->

                <div class="details-filter-row details-row-size">
                    <label for="size">Size:</label>
                    <div class="select-custom">
                        <select name="size" id="size" class="form-control">
                            <option value="#" selected="selected">Select a size</option>
                            <option value="s">Small</option>
                            <option value="m">Medium</option>
                            <option value="l">Large</option>
                            <option value="xl">Extra Large</option>
                        </select>
                    </div><!-- End .select-custom -->

                    <a href="#" class="size-guide"><i class="icon-th-list"></i>size guide</a>
                </div><!-- End .details-filter-row -->

                <div class="details-filter-row details-row-size">
                    <label for="qty">Qty:</label>
                    <div class="product-details-quantity">
                        <input type="number" name="qty" id="qty" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>
                    </div><!-- End .product-details-quantity -->
                </div><!-- End .details-filter-row -->

                <div class="product-details-action">
                    <!-- Add to Cart button logic -->
                    <form action="/detailProduct/addToCart/<?= $product['id']; ?>" method="post">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id" value="<?= $product['id']; ?>">
                        <input type="hidden" name="name" value="<?= $product['name']; ?>">
                        <input type="hidden" name="price" value="<?= $product['price']; ?>">
                        <input type="hidden" name="image" value="<?= $product['image']; ?>">
                        <input type="number" name="qty" value="1" min="1" max="10" required>

                        <button type="submit" class="btn-product btn-cart"><span>add to cart</span></button>
                    </form>

                    <div class="details-action-wrapper">
                        <a href="#" class="btn-product btn-wishlist" title="Wishlist"><span>Add to Wishlist</span></a>
                        <a href="#" class="btn-product btn-compare" title="Compare"><span>Add to Compare</span></a>
                    </div><!-- End .details-action-wrapper -->
                </div><!-- End .product-details-action -->

                <div class="product-details-footer">
                    <div class="product-cat">
                        <span>Category:</span>
                        <a href="#">Women</a>,
                        <a href="#">Dresses</a>,
                        <a href="#">Yellow</a>
                    </div><!-- End .product-cat -->

                    <div class="social-icons social-icons-sm">
                        <span class="social-label">Share:</span>
                        <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                        <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                        <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                        <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                    </div>
                </div><!-- End .product-details-footer -->
            </div><!-- End .product-details -->
        </div><!-- End .col-md-6 -->
    </div><!-- End .row -->
</div><!-- End .container -->
<!-- End of Product Detail Section -->

<?= $this->endSection() ?>
