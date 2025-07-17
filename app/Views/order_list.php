<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <h2 class="mt-5">Order List</h2>
    <a href="/order/create" class="btn btn-primary mb-3">Create New Order</a>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>User ID</th>
                <th>Total</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?= $order['id']; ?></td>
                    <td><?= $order['user_id']; ?></td>
                    <td><?= $order['total']; ?></td>
                    <td><?= $order['status']; ?></td>
                    <td>
                        <a href="/order/show/<?= $order['id']; ?>" class="btn btn-info">View</a>
                        <a href="/order/edit/<?= $order['id']; ?>" class="btn btn-warning">Edit</a>
                        <a href="/order/delete/<?= $order['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
