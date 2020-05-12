/**
 * Intento de opbtenir les notificacions via AJAX
 *
 * -------NO S'UTILITZA--------
 */
/**
$('#notificationDropdown').click(function () {
    let loading = '<div class="spinner-border m-5 text-secondary" role="status">' +
        '<span class="sr-only">Loading...</span>' +
        '</div>';
    let errorTxt = '<div class="alert alert-danger" role="alert">' +
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
            $("notificationContent").html("");
            var notificacions = "<a class='dropdown-item' href='{{route ('markAllRead')}}'>Marca totes com a llegides</a>" +
                '<div class="dropdown-divider"></div>';
            $.each(data, function() {
                $.each(this, function(key, value) {
                    notificacions = "<li style='background-color: #e4eef0'><a class='dropdown-item' href='#'>{!! $notification->data['data'] !!}</a></li>";
                });
            });
            $("notificationContent").append(dades);
        }
    });
});
$('#notificationMarkAllRead').click(function(){
    $.ajax(
        {
            method: "get",
            url: "/markAsRead",
            beforeSend: function() {
                let loading = '<div class="spinner-border" role="status">' +
                    '<span class="sr-only">Loading...</span>' +
                    '</div>';
                $('#notificationMarkAllRead').append(loading);
            }
        }
    )
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
*/
