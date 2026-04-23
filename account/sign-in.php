<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign-In Page</title>
    <meta name="author" content="Ryan Grimm">
    <meta name="description" content="Page for logging in to your calendar account.">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <section id="sign-in" class="account-form">
        <form action="#" method="post">
            <h2>Sign In</h2>

            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Username" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Password" required>

            <button type="submit">Sign in</button>
        </form>

        <div>
            Don't have an account? <a href="sign-up.php">Sign up here.</a>
        </div>
    </section>
</body>

</html>