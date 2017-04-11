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
    </style>
  </head>
  <body>
<a href="/admin">back</a>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1 style="text-align:center">Edit Animal</h1>
                <form action="/edit" class="form" method="post" enctype="multipart/form-data">
                    {{ Form::token() }}
                    <div class="form-group">
                        <label for="ani_id" class="form-label">Animal ID</label>
                        <input type="text" class="form-control" name="ani_id" value="{{ $animal->animal_id }}" readonly/>
                    </div>
                    <div class="form-group">
                        <label for="ani_name" class="form-label">Animal Name</label>
                        <input type="text" class="form-control" name="ani_name" value="{{ $animal->animal_name }}" />
                    </div>

                    <div class="form-group">
                        <label for="ani_type" class="form-label">Animal Type</label>
                        <input type="text" class="form-control" name="ani_type"  value="{{ $animal->animal_type }}" />
                    </div>




                    <div class="form-group">
                        <label for="doType_id" class="form-label">Donation Type</label>
                        <br>
                        <select class="custom-select" name="doType_id" id="doType">
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
                        <label for="ani_picture" class="form-label">Animal Picture</label><br>
                        <img id="pre_img" src="{{url('/images/'.$animal->animal_picture)}}" alt="" width="130" height="130"><br>
                      <?php echo "$animal->animal_picture"; ?>
                        <div class="form-control">
                          <input type="file" name="ani_picture" id="file_up_img"/><label for="file_up_img" value"{{$animal->animal_picture}}">{{$animal->animal_picture}}</label>
                        </div>
                    </div>




                    <div class="form-group" id="animal_color">
                        <label for="ani_color" class="form-label">Animal Color</label>
                        <input type="text" class="form-control" name="ani_color" value="{{ $animal->animal_color }}"/>
                    </div>
                    <div class="form-group" id="animal_gender">
                        <label for="ani_gender" class="form-label">Animal Gender</label>
                        <input type="text" class="form-control" name="ani_gender" value="{{ $animal->animal_gender }}" />
                    </div>

                    <div class="radio form-group" id="animal_gender">
                      <label for="ani_gender" class="form-label" >Animal Gender</label><br>
                      @if( $animal->animal_gender ==1)
                        <label><input type="radio" value="1" name="ani_gender" checked>male</label>
                        <label><input type="radio" value="2" name="ani_gender">female</label>
                      @else
                        <label><input type="radio" value="1" name="ani_gender" >male</label>
                        <label><input type="radio" value="2" name="ani_gender" checked>female</label>
                      @endif
                    </div>




                    <div class="form-group" id="animal_age">
                        <label for="ani_age" class="form-label">Animal Age</label>
                        <input type="text" class="form-control" name="ani_age" step="any" value="{{ $animal->animal_age }}"/>
                    </div>


                    <div class="form-group">
                        <label for="symptomCase" class="form-label">symptomCase</label>
                        <textarea class="form-control"  name="symptomCase" value="{{ $animal->symptomCase }}" row="3">{{ $animal->symptomCase }}</textarea>
                    </div>


                        <input type="hidden" class="form-control" name="statusDonation" value="{{ $animal->statusDonation }}"/>





                    <div class="text-center">
                        <button class="btn btn-success">Edit Animal</button>
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
        });
    </script>

  </body>
</html>
