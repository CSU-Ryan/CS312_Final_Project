<?php
include '../statics/account_logic.php';

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

    <div id="account-email" class="form">
        <h3>Change Email</h3>

        <form action='' method='POST' >

            <div class="field">
                <label for='email'>New Email:</label>
                <input type="email" id="email" name='email' placeholder='New Email...' required>
            </div>

            <input type="hidden" name="change_email" value="true">
            <button type='submit' value='Set New Email'>Set New Email</button>
        </form>

        <div class="message">
            <p><?php echo $email_message; ?></p>
        </div>
    </div>

    <div id="account-username" class="form">
        <h3>Change Username</h3>

        <form action='' method='POST' >

            <div class="field">
                <label for='username'>New Username:</label>
                <input type='text' id="username" name='username' placeholder='New Username...' required>
            </div>

            <input type="hidden" name="change_username" value="true">
            <button type='submit' value='Set New Username'>Set New Username</button>
        </form>

        <div class="message">
            <p><?php echo $username_message; ?></p>
        </div>
    </div>

    <div id="account-password" class='form'>
        <h3>Change Password</h3>

        <form action='' method='POST' >

            <div class="field">
                <label for='password'>New Password:</label>
                <input type='password' id="password" name='password' placeholder='New Password...' required>
            </div>

            <input type="hidden" name="change_password" value="true">
            <button type='submit' value='Set New Password'>Set New Password</button>
        </form>

        <div class="response">
            <p><?php echo $password_message; ?></p>
        </div>
    </div>

    <div id="account-delete" class="form">
        <h3>Delete Account</h3>

        <form action='' method='POST' onsubmit='return ConfirmDelete();' >

            <input type="hidden" name="delete_account" value="true">
            <button type='submit' value='Delete Account'>Delete Account</button>
        </form>

        <div class="message">
            <p><?php echo $account_message; ?></p>
        </div>
    </div>

</section>

</body>

</html>

<script>
    function ConfirmDelete() {
        return confirm('Are you sure you want to delete your account? All events will be permantely destroyed!');
    }
</script>
