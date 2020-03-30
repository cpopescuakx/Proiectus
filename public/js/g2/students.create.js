$(document).ready(function() {
    $('.datepicker').datepicker({
        language: 'ca',
        maxViewMode: 2,
        format: "yyyy-mm-dd",
        clearBtn: true,
        autoclose: true,
        todayHighlight: true,
        daysOfWeekHighlighted: "0,6"
    });
});
