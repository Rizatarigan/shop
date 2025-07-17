<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('content') ?>

<div class="container my-5">
    <div class="row">
        <div class="col-md-8">
            <h2 class="mb-4">Order #<?= $order['id'] ?></h2>
            
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Order Summary</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p><strong>Order Date:</strong> <?= date('F j, Y \a\t g:i a', strtotime($order['created_at'])) ?></p>
                            <p><strong>Status:</strong> 
                                <span class="badge 
                                    <?= $order['status'] === 'completed' ? 'bg-success' : 
                                       ($order['status'] === 'canceled' ? 'bg-danger' : 'bg-warning') ?>">
                                    <?= ucfirst($order['status']) ?>
                                </span>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Payment Method:</strong> <?= ucfirst($order['payment']) ?></p>
                            <p><strong>Total Amount:</strong> $<?= number_format($order['total'], 2) ?></p>
                        </div>
                    </div>
                    
                    <h6 class="mb-3">Items Ordered</h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($cartItems as $item): ?>
                                <tr>
                                    <td><?= esc($item['name']) ?></td>
                                    <td>$<?= number_format($item['price'], 2) ?></td>
                                    <td><?= $item['quantity'] ?></td>
                                    <td>$<?= number_format($item['price'] * $item['quantity'], 2) ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="3">Total</th>
                                    <th>$<?= number_format($order['total'], 2) ?></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Billing Address</h5>
                        </div>
                        <div class="card-body">
                            <p>
                                <?= $order['first_name'] ?> <?= $order['last_name'] ?><br>
                                <?= $order['address'] ?><br>
                                <?= $order['city'] ?>, <?= $order['state'] ?> <?= $order['postcode'] ?><br>
                                <?= $order['email'] ?><br>
                                <?= $order['phone'] ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>