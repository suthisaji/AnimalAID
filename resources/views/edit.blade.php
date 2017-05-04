<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <style media="screen">
    input[type=file]{
  width:90px;
  color:transparent;
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


    <div class="container">



                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                  <a class="navbar-brand t" href="/all">Animal-AID</a>
                <a class="navbar-brand t " href="/admin">  &nbsp;&nbsp;   การจัดการ &nbsp;&nbsp; </a>

                <li class="dropdown navbar-brand  " style="alight=right "  >
                    <a href="#"  class="dropdown-toggle a t " data-toggle="dropdown" role="button" aria-expanded="false" >
                        {{ Auth::user()->name }}
                    </a>

                            <ul class="dropdown-menu t " role="menu"  >
                                      <li style="background-color:#F2F2F2;">
                                        <a  class="t" style="color:#A4A4A4;" href="../adminProfile"> โปรไฟล์ &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  </a>
                                      </li>
                                          <li style="background-color:#F2F2F2;">
                                              <a style="color:#A4A4A4;" class = "t" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                  Logout&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                  {{ csrf_field() }}
                                                </form>
                                              </li>
                            </ul>
                </li>

                </nav>

        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1 style="text-align:center">แก้ไขข้อมูลสัตว์</h1>
                <form action="/edit" class="form" method="post" enctype="multipart/form-data">
                    {{ Form::token() }}
                    <div class="form-group">
                        <label for="ani_id" class="form-label">รหัส</label>
                        <input type="text" class="form-control" name="ani_id" value="{{ $animal->animal_id }}" readonly/>
                    </div>
                    <div class="form-group">
                        <label for="ani_name" class="form-label">ชื่อสัตว์</label>
                        <input type="text" class="form-control" name="ani_name" value="{{ $animal->animal_name }}" />
                    </div>

                    <div class="form-group">
                        <label for="ani_type" class="form-label">ชนิดของสัตว์</label>
                        <input type="text" class="form-control" name="ani_type"  value="{{ $animal->animal_type }}" />
                    </div>




                    <div class="form-group">
                        <label for="doType_id" class="form-label">ประเภทของการขอรับบริจาค</label>
                        <br>
                        <select class="custom-select" style="  border: 5px solid rgba(0, 255, 0,.15);" name="doType_id" id="doType">
                            <option value="{{$animal->join_donationType->do_typeId}}">{{$animal->join_donationType->do_typeName}} </option>
                          @foreach($donationType as $dt)
                            @if($dt->do_typeId!=$animal->join_donationType->do_typeId)
                              <option value="{{$dt->do_typeId}}">{{$dt->do_typeName}}</option>
                            @endif
                          @endforeach
                        </select>
                    </div>






                    <!-- ต้องแก้ รุป ตอน up อ่ะ -->
                    <div class="form-group" >
                        <label for="ani_picture" >รูปภาพ</label><br>
                        <img id="pre_img" src="{{url('/images/'.$animal->animal_picture)}}" alt="" width="130" height="130">
                      <?php echo "$animal->animal_picture"; ?>
                        <div >
                          <input type="file" name="ani_picture" id="file_up_img"/><label for="file_up_img" value"{{$animal->animal_picture}}">{{$animal->animal_picture}}</label>
                        </div>
                    </div>




                    <div class="form-group" id="animal_color">
                        <label for="ani_color" class="form-label"สี</label>
                        <input type="text" class="form-control" name="ani_color" value="{{ $animal->animal_color }}"/>
                    </div>

                        <input type="hidden" class="form-control" name="ani_gender"  value="{{ $animal->animal_gender }}" />


                    <div class="radio form-group" id="animal_gender">
                      <label for="ani_gender" class="form-label" >เพศ</label><br>
                      @if( $animal->animal_gender ==1)
                        <label><input type="radio" value="1" name="ani_gender" checked>  เพศผู้</label>&nbsp;&nbsp;
                        <label><input type="radio" value="2" name="ani_gender">  เพศเมีย</label>&nbsp;&nbsp;
                      @else
                        <label><input type="radio" value="1" name="ani_gender" >  เพศผู้</label>&nbsp;
                        <label><input type="radio" value="2" name="ani_gender" checked>  เพศเมีย</label>&nbsp;&nbsp;
                      @endif
                    </div>



                    <div class="form-group" id="animal_age">
                        <label for="ani_age" class="form-label">อายุ(ปี)</label>
                        <input type="text" class="form-control" name="ani_age" step="any" value="{{ $animal->animal_age }}"/>
                    </div>


                    <div class="form-group">
                        <label for="symptomCase" class="form-label">ลักษณะอาการ</label>
                        <textarea class="form-control"  name="symptomCase" value="{{ $animal->symptomCase }}" row="3">{{ $animal->symptomCase }}</textarea>
                    </div>


                        <input type="hidden" class="form-control" name="statusDonation" value="{{ $animal->statusDonation }}"/>





                    <div class="text-center">
                        <button class="btn btn-success">ยืนยันการแก้ไข</button>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

    <script type="text/javascript">
        function changeImg(input){
            if(input.files && input.files[0]){
              var reader = new FileReader();
              reader.onload = function(evt){
                $('#pre_img').attr('src', evt.target.result);
              }
              reader.readAsDataURL(input.files[0]);
            }
        }
        $(document).ready(function(){
          $('#file_up_img').change(function(){
              changeImg(this);
          });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#doType').on('change', function(event){
                event.preventDefault();
                if(this.value == 2){
                    $('#animal_gender').hide()
                    $('#animal_age').hide()
                    $('#animal_color').hide()
                }else{
                  $('#animal_gender').show()
                  $('#animal_age').show()
                  $('#animal_color').show()
                }
            });

            if($('#doType').find(":selected").val() == 2){
              $('#animal_gender').deleteเนี่ยลบทำควยไร() อยาก required ของtype1,3 ถ้ามีอันนี้ hide มันไม่ให้ submitง งะ กุงง อันนี้มันแค่ซ่อน แต่ถ้ากุ
              $('#animal_age').hide()
              $('#animal_color').hide()
            }else{
              $('#animal_gender').show()
              $('#animal_age').show()
              $('#animal_color').show()
            }
        });
    </script>

  </body>
</html>
