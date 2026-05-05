<?php
    $message = '';
    include 'parse_form.php';
?>

<section class="form">
    <h2>New Event</h2>

    <form method="POST">

        <div class="field">
            <label for="name">Event Name:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div class="field">
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>
        </div>

        <div class="field" id="event-time">
            Event Time: <br>

            <label for="start-time">From:</label>
            <input type="time" id="start-time" name="start-time" step="60" required>

            <label for="end-time">To:</label>
            <input type="time" id="end-time" name="end-time" step="60" required>
        </div>

        <div class="field">
            <label for="location">Location (Optional):</label>
            <input type="text" id="location" name="location">
        </div>

        <div class="field">
            <label for="description">Description (Optional):</label>
            <br>
            <textarea id="description" name="description"></textarea>
        </div>

        <div class="message">
            <p><?php echo $message; ?></p>
        </div>

        <button type="submit">Create New Event</button>
    </form>
</section>