<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<style>
.container {
width: 1600px;
}
.table-inverse{
  background-color: #E6E6E6;
  color: #585858;
}
</style>




  </head>

  <body>
<a href="admin">back</a>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1 class="display-4" style="text-align:center; color:#424242; ">เพิ่มข่าว</h1>
                <form action="/addNews" class="form" method="post" enctype="multipart/form-data">
                    {{ Form::token() }}

                    <div class="form-group">
                        <label for="head_News" class="form-label h4">หัวข่าว</label>
                        <input type="text" class="form-control" name="head_News"/>
                    </div>



                    <div class="radio form-group" id="news_type">
                      <label for="news_type" class="form-label h4">ประเภทข่าว</label><br>

                        &nbsp;&nbsp;&nbsp;<label><input type="radio" value="1" name="news_type">ข่าวด่วน</label>  &nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;<label><input type="radio" value="2" name="news_type" required >ข่าวปกติ</label>
                    </div>



                    <div class="form-group">
                         <label for="content" class=" h4">เนื้อหาข่าว</label>
                         <textarea class="form-control" name="content" id="content" rows="2"></textarea>
                   </div>



                    <div class="text-center">
                        <button class="btn btn-success">เพิ่มข่าว</button>
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
                    <th>รหัส</th>
                    <th>หัวข่าว</th>
                    <th>เนื้อหาข่าว</th>
                    <th>ประเภท</th>
                    <th>สร้างเมื่อ</th>
                    <th>ลบ</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($news as $new)

                      @if( $new->admin_id == $adminId)
                  <tr>
                    <td>{{$new->news_id}}</td>

                    <td>{{$new->head_News}}</td>
                    <td>{{$new->content}}</td>

                 @if($new->news_type==1)
                   <td>ข่าวด่วน</td>
                 @else
                   <td>ข่าวปกติ</td>
                 @endif
                    <td>{{$new->created_at}}</td>

                    <td> <a href="/deleteNews/{{$new->news_id}}" class="btn btn-danger btn-sm" onclick="return confirm('Please confirm again !!!') ">ลบ </a></td>

                  </tr>
                          @endif
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
