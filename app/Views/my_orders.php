<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('content') ?>

<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">My Orders</h2>
            
            <?php if (session()->getFlashdata('message')): ?>
                <div class="alert alert-info">
                    <?= session()->getFlashdata('message') ?>
                </div>
            <?php endif; ?>
            
            <?php if (empty($orders)): ?>
                <div class="alert alert-info">
                    You haven't placed any orders yet.
                </div>
                <a href="/products" class="btn btn-primary">Start Shopping</a>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>Order #</th>
                                <th>Date</th>
                                <th>Items</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $order): 
                                $cartItems = json_decode($order['cart'], true);
                                $itemCount = count($cartItems);
                            ?>
                            <tr>
                                <td>#<?= $order['id'] ?></td>
                                <td><?= date('M d, Y', strtotime($order['created_at'])) ?></td>
                                <td><?= $itemCount ?> item<?= $itemCount > 1 ? 's' : '' ?></td>
                                <td>$<?= number_format($order['total'], 2) ?></td>
                                <td>
                                    <span class="badge 
                                        <?= $order['status'] === 'completed' ? 'bg-success' : 
                                           ($order['status'] === 'canceled' ? 'bg-danger' : 'bg-warning') ?>">
                                        <?= ucfirst($order['status']) ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="/my-orders/<?= $order['id'] ?>" class="btn btn-sm btn-outline-primary">
                                        View Details
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>