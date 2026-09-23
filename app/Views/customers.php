<!DOCTYPE html>
<html>
<head>
    <title>Customer Accounts</title>
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
        <section class="card">
            <h1>Customer Accounts</h1>
            <p>List of registered customers.</p>

            <table>
                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                </tr>

                <?php foreach ($customers as $customer): ?>
                    <tr>
                       <td><?= esc($customer['full_name']) ?></td>
                        <td><?= esc($customer['email']) ?></td>
                        <td><?= esc($customer['phone']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </section>
    </main>

    <footer>
        <p>© GAPAY  | IT0049 | TC36</p>
    </footer>
</body>
</html>