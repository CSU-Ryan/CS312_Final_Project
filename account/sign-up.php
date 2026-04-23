<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign-Up Page</title>
    <meta name="author" content="Ryan Grimm">
    <meta name="description" content="Page for creating a calendar account.">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="account.css">
</head>

<body>
    <section id="sign-up" class="account-form">
        <form action="#" method="post">
            <h2>Sign Up</h2>

            <div class="field">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Email address" required>
            </div>

            <div class="field">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Username" required>
            </div>

            <div class="field">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password" required>
            </div>

            <button type="submit">Sign Up</button>
        </form>

        <div class="switch-form">
            Already have an account? <a href="sign-in.php">Sign in here.</a>
        </div>
    </section>
</body>

</html>