<?php
$date = $_GET['date'] ?? date('Y-m-d');
?>

<section id="agenda">
    <h1>Agenda</h1>

    <div id="agenda-column"></div>
</section>

<?php
echo "<link rel='preload' href='../database/db_retrieve_future_events.php?d=$date' as='script'>";
?>
<script type="module" src="agenda.js"></script>
