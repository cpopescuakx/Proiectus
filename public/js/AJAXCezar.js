function AJAXJSPur() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("main").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "http://proiectus.test/ajaxcezar.txt", true);
    xhttp.send();
  }

  function AJAXjQuery() {
    $(document).ready(function(){
        var main = document.getElementById("main");
          $.ajax({url: "http://proiectus.test/ajaxcezar.txt", success: function(result){
            $(main).html(result);
          }});

      });
  }

  function AJAXJSFetch() {

    var main = document.getElementById("main");

    fetch('http://proiectus.test/ajaxcezar.txt')
        .then(function(response) {
            return response.text()
        })
        .then(function(text) {
            main.innerHTML = text;
          });
  }
