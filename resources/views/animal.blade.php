<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  </head>
  <body>

    <div class="container">
        <table class="table table-hover">
          <thead class="table-inverse">
              <tr>
                <th>Id</th>
                <th>NAME</th>
                <th>TYPE</th>
                <th>PIC</th>
                <th>AGE</th>
              </tr>
          </thead>
          <tbody>
            @foreach($animals as $animal)
            <tr>
              <td>{{$animal->animal_id}}</td>
              <td>{{$animal->animal_name}}</td>
              <td>{{$animal->animal_type}}</td>
              <td>{{$animal->animal_picture}}</td>
              <td>{{$animal->animal_age}}</td>
              <td>
                <a href="/edit/{{ $animal->animal_id }}" class="btn btn-info btn-sm">Edit</a>
                <a href="/deleteAnimal/{{ $animal->animal_id }}" class="btn btn-danger btn-sm btn-delete">Delete</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="row text-center">
            <div class="col-md-6 offset-md-3">
              <a href="/add" class="btn btn-warning">Add Animal</a>
            </div>
        </div>
    </div>








    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>
