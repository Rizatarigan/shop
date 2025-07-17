<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <h2 class="mt-5">Order List</h2>
    
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>
    
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Customer</th>
                <th>Total</th>
                <th>Status</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?= $order['id']; ?></td>
                    <td><?= $order['first_name'] . ' ' . $order['last_name']; ?></td>
                    <td>$<?= number_format($order['total'], 2); ?></td>
                    <td>
                        <span class="badge 
                            <?= $order['status'] === 'completed' ? 'bg-success' : 
                               ($order['status'] === 'canceled' ? 'bg-danger' : 'bg-warning') ?>">
                            <?= ucfirst($order['status']); ?>
                        </span>
                    </td>
                    <td><?= date('M d, Y', strtotime($order['created_at'])); ?></td>
                    <td>
                        <a href="/admin/orders/<?= $order['id']; ?>" class="btn btn-info">View</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>