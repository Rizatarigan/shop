<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <h2 class="mt-5">Order #<?= $order['id']; ?></h2>
    
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Order Information</h5>
                </div>
                <div class="card-body">
                    <p><strong>Status:</strong> 
                        <span class="badge 
                            <?= $order['status'] === 'completed' ? 'bg-success' : 
                               ($order['status'] === 'canceled' ? 'bg-danger' : 'bg-warning') ?>">
                            <?= ucfirst($order['status']); ?>
                        </span>
                    </p>
                    <p><strong>Date:</strong> <?= date('F j, Y \a\t g:i a', strtotime($order['created_at'])); ?></p>
                    <p><strong>Total:</strong> $<?= number_format($order['total'], 2); ?></p>
                    <p><strong>Payment Method:</strong> <?= ucfirst($order['payment']); ?></p>
                    
                   
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Customer Information</h5>
                </div>
                <div class="card-body">
                    <p><strong>Name:</strong> <?= $order['first_name'] . ' ' . $order['last_name']; ?></p>
                    <p><strong>Email:</strong> <?= $order['email']; ?></p>
                    <p><strong>Phone:</strong> <?= $order['phone']; ?></p>
                    <p><strong>Address:</strong><br>
                        <?= $order['address']; ?><br>
                        <?= $order['city']; ?>, <?= $order['state']; ?> <?= $order['postcode']; ?>
                    </p>
                    <p><strong>Order Notes:</strong> <?= $order['order_notes'] ?: 'None'; ?></p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header">
            <h5>Order Items</h5>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cartItems as $item): ?>
                    <tr>
                        <td><?= $item['name']; ?></td>
                        <td>$<?= number_format($item['price'], 2); ?></td>
                        <td><?= $item['quantity']; ?></td>
                        <td>$<?= number_format($item['price'] * $item['quantity'], 2); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3">Total</th>
                        <th>$<?= number_format($order['total'], 2); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>