<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap Core CSS -->
    <link href="https://blackrockdigital.github.io/startbootstrap-shop-homepage/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="https://blackrockdigital.github.io/startbootstrap-shop-homepage/css/shop-homepage.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <!-- Custom Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Athiti" rel="stylesheet">
  {{Html::style('css/shop-homepage.css')}}
    <!-- Bootstrap Core JavaScript -->
    <script src="https://blackrockdigital.github.io/startbootstrap-shop-homepage/js/bootstrap.min.js"></script>

    <style type="text/css">
        .carousel-inner > .item > img {
  width:700;
  height:300px;
}
.thumbnail img {
    width:100% !important;
    height: 200px !important;
}
.caption{
  height: 150px;
}
.thumbnailjam img {
    width:100% !important;
    height: 300px !important;
}
.modal-title {
    text-align: left;
}
.modal-body {
    text-align: left;
}
.box1{
  position:absolute;
  bottom: 33px;
  right:82px;
  font-size: 14px;
}
.box2{
  position:absolute;
  bottom: 33px;
  right:30px;
  font-size: 14px;

}
.popover{
  max-width: none;
  width: 300px;
}
.ro{
  position:absolute;

  right:40px;
}
li{
  font-size: 22px;
}
.bori{
  font-size: 17px;
}
.rub1{
       padding: 5px 6px;
      font-size: 13px;
      position:absolute;
      bottom: 17px;
      right:88px;
      border-radius: 3px;
}
.rub2{
       padding: 5px 6px;
      font-size: 13px;
      position:absolute;
      bottom: 33px;
      right:25px;
      border-radius: 3px;
}
.container{
  width:1200px;
}
body{
  font-size: 16px;
}

    </style>
  </head>
  <body>
    <!-- Navigation -->
   <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
       <div class="container">
           <!-- Brand and toggle get grouped for better mobile display -->
           <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                   <span class="sr-only">Toggle navigation</span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
               </button>
               <a  style="font-size:20px;" class="navbar-brand" href="all">Animals A-I-D</a>
           </div>
           <!-- Collect the nav links, forms, and other content for toggling -->
           <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               <ul class="nav navbar-nav">

                   <li>
                       <a href="dm">การบริจาคเงิน</a>
                   </li>
                   <li>
                       <a href="db">การบริจาคเลือด</a>
                   </li>
                   <li>
                       <a href="da">หาบ้านให้สัตว์</a>
                   </li>
                   <li>
                       <a href="#">ติดตามสัตว์</a>
                   </li>

                   <li>
                       <a href="/newsUser">ข่าว</a>
                   </li>

               </ul>
               <ul class="nav navbar-nav navbar-right">
                 @if(!empty($position))
                   @if( $position== 'admin')
                     <li>
                       <a href="admin">การจัดการ</a>
                    </li>



                   @endif
                 @endif

                   <!-- Authentication Links -->
                   @if (Auth::guest())
                       <li><a href="{{ route('login') }}">เข้าสู่ระบบ</a></li>
                       <li><a href="{{ route('register') }}">สมัครสมาชิก</a></li>
                   @else
                     <li class="dropdown">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                             {{ Auth::user()->name }} <span class="caret"></span>
                         </a>

                         <ul class="dropdown-menu" role="menu">
                           @if(Auth::user()->position=='user')
                           <li>
                             <a href="userProfile">ข้อมูลส่วนตัวผู้ใช้ </a>
                           </li>
                           <li>
                               <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                   ออกจากระบบ
                               </a>

                               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                   {{ csrf_field() }}
                               </form>
                           </li>
                         @else <li>
                            <a href="adminProfile">ข้อมูลส่วนตัวแอดมิน</a>
                          </li>
                             <li>
                                 <a href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                     ออกจากระบบ
                                 </a>

                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                     {{ csrf_field() }}
                                 </form>
                             </li>
                           @endif
                         </ul>
                     </li>
                   @endif
               </ul>
           </div>
           <!-- /.navbar-collapse -->
       </div>
       <!-- /.container -->
   </nav>

   <!-- Page Content -->

   <div class="container">

       <div class="row">

           <div class="col-md-10">

               <div class="row carousel-holder">

                   <div class="col-md-12">
                       <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                           <ol class="carousel-indicators">
                               <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                               <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                               <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                           </ol>
                           <div class="carousel-inner">
                             @php($x=0)
                             @foreach($animals as $animal)
                                  @if($animal->statusDonation=='open' ||$animal->statusDonation=='-' && empty($animal->join_Adoption->animal_id))
                                    @php($x++)
                                    @if($x == 1)
                                      <div class="item active"  data-toggle="modal" data-target="#myModal{{$animal->animal_id}}">
                                          <img class="slide-image" src="{{url('/images/'.$animal->animal_picture)}}" alt="">
                                      </div>
                                    @else
                                      <div class="item"  data-toggle="modal" data-target="#myModal{{$animal->animal_id}}">
                                          <img class="slide-image" src="{{url('/images/'.$animal->animal_picture)}}" alt="">

                                      </div>
                                    @endif
                                    <div class="modal fade" id="myModal{{$animal->animal_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel" > {{$animal->join_donationType->do_typeName}} to  {{$animal->animal_type}}</h4>
                                          </div>
                                          <div class="modal-body thumbnailjam">
                                             <img src="{{url('/images/'.$animal->animal_picture)}}" alt="" width="200" height="500">
                                            Donation Type: {{$animal->join_donationType->do_typeName}} <br>
                                            Name Animal:{{$animal->animal_name}}<br>
                                            age        :{{$animal->animal_age}}<br>
                                            Animal Type:{{$animal->animal_type}}<br>
                                            Color :{{$animal->animal_color}}<br>
                                            @if($animal->animal_gender == 1)
                                                Gender :Male<br>
                                            @else
                                                Gender :Female<br>
                                            @endif
                                            SymptomCase :{{$animal->symptomCase}}<br>
                                            StatusDonation:{{$animal->statusDonation}}<br>
                                            @foreach($admins as $admin)
                                              @if($animal->admin_id==$admin->admin_id)
                                                   @foreach($hospitals as $hos)
                                                      @if($admin->hospital_id==$hos->hospital_id)
                                                       <span style="color:#8000FF">    {{$admin->join_Hospital->hospital_name}}</span>
                                                      @endif
                                                   @endforeach
                                              @endif
                                            @endforeach
                                          </div>
                                          @if($animal->doType_id==3)
                                            <div class="modal-footer">
                                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                   <button id="takemodal{{$animal->animal_id}}" type="button" class="btn btn-lg btn-danger rub1" data-toggle="popover" data-placement="top">รับเลี้ยง</button>
                                   <script>
                                         $('#takemodal{{$animal->animal_id}}').popover({
                                           html: true,
                                           title: 'Please add Your address ',
                                           content: function(){
                                               return $('#modal-content{{$animal->animal_id}}').html()
                                           }
                                         })
                                   </script>
                                   <div id="modal-content{{$animal->animal_id}}" style="display:none;">
                                     @if (Auth::guest())
                                       <a href="{{ route('login') }}" class="btn btn-sm btn-success">Login</a>
                                       <a href="{{ route('register') }}" class="btn btn-sm btn-warning">Register</a>
                                     @else
                                     <form class="form" action="/addAdoptionAllPage" method="post">
                                       <input type="hidden" name="animal_id" value="{{$animal->animal_id}}">
                                         {{ Form::token() }}
                                         <div class="form-group">
                                             <label for=""> <h4 style="color:blue;"> Thank you !&nbsp; {{Auth::user()->name}}</h4> </label>
                                         </div>
                                         <div class="form-group">
                                             <label for="">phone number can edit</label>
                                             <input class="form-control" type="tel" name="tel" value="{{Auth::user()->tel}}"/>

                                         </div>
                                         <div class="form-group">
                                              <label for="address">Address for pet</label>
                                              <textarea class="form-control" name="address" id="address" rows="3"></textarea>
                                        </div>

                                         <div class="form-group">
                                             <label for="date" class="form-label">Date & Time to receive</label>
                                             <input type="datetime-local" class="form-control" name="date_time"  value="2011-08-19T13:45:00" />
                                         </div>
                                         <div class="form-group">
                                             Please waiting for contact back by email or phonenumber

                                         </div>
                                        <input type='hidden' name='status' value='Recipient' />
                                         <div class="text-center">
                                             <button class="btn btn-success" >Add Address</button>
                                         </div>
                                     </form>
                                   @endif
                                 </div>


                                 </div>
                               @elseif($animal->doType_id==2)
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-default bori" data-dismiss="modal">Close</button>
                                              <button type="button" class="btn btn-primary "><a href='db' style='color:white;'>วิธีบริจาคแสดงข้อมูล</a></button>


                                            </div>
                                          @else
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-default bori" data-dismiss="modal">Close</button>
                                              <button type="button" class="btn btn-primary bori">บริจาค</button>
                                            </div>
                                          @endif
                                        </div>
                                      </div>
                                    </div>
                                  @endif
                           @endforeach


                            @foreach($newsAnis as $fastNews)
                              @if($fastNews->news_type == 1)
                                <marquee>  "{{$fastNews->head_News}} " &nbsp;{{$fastNews->content}}</marquee>

                              @endif

                               @endforeach
                           </div>
                           <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                               <span class="glyphicon glyphicon-chevron-left"></span>
                           </a>
                           <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                               <span class="glyphicon glyphicon-chevron-right"></span>
                           </a>
                       </div>
                   </div>

               </div>












               <div class="row">

                  @foreach($animals as $animal)

                    @if($animal->statusDonation=='open' ||$animal->statusDonation=='-' && empty($animal->join_Adoption->animal_id))
                   <div class="col-sm-4 col-lg-4 col-md-4">
                       <small>{{$animal->created_at}}</small>
                       <div class="thumbnail">
                           <img src="{{url('/images/'.$animal->animal_picture)}}" alt="">
                           <div   class="caption  ">
                              {{$animal->join_donationType->do_typeName}}<br>
                              <span style="color:blue">{{$animal->animal_name}}</span>

                              {{$animal->animal_type}} <br>
                              {{$animal->symptomCase}}<br>
                              @foreach($admins as $admin)
                                @if($animal->admin_id==$admin->admin_id)
                                     @foreach($hospitals as $hos)
                                        @if($admin->hospital_id==$hos->hospital_id)
                                         <span style="color:#8000FF">    {{$admin->join_Hospital->hospital_name}}</span>
                                        @endif
                                     @endforeach
                                @endif
                              @endforeach


                              <!-- Button trigger modal -->
                            <div class="row text-right">

                          @if($animal->doType_id==3)
                            <button type="button" class="btn btn-primary btn-sm box1" data-toggle="modal" data-target="#myModal{{$animal->animal_id}}">
                              view detail
                            </button>
                            <button id="take{{$animal->animal_id}}" type="button" class="btn btn-lg btn-danger rub2" data-toggle="popover" data-placement="top">รับเลี้ยง</button>
                            <script>
                                  $('#take{{$animal->animal_id}}').popover({
                                    html: true,
                                    title: 'Please add Your address ',
                                    content: function(){
                                        return $('#modal-content{{$animal->animal_id}}').html()
                                    }
                                  })
                            </script>
                            <div id="modal-content{{$animal->animal_id}}" style="display:none;">
                              @if (Auth::guest())
                                <a href="{{ route('login') }}" class="btn btn-sm btn-success">Login</a>
                                <a href="{{ route('register') }}" class="btn btn-sm btn-warning">Register</a>
                              @else
                              <form class="form" action="/addAdoptionAllPage" method="post">
                                <input type="hidden" name="animal_id" value="{{$animal->animal_id}}">
                                  {{ Form::token() }}
                                  <div class="form-group">
                                      <label for=""> <h4 style="color:blue;"> Thank you !&nbsp; {{Auth::user()->name}}</h4> </label>
                                  </div>
                                  <div class="form-group">
                                      <label for="">phone number can edit</label>
                                      <input class="form-control" type="tel" name="tel" value="{{Auth::user()->tel}}"/>

                                  </div>
                                  <div class="form-group">
                                       <label for="address">Address for pet</label>
                                       <textarea class="form-control" name="address" id="address" rows="3"></textarea>
                                 </div>

                                  <div class="form-group">
                                      <label for="date" class="form-label">Date & Time to receive</label>
                                      <input type="datetime-local" class="form-control" name="date_time"  value="2011-08-19T13:45:00"  />
                                  </div>
                                  <div class="form-group">
                                      Please waiting for contact back by email or phonenumber

                                  </div>
                                 <input type='hidden' name='status' value='Recipient' />
                                  <div class="text-center">
                                      <button class="btn btn-success" >Add Address</button>
                                  </div>
                              </form>

                            @endif
                            </div>
                          @elseif($animal->doType_id==1)
                            <button type="button" class="btn btn-primary btn-sm box1" data-toggle="modal" data-target="#myModal{{$animal->animal_id}}">
                              view detail
                            </button>
                              <button type="button" class="btn btn-primary btn-sm box2" ><a style="color: white;" href="index">Help</a></button>

                          @else
                            <button type="button" class="btn btn-primary btn-sm box2" data-toggle="modal" data-target="#myModal{{$animal->animal_id}}">
                              view detail
                            </button>
                          @endif



                          <!--Modal-->
                          <div class="modal fade" id="myModal{{$animal->animal_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title" id="myModalLabel" > {{$animal->join_donationType->do_typeName}} to  {{$animal->animal_type}}</h4>
                                </div>
                                <div class="modal-body thumbnailjam">
                                   <img src="{{url('/images/'.$animal->animal_picture)}}" alt="" width="200" height="500">
                                  Donation Type: {{$animal->join_donationType->do_typeName}} <br>
                                  Name Animal:{{$animal->animal_name}}<br>
                                  age        :{{$animal->animal_age}}<br>
                                  Animal Type:{{$animal->animal_type}}<br>
                                  Color :{{$animal->animal_color}}<br>
                                  @if($animal->animal_gender == 1)
                                      Gender :Male<br>
                                  @else
                                      Gender :Female<br>
                                  @endif
                                  SymptomCase :{{$animal->symptomCase}}<br>
                                  StatusDonation:{{$animal->statusDonation}}<br>
                                </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default bori" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary bori">บริจาค</button>
                                  </div>
                              </div>
                            </div>
                          </div>
                        </div>
                           </div>
                       </div>
                     </div>
                   @endif
              @endforeach



                <!-- Modal -->







               </div>

           </div>
               <div class="col-md-3 ro">
                   <p class="lead">List of Donors</p>
                       <div class="list-group">
                           <p class="list-group-item"><small>2017-04-12</small>
                               <i class="fa fa-comment fa-fw">Jutatip</i>
                               <span class="pull-right text-muted small">
                                   <em>$100  กองทุนรักษาพยาบาลสัตว์ป่วยอนาถา</em>
                               </span>
                   </p>

                   <p class="list-group-item"><small>2017-04-12</small>
                       <i class="fa fa-comment fa-fw">Suthisa</i>
                       <span class="pull-right text-muted small">
                           <em>$100  กองทุนรักษาพยาบาลสัตว์ป่วยอนาถา</em>
                       </span>
                   </p>
                   <p class="list-group-item"><small>2017-04-12</small>
                       <i class="fa fa-comment fa-fw">Chanon</i>
                       <span class="pull-right text-muted small">
                           <em>$100  กองทุนรักษาพยาบาลสัตว์ป่วยอนาถา</em>
                       </span>
                   </p>
               </div>
           </div>


       </div>

   </div>
   <!-- /.container -->

   <div class="container">

       <hr>

       <!-- Footer -->
       <footer>
           <div class="row ">
               <div class="text-center col-lg-12">
                   <p>Copyright &copy; Your Website 2017</p>
               </div>
           </div>
       </footer>

   </div>
   <!-- /.container -->
    </body>
</html>
