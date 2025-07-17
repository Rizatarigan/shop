<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Order</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h2 class="mt-5">Create New Order</h2>
    <form method="post" action="/order/store">
        <?= csrf_field(); ?>

        <div class="form-group">
            <label for="user_id">User ID</label>
            <input type="text" name="user_id" id="user_id" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="total">Total</label>
            <input type="number" name="total" id="total" class="form-control" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="products">Products</label>
            <!-- Example of dynamically adding products -->
            <select name="products[1]" class="form-control">
                <option value="1">Product 1</option>
                <option value="2">Product 2</option>
                <option value="3">Product 3</option>
            </select>
            <input type="number" name="quantity[1]" class="form-control" placeholder="Quantity">
        </div>

        <button type="submit" class="btn btn-success">Save Order</button>
    </form>
</div>

</body>
</html>
