import { Temporal } from 'https://cdn.jsdelivr.net/npm/@js-temporal/polyfill/+esm';

let month;

function initializeMonth() {
    let month_string = $('.calendar-cell[cell-date]').attr("cell-date");
    month = Temporal.PlainDate.from(month_string);
}

function initializeDayLabel() {
    let date_string = $(this).attr("cell-date");
    let date = Temporal.PlainDate.from(date_string);

    $(this).find(".day-label").text(date.day);
}

function initializeMonthText() {
    $("#prior-month").text(
        month
            .add({months: -1})
            .toLocaleString(
                "en-US",
                { year: "numeric", month: "short" }
            )
    );

    $("#next-month").text(
        month
            .add({months: 1})
            .toLocaleString(
                "en-US",
                { year: "numeric", month: "short" }
            )
    );

    $("#month-header").text(
        month
            .add({months: 0})
            .toLocaleString(
                "en-US",
                { year: "numeric", month: "short" }
            )
    );
}

$(document).ready(function () {
    initializeMonth();

    $('.calendar-cell[cell-date]').each(initializeDayLabel);

    initializeMonthText();

    $("#prior-month").click(function () {
        window.location.href = "?d=" + month.add({months: -1}).toString();
    })

    $("#next-month").click(function () {
        window.location.href = "?d=" + month.add({months: 1}).toString();
    })

    $("#new-event").click(function () {
        window.location.href = "../creator";
    })

    $(".event-list").click(function(e) {
        const event = e.target.closest(".calendar-event");
        if (event) {
            window.location.href = `../event/?event_id=${$(event).attr("event-id")}`;
        }
    });

})
