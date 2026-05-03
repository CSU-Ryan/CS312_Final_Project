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
    console.log("Retrieving events...");

    for (let i = 0; response.i; i++) {
        let event_data = response.i;
        let event = make_event(event_data);

        $(`.calendar-cell[cell-date="${event.date}"]`)
            .find(".event-list")
            .append(event);
    }
}

$(document).ready(function () {
    let params = new Proxy(new URLSearchParams(window.location.search), {
        get: (searchParams, prop) => searchParams.get(prop),
    });

    let date;
    if (params.d) {
        date = params.d;
    } else {
        const today = new Date();
        date = `${today.getFullYear()}-${today.getMonth() + 1}-${today.getDate()}`;
    }

    const queryUrl = `../database/db_retrieve_month_events.php?d=${date}`;
    console.log("Querying: " + queryUrl);
    $.getJSON(queryUrl, calendar_events);
})

