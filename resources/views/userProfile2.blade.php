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
}
.box2{
  position:absolute;
  bottom: 33px;
  right:30px;

}
.popover{
  max-width: none;
  width: 300px;
}
.ro{
  position:absolute;

  right:40px;
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
                           @if(Auth::user()->position=='user')
                           <li>
                             <a href="userProfile">User Profile</a>
                           </li>
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
                         @else
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

<!--end check-->






           </div>
           <!-- /.navbar-collapse -->
       </div>
       <!-- /.container -->
   </nav>


  <div class="container">

      <div class="col-md-9">
        <div class="box box-success">
          <div class="panel-body box-header">
              <div class="col-md-12 lead si">ข้อมูลส่วนผู้ใช้
                <hr>
              </div>
            <div class="row">
              <div class="col-md-4 text-center">
                <img class="img-circle avatar avatar-original" style="-webkit-user-select:none;
              display:block; margin:auto;" src="http://robohash.org/sitsequiquia.png?size=120x120">
              </div>
               <b>
              <div class="col-md-8">
                <div class="row">
                  <div class="col-md-12">
                    <h2 class="only-bottom-margin">ผู้ใช้  : {{$name}}<br></h2>
                  </div>
                </div>
                <div class="row si">
                  <div class="col-md-6">

                    <span class="text-muted ">รหัสผู้ใช้ <span> :{{ $userId}} <br>
                    <span class="text-muted">username :</span> {{$username}} <br>
                    <span class="text-muted">Email : </span>  {{$email}}<br><br>
                    <span class="text-muted">เบอรติดต่อ :</span>  {{$tel}}<br>
                    <span class="text-muted">สมัครเมื่อ :</span> {{$created}} <br>

                    <br>


                      <ul class="list-group ">

                    <li class="list-group-item list-group-item-info">
                  <span class="badge si">8 ครั้ง </span>
                  กิจกรรมที่เคยช่วยเหลือ
                    </li>
                    <li class="list-group-item list-group-item-info">
                  <span class="badge ">1,1111 ฿</span>
                  ยอดที่บริจาค
                    </li>
                      </ul>
                </div>
                </b>

              </div>
            </div>
          </div>
          <!--<div class="box-footer clearfix">-->
            <!--<div class="box-footer clearfix">-->

            <!--</div>-->
          <!--</div>-->
        </div>
      </div>
    </div>

</div>
</body>
</html>
