import { Temporal } from 'https://cdn.jsdelivr.net/npm/@js-temporal/polyfill/+esm';

let month;

function initializeDate() {
    let date_string = $(this).attr("cell-date");

    console.log("Given date string: " + date_string);
    if (date_string) {
        let date = Temporal.PlainDate.from(date_string);
        $(this).find(".day-label").text(date.day);

        if (!month) month = date.toPlainYearMonth();
    } else {
        $(this).addClass("invalid-cell");
    }
}

function initializeButtonText() {
    $("#prior-month").text(
        month.add({months: -1})
            .toLocaleString("en-US", { dateStyle: "full" })
    );

    $("#next-month").text(
        month.add({months: 1})
            .toLocaleString("en-US", { dateStyle: "full" })
    );
}


$(document).ready(function () {

    $(".calendar-cell").each(initializeDate);
    console.log(month);

    initializeButtonText();

    $("#prior-month").click(function () {
        window.location.href = "#?d=" + month.add({months: -1});
    })

    $("#next-month").click(function () {
        window.location.href = "#?d=" + month.add({months: 1});
    })

})
