function AJAXJSPur() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("info").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "http://proiectus.test:3000/prova.txt", true);
    xhttp.send();
  }

  function AJAXjQuery() {
    $(document).ready(function(){
        var info = document.getElementById("info");
          $.ajax({url: "http://proiectus.test:3000/prova.txt", success: function(result){
            $(info).html(result);
          }});
        
      });
  }

  function AJAXJSFetch() {

    var info = document.getElementById("info");

    fetch('http://proiectus.test:3000/prova.txt')
        .then(function(response) {
            return response.text()          
        })
        .then(function(text) {
            info.innerHTML = text;
          }); 
  }

