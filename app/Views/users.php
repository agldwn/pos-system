<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Accounts | POS System</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #fff7fb;
            color: #4f3c4c;
        }

        .container {
            width: min(1000px, 92%);
            margin: 40px auto;
        }

        header {
            background: linear-gradient(135deg, #e9d5ff, #dbeafe);
            padding: 25px 30px;
            border-radius: 18px;
            box-shadow: 0 8px 18px rgba(120, 100, 140, 0.15);
        }

        h1 {
            margin: 0 0 14px;
            color: #65456d;
        }

        nav a {
            display: inline-block;
            margin-right: 10px;
            padding: 9px 14px;
            border-radius: 20px;
            text-decoration: none;
            color: #65456d;
            background: #ffffffb8;
            font-weight: bold;
        }

        nav a:hover {
            background: #ffd6e8;
        }

        .card {
            margin-top: 25px;
            padding: 28px;
            background: #ffffff;
            border-radius: 18px;
            box-shadow: 0 8px 18px rgba(120, 100, 140, 0.12);
        }

        h2 {
            margin-top: 0;
            color: #8a5578;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            overflow: hidden;
            border-radius: 12px;
        }

        th {
            background: #c7d2fe;
            color: #4c4674;
            text-align: left;
        }

        th, td {
            padding: 14px;
        }

        td {
            border-bottom: 1px solid #f0e2ec;
        }

        tr:nth-child(even) {
            background: #fff0f6;
        }

        tr:hover {
            background: #e7f5ff;
        }

        footer {
            text-align: center;
            margin: 25px 0;
            color: #876f7e;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>POS System</h1>
            <nav>
                <a href="<?= base_url('/') ?>">Home</a>
                <a href="<?= base_url('about') ?>">About</a>
                <a href="<?= base_url('customers') ?>">Customers</a>
                <a href="<?= base_url('users') ?>">Users</a>
            </nav>
        </header>

        <main class="card">
            <h2>User Accounts</h2>
            <p>List of registered system users.</p>

            <table>
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Full Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= esc($user['username']) ?></td>
                            <td><?= esc($user['full_name']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </main>

        <footer>
            © GAPAY | IT0049 | TC36
        </footer>
    </div>
</body>
</html>
