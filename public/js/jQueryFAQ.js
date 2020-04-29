$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var FAQId = 0;
     $('.like').click(function () {
        var FAQId = $(this).data('id');
        $( "#like" + FAQId).removeClass("text-secondary").addClass( "text-primary" );
        $.ajax({
        type: "POST",
        url: "/FAQ/"+FAQId+"/like",
        success: function () {},
        error: function (xhr, status, error) {
            console.log(error);
        }
        }); 
    });
    $('.dislike').click(function () {
        var FAQId = $(this).data('id');
        $( "#dislike" + FAQId ).removeClass("text-secondary").addClass( "text-primary" );
        $.ajax({
            type: "POST",
            url: "/FAQ/"+FAQId+"/dislike",
            success: function () {},
            error: function (xhr, status, error) {
                console.log(error);
            }
        }); 
    });
});