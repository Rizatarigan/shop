<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <h2 class="mt-5">Edit User</h2>
    
    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <p><?= $error ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form action="/admin/users/update/<?= $user['id']; ?>" method="post">
        <?= csrf_field(); ?>
        
        <div class="form-group mb-3">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= $user['username']; ?>" required>
        </div>
        
        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" required>
        </div>
        
        <div class="form-group mb-3">
            <label for="password">Password (leave blank to keep current)</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        
        <div class="form-group mb-3">
            <label for="role">Role</label>
            <select class="form-control" id="role" name="role" required>
                <option value="user" <?= $user['role'] === 'user' ? 'selected' : '' ?>>User</option>
                <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Update User</button>
        <a href="/admin/users" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<?= $this->endSection() ?>