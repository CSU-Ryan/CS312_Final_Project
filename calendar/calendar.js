import { Temporal } from 'https://cdn.jsdelivr.net/npm/@js-temporal/polyfill/+esm';

let month;

function initializeDate() {
    let date_string = $(this).attr("cell-date");

    console.log("Given date string: " + date_string);
    if (date_string) {
        let date = Temporal.PlainDate.from(date_string);
        $(this).find(".day-label").text(date.day);

        if (!month) month = date;
    } else {
        $(this).addClass("invalid-cell");
    }
}

function initializeMonthText() {
    let format = new Intl.DateTimeFormat(
        "en-US",
        { year: "numeric", month: "short" }
    );

    $("#prior-month").text(
        format.format(month.add({months: -1}))
    );

    $("#next-month").text(
        format.format(month.add({months: 1}))
    );

    $("#month-header").text(
        format.format(month)
    );
}


$(document).ready(function () {

    $(".calendar-cell").each(initializeDate);
    console.log("Recorded Month: " + month.toString());

    initializeMonthText();

    $("#prior-month").click(function () {
        window.location.href = "#?d=" + month.add({months: -1}).toString();
    })

    $("#next-month").click(function () {
        window.location.href = "#?d=" + month.add({months: 1}).toString();
    })

})
