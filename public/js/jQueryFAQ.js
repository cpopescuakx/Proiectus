$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var FAQId = 0;
     $('.like').click(function () {
        var FAQId = $(this).data('id');
        $.ajax({
        type: "POST",
        url: "/FAQ/"+FAQId+"/like",
        success: function () {
        $( "#like-" + FAQId).removeClass("text-secondary").addClass( "text-primary" ),
        $( "#dislike-" + FAQId).removeClass("text-primary").addClass( "text-secondary" );},
        error: function (xhr, status, error) {
            console.log(error);
        }
        }); 
    });
    $('.dislike').click(function () {
        var FAQId = $(this).data('id');
        $.ajax({
            type: "POST",
            url: "/FAQ/"+FAQId+"/dislike",
            success: function () {
            $( "#dislike-" + FAQId ).removeClass("text-secondary").addClass( "text-primary" )
            $( "#like-" + FAQId).removeClass("text-primary").addClass( "text-secondary" );},
            error: function (xhr, status, error) {
                console.log(error);
            }
        }); 
    });
});