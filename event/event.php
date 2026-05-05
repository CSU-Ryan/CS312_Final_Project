<?php
include "../database/db_retrieve_event.php";
include "../database/db_delete_event.php"
?>

<section id="event-viewer">

    <div class='error-message'><?php echo $message; ?></div>

    <h2 id="event-name"><?php echo $name; ?></h2>

    <div id="event-details">
        <div id="event-date" class="event-detail">
            <em>Date:</em> <span><?php echo $date; ?></span>
        </div>

        <div id="event-time" class="event-detail">
            <em>Time:</em> <span><?php echo $start . ' - ' . $end; ?></span>
        </div>

        <div id="event-location" class="event-detail">
            <em>Location:</em> <span><?php echo $location ?? ''; ?></span>
        </div>

        <div id="event-description" class="event-detail">
            <em>Description:</em> <p><?php echo $description; ?></p>
        </div>
    </div>
    <form action="" method="POST" onsubmit="return confirmDelete();">
        <input type="hidden" name="delete_event" value="true">
        <button type="submit" value="Delete Event">Delete Event</button>
    </form>
</section>

<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this event? This cannot be undone!");
    }
</script>