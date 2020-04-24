$('#notificationDropdown').click(function () {
    var loading = '<div class="spinner-border m-5 text-secondary" role="status">' +
        '<span class="sr-only">Loading...</span>' +
        '</div>';
    var errorTxt = '<div class="alert alert-danger" role="alert">' +
        "Error: No s'han pogut obtenir les notificacions" +
        '</div>';

    $.ajax({
        method: "get",
        url: "/notificacions",
        beforeSend: function() {
            $('#notificationContent').html(loading);
        },
        timeout: 10000,
        error: function(xhr, status, error) {
            $('#notificationContent').html(errorTxt);
        },
        dataType: "json",
        success: function(data) {
            alert("HOLA");
            $("#dades tbody").html("");
            var dades = "";
            $.each(data, function() {
                $.each(this, function(key, value) {
                    dades += "<tr>" +
                        "<td>" + value.name + "</td>" +
                        "<td>" + value.description + "</td>" +
                        "<td>" + value.professional_family + "</td>"+
                        "<td>" + value.budget + "</td>"+
                        "<td>" + value.created_at + "</td>"+
                        "</tr>";
                });
            });
            $("#dades tbody").append(dades);
        }
    });
});
@if(auth()->user()->notifications->count() == 0)
<div class="dropdown-item">No tens cap notificació</div>
@else
<a class="dropdown-item" href="{{route ('markAllRead')}}">Marca totes com a llegides</a>
<div class="dropdown-divider"></div>
@foreach(auth()->user()->unReadNotifications as $notification)
<li style="background-color: #e4eef0"><a class="dropdown-item" href="#">{!! $notification->data['data'] !!}</a></li>
@endforeach

@foreach(auth()->user()->readNotifications as $notification)
<a class="dropdown-item" href="#">{!! $notification->data['data'] !!}</a>
@endforeach
@endif
