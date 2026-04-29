function addDayLabel() {
    let date_string = $(this).attr("cell-date");

    if (date_string === '') {
        let date = new Date(date_string);
        $(this).find(".day-label").text(date.getDate());
    }
}

$(document).ready(function () {

    $(".calendar-cell").each(addDayLabel);

})
