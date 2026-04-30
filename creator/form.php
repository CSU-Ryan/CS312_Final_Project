<form action=".." method="POST">
    <div><label for="name">
        Event Name:
        <input type="text" name="name" placeholder="..." required>
    </label></div>

    <div><label for="date">
        Date:
        <input type="date" name="date" placeholder="_/_/_" required>
    </label></div>

    <div id="event-time">
        Event Time:
        <br>
        <label for="start-time">
            From:
            <input type="time" name="start-time" placeholder="__:__" required>
        </label>
        <label for="end-time">
            To:
            <input type="time" name="end-time" placeholder="__:__" required>
        </label>
    </div>

    <div><label for="location">
        Location (Optional):
        <input type="text" name="location" placeholder="...">
    </label></div>

    <div><label for="description">
        Description (Optional):
        <textarea name="description" placeholder="..."></textarea>
    </label></div>

    <div><button type="submit">Create New Event</button></div>
</form>