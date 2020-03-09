@extends('layouts.default')
@inject('city', 'App\Http\Controllers\CityController') {{-- Importa el controlador de ciutat --}}

@section('content')
<div class="col">
  <div class="row d-flex justify-content-end p-4">
    <a href="{{ route('professors.create') }}"><img src={{ asset('img/add.svg') }} width="45" height="45" ></a>
  </div>
</div>
<table class="table table-hover mr-5">
<thead>
    <tr>
        <td>Nom</td>
        <td>Cognom</td>
        <td>Usuari</td>
        <td>DNI</td>
        <td>Ciutat</td>
        <td>Email</td>
        <td>Estat</td>
        <td colspan="2">Accions</td>
    </tr>
</thead>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
@endif

<tbody>
    @foreach($professors as $professor)
    <tr>
        <td>{{$professor->firstname}}</td>
        <td>{{$professor->lastname}}</td>
        <td>{{$professor->name}}</td>
        <td>{{$professor->email}}</td>
        <td>{{$professor->dni}}</td>
        <td>{{$city::agafarNom($professor->id_city)}}</td>
        <td>{{$professor->status}}</td>
        <td>
            <a href="{{ route('professors.edit', [$professor->id]) }}"><img src={{ asset('img/edit.svg') }} width="20" height="20" class="mr-2"></a>
            @if($professor->status == "active")
                <a href="{{ route('professors.destroy', [$professor->id]) }}"><img src={{ asset('img/delete.svg') }} width="20" height="20"></a>
            @endif
        </td>
    </tr>
    @endforeach
</tbody>
</table>

<!-- Seccio JS prova -->
<h2 class="examplequerySelector">un Header</h2>
<p class="examplequerySelector">un Paragraf</p>
<ul id="myListBefore">
  <li>Cafe</li>
  <li>Te</li>
</ul>
<ul id="myListCloneNode"><li>Water</li><li>Milk</li></ul>
<p id="para1" style="font-family: cursive;
            background-color: lightblue;
            border-style:solid;
            border-width:2px;
            border-color:lightgray;">
            Hola soc un paragraf de prova, si vols pots copiar el meu estil pero no em copies el contingut >:(
            <br />
        </p>
        <p id="para2">
            No vull el teu contingut, tranquil :)
        </p>

<div id="TableContainer" class="table table-hover mt-5"></div>
<div id="NewTableContainer" class="table table-hover mt-5"></div>
<div class="container" onload="removeDiv()">
  <div class="removable">Div removible 1</div>
  <div class="removable">Div removible 2</div>
  <div class="removable">Div removible 3</div>
</div>


<button onclick="querySelectorProva()">QuerySelector</button>
<button onclick="querySelectorAllProva()">QuerySelectorAll</button>
<button onclick="createElementProva()">Crear Element</button>
<button onclick="insertBeforeProva()">Insert Before</button>
<button onclick="cloneNodeProva()">Clone Node</button>
<input type="button" onClick="JavaScript:stylePara(false);" value="Clone Style" />
<button onclick="removeDiv()">Eliminar Node</button>




<script>
function removeDiv() {
            var divMid = document.body.getElementsByClassName("removable")[0];
            divMid.parentNode.removeChild(divMid);
            // Remove the middle div
            // alert((document.body.getElementsByTagName("div")).length
            // + " divs left"); prints 2
            }
window.onload = function(){
           // Create the table elements
           var Table = document.createElement("table");
           Table.setAttribute("id","myTable"); // Create id
           var THead = document.createElement("thead");
           var TBody = document.createElement("tbody");
           var Row, Cell;
           var i, j;
           // Declare two-dimensional array of table data
           var header=new Array( "State","Capital","Abbr");
           var state =[ ["Arizona","Phoenix","AZ"],
                               ["California","Sacramento","CA"],
                               ["Maine","Augusta","ME"],
                               ["Montana","Helena","MT"],
                               ["New York","Albany","NY"]
                           ];
           // Insert the created elements into Table
           Table.appendChild(THead);
           Table.appendChild(TBody);
           // Insert a row into the header
           Row = document.createElement("tr");
           THead.appendChild(Row);
           // Create and insert table cells into the header row.
           for (i=0; i<header.length; i++){
               Cell = document.createElement("th");
               Cell.innerHTML = header[i];
               Row.appendChild(Cell);
           }
           // Insert rows and cells into bodies.
           for (i=0; i<state.length; i++){
               Row = document.createElement("tr");
               TBody.appendChild(Row);
               for (j=0; j<state[i].length; j++){
                   Cell = document.createElement("td");
                   Cell.innerHTML = state[i][j];
                   Row.appendChild(Cell);
               }
           }
           // Insert the table into the document tree
           Tcontainer=document.getElementById("TableContainer");
           Tcontainer.appendChild(Table);
           // Let's make a copy of the table
           var tableCopy = document.getElementById("myTable");
           var newTable = tableCopy.cloneNode(true);
           newTable.id = "newtable_id";
           newDiv = document.getElementById("NewTableContainer");
           newDiv.appendChild(newTable);
       }
function querySelectorProva() {
  document.querySelector(".examplequerySelector").style.backgroundColor = "red";
}
function querySelectorAllProva() {
  var x, i;
  x = document.querySelectorAll(".examplequerySelector");
  for (i = 0; i < x.length; i++) {
    x[i].style.backgroundColor = "blue";
  }
}
function createElementProva() {
  var btn = document.createElement("Button");
  document.body.appendChild(btn);
}
function insertBeforeProva() {
  var newItem = document.createElement("LI");
  var textnode = document.createTextNode("Aigua de la bona");
  newItem.appendChild(textnode);

  var list = document.getElementById("myListBefore");
  list.insertBefore(newItem, list.childNodes[0]);
}
function cloneNodeProva() {
  var itm = document.getElementById("myListCloneNode").lastChild;
  var cln = itm.cloneNode(true);
  document.getElementById("myListBefore").appendChild(cln);
}
function stylePara(mode){
  var p1 = document.getElementById("para1");
  var p2 = document.getElementById("para2");
  var p1Style=p1.getAttributeNode("style");
  var cloneP1Style=p1Style.cloneNode(mode);
  p2.setAttributeNode(cloneP1Style);
}
</script>
@endsection
