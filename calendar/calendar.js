$(".calendar-cell .day-label").each(function () {
    if ($(this).is(":empty")) {
        $(this).parent().addClass("invalid-cell");
    }

})