<?php
    function pad($str, $len): string
    {
        return str_pad($str, $len, "0", STR_PAD_LEFT);
    }

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $_GET['d'] = $_GET['d'] ?? date('Y-m-d');
    $date = strtotime("{$_GET['d']}");

    if (!$date) {
        $_GET['d'] = date('Y-m-d');
        $date = strtotime("{$_GET['d']}");
    }

    $first_day_index = intval(date('w', strtotime(date("Y-m-01", $date))));
    $days_in_month = intval(date('t', $date));

    $row_count = ceil(($days_in_month + $first_day_index) / 7);
?>

<section id='calendar'>
    <div id='calendar-header'>
        <div>
            <button id='prior-month' class='calendar-button'></button>
            <button id='next-month' class='calendar-button'></button>
        </div>

        <h2 id='month-header'></h2>

        <div>
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
            for ($i = 0; $i < $row_count; $i++) {
                echo "<tr id='row-$i'>";
                for ($j = 0; $j < 7; $j++) {
                    $day_index = pad($i * 7 + $j + 1 - $first_day_index,2);
                    $in_range = ($day_index > 0) && ($day_index <= $days_in_month);
                    $cell_date_attr = ($in_range) ? 'cell-date='.date("Y-m-$day_index", $date) : '';

                    echo "<td class='calendar-cell' id='calendar-$i-$j' $cell_date_attr><div>" .
                        "<div class='day-label'></div>" .
                        "<div class='event-list'></div>" .
                        "</div></td>";
                }
                echo "</tr>";
            }
        ?>
    </table>
</section>

<script type="module" src="calendar.js"></script>
