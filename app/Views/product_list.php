<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <h2 class="mt-5">Product List</h2>
    <a href="/product/create" class="btn btn-primary mb-3">Add New Product</a>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $product['id']; ?></td>
                    <td><?= $product['name']; ?></td>
                    <td><?= $product['description']; ?></td>
                    <td><?= $product['price']; ?></td>
                    <td><?= $product['stock']; ?></td>
                    <td>
                        <!-- Add to Cart Button -->
                        <form action="/cart/add" method="post" style="display:inline-block;">
                            <input type="hidden" name="product_id" value="<?= $product['id']; ?>" />
                            <input type="hidden" name="quantity" value="1" /> <!-- Default quantity -->
                            
                        </form>
                        <a href="/product/edit/<?= $product['id']; ?>" class="btn btn-warning">Edit</a>
                        <a href="/product/delete/<?= $product['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
