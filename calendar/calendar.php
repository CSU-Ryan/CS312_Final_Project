<section id='calendar'>
    <table>
        <tr id='week-days'>
            <th id='sunday'>Sunday</th>
            <th id='monday'>Monday</th>
            <th id='tuesday'>Tuesday</th>
            <th id='wednesday'>Wednesday</th>
            <th id='thursday'>Thursday</th>
            <th id='friday'>Friday</th>
            <th id='saturday'>Saturday</th>
        </tr>
        <?php
            for ($i = 0; $i < 5; $i++) {
                echo "<tr id='row-{$i}'>";
                for ($j = 0; $j < 7; $j++) {
                    echo "<td id='calendar-{$i}-{$j}'></td>";
                };
                echo "</tr>";
            };
        ?>
    </table>
</section>