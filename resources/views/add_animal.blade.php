
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  </head>
  <style>
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
  <body>



    <div class="container">

          <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
            <a class="navbar-brand t" href="/all">Animal-AID</a>
          <a class="navbar-brand t " href="/admin"> &nbsp;&nbsp;   การจัดการ &nbsp;&nbsp; </a>

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

          <br>


        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h1 style="text-align:center">เพิ่มสัตว์</h1>
                <form name="addAnimal" action="/add" class="form" method="post" enctype="multipart/form-data"  onsubmit="return validation()" >
                    {{ Form::token() }}

                    <div class="form-group">
                        <label for="ani_name" class="form-label">ชื่อสัตว์</label>
                        <input type="text" class="form-control" name="ani_name"/ required>
                    </div>






                    <div class="form-group">
                        <label for="ani_type" class="form-label">ชนิดของสัตว์</label>
                        <input type="text" class="form-control" name="ani_type"  placeholder="dog cat etc." />
                    </div>
                    <div class="form-group">
                        <label for="doType_id" class="form-label">ประเภทของการขอรับบริจาค</label>
                        <br>
                        <select class="custom-select "  style="  border: 5px solid rgba(0, 255, 0,.15);" name="doType_id" id="doType">
                          @foreach($donationType as $dt)

                          <option value="{{$dt->do_typeId}}">
                             @if($dt->do_typeName=='Donation Money')
                               ขอรับบริจาคเงิน
                             @elseif($dt->do_typeName=='Blood Donation')
                               ขอรับบริจาคเลือด
                             @else
                                หาบ้านให้สัตว์
                              @endif</option>
                          @endforeach
                        </select>
                    </div>

                                          <div class="form-group" id="animal_pic">
                                              <label for="ani_picture" class="form-label">รูปภาพ</label><br>
                                              <input type="file"  name="ani_picture" required / >
                                          </div>
                                          <div class="form-group" id="animal_color">
                                              <label for="ani_color" class="form-label">สี</label>
                                              <input type="text" class="form-control" name="ani_color"/>
                                          </div>
                                      <!--    <div class="form-group">
                                              <label for="ani_gender" class="form-label">Animal Gender</label>
                                              <input type="text" class="form-control" name="ani_gender"/>
                                          </div>-->

                                            <div class="radio form-group" id="animal_gender">
                                              <label for="ani_gender" class="form-label" >เพศ</label><br>
                                                <label><input type="radio" value="1" name="ani_gender" id="animal_gender_input" required="required">เพศผู้</label>
                                                <label><input type="radio" value="2" name="ani_gender">เพศเมีย</label>
                                            </div>







                                        <div class="form-group" id="animal_age">
                                              <label for="ani_age" class="form-label">อายุ (ปี)</label>
                                              <input type="number" class="form-control" name="ani_age"  step="any" placeholder="1.2 เป็นต้น."/>
                                              </div>




                                          <div class="form-group" >
                                              <label for="symptomCase" class="form-label">ลักษณะอาการ</label>
                                              <textarea class="form-control" name="symptomCase" row="2"></textarea>
                                          </div>


                                              <input type="hidden" class="form-control" name="statusDonation" value="open"/>




                                                 <input type="hidden" class="form-control" name="received" value="received"/>

                                                  <div class="text-center">
                        <button class="btn btn-success">เพิ่มสัตว์</button>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <!-- jQuery first, then Tether, then Bootstrap JS. -->
  <!--  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>



<script type="text/javascript">
    $(document).ready(function(){
        $('#doType').on('change', function(event){
            event.preventDefault();
            if(this.value == 2){
                $('#animal_gender').hide()
                $('#animal_age').hide()
                $('#animal_color').hide()
                $('#animal_gender_input').attr('required', false)
            }else{
              $('#animal_gender').show()
              $('#animal_age').show()
              $('#animal_color').show()
              $('#animal_gender_input').attr('required', true)
            }
        });
    });
</script>


  </body>
</html>
