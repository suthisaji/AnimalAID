<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
 <style>
     .k{
       border-width: inherit;
     }
     .table-inverse{
       background-color: #D8D8D8;
       color: #424242;
     }
 </style>
  </head>






<br>
<br>
<br>



    <div class="container">
      <div class="row text-center">
          <div class="col-md-6 offset-md-3">
            <a href="/add" class="btn btn-warning">เพิ่มสัตว์</a>
          </div>
      </div>
      <div style="color:#566D7E;font-size:20px">
      @foreach($admins as $ad)
          @if( $ad->admin_id == $adminId)
            {{$ad->join_Hospital->hospital_name}}
          @endif
      @endforeach
    </div>
        <table class="table table-hover">
          <thead class="table-inverse">
              <tr>
                <th>รหัส</th>
                <th>ชื่อ</th>
                <th>ประเภท</th>
                <th>รูปภาพ</th>
                <th>สถานะ</th>
                    <th>การดำเนินการ</th>
              </tr>
          </thead>
          <tbody>
            @foreach($animals as $animal)
              @if( $animal->admin_id == $adminId)
            <tr>
              <td>{{$animal->animal_id}}</td>
              <td>{{$animal->animal_name}}</td>
              <td>{{$animal->join_donationType->do_typeName}}</td>
              <td><img  src="{{url('/images/'.$animal->animal_picture)}}" alt="" width="50" height="50"> &nbsp;<small>{{$animal->animal_picture}}</small>   <br></td>

              <td>{{$animal->statusDonation}}</td>
              <td>
                <a href="/edit/{{ $animal->animal_id }}" class="btn btn-info btn-sm">แก้ไข</a>

                <a href="/deleteAnimal/{{ $animal->animal_id }}" class="btn btn-danger btn-sm btn-delete" onclick="return confirm('Please confirm again !!!')">ลบ</a>
                <br><br>

                  <form action="/closeAnimal/{{$animal->animal_id}}" class="form" method="post" enctype="multipart/form-data">
                      {{ Form::token() }}

                          <input type="hidden" class="form-control" name="ani_id" value="{{ $animal->animal_id }}" readonly/>


                          <input type="hidden"class="form-control" name="ani_name" value="{{ $animal->animal_name }}" />
                          <input type="hidden"class="form-control" name="ani_type"  value="{{ $animal->animal_type }}" />

                          <input type="hidden" name="doType_id" id="doType"/>
                          <input type="hidden" name="ani_picture" id="file_up_img"/><label for="file_up_img" value"{{$animal->animal_picture}}">

                          <input type="hidden" class="form-control" name="ani_color" value="{{ $animal->animal_color }}"/>

                          <input type="hidden" class="form-control" name="ani_gender" value="{{ $animal->animal_gender }}" />

                        @if( $animal->animal_gender ==1)
                          <label><input type="hidden" value="1" name="ani_gender" checked>
                          <label><input type="hidden" value="2" name="ani_gender">
                        @else
                          <label><input type="hidden" value="1" name="ani_gender" >
                          <label><input type="hidden" value="2" name="ani_gender" checked>
                        @endif


                          <input type="hidden"class="form-control" name="ani_age" step="any" value="{{ $animal->animal_age }}"/>
                          <input type="hidden" name="symptomCase" value="{{ $animal->symptomCase }}" row="3">

                          <input type="hidden" class="form-control" name="statusDonation" value="Close"/>

                          <button class=" btn-sm k btn-primary">ปิดการขอรับ</button>
                        </form>
              </td>
            </tr>
          @endif
            @endforeach
          </tbody>
        </table>

    </div>








    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>
