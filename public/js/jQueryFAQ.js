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
        success: function () {},
        error: function (xhr, status, error) {
            alert(error.responseTextss);
        }
        }); 
    });
    $('.dislike').click(function () {
        var FAQId = $(this).data('id');
        $.ajax({
            type: "POST",
            url: "/FAQ/"+FAQId+"/dislike",
            success: function () {},
            error: function (xhr, status, error) {
                alert(error.responseTextss);
            }
        }); 
    });
});