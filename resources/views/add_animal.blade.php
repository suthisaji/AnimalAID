
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
                <h1 style="text-align:center">Add Animal</h1>
                <form name="addAnimal" action="/add" class="form" method="post" enctype="multipart/form-data"  onsubmit="return validation()" >
                    {{ Form::token() }}

                    <div class="form-group">
                        <label for="ani_name" class="form-label">Animal Name</label>
                        <input type="text" class="form-control" name="ani_name"/ required>
                    </div>






                    <div class="form-group">
                        <label for="ani_type" class="form-label">Animal Type</label>
                        <input type="text" class="form-control" name="ani_type"  placeholder="dog cat etc." />
                    </div>
                    <div class="form-group">
                        <label for="doType_id" class="form-label">Donation Type</label>
                        <br>
                        <select class="custom-select" name="doType_id" id="doType">
                          @foreach($donationType as $dt)
                          <option value="{{$dt->do_typeId}}">{{$dt->do_typeName}}</option>
                          @endforeach
                        </select>
                    </div>

                                          <div class="form-group" id="animal_pic">
                                              <label for="ani_picture" class="form-label">Animal Picture</label>
                                              <input type="file" class="form-control" name="ani_picture" required / >
                                          </div>
                                          <div class="form-group" id="animal_color">
                                              <label for="ani_color" class="form-label">Animal Color</label>
                                              <input type="text" class="form-control" name="ani_color"/>
                                          </div>
                                      <!--    <div class="form-group">
                                              <label for="ani_gender" class="form-label">Animal Gender</label>
                                              <input type="text" class="form-control" name="ani_gender"/>
                                          </div>-->

                                          <div class="radio form-group" id="animal_gender">
                                            <label for="ani_gender" class="form-label">Animal Gender</label><br>
                                              <label><input type="radio" value="1" name="ani_gender">male</label>
                                              <label><input type="radio" value="2" name="ani_gender">female</label>
                                          </div>





                                          <div class="form-group" id="animal_age">
                                              <label for="ani_age" class="form-label">Animal Age</label>
                                              <input type="number" class="form-control" name="ani_age"/  placeholder="1.2 etc."  >
                                          </div>
                                          <div class="form-group">
                                              <label for="symptomCase" class="form-label">symptomCase</label>
                                              <input type="text" class="form-control" name="symptomCase"/>
                                          </div>

                                          <div class="form-group">
                                              <label for="statusDonation" class="form-label">Status Donation</label>
                                              <input type="text" class="form-control" name="statusDonation"/>
                                          </div>









                    <div class="text-center">
                        <button class="btn btn-success">Add Animal</button>
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

            }else{
              $('#animal_gender').show()
              $('#animal_age').show()
              $('#animal_color').show()
            }
        });
    });
</script>
<script type="text/javascript">
function validateForm() {
    var x = document.forms["addAnimal"]["ani_name"].value;
    if (x == "") {
      echo "<div class="alert alert-warning" role="alert">Warning alert</div>"
        return false;
    }
}
</script>
<script>
function validation(){
  if (document.addAnimal.ani_name.value == "") {
     document.getElementById('errors').innerHTML="*Please enter a username*";
     return false;
}
}
</script>
  </body>
</html>
