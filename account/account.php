<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$email_message = '';
$username_message = '';
$password_message = '';
$account_message = '';

include '../database/db_modify_account.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Your Account</title>
    <meta name="author" content="Ryan Grimm">
    <meta name="description" content="Page for modifying account details.">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
</head>

<body>

<?php include '../statics/navigation.php'; ?>

<section id="account-details">

    <div id="account-email" class="account-form">
        <h3>Change Email</h3>
        <form action='' method='POST' >
            <label for='email'>
                New Email:
                <input type="email" name='email' placeholder='New Email...' required>
            </label>

            <button type='submit' value='change_email'>Set New Email</button>
        </form>
        <div class="response">
            <p><?php echo $email_message; ?></p>
        </div>
    </div>

    <div id="account-username" class="account-form">
        <h3>Change Username</h3>
        <form action='' method='POST' >
            <label for='username'>
                New Username:
                <input type='text' name='username' placeholder='New Username...' required>
            </label>

            <button type='submit' value='change_username'>Set New Username</button>
        </form>
        <div class="response">
            <p><?php echo $username_message; ?></p>
        </div>
    </div>

    <div id="account-password" class='account-form'>
        <h3>Change Password</h3>
        <form action='' method='POST' >
            <label for='password'>
                New Password:
                <input type='password' name='password' placeholder='New Password...' required>
            </label>

            <button type='submit' value='change_password'>Set New Password</button>
        </form>
        <div class="response">
            <p><?php echo $password_message; ?></p>
        </div>
    </div>

    <script>
        function ConfirmDelete() {
            return confirm('Are you sure you want to delete your account? All events will be permantely destroyed!');
        }
    </script>
    <div id="account-delete" class="account-form">
        <h3>Delete Account</h3>
        <form action='' method='POST' onsubmit='return ConfirmDelete();' >
            <button type='submit' value='delete_account'>Delete Account</button>
        </form>
        <div class="response">
            <p><?php echo $account_message; ?></p>
        </div>
    </div>

</section>

</body>

</html>
