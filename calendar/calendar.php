<?php
    session_start();
    $_GET['d'] = $_GET['d'] ?? date('m-Y');
    $date = strtotime("{$_GET['d']}");

    if (!$date) {
        echo "ERROR: invalid date";
        die();
    }

    $first_day_index = date('w', strtotime("Y-m-01", $date));
    $days_in_month = intval(date('t', $date));

    if (!$first_day_index || !$days_in_month) {
        echo "ERROR: invalid date";
        die();
    }
?>

<section id='calendar'>
    <div id='calendar-header'>
        <div>
            <button id='prior-month' class='calendar-button'></button>
            <button id='next-month' class='calendar-button'></button>
        </div>

        <h2 id='month-header'></h2>

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
            for ($i = 0; $i < 5; $i++) {
                echo "<tr id='row-$i'>";
                for ($j = 0; $j < 7; $j++) {
                    $day_index = $i * 7 + $j + 1 - $first_day_index;
                    $in_range = ($day_index > 0) && ($day_index <= $days_in_month);
                    $cell_date = ($in_range) ? date("Y-m-$day_index", $date) : '';

                    echo "<td class='calendar-cell' id='calendar-$i-$j' cell_date='$cell_date'><div>" .
                        "<div class='day-label'></div>" .
                        "<div class='event-list'></div>" .
                        "</div></td>";
                }
                echo "</tr>";
            }
        ?>
    </table>
</section>

<script src="./calendar.js"></script>
