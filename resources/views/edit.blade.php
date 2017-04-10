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
                <form action="/edit" class="form" method="post">
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
                        <br>
                        <select class="custom-select" name="ani_type">
                          @foreach($donationType as $dt)
                          <option value="{{$dt->do_typeId}}">{{$dt->do_typeName}}</option>
                          @endforeach
                        </select>
                    </div>



                    <!-- ต้องแก้ รุป ตอน up อ่ะ -->
                    <div class="form-group">
                        <label for="ani_picture" class="form-label">Animal Picture</label><br>
                        <img id="pre_img" src="{{url('/images/'.$animal->animal_picture)}}" alt="" width="130" height="130">
                      <?php echo "$animal->animal_picture)"; ?>
                        <div class="form-control">
                          <input type="file" name="ani_picture" id="file_up_img"/><label for="file_up_img">{{$animal->animal_picture}}</label>
                        </div>
                    </div>




                    <div class="form-group">
                        <label for="ani_color" class="form-label">Animal Color</label>
                        <input type="text" class="form-control" name="ani_color" value="{{ $animal->animal_color }}"/>
                    </div>
                    <div class="form-group">
                        <label for="ani_gender" class="form-label">Animal Gender</label>
                        <input type="text" class="form-control" name="ani_gender" value="{{ $animal->animal_gender }}" />
                    </div>
                    <div class="form-group">
                        <label for="ani_age" class="form-label">Animal Age</label>
                        <input type="text" class="form-control" name="ani_age" value="{{ $animal->animal_age }}"/>
                    </div>
                    <div class="form-group">
                        <label for="symptomCase" class="form-label">symptomCase</label>
                        <input type="text" class="form-control" name="symptomCase" value="{{ $animal->symptomCase }}"/>
                    </div>
                    <div class="form-group">
                        <label for="statusDonation" class="form-label">Status Donation</label>
                        <input type="text" class="form-control" name="statusDonation" value="{{ $animal->statusDonation }}"/>
                    </div>
                    <div class="form-group">
                        <label for="doType_id" class="form-label">Donation Type</label>
                        <input type="text" class="form-control" name="doType_id" value="{{ $animal->doType_id }}"/>
                    </div>
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
  </body>
</html>
