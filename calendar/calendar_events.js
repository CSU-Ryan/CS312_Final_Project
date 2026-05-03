function make_event(event_data) {
    let event = document.createElement("div");

    event.id = "event-" + event_data.event_id;
    event.className = "calendar-event";

    event.textContent = `<em>${event.name}</em> ${event.start} - ${event.end}`;

    return event;
}

function calendar_events(response) {
    if (!response.success) {
        console.log("Failed to retrieve events.");
        return;
    }

    for (let i = 0; response.i; i++) {
        let event_data = response.i;
        let event = make_event(event_data);

        $(`.calendar-cell[cell-date="${event.date}"]`)
            .find(".event-list")
            .append(event);
    }
}

$(document).ready(function () {
    $.getJSON("../database/db_retrieve_month_events.php?d=?", calendar_events);
})

