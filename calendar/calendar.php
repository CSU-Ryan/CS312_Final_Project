<section id='calendar'>
    <div id='calendar-header'>
        <div>
            <button id='prior-month' class='calendar-button'>Last Month Year</button>
            <button id='next-month' class='calendar-button'>Next Month Year</button>
        </div>

        <h2 id='month-header'>Month Year</h2>

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
                    echo "<td><div id='calendar-$i-$j' class='calendar-cell'></div></td>";
                }
                echo "</tr>";
            }
        ?>
    </table>
</section>