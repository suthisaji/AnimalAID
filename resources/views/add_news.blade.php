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
<a href="admin">back</a>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1 style="text-align:center">Add News</h1>
                <form action="/addNews" class="form" method="post" enctype="multipart/form-data">
                    {{ Form::token() }}

                    <div class="form-group">
                        <label for="head_News" class="form-label">head_News</label>
                        <input type="text" class="form-control" name="head_News"/>
                    </div>

                    <div class="form-group">
                        <label for="news_type" class="form-label">news_type</label>
                        <input type="text" class="form-control" name="news_type"/>
                    </div>



                    <div class="form-group">
                        <label for="content" class="form-label">content</label>
                        <input type="text" class="form-control" name="content"/>
                    </div>



                    <div class="text-center">
                        <button class="btn btn-success">Add News</button>
                    </div>

                </form>

            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12 offset-0">
              <table class="table">
                <thead class="table-inverse">
                  <tr>
                    <th>new ID</th>
                    <th>Admin ID</th>
                    <th>head_News</th>
                    <th>content</th>
                    <th>news_type</th>
                    <th>created_at</th>
                    <th>updated_at</th>
                      <th>delete news</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($news as $new)
                  <tr>
                    <td>{{$new->news_id}}</td>
                    <td>{{$new->admin_id}}</td>
                    <td>{{$new->head_News}}</td>
                    <td>{{$new->content}}</td>
                    <td>{{$new->news_type}}</td>
                    <td>{{$new->created_at}}</td>
                    <td>{{$new->updated_at}}</td>
                    <td> <a href="/deleteNews/{{$new->news_id}}" class="btn btn-danger btn-sm" onclick="return confirm('Please confirm again !!!') ">Delete </a></td>

                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
        </div>
    </div>


    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>
