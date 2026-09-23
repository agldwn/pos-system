<!DOCTYPE html>
<html>
<head>
    <title>POS System</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <header>
        <h2 class="logo">POS System</h2>
        <nav>
            <a href="<?= base_url('/') ?>">Home</a>
            <a href="<?= base_url('about') ?>">About</a>
            <a href="<?= base_url('customers') ?>">Customers</a>
            <a href="<?= base_url('users') ?>">Users</a>
        </nav>
    </header>

    <main class="container">
        <section class="hero">
            <h1>Welcome to Our POS System</h1>
            <p>Manage customer and staff account records in one simple application.</p>
            <a class="button" href="<?= base_url('customers') ?>">View Customers</a>
        </section>
    </main>

    <footer>
        <p>© GAPAY  | IT0049 | TC36</p>
    </footer>
</body>
</html>