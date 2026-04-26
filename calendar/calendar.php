<?php
    session_start();
    $_GET['d'] = $_GET['d'] ?? date('m-d-Y');
    $date = strtotime($_GET['d']);

    $first_day_index = date('w', strtotime("Y-m-01", $date));
?>

<section id='calendar'>
    <div id='calendar-header'>
        <div>
            <button id='prior-month' class='calendar-button'>
                <?php echo date('M Y', strtotime("last month", $date)); ?>
            </button>
            <button id='next-month' class='calendar-button'>
                <?php echo date('M Y', strtotime("next month", $date)); ?>
            </button>
        </div>

        <h2 id='month-header'>
            <?php echo date('M Y'); ?>
        </h2>

        <div id='create-event'>
            <button id='new-event' class='calendar-button'>Create New Event</button>
        </div>
    </div>

    <table>
        <tr id='week-days'>
            <th><div id='sun' class='calendar-header'>Sunday</div></th>
            <th><div id='mon' class='calendar-header'>Monday</div></th>
            <th><div id='tues' class='calendar-header'>Tuesday</div></th>
            <th><div id='wed' class='calendar-header'>Wednesday</div></th>
            <th><div id='thurs' class='calendar-header'>Thursday</div></th>
            <th><div id='fri' class='calendar-header'>Friday</div></th>
            <th><div id='sat' class='calendar-header'>Saturday</div></th>
        </tr>
        <?php
            $started_counting = false;
            $day_index = $first_day_index;
            for ($i = 0; $i < 5; $i++) {
                echo "<tr id='row-$i'>";
                for ($j = 0; $j < 7; $j++) {
                    if ($day_index == $j) { $started_counting = true; }
                    echo "<td><div id='calendar-$i-$j' class='calendar-cell'>" .
                        "<div class='day-label'>" . ($day_index + 1 ? $started_counting : '') . "</div>" .
                        "</div></td>";
                }
                echo "</tr>";
            }
        ?>
    </table>
</section>

