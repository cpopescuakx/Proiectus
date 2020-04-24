$(document).ready(function(){
    var divFotos = document.getElementById("fotosUsuaris");

    var url = "http://api.flickr.com/services/feeds/photos_public.gne?" +
              "id=187959345@N02&format=json&jsoncallback=?&tags=";

    $.getJSON(url, function(data){
        var html = "";
        $.each(data.items, function(i, item){
            html += "<div style='flex: auto; padding: 5px; text-align:center;'><img src=" + item.media.m + ">";
            html += "<p class='display-4'>" + item.title + "</p></div>";
        });
        $(divFotos).html(html);
    });          
});