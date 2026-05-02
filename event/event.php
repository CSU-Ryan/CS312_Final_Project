<?php
include '../database/db_retrieve_event.php';
?>

<section id="event-viewer">
    <?php
    if (!$success) {
        echo "<div class='error-message'>" . $message . "</div>";
    }
    ?>

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
</section>