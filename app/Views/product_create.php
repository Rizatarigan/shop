<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <h2 class="mt-5">Create New Product</h2>
    <form method="post" action="/product/store">
        <?= csrf_field(); ?>

        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" name="stock" id="stock" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Save Product</button>
    </form>
</div>

<?= $this->endSection() ?>
