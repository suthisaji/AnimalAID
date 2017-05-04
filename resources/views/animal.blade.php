

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

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
     .t{
       font-size: 19px;
     }
     .t2{
       font-size: 15px;
       border-radius: 5px;
     }
     .a{
       color:  #6E6E6E  ;
     }
     .op{
        font-size: 15px;
       background-color: darkseagreen;
border-radius: 5px;
     }
 </style>
  </head>



<body>

  <div class="container">
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
  </div>

<br>
<br>
<br>



    <div class="container">

      <div class="row text-center">
          <div class="col-md-6 offset-md-3">
            <a href="/add" class="btn btn-warning t">เพิ่มสัตว์</a>
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
          <thead class="table-inverse t">
              <tr>
                <th width="30">รหัส</th>
                <th  width="140">ชื่อ</th>
                <th width="100" >ประเภท</th>
                <th   >รูปภาพ</th>
                <th >สถานะ</th>
                <th width="150">ดำเนินการ</th>
              </tr>
          </thead>
          <tbody>
            @foreach($animals as $animal)
              @if( $animal->admin_id == $adminId)
            <tr>
              <td>{{$animal->animal_id}}</td>
              <td>{{$animal->animal_name}}</td>
              <td>{{$animal->join_donationType->do_typeName}}</td>
              <td><img  src="{{url('/images/'.$animal->animal_picture)}}" alt="" width="85" height="85"> &nbsp;<small>{{$animal->animal_picture}}</small>   <br></td>

              <td>{{$animal->statusDonation}}</td>
              <td>
                <a href="/edit/{{ $animal->animal_id }}" class="btn btn-info btn-sm t2">แก้ไข</a>

                <a href="/deleteAnimal/{{ $animal->animal_id }}" class="btn btn-danger btn-sm btn-delete t2" onclick="return confirm('Please confirm again !!!')">ลบ</a>
                <br><br>
                @if($animal->statusDonation=='Open'||$animal->statusDonation=='open')
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

                          <button class=" btn-sm k btn-primary t2">ปิดการขอรับ</button>
                        </form>
                      @elseif($animal->statusDonation=='-'||$animal->statusDonation=='OpenAdoption')
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

                                <input type="hidden" class="form-control" name="statusDonation" value="CloseAdoption"/>

                                <button class=" btn-sm k btn-primary t2">ปิดการขอรับเลี้ยง</button>
                              </form>
                            @elseif($animal->statusDonation=='CloseAdoption')
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

                                      <input type="hidden" class="form-control" name="statusDonation" value="OpenAdoption"/>

                                      <button class=" btn-sm k btn-primary op" >เปิดการขอรับ</button>
                                    </form>
                      @elseif($animal->statusDonation=='Close'||$animal->statusDonation=='close')
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

                                <input type="hidden" class="form-control" name="statusDonation" value="Open"/>

                                <button class=" btn-sm k btn-primary  op">เปิดการขอรับ</button>
                              </form>
              </td>
            </tr>
              @endif
          @endif
            @endforeach
          </tbody>
        </table>

    </div>




</body>



    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
