import { Temporal } from 'https://cdn.jsdelivr.net/npm/@js-temporal/polyfill/+esm';

function initializeDate() {
    let date_string = $(this).attr("cell-date");

    if (date_string) {
        console.log("Given date string: " + date_string);
        let date = Temporal.PlainDate.from(date_string);
        $(this).find(".day-label").text(date.day);
    } else {
        $(this).addClass("invalid-cell");
    }
}


$(document).ready(function () {

    $(".calendar-cell").each(initializeDate);

})
