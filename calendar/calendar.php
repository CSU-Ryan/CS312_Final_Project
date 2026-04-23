<section id='calendar'>
    <table>
        <tr id='week-days'>
            <th>Sunday</th>
            <th>Monday</th>
            <th>Tuesday</th>
            <th>Wednesday</th>
            <th>Thursday</th>
            <th>Friday</th>
            <th>Saturday</th>
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