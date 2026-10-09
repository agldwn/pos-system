<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?= $mode === 'new' ? 'Add User' : ($mode === 'edit' ? 'Edit User' : 'User Accounts') ?>
    </title>

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

        h2 {
            margin-top: 0;
            color: #8a5578;
        }

        nav a,
        a {
            color: #65456d;
            font-weight: bold;
        }

        nav a {
            display: inline-block;
            margin-right: 10px;
            padding: 9px 14px;
            border-radius: 20px;
            text-decoration: none;
            background: #ffffffb8;
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

        th,
        td {
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

        label {
            display: block;
            margin-top: 14px;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #d9c9df;
            border-radius: 8px;
        }

        button {
            margin-top: 18px;
            padding: 10px 16px;
            border: 0;
            border-radius: 20px;
            background: #c7d2fe;
            color: #4c4674;
            font-weight: bold;
            cursor: pointer;
        }

        .avatar {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 50%;
        }

        .current-avatar {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
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

    <?php if ($mode === 'new' || $mode === 'edit'): ?>

        <main class="card">
            <h2><?= $mode === 'new' ? 'Add New User' : 'Edit User' ?></h2>

            <?php if (!empty($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <form method="post"
                  enctype="multipart/form-data"
                  action="<?= $mode === 'new'
                      ? base_url('users/create')
                      : base_url('users/update/' . $user['id']) ?>">

                <?= csrf_field() ?>

                <label for="username">Username</label>
                <input
                    type="text"
                    id="username"
                    name="username"
                    value="<?= esc(old('username', $user['username'] ?? '')) ?>"
                >

                <label for="full_name">Full Name</label>
                <input
                    type="text"
                    id="full_name"
                    name="full_name"
                    value="<?= esc(old('full_name', $user['full_name'] ?? '')) ?>"
                >

                <?php if ($mode === 'edit'): ?>
                    <label for="avatar">
                        Profile Picture JPG or PNG, maximum 2MB
                    </label>

                    <input
                        type="file"
                        id="avatar"
                        name="avatar"
                        accept=".jpg,.jpeg,.png"
                    >

                    <?php if (!empty($user['avatar'])): ?>
                        <p>Current avatar:</p>
                        <img
                            class="current-avatar"
                            src="<?= base_url('uploads/avatars/' . $user['avatar']) ?>"
                            alt="Current avatar"
                        >
                    <?php endif; ?>
                <?php endif; ?>

                <br>

                <button type="submit">
                    <?= $mode === 'new' ? 'Save User' : 'Update User' ?>
                </button>

                <a href="<?= base_url('users') ?>">Cancel</a>
            </form>
        </main>

    <?php else: ?>

        <main class="card">
            <h2>User Accounts</h2>
            <p>List of registered system users.</p>

            <?php if (session()->getFlashdata('success')): ?>
                <p><?= esc(session()->getFlashdata('success')) ?></p>
            <?php endif; ?>

            <p>
                <a href="<?= base_url('users/new') ?>">Add New User</a>
            </p>

            <table>
                <thead>
                    <tr>
                        <th>Avatar</th>
                        <th>Username</th>
                        <th>Full Name</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td>
                                <img
                                    class="avatar"
                                    src="<?= !empty($user['avatar'])
                                        ? base_url('uploads/avatars/' . $user['avatar'])
                                        : base_url('favicon.ico') ?>"
                                    alt="User avatar"
                                >
                            </td>

                            <td><?= esc($user['username']) ?></td>
                            <td><?= esc($user['full_name']) ?></td>

                            <td>
                                <a href="<?= base_url('users/edit/' . $user['id']) ?>">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </main>

    <?php endif; ?>

    <footer>
        © GAPAY | IT0049 | TC36
    </footer>

</div>

</body>
</html>