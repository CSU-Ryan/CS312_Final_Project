function make_event(event_data) {
    let event = document.createElement("div");

    event.className = "calendar-event";
    event.setAttribute("event-id", event_data.event_id);

    event.innerHTML = `<strong>${event_data.name}</strong> <br> <em>${event_data.start} - ${event_data.end}</em>`;

    return event;
}

function calendar_events(response) {
    if (!response.success) {
        console.log("Failed to retrieve events.");
        return;
    }
    console.log("Retrieving events...");

    $.each(response.events, function (i, event_data) {
        let event = make_event(event_data);

        $(`.calendar-cell[cell-date="${event_data.date}"]`)
            .find(".event-list")
            .append(event);
    })
}

function click_event() {
    let event_id = $(this).attr("event-id");

    window.location.href = `../event?event_id=${event_id}`;
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

    $(".calendar-event").click(click_event);
})

