import { Temporal } from 'https://cdn.jsdelivr.net/npm/@js-temporal/polyfill/+esm';

function toDateString(temporal) {
    return `${temporal.year}-${temporal.month}-${temporal.day}`;
}

function create_header(day) {
    let header = document.createElement("div");

    header.classList.add('agenda-header');
    header.setAttribute('date', toDateString(day));

    header.innerHTML = day.toLocaleString("en-US",
        {
            weekday: "long",
            year: "numeric",
            month: "long",
            day: "numeric"
        }
    );

    return header;
}

function create_event(event_data) {
    let event = document.createElement("div");

    event.classList.add('agenda-event');
    event.setAttribute('event-id', event_data.event_id);

    event.innerHTML = `<strong>${event_data.name}</strong> <br> 
                       <em>${event_data.start} - ${event_data.end}</em>`;

    return event;
}

function fill_agenda(events) {
    let agenda = $("#agenda-column");

    let current_day;
    $.each(events, function (key, event_data) {
        if (event_data.date !== current_day) {
            let date = Temporal.from(event_data.date);
            agenda.appendChild(create_header(date));
        }

        agenda.appendChild(create_event(event_data));
    })
}

function receive_json(response) {
    if (!response.success) {
        console.log("Failed to retrieve events.");
        return;
    }

    fill_agenda(response.events);
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

    const queryURL = `../database/db_retrieve_future_events.php?d=${date}`;
    console.log("Querying: " + queryURL);
    $.getJSON(queryURL, receive_json);
})
