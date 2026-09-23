<!DOCTYPE html>
<html>
<head>
    <title>User Accounts</title>
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
            <h1>User Accounts</h1>
            <p>List of system staff and user roles.</p>

            <table>
                <tr>
                    <th>Username</th>
                    <th>Full Name</th>
                    <th>Role</th>
                </tr>

                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= esc($user['username']) ?></td>
                        <td><?= esc($user['name']) ?></td>
                        <td><?= esc($user['role']) ?></td>
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