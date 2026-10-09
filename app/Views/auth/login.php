<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | POS System</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #fff7fb;
            color: #4f3c4c;
        }

        .login-container {
            width: min(420px, 90%);
            margin: 90px auto;
            padding: 30px;
            background: white;
            border-radius: 18px;
            box-shadow: 0 8px 18px rgba(120, 100, 140, 0.15);
        }

        h1 {
            color: #65456d;
            text-align: center;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 11px;
            border: 1px solid #d9c9df;
            border-radius: 8px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            margin-top: 22px;
            padding: 12px;
            border: 0;
            border-radius: 20px;
            background: #c7d2fe;
            color: #4c4674;
            font-weight: bold;
            cursor: pointer;
        }

        .error {
            color: #b42318;
            background: #ffe4e6;
            padding: 10px;
            border-radius: 8px;
        }

        .success {
            color: #166534;
            background: #dcfce7;
            padding: 10px;
            border-radius: 8px;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h1>POS System Login</h1>

    <?php if (session()->getFlashdata('success')): ?>
        <p class="success">
            <?= esc(session()->getFlashdata('success')) ?>
        </p>
    <?php endif; ?>

    <?php if (!empty($errors)): ?>
        <div class="error">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('login') ?>">
        <?= csrf_field() ?>

        <label for="username">Username</label>
        <input
            type="text"
            id="username"
            name="username"
            value="<?= esc(old('username')) ?>"
        >

        <label for="password">Password</label>
        <input
            type="password"
            id="password"
            name="password"
        >

        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>