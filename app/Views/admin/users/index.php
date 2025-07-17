<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <h2 class="mt-5">User List</h2>
    <a href="/admin/users/create" class="btn btn-primary mb-3">Add New User</a>
    
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
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['id']; ?></td>
                    <td><?= $user['username']; ?></td>
                    <td><?= $user['email']; ?></td>
                    <td>
                        <span class="badge <?= $user['role'] === 'admin' ? 'bg-primary' : 'bg-secondary' ?>">
                            <?= ucfirst($user['role']); ?>
                        </span>
                    </td>
                    <td><?= date('M d, Y', strtotime($user['created_at'])); ?></td>
                    <td>
                        <a href="/admin/users/edit/<?= $user['id']; ?>" class="btn btn-warning">Edit</a>
                        <a href="/admin/users/delete/<?= $user['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>