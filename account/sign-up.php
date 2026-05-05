<?php
    $message = '';
    include "../database/db_create_account.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign-Up Page</title>
    <meta name="author" content="Ryan Grimm">
    <meta name="description" content="Page for creating a calendar account.">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <section id="sign-up" class="form">
        <h2>Sign Up</h2>

        <form action="" method="post">

            <div class="field">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Email address..." required>
            </div>

            <div class="field">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Username..." required>
            </div>

            <div class="field">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password..." required>
            </div>

            <button type="submit" value="Sign Up">Sign Up</button>
        </form>

        <div class="message">
            <p><?php echo $message; ?></p>
        </div>

        <div class="switch-form">
            Already have an account? <a href="sign-in.php">Sign in here.</a>
        </div>
    </section>
</body>

</html>