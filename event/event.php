<?php
include '../database/db_retrieve_event.php';
?>

<section id="event-viewer">
    <?php
    if (!$success) {
        echo "<div class='error-message'>" . $message . "</div>";
        die();
    }
    ?>

    <h2 id="event-name"><?php echo $name; ?></h2>

    <div id="event-details">
        <div id="event-date">
            Date: <span><?php echo $date; ?></span>
        </div>

        <div id="event-time">
            Time: <span><?php echo $start . ' - ' . $end; ?></span>
        </div>

        <div id="event-location">
            Location: <span><?php echo $location ?? ''; ?></span>
        </div>

        <div id="event-description">
            Description: <p><?php echo $description; ?></p>
        </div>
    </div>
</section>