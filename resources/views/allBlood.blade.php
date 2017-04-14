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
}
.box2{
  position:absolute;
  bottom: 33px;
  right:30px;
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
               <a class="navbar-brand" href="all">Animals A-I-D</a>
           </div>
           <!-- Collect the nav links, forms, and other content for toggling -->
           <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               <ul class="nav navbar-nav">
                   <li>
                       <a href="dm">Funding donation</a>
                   </li>
                   <li>
                       <a href="db">Blood donation</a>
                   </li>
                   <li>
                       <a href="da">Home for animals</a>
                   </li>
                   <li>
                       <a href="#">Follow</a>
                   </li>
                   <li>
                       <a href="n">News</a>
                   </li>
               </ul>

<!--check login yet-->
<ul class="nav navbar-nav navbar-right">
  @if(!empty($position))
    @if( $position== 'admin')
      <li>
   <a href="admin">manage</a>
 </li>
@endif
@endif
    <!-- Authentication Links -->
    @if (Auth::guest())
        <li><a href="{{ route('login') }}">Login</a></li>
        <li><a href="{{ route('register') }}">Register</a></li>
    @else
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
                <li>
                    <a href="{{ route('logout') }}"
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
    @endif
</ul>
<!--end check-->






           </div>
           <!-- /.navbar-collapse -->
       </div>
       <!-- /.container -->
   </nav>

   <!-- Page Content -->
   <div class="container">

       <div class="row">

           <div class="col-md-9">

               <div class="row carousel-holder">

                   <div class="col-md-12">
                       <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                           <ol class="carousel-indicators">
                               <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                               <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                               <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                           </ol>
                           <div class="carousel-inner">
                             @foreach($animalsBloods as $pic)
                                    @if($loop->first)
                                      <div class="item active" data-toggle="modal" data-target="#myModal{{$pic->animal_id}}">
                                          <img class="slide-image" src="{{url('/images/'.$pic->animal_picture)}}" alt="">
                                      </div>
                                    @else
                                      <div class="item" data-toggle="modal" data-target="#myModal{{$pic->animal_id}}">
                                          <img class="slide-image" src="{{url('/images/'.$pic->animal_picture)}}" alt="">

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

                <em>คุณสมบัติของสุนัขหรือแมวสำหรับเป็นผู้บริจาคเลือด<br>มีสุขภาพสมบูรณ์ 1-7 ปี<br>สุนัขด้องมีน้ำหนักตัวตั้งแต่17 kg ขึ้นไป <br>แมวด้องมีน้ำหนักตัวตั้งแต่ 4 kg ขึ้นไป <br>เห็บหมัดพยาธิหนอนหัวใจอย่างต่อเนื่อง<br> (กรณีฉีดวัคซีนควรเว้นระยะอย่างน้อย3 สัปดาห์ <br>3.ไม่เคยได้รับผลิตภัณฑ์เลือดมาก่อน <br>ไม่มีประวัติเข้ารับการผาตัดใหญ่ในช่วง3เดือน <br>หากเป็นเพศเมียไม่ควรอยู่ในระหว่างเป็นสัดดงครรภ์หรือให้นมลูก<br> 6. ต้องไม่รับประทานยาใดๆในช่วง2สัปดห์ก่อนหน้า <br>7.ไม่มีบาดแผลหรือเป็นโรคผิวหนัง<br> 8. ลักษณะนิสัยเป็นมิตรหรือเจ้าของสามารถควบคุมไค <br>้การบริจาคเลือดเบบระบุตัวรับกรณีตัวป่วยมีน้ำหนัก20 kg ขึ้นไป <br>ควรแนะนำเจ้าของให้หาสุนัขที่มีน้ำหน้กตัวมากกว่าตัวป่วย <br>ก่อนจะพาสุนัขหรือแมวมาบริจาคเลือดต้องอย่างน้อย 8-12 ชั่วโมง <br>ควรให้สุนัขและแมวก่อนมาบริจาคเลือดแต่สามารถให้ดืมนได้ตบมติเพื่อป้องกันภาวะขาดน้ำโรงพยาบาลสัตว์มหาวิทยาลัยเกษตรศาสตร์สอบถามได้ที่ 02-7971900 ต่อ 2329 (ห้องธนาคารเลือต) หรือ 081-8387713 เปิดทำการทุกวันค่ะวลา 8.30 น. -14.00 น.ยกเว้นวันศุกร์วต8.30น.-11.00น.</em>


               <div class="row">

                  @foreach($animalsBloods as $animal)
                    @if($animal->statusDonation=='open')
                   <div class="col-sm-4 col-lg-4 col-md-4">
                       <small>{{$animal->created_at}}</small>
                       <div class="thumbnail">
                           <img src="{{url('/images/'.$animal->animal_picture)}}" alt="">
                           <div class="caption">
                             {{$animal->join_donationType->do_typeName}}<br>
                          <span style="color:blue">  {{$animal->animal_name}}</span>

                               {{$animal->animal_type}}<br>
                               {{$animal->symptomCase}}
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
                           <button type="button" class="btn btn-primary btn-sm box2" data-toggle="modal" data-target="#myModal{{$animal->animal_id}}">
                             view detail</a>
                           </button>

                           <!--Modal-->
                           <div class="modal fade" id="myModal{{$animal->animal_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                             <div class="modal-dialog" role="document">
                               <div class="modal-content">
                                 <div class="modal-header">
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                   <h4 class="modal-title" id="myModalLabel" >{{$animal->join_donationType->do_typeName}} to  {{$animal->animal_type}}</h4>
                                 </div>
                                 <div class="modal-body thumbnailjam">
                                    <img src="{{url('/images/'.$animal->animal_picture)}}" alt="" width="200" height="500">
                                   Donation Type:{{$animal->join_donationType->do_typeName}}<br>
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
                                 <div class="modal-footer">
                                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                 </div>
                               </div>
                             </div>
                           </div>
                         </div>
                           <!-- Modal -->
                           </div>
                       </div>
                     </div>
                   @endif
                @endforeach









               </div>

           </div>
               <div class="col-md-3">
                   <p class="lead">How to Blood donation</p>
                       <div class="list-group">
                           <p class="list-group-item">
                               <i class="fa fa-comment fa-fw"></i>

                                   <em>คุณสมบัติของสุนัขหรือแมวสำหรับเป็นผู้บริจาคเลือด<br>มีสุขภาพสมบูรณ์ 1-7 ปี<br>สุนัขด้องมีน้ำหนักตัวตั้งแต่17 kg ขึ้นไป <br>แมวด้องมีน้ำหนักตัวตั้งแต่ 4 kg ขึ้นไป <br>เห็บหมัดพยาธิหนอนหัวใจอย่างต่อเนื่อง<br> (กรณีฉีดวัคซีนควรเว้นระยะอย่างน้อย3 สัปดาห์ <br>3.ไม่เคยได้รับผลิตภัณฑ์เลือดมาก่อน <br>ไม่มีประวัติเข้ารับการผาตัดใหญ่ในช่วง3เดือน <br>หากเป็นเพศเมียไม่ควรอยู่ในระหว่างเป็นสัดดงครรภ์หรือให้นมลูก<br> 6. ต้องไม่รับประทานยาใดๆในช่วง2สัปดห์ก่อนหน้า <br>7.ไม่มีบาดแผลหรือเป็นโรคผิวหนัง<br> 8. ลักษณะนิสัยเป็นมิตรหรือเจ้าของสามารถควบคุมไค <br>้การบริจาคเลือดเบบระบุตัวรับกรณีตัวป่วยมีน้ำหนัก20 kg ขึ้นไป <br>ควรแนะนำเจ้าของให้หาสุนัขที่มีน้ำหน้กตัวมากกว่าตัวป่วย <br>ก่อนจะพาสุนัขหรือแมวมาบริจาคเลือดต้องอย่างน้อย 8-12 ชั่วโมง <br>ควรให้สุนัขและแมวก่อนมาบริจาคเลือดแต่สามารถให้ดืมนได้ตบมติเพื่อป้องกันภาวะขาดน้ำโรงพยาบาลสัตว์มหาวิทยาลัยเกษตรศาสตร์สอบถามได้ที่ 02-7971900 ต่อ 2329 (ห้องธนาคารเลือต) หรือ 081-8387713 เปิดทำการทุกวันค่ะวลา 8.30 น. -14.00 น.ยกเว้นวันศุกร์วต8.30น.-11.00น.</em>

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
           <div class="row">
               <div class="text-center col-lg-12">
                   <p>Copyright &copy; Your Website 2014</p>
               </div>
           </div>
       </footer>

   </div>
   <!-- /.container -->




    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="https://blackrockdigital.github.io/startbootstrap-shop-homepage/js/bootstrap.min.js"></script>
    </body>
</html>
