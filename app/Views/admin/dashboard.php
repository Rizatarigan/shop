<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Link to Bootstrap 4 CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS */
        .sidebar {
            height: 100vh;
            background-color: #343a40;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px 15px;
        }
        .sidebar a:hover {
            background-color: #007bff;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .sidebar .active {
            background-color: #007bff;
        }
        .sidebar-header {
            padding: 15px;
            background-color: #23272b;
            color: #fff;
            font-size: 1.2rem;
        }
    </style>
</head>
<body>

<!-- Sidebar Section -->
<div class="d-flex" id="wrapper">
    <div class="sidebar">
        <div class="sidebar-header">
            <h4>Admin Dashboard</h4>
        </div>
        <div class="list-group">
            <a href="/admin/dashboard" class="list-group-item list-group-item-action active">Dashboard</a>
            <a href="/product" class="list-group-item list-group-item-action">Products</a>
            <a href="/orders" class="list-group-item list-group-item-action">Orders</a>
            <a href="/users" class="list-group-item list-group-item-action">Users</a>
            <a href="/logout" class="list-group-item list-group-item-action">Logout</a>
        </div>
    </div>

    <!-- Main Content Section -->
    <div class="content">
        <div class="container-fluid">
            <h2>Welcome to the Admin Dashboard</h2>
            <p>Here, you can manage your products, view orders, and manage users.</p>

            <!-- Admin Dashboard Statistics -->
            <div class="row">
                <!-- Product Statistics -->
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Products</h5>
                            <p class="card-text">50 Products</p>
                        </div>
                    </div>
                </div>

                <!-- Order Statistics -->
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Orders</h5>
                            <p class="card-text">200 Orders</p>
                        </div>
                    </div>
                </div>

                <!-- User Statistics -->
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Users</h5>
                            <p class="card-text">100 Users</p>
                        </div>
                    </div>
                </div>

                <!-- Sales Statistics -->
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Sales</h5>
                            <p class="card-text">$5,000</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap and jQuery JS (necessary for Bootstrap features) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
