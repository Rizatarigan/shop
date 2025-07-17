<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">  <!-- Path to Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">  <!-- Your custom styles -->
</head>
<body>

    <!-- Start of Header -->
    <header>
        <!-- Your header content (menu, logo, etc.) -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Stylo.shop</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/cart">Cart</a>
                    </li>

                    <?php if (session()->get('user')) : ?>
                        <!-- If user is logged in -->
                        <li class="nav-item">
                            <span class="nav-link">Welcome, <?= session()->get('user')['username'] ?>!</span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/logout">Logout</a>
                        </li>
                    <?php else : ?>
                        <!-- If user is not logged in -->
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Login</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </header>
    <!-- End of Header -->

    <!-- Start of Main Content Section -->
    <?= $this->renderSection('content') ?>
    <!-- End of Main Content Section -->

    <!-- Start of Footer -->
    <footer class="bg-light text-center py-3">
        <p>&copy; 2025 Stylo.shop. All rights reserved.</p>
    </footer>
    <!-- End of Footer -->

    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
</body>
</html>
