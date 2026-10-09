<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>
        <?= $mode === 'new' ? 'Add Customer' : ($mode === 'edit' ? 'Edit Customer' : 'Customer Accounts') ?>
    </title>
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

    <?php if ($mode === 'new' || $mode === 'edit'): ?>

        <section class="card">
            <h1><?= $mode === 'new' ? 'Add New Customer' : 'Edit Customer' ?></h1>

            <?php if (!empty($errors)): ?>
                <div>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form method="post"
                  action="<?= $mode === 'new'
                      ? base_url('customers/create')
                      : base_url('customers/update/' . $customer['id']) ?>">

                <?= csrf_field() ?>

                <label for="full_name">Full Name</label>
                <input
                    type="text"
                    id="full_name"
                    name="full_name"
                    value="<?= esc(old('full_name', $customer['full_name'] ?? '')) ?>"
                >

                <label for="email">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="<?= esc(old('email', $customer['email'] ?? '')) ?>"
                >

                <label for="phone">Phone</label>
                <input
                    type="text"
                    id="phone"
                    name="phone"
                    value="<?= esc(old('phone', $customer['phone'] ?? '')) ?>"
                >

                <button type="submit">
                    <?= $mode === 'new' ? 'Save Customer' : 'Update Customer' ?>
                </button>

                <a href="<?= base_url('customers') ?>">Cancel</a>
            </form>
        </section>

    <?php else: ?>

        <section class="card">
            <h1>Customer Accounts</h1>
            <p>List of registered customers.</p>

            <?php if (session()->getFlashdata('success')): ?>
                <p><?= esc(session()->getFlashdata('success')) ?></p>
            <?php endif; ?>

            <p>
                <a href="<?= base_url('customers/new') ?>">Add New Customer</a>
            </p>

            <table>
                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>

                <?php foreach ($customers as $customer): ?>
                    <tr>
                        <td><?= esc($customer['full_name']) ?></td>
                        <td><?= esc($customer['email']) ?></td>
                        <td><?= esc($customer['phone']) ?></td>
                        <td>
                            <a href="<?= base_url('customers/edit/' . $customer['id']) ?>">
                                Edit
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </section>

    <?php endif; ?>

</main>

<footer>
    <p>© GAPAY | IT0049 | TC36</p>
</footer>

</body>
</html>