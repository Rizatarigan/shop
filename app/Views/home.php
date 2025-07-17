<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('content') ?>

<style>
    /* Carousel container */
    .owl-carousel {
        display: flex;
    }
    
    /* Product item */
    .product-7 {
        width: 100%;
        margin: 0 10px;
        flex-shrink: 0;
    }
    
    /* Ensure images are properly sized */
    .product-image {
        width: 100%;
        height: 200px;
        object-fit: contain;
    }
    
    /* Remove default Owl Carousel dots */
    .owl-dots {
        display: none;
    }
    
    /* Product grid for non-carousel items */
    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
    }
</style>

<!-- Featured Products Section -->
<div class="bg-light-2 pt-6 pb-6 featured">
    <div class="container-fluid">
        <div class="heading heading-center mb-3">
            <h2 class="title">FEATURED PRODUCTS</h2>
            </ul>
        </div>

        <div class="tab-content tab-content-carousel">
            <div class="tab-pane p-0 fade show active" id="featured-women-tab" role="tabpanel" aria-labelledby="featured-women-link">
                <div class="owl-carousel owl-theme" data-toggle="owl" 
                    data-owl-options='{
                        "nav": true,
                        "dots": false,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "0": {"items": 1},
                            "576": {"items": 2},
                            "768": {"items": 3},
                            "992": {"items": 4},
                            "1200": {"items": 5}
                        }
                    }'>
                    <?php foreach ($featured_products as $product): ?>
                    <div class="item">
                        <div class="product product-7 text-center">
                            <figure class="product-media">
                                <a href="/product/show/<?= $product['id']; ?>">
                                    <img src="<?= base_url('assets/images/products/'.$product['image']); ?>" alt="<?= $product['name']; ?>" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                </div>

                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                </div>
                            </figure>

                            <div class="product-body">
                                <h3 class="product-title"><a href="/product/show/<?= $product['id']; ?>"><?= $product['name']; ?></a></h3>
                                <div class="product-price">
                                    Rp.<?= number_format($product['price'], 2); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Regular Products Grid -->
<div class="container mt-5">
    
    
    <div class="product-grid">
        <?php foreach ($products as $product): ?>
        <div class="product product-7 text-center">
            <figure class="product-media">
                <a href="/product/show/<?= $product['id']; ?>">
                    <img src="<?= base_url('assets/images/products/'.$product['image']); ?>" alt="<?= $product['name']; ?>" class="product-image">
                </a>

                <div class="product-action-vertical">
                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                </div>

                <div class="product-action">
                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                </div>
            </figure>

            <div class="product-body">
                <h3 class="product-title"><a href="/product/show/<?= $product['id']; ?>"><?= $product['name']; ?></a></h3>
                <div class="product-price">
                    Rp. <?= number_format($product['price'], 2); ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->endSection() ?>