
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<style>

.table-inverse{
  background-color: #E6E6E6;
  color: #585858;
}
.con{
width: 1600px;
}
.t{
  font-size: 19px;
}
.t2{
  font-size: 15px;
}
.a{
  color:  #6E6E6E  ;
}

</style>




  </head>

  <body>


    <div class="container ">


      <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
        <a class="navbar-brand t" href="/all">Animal-AID</a>
      <a class="navbar-brand t " href="/admin"> &nbsp;&nbsp;   การจัดการ &nbsp;&nbsp; </a>

      <li class="dropdown navbar-brand  " style="alight=right " >
          <a href="#"  class="dropdown-toggle a t " data-toggle="dropdown" role="button" aria-expanded="false">
              {{ Auth::user()->name }}
          </a>

                  <ul class="dropdown-menu t" role="menu">
                            <li>
                              <a  class="t" href="../adminProfile"> โปรไฟล์ &nbsp;&nbsp; </a>
                            </li>
                                <li>
                                    <a class = "t" href="{{ route('logout') }}"
                                      onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                                        Logout
                                      </a>

                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                      </form>
                                    </li>
                  </ul>
      </li>

      </nav>


        <div class="row">
            <div class="col-md-6 offset-md-3 con">
                <h1 class="display-4" style="text-align:center; color:#424242; ">เพิ่มข่าว</h1>
                <form action="/addNews" class="form" method="post" enctype="multipart/form-data">
                    {{ Form::token() }}

                    <div class="form-group">
                        <label for="head_News" class="form-label h4">หัวข่าว</label>
                        <input type="text" class="form-control" name="head_News"/>
                    </div>



                    <div class="radio form-group" id="news_type">
                      <label for="news_type" class="form-label h3">ประเภทข่าว</label><br>

                        &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;<label class="t2"><input  type="radio" value="1" name="news_type">ข่าวด่วน</label>  &nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;<label class="t2"><input type="radio" value="2" name="news_type" required >ข่าวปกติ</label>
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
        <div class="row ">
            <div class="col-md-12 offset-0">
              <table class="table">
                <thead class="table-inverse">
                  <tr>
                    <th style="font-size:18px;background-color:#999999; color:white;">รหัส</th>
                    <th style="font-size:18px;background-color: #8c8c8c; color:white;">หัวข่าว</th>
                    <th style="font-size:18px;background-color:#808080; color:white;">เนื้อหาข่าว</th>
                    <th style="font-size:18px;background-color:#737373 ;color:white;">ประเภท</th>
                    <th style="font-size:17px;background-color:#666666;color:white;">สร้างเมื่อ</th>
                    <th style="font-size:18px;background-color:#595959;color:white;">ลบ</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($news as $new)

                      @if( $new->admin_id == $adminId)
                  <tr>
                    <td style="font-size:18px;">{{$new->news_id}}</td>

                    <td style="font-size:18px;">{{$new->head_News}}</td>
                    <td style="font-size:18px;">{{$new->content}}</td>

                 @if($new->news_type==1)
                   <td style="font-size:18px;">ข่าวด่วน</td>
                 @else
                   <td style="font-size:18px;">ข่าวปกติ</td>
                 @endif
                    <td style="font-size:18px;">{{$new->created_at}}</td>

                    <td > <a style="font-size:18px;" href="/deleteNews/{{$new->news_id}}" class="btn btn-danger btn-sm" onclick="return confirm('Please confirm again !!!') ">ลบ </a></td>

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
