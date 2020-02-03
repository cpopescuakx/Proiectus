<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Crear un nou projecte</h1>

<form action='{{ route('projects.store') }}' method='POST'>
    @csrf
        <tr><td>Nom del Projecte:</td><br>
          <td><input type="text" name="name"></td>
        </tr>
        <br>
        <tr><td>Pressupost:</td><br>
          <td><input type="text" name="pro_family"></td>
        </tr>
        <br>
        <tr><td>Descripció :</td><br>
          <td><input type="text" name="desc"></td>
        </tr>
        <br>
        <tr><td>Familia Professional:</td><br>
          <td><input type="text" name="budget"></td>
        </tr>
        <br>
        <input name='crear' value='Crear' type='submit'/>
    </form>
</body>
</html>