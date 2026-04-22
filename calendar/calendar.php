<section id="calendar">
    <table>
        <tr id="week-days">
            <th id="Sunday">Sunday</th>
            <th id="Monday">Monday</th>
            <th id="Tuesday">Tuesday</th>
            <th id="Wednesday">Wednesday</th>
            <th id="Thursday">Thursday</th>
            <th id="Friday">Friday</th>
            <th id="Saturday">Saturday</th>
        </tr>
        <?php
            for ($i = 0; $i < 5; $i++) {
                echo '<tr id="row{$i}">';
                for ($j = 0; $j < 7; $j++) {
                    echo '<td id="calendar-{$i}-{$j}"></td>';
                };
                echo '</tr>';
            };
        ?>
    </table>
</section>