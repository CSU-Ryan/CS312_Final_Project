<form action=".." method="POST">
    <div><label for="name">
        Event Name:
        <input type="text" name="name" required>
    </label></div>

    <div><label for="date">
        Date:
        <input type="date" name="date" required>
    </label></div>

    <div id="event-time">
        Event Time:
        <br>
        <label for="start-time">
            From:
            <input type="time" name="start-time" step="60" required>
        </label>
        <label for="end-time">
            To:
            <input type="time" name="end-time" step="60" required>
        </label>
    </div>

    <div><label for="location">
        Location (Optional):
        <input type="text" name="location">
    </label></div>

    <div><label for="description">
        Description (Optional):
        <textarea name="description"></textarea>
    </label></div>

    <div><button type="submit">Create New Event</button></div>
</form>